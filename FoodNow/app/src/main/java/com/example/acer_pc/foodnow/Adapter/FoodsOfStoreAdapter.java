package com.example.acer_pc.foodnow.Adapter;

import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.acer_pc.foodnow.Object.Food;
import com.example.acer_pc.foodnow.R;

import java.util.ArrayList;

public class FoodsOfStoreAdapter extends RecyclerView.Adapter<FoodsOfStoreAdapter.FoodsOfStoreViewHolder>{
    private ArrayList<Food> foodArrayList;

    public FoodsOfStoreAdapter(ArrayList<Food> foodArrayList) {
        this.foodArrayList = foodArrayList;
    }

    @Override
    public FoodsOfStoreViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        LayoutInflater layoutInflater = LayoutInflater.from(parent.getContext());
        View listItem= layoutInflater.inflate(R.layout.item_food_store, parent, false);
        FoodsOfStoreAdapter.FoodsOfStoreViewHolder viewHolder = new FoodsOfStoreAdapter.FoodsOfStoreViewHolder(listItem);
        return viewHolder;
    }

    @Override
    public void onBindViewHolder(FoodsOfStoreViewHolder holder, int position) {
        Food itemFood = foodArrayList.get(position);
        holder.imageView.setImageResource(itemFood.getImg());
        holder.txtNameFood.setText(itemFood.getName());
        holder.txtPriceFoods.setText(itemFood.getDes());
        holder.txtPriceFoods.setText(itemFood.getTotal());
    }

    @Override
    public int getItemCount() {
        return foodArrayList.size();
    }

    public static class FoodsOfStoreViewHolder extends RecyclerView.ViewHolder {
        public ImageView imageView;
        public TextView txtNameFood, txtPriceFoods;
        public FoodsOfStoreViewHolder(View itemView) {
            super(itemView);
            this.imageView = itemView.findViewById(R.id.img_item_food);
            this.txtNameFood = itemView.findViewById(R.id.txtName_item_food);
            this.txtPriceFoods = itemView.findViewById(R.id.txtPrice_item_food);
        }
    }
}
