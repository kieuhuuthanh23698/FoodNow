package com.example.acer_pc.foodnow.Adapter;

import android.app.Dialog;
import android.content.Context;
import android.content.Intent;
import android.graphics.Color;
import android.graphics.drawable.ColorDrawable;
import android.support.v7.widget.RecyclerView;
import android.view.Gravity;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.view.Window;
import android.view.WindowManager;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.RelativeLayout;
import android.widget.TextView;
import android.widget.Toast;

import com.example.acer_pc.foodnow.Data.DAL_CancelOrder;
import com.example.acer_pc.foodnow.Data.DAL_GetInforStore;
import com.example.acer_pc.foodnow.InformationStoreActivity;
import com.example.acer_pc.foodnow.Object.Cart;
import com.example.acer_pc.foodnow.R;
import com.squareup.picasso.Picasso;

import java.util.ArrayList;

public class CartOfFragmentAdapter extends RecyclerView.Adapter<CartOfFragmentAdapter.CartOfFragmentViewHolder> implements DAL_CancelOrder.CancelOrderListener{
    ArrayList<Cart> carts;
    Context context;
    String type;
    DAL_CancelOrder dal_cancelOrder;

    public CartOfFragmentAdapter(ArrayList<Cart> carts, Context context, String type) {
        this.carts = carts;
        this.context = context;
        this.type = type;
        dal_cancelOrder = new DAL_CancelOrder(this, context);
    }

    @Override
    public CartOfFragmentViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        LayoutInflater layoutInflater = LayoutInflater.from(parent.getContext());
        View listItem= layoutInflater.inflate(R.layout.item_cart_history, parent, false);
        CartOfFragmentAdapter.CartOfFragmentViewHolder viewHolder = new CartOfFragmentAdapter.CartOfFragmentViewHolder(listItem);
        return viewHolder;
    }

    @Override
    public void onBindViewHolder(CartOfFragmentViewHolder holder, int position) {
        final Cart cartItem = carts.get(position);
        //all
        if(!cartItem.getUrlImg().trim().isEmpty())
            Picasso.get().load(cartItem.getUrlImg()).into(holder.imageView);
        holder.txtName.setText(cartItem.getNameStore());
        holder.txtAddress.setText(cartItem.getAddressStore());
        int lenIdOrder = cartItem.getIdOrder().length();
        String idOrder = cartItem.getIdOrder().substring( lenIdOrder - 5, lenIdOrder);
        holder.txtIdOrder.setText("#" + idOrder.toUpperCase());
        holder.txtTotal.setText(cartItem.getToTal_Full());
        holder.btnCacel.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                final Dialog dialogConfirmCanCelOrder = new Dialog(context);
                dialogConfirmCanCelOrder.requestWindowFeature(Window.FEATURE_NO_TITLE);
                dialogConfirmCanCelOrder.getWindow().setBackgroundDrawable(new ColorDrawable(android.graphics.Color.TRANSPARENT));
                dialogConfirmCanCelOrder.setContentView(R.layout.confirm_cancel_order_dialog);
                TextView btnClose, btnConfirm;
                btnClose = dialogConfirmCanCelOrder.findViewById(R.id.confirm_cancel_order_btn_close);
                btnConfirm = dialogConfirmCanCelOrder.findViewById(R.id.confirm_cancel_order_btn_confirm);
                btnClose.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View view) {
                        dialogConfirmCanCelOrder.dismiss();
                    }
                });
                btnConfirm.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View view) {
                        Toast.makeText(context, "Tiến hành hủy đơn hàng !", Toast.LENGTH_SHORT).show();
                        dialogConfirmCanCelOrder.dismiss();
                        dal_cancelOrder.cancelOrder(cartItem.getIdOrder());
                    }
                });
                dialogConfirmCanCelOrder.show();
            }
        });
        holder.main_view.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(type.equals("0")) {//order incharge
                    if(!DAL_GetInforStore.requesting) {
                        Intent intent = new Intent(view.getContext(), InformationStoreActivity.class);
                        intent.setAction(Intent.ACTION_SEND);
                        intent.putExtra("idStore", cartItem.getIdStore());
                        Toast.makeText(view.getContext(), "Get information store", Toast.LENGTH_SHORT).show();
                        view.getContext().startActivity(intent);
                    } else {
                        //đang xử lý
                    }
                } else {
                    //act infor order
                }
            }
        });
        //type of tabs
        if(type.equals("0")){//incharge
            holder.groupTop.setVisibility(View.GONE);
            holder.txtIdOrder.setVisibility(View.GONE);
            return;
        }
        if(type.equals("1")){
            holder.btnCacel.setVisibility(View.VISIBLE);
        }
        if(type.equals("2") || type.equals("1")){//coming and history
            //state of order
            switch (cartItem.getState()){
                case "1":
                    holder.txtState.setText("Chờ xác nhận");
                    holder.txtState.setTextColor( context.getResources().getColor(R.color.order_wating));
                    break;
                case "2":
                    holder.txtState.setText("Đang giao");
                    holder.txtState.setTextColor( context.getResources().getColor(R.color.order_comming));
                    holder.btnCacel.setVisibility(View.GONE);
                    break;
                case "3":
                    holder.txtState.setText("Đã hủy");
                    holder.txtState.setTextColor( context.getResources().getColor(R.color.order_canceled));
                    break;
                case "4":
                    holder.txtState.setText("Đã giao");
                    holder.txtState.setTextColor( context.getResources().getColor(R.color.order_done));
                    break;
            }
        }
        if(cartItem.getTypePayString().equals("0"))
            holder.btnCacel.setVisibility(View.GONE);
        holder.txtDate.setText(cartItem.getDate());
    }

    @Override
    public int getItemCount() {
        return carts.size();
    }

    @Override
    public void onRequestCancelOrderDone(String type){
        if(type != null){
            for (int i = 0; i < carts.size(); i++) {
                if(carts.get(i).getIdOrder().equals(type)){
                    carts.remove(i);
                    notifyItemRemoved(i);
                    return;
                }
            }
        }
    }

//    public void onRequestCancelOrderDone(String type){
//        if(type != null){
//            for (int i = 0; i < carts.size(); i++) {
//                if(carts.get(i).getIdOrder().equals(type)){
//                    carts.remove(i);
//                    notifyItemRemoved(i);
//                    return;
//                }
//            }
//        }
//    }

    public class CartOfFragmentViewHolder extends RecyclerView.ViewHolder {
        public RelativeLayout groupTop;
        public TextView txtState, txtDate;
        public LinearLayout main_view;
        public ImageView imageView;
        public TextView txtName, txtAddress, txtIdOrder, txtTotal;
        public TextView btnCacel;
        public CartOfFragmentViewHolder(View itemView) {
            super(itemView);
            this.groupTop = itemView.findViewById(R.id.frament_cart_detail_groupTop);
            this.txtState = itemView.findViewById(R.id.frament_cart_detail_state);
            this.txtDate = itemView.findViewById(R.id.frament_cart_detail_date);
            this.main_view = itemView.findViewById(R.id.frament_cart_detail_main_view);
            this.imageView = itemView.findViewById(R.id.frament_cart_detail_img);
            this.txtName = itemView.findViewById(R.id.frament_cart_detail_storename);
            this.txtAddress = itemView.findViewById(R.id.frament_cart_detail_storeAddress);
            this.txtIdOrder = itemView.findViewById(R.id.frament_cart_detail_idCart);
            this.txtTotal = itemView.findViewById(R.id.frament_cart_detail_total);
            this.btnCacel = itemView.findViewById(R.id.frament_cart_detail_btnCancel);
        }
    }
}
