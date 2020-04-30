package com.example.acer_pc.foodnow.Adapter;

import android.content.Context;
import android.content.Intent;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.acer_pc.foodnow.Object.Food;
import com.example.acer_pc.foodnow.R;

import java.util.ArrayList;

public class InforStoreFoodsAdapter extends RecyclerView.Adapter<InforStoreFoodsAdapter.InforStoreFoodsViewHolder>{
    ArrayList<Food> arrayListFoods;
    Context context;

    public InforStoreFoodsAdapter(ArrayList<Food> arrayListFoods, Context context) {
        this.arrayListFoods = arrayListFoods;
        this.context = context;
    }

    @Override
    public InforStoreFoodsViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        LayoutInflater layoutInflater = LayoutInflater.from(parent.getContext());
        View listItem= layoutInflater.inflate(R.layout.item_food_of_types, parent, false);
        InforStoreFoodsAdapter.InforStoreFoodsViewHolder viewHolder = new InforStoreFoodsAdapter.InforStoreFoodsViewHolder(listItem);
        return viewHolder;
    }

    @Override
    public void onBindViewHolder(InforStoreFoodsViewHolder holder, int position) {
        final Food food = arrayListFoods.get(position);
        holder.imageView.setImageResource(food.getImg());
        holder.txtNameFood.setText(food.getName());
        holder.txtDetailFood.setText(food.getDetail());
        holder.txtCostFood.setText(food.getCost());
        holder.txtLikeFood.setText(food.getLike());
        holder.txtPriceFood.setText(food.getPrice());
    }

    @Override
    public int getItemCount() {
        return arrayListFoods.size();
    }

    public static class InforStoreFoodsViewHolder extends RecyclerView.ViewHolder {
        public ImageView imageView;
        public TextView txtNameFood, txtDetailFood, txtCostFood, txtLikeFood, txtPriceFood;
        public InforStoreFoodsViewHolder(View itemView) {
            super(itemView);
            this.imageView = itemView.findViewById(R.id.imgFood);
            this.txtNameFood = itemView.findViewById(R.id.txtFoodName);
            this.txtDetailFood = itemView.findViewById(R.id.txtFoodDetail);
            this.txtCostFood = itemView.findViewById(R.id.txtFoodCost);
            this.txtLikeFood = itemView.findViewById(R.id.numFoodLike);
            this.txtPriceFood = itemView.findViewById(R.id.txtFoodPrice);
        }
    }
}
