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
import android.widget.TextView;

import com.example.acer_pc.foodnow.InformationStoreActivity;
import com.example.acer_pc.foodnow.NoteItemActivity;
import com.example.acer_pc.foodnow.Object.Food;
import com.example.acer_pc.foodnow.R;
import com.example.acer_pc.foodnow.ShoppingCartActivity;

import java.util.ArrayList;

public class ShoppingCartAdapter extends RecyclerView.Adapter<ShoppingCartAdapter.ShoppingCartViewHolder>{
    private Context context;

    public ShoppingCartAdapter(Context context) {
        this.context = context;
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
        final Food item = InformationStoreActivity.shoppingCart.get(position);
        holder.txtNameItem.setText(item.getName());
        holder.txtPriceItem.setText(item.getPrice());
        holder.txtNumItem.setText(item.getCount());
        holder.txtNoteItem.setText(item.getNote());
        holder.txtNoteItem.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(context, NoteItemActivity.class);
                intent.setAction(Intent.ACTION_SEND);
                intent.putExtra("id", item.getId());
                intent.putExtra("note", item.getNote());
                ((Activity)context).startActivity(intent);
            }
        });
        holder.btnAdd.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                item.setCount(item.getCountInt() + 1);
                holder.txtNumItem.setText(item.getCount());
                ShoppingCartActivity.shoppingCartAdapte.notifyItemChanged(position);
                TextView textView = ((Activity) context).findViewById(R.id.shopping_cart_number_item_cart);
                textView.setText(String.format("%d", InformationStoreActivity.shoppingCart.size()));
            }
        });
        holder.btnRemove.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(item.getCountInt() == 1) {
                    InformationStoreActivity.shoppingCart.remove(item);
                    ShoppingCartActivity.shoppingCartAdapte.notifyItemRemoved(position);
                    if(InformationStoreActivity.shoppingCart.size() >= 1) {
                        TextView textView = ((Activity) context).findViewById(R.id.shopping_cart_number_item_cart);
                        textView.setText(String.format("%d", InformationStoreActivity.shoppingCart.size()));
                    } else if(InformationStoreActivity.shoppingCart.size() == 0){
                        InformationStoreActivity.shoppingCart.remove(item);
                        Activity activity = (Activity) context;
                        activity.finish();
                    }
                } else if(item.getCountInt() > 1) {
                    item.setCount(item.getCountInt() - 1);
                    holder.txtNumItem.setText(item.getCount());
                    ShoppingCartActivity.shoppingCartAdapte.notifyItemChanged(position);
                }
            }
        });
    }


    @Override
    public int getItemCount() {
        return InformationStoreActivity.shoppingCart.size();
    }

    public static class ShoppingCartViewHolder extends RecyclerView.ViewHolder{
        public TextView txtNameItem, txtPriceItem, txtNumItem, txtNoteItem;
        public Button btnRemove, btnAdd;
        public ShoppingCartViewHolder(View itemView){
            super(itemView);
            this.txtNameItem = itemView.findViewById(R.id.shopping_cart_name_item);
            this.txtPriceItem = itemView.findViewById(R.id.shopping_cart_price_item);
            this.txtNumItem = itemView.findViewById(R.id.shopping_cart_number_item);
            this.txtNoteItem = itemView.findViewById(R.id.shopping_cart_note_item);
            this.btnAdd = itemView.findViewById(R.id.shopping_cart_add_btn);
            this.btnRemove = itemView.findViewById(R.id.shopping_cart_remove_btn);
        }
    }
}
