package com.example.acer_pc.foodnow.Adapter;

import android.content.Context;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.example.acer_pc.foodnow.Object.Cart;
import com.example.acer_pc.foodnow.R;

import java.util.ArrayList;

public class CartOfFragmentAdapter extends RecyclerView.Adapter<CartOfFragmentAdapter.CartOfFragmentViewHolder> {
    ArrayList<Cart> carts;
    Context context;

    public CartOfFragmentAdapter(ArrayList<Cart> carts, Context context) {
        this.carts = carts;
        this.context = context;
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
        Cart cartItem = carts.get(position);
        holder.imageView.setImageResource(cartItem.getImgStore());
        holder.txtName.setText(cartItem.getNameStore());
        holder.txtAddress.setText(cartItem.getAddressStore());
        holder.txtTotal.setText(cartItem.getToTal_Full());
    }

    @Override
    public int getItemCount() {
        return carts.size();
    }

    public static class CartOfFragmentViewHolder extends RecyclerView.ViewHolder {
        public ImageView imageView;
        public TextView txtName, txtAddress, txtTotal;
        public CartOfFragmentViewHolder(View itemView) {
            super(itemView);
            this.imageView = itemView.findViewById(R.id.frament_cart_detail_img);
            this.txtName = itemView.findViewById(R.id.frament_cart_detail_storename);
            this.txtAddress = itemView.findViewById(R.id.frament_cart_detail_storeAddress);
            this.txtTotal = itemView.findViewById(R.id.frament_cart_detail_total);
            itemView.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    Toast.makeText(view.getContext(), "Go to infor cart !", Toast.LENGTH_SHORT).show();
                }
            });
        }
    }
}
