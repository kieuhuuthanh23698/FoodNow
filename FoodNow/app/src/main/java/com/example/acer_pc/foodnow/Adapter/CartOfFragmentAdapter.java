package com.example.acer_pc.foodnow.Adapter;

import android.content.Context;
import android.content.Intent;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.RelativeLayout;
import android.widget.TextView;
import android.widget.Toast;

import com.example.acer_pc.foodnow.InformationStoreActivity;
import com.example.acer_pc.foodnow.Object.Cart;
import com.example.acer_pc.foodnow.R;
import com.squareup.picasso.Picasso;

import java.util.ArrayList;

public class CartOfFragmentAdapter extends RecyclerView.Adapter<CartOfFragmentAdapter.CartOfFragmentViewHolder> {
    ArrayList<Cart> carts;
    Context context;
    String type;

    public CartOfFragmentAdapter(ArrayList<Cart> carts, Context context, String type) {
        this.carts = carts;
        this.context = context;
        this.type = type;
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
        String idOrder = cartItem.getIdOrder().substring( lenIdOrder- 5, lenIdOrder);
        holder.txtIdOrder.setText("#" + idOrder.toUpperCase());
        holder.txtTotal.setText(cartItem.getToTal_Full());
        holder.btnCacel.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Toast.makeText(context, "Tiến hành hủy đơn hàng !", Toast.LENGTH_SHORT).show();
            }
        });
        holder.main_view.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(view.getContext(), InformationStoreActivity.class);
                intent.setAction(Intent.ACTION_SEND);
                intent.putExtra("idStore", cartItem.getIdStore());
                Toast.makeText(view.getContext(), "Get information store", Toast.LENGTH_SHORT).show();
                view.getContext().startActivity(intent);
            }
        });
        if(type.equals("0")){
            holder.groupTop.setVisibility(View.GONE);
            holder.txtIdOrder.setVisibility(View.GONE);
            holder.btnCacel.setVisibility(View.GONE);
            return;
        }
        if(type.equals("2")){
            holder.btnCacel.setVisibility(View.GONE);
        }
        holder.txtState.setText(cartItem.getState());
        holder.txtDate.setText(cartItem.getDate());
    }

    @Override
    public int getItemCount() {
        return carts.size();
    }

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
