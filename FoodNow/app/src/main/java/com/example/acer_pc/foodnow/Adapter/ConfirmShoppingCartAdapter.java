package com.example.acer_pc.foodnow.Adapter;

import android.content.Context;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.acer_pc.foodnow.Data.CartDetail;
import com.example.acer_pc.foodnow.Data.Utils;
import com.example.acer_pc.foodnow.InformationStoreActivity;
import com.example.acer_pc.foodnow.Object.Food;
import com.example.acer_pc.foodnow.R;
import com.squareup.picasso.Picasso;

import java.util.ArrayList;

import static com.example.acer_pc.foodnow.InformationStoreActivity.shoppingCart;

public class ConfirmShoppingCartAdapter extends RecyclerView.Adapter<ConfirmShoppingCartAdapter.ConfirmShoppingCartViewHolder>{
    Context context;

    public ConfirmShoppingCartAdapter(Context context) {
        this.context = context;
    }

    @Override
    public ConfirmShoppingCartViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        LayoutInflater layoutInflater = LayoutInflater.from(parent.getContext());
        View listItem= layoutInflater.inflate(R.layout.item_shopping_cart_done, parent, false);
        ConfirmShoppingCartViewHolder viewHolder = new ConfirmShoppingCartViewHolder(listItem);
        return viewHolder;
    }

    @Override
    public void onBindViewHolder(ConfirmShoppingCartViewHolder holder, int position) {
        CartDetail iFood = (CartDetail) shoppingCart.values().toArray()[position];
        Picasso.get().load(iFood.getImg()).into(holder.imageView);
        holder.txtDes.setText(iFood.getDes());
        holder.txtNote.setText(iFood.getNote());
        holder.txtPriceFoods.setText(iFood.getTotal());
    }

    @Override
    public int getItemCount() {
        return shoppingCart.size();
    }

    public static class ConfirmShoppingCartViewHolder extends RecyclerView.ViewHolder {
        public ImageView imageView;
        public TextView txtDes, txtNote,txtPriceFoods;
        public ConfirmShoppingCartViewHolder(View itemView) {
            super(itemView);
            imageView = itemView.findViewById(R.id.confirm_shopping_cart_img_item);
            txtDes = itemView.findViewById(R.id.confirm_shopping_cart_des_item);
            txtNote = itemView.findViewById(R.id.confirm_shopping_cart_note_item);
            txtPriceFoods = itemView.findViewById(R.id.confirm_shopping_cart_total_item);
        }
    }
}
