package com.example.acer_pc.foodnow.Adapter;

import android.content.Context;
import android.support.v7.widget.DividerItemDecoration;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.acer_pc.foodnow.Object.FoodType;
import com.example.acer_pc.foodnow.R;

import java.util.ArrayList;

public class InforStoreFoodTypeAdapter extends RecyclerView.Adapter<InforStoreFoodTypeAdapter.InforStoreFoodTypeViewHolder>{
    public static InforStoreFoodsAdapter inforStoreFoodsAdapter;
    ArrayList<FoodType> arrayListFoodType;
    Context context;

    public InforStoreFoodTypeAdapter(ArrayList<FoodType> arrayListFoodType, Context context) {
        this.arrayListFoodType = arrayListFoodType;
        this.context = context;
    }

    @Override
    public InforStoreFoodTypeViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        LayoutInflater layoutInflater = LayoutInflater.from(parent.getContext());
        View listItem= layoutInflater.inflate(R.layout.item_list_food_store, parent, false);
        InforStoreFoodTypeAdapter.InforStoreFoodTypeViewHolder viewHolder = new InforStoreFoodTypeAdapter.InforStoreFoodTypeViewHolder(listItem);
        return viewHolder;
    }

    @Override
    public void onBindViewHolder(InforStoreFoodTypeViewHolder holder, int position) {
        final FoodType item = arrayListFoodType.get(position);
        holder.txtNameType.setText(item.getNameType());
        inforStoreFoodsAdapter = new InforStoreFoodsAdapter(item.getArrayListFoods(), this.context);
        holder.recyclerViewListFoods.setAdapter(inforStoreFoodsAdapter);
        LinearLayoutManager friendsLayoutManager = new LinearLayoutManager(context.getApplicationContext(), android.support.v7.widget.LinearLayoutManager.VERTICAL, false);
        holder.recyclerViewListFoods.setLayoutManager(friendsLayoutManager);
        holder.recyclerViewListFoods.setNestedScrollingEnabled(false);
        holder.recyclerViewListFoods.addItemDecoration(new DividerItemDecoration(context, DividerItemDecoration.VERTICAL));
    }

    @Override
    public int getItemCount() {
        return arrayListFoodType.size();
    }

    public static class InforStoreFoodTypeViewHolder extends RecyclerView.ViewHolder {
        public TextView txtNameType;
        public RecyclerView recyclerViewListFoods;
        public InforStoreFoodTypeViewHolder(View itemView) {
            super(itemView);
            txtNameType = itemView.findViewById(R.id.title_food_type);
            recyclerViewListFoods = itemView.findViewById(R.id.list_foods_of_type);
        }
    }
}
