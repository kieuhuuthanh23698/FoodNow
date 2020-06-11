package com.example.acer_pc.foodnow.Adapter;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.LinearLayout;
import android.widget.RelativeLayout;
import android.widget.TextView;
import android.widget.Toast;

import com.example.acer_pc.foodnow.Common.DefineVarible;
import com.example.acer_pc.foodnow.Data.CartDetail;
import com.example.acer_pc.foodnow.Data.DAL_AddProductToCart;
import com.example.acer_pc.foodnow.Data.Utils;
import com.example.acer_pc.foodnow.InformationStoreActivity;
import com.example.acer_pc.foodnow.LoginActivity;
import com.example.acer_pc.foodnow.NoteItemActivity;
import com.example.acer_pc.foodnow.Object.Food;
import com.example.acer_pc.foodnow.R;
import com.example.acer_pc.foodnow.ShoppingCartActivity;
import com.squareup.picasso.Picasso;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

import static com.example.acer_pc.foodnow.Adapter.InforStoreFoodsAdapter.requesting;
import static com.example.acer_pc.foodnow.Common.DefineVarible.dal_addProductToCart;
import static com.example.acer_pc.foodnow.Data.Utils.calculateCost;
import static com.example.acer_pc.foodnow.InformationStoreActivity.shoppingCart;

public class ShoppingCartAdapter extends RecyclerView.Adapter<ShoppingCartAdapter.ShoppingCartViewHolder>{
    private Context context;
    DAL_AddProductToCart dal_addProductToCart;

    public ShoppingCartAdapter(Context context) {
        this.context = context;
        dal_addProductToCart = new DAL_AddProductToCart(context);
    }

    @Override
    public ShoppingCartViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        LayoutInflater layoutInflater = LayoutInflater.from(parent.getContext());
        View listItem= layoutInflater.inflate(R.layout.item_shopping_cart, parent, false);
        ShoppingCartAdapter.ShoppingCartViewHolder viewHolder = new ShoppingCartAdapter.ShoppingCartViewHolder(listItem);
        return viewHolder;
    }

    @Override
    public void onBindViewHolder(final ShoppingCartViewHolder holder, final int position) {
        final CartDetail item = (CartDetail) shoppingCart.values().toArray()[position];
        if(item == null)
            return;
        holder.idFood = item.getId();
        holder.txtNameItem.setText(item.getName());
        holder.txtPriceItem.setText(String.valueOf(item.getPrice()) + " đ");
        holder.txtNumItem.setText(item.getCount());
        holder.txtNoteItem.setText(item.getNote());
        holder.txtNoteItem.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(context, NoteItemActivity.class);
                intent.setAction(Intent.ACTION_SEND);
                intent.putExtra("id", item.getId());
                intent.putExtra("note", item.getNote());
//                ((Activity)context).startActivityForResult(intent, DefineVarible.setNoteCartDetail);
                ((Activity)context).startActivity(intent);
            }
        });
        holder.btnAdd.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(!requesting) {
                    if (LoginActivity.user == null) {
                        Intent intent = new Intent(context, LoginActivity.class);
                        ((Activity) context).startActivity(intent);
                        return;
                    }
                CartDetail item = shoppingCart.get(holder.idFood);
                item.setCount(item.getCountInt() + 1);
                holder.txtNumItem.setText(item.getCount());
                notifyItemChanged(position);
                TextView textView = ((Activity) context).findViewById(R.id.shopping_cart_number_item_cart);
                textView.setText(String.format("%d", InformationStoreActivity.shoppingCart.size()));
                if(dal_addProductToCart != null)
                    dal_addProductToCart.addProductToCart();
                } else{
                    Toast.makeText(context, "Please waiting ...", Toast.LENGTH_SHORT).show();
                }
            }
        });
        holder.btnRemove.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(!requesting) {
                    if (LoginActivity.user == null) {
                        Intent intent = new Intent(context, LoginActivity.class);
                        ((Activity) context).startActivity(intent);
                        return;
                    }
                CartDetail item = shoppingCart.get(holder.idFood);
                if(item.getCountInt() == 1) {
                    shoppingCart.remove(item.getId());
                    notifyItemRemoved(position);
                    if(dal_addProductToCart != null)
                        dal_addProductToCart.addProductToCart();
                    if(shoppingCart.size() >= 1) {
                        TextView textView = ((Activity) context).findViewById(R.id.shopping_cart_number_item_cart);
                        textView.setText(String.format("%d", shoppingCart.size()));
                    } else if(shoppingCart.size() == 0){
                        shoppingCart.remove(item);
                        if(dal_addProductToCart != null)
                            dal_addProductToCart.addProductToCart();
                        Activity activity = (Activity) context;
                        activity.finish();
                    }
                } else if(item.getCountInt() > 1) {
                    item.setCount(item.getCountInt() - 1);
                    holder.txtNumItem.setText(item.getCount());
                    notifyItemChanged(position);
                    if(dal_addProductToCart != null)
                        dal_addProductToCart.addProductToCart();
                }
                } else{
                    Toast.makeText(context, "Please waiting ...", Toast.LENGTH_SHORT).show();
                }
            }
        });
    }


    @Override
    public int getItemCount() {
        return shoppingCart.size();
    }

    public class ShoppingCartViewHolder extends RecyclerView.ViewHolder{
        public String idFood;
        public TextView txtNameItem, txtPriceItem, txtNumItem, txtNoteItem;
        public Button btnRemove, btnAdd;
        public ShoppingCartViewHolder(View itemView){
            super(itemView);
            idFood = "";
            this.txtNameItem = itemView.findViewById(R.id.shopping_cart_name_item);
            this.txtPriceItem = itemView.findViewById(R.id.shopping_cart_price_item);
            this.txtNumItem = itemView.findViewById(R.id.shopping_cart_number_item);
            this.txtNoteItem = itemView.findViewById(R.id.shopping_cart_note_item);
            this.btnAdd = itemView.findViewById(R.id.shopping_cart_add_btn);
            this.btnRemove = itemView.findViewById(R.id.shopping_cart_remove_btn);
        }
    }
}
