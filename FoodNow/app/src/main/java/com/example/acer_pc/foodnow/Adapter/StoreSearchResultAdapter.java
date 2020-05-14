package com.example.acer_pc.foodnow.Adapter;

import android.content.Context;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.acer_pc.foodnow.Object.Store;
import com.example.acer_pc.foodnow.R;

import java.util.ArrayList;

public class StoreSearchResultAdapter extends RecyclerView.Adapter<StoreSearchResultAdapter.StoreSearchResultViewHolder> {
    private ArrayList<Store> arrStore;
    private Context context;

    public StoreSearchResultAdapter(ArrayList<Store> arrStore, Context context) {
        this.arrStore = arrStore;
        this.context = context;
    }

    @Override
    public StoreSearchResultViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        LayoutInflater layoutInflater = LayoutInflater.from(parent.getContext());
        View listItem= layoutInflater.inflate(R.layout.item_store_search_result, parent, false);
        StoreSearchResultAdapter.StoreSearchResultViewHolder viewHolder = new StoreSearchResultAdapter.StoreSearchResultViewHolder(listItem);
        return viewHolder;
    }

    @Override
    public void onBindViewHolder(StoreSearchResultViewHolder holder, int position) {
        final  Store store = arrStore.get(position);
        holder.imageView.setImageResource(store.getImgStore());
        holder.txtNameStore.setText(store.getName().trim());
        holder.txtAddress.setText(store.getAddress());
        holder.txtStar.setText(store.getStar());
        holder.txtTime.setText(store.getTime());
        holder.txtDistance.setText(store.getDistance());
        FoodsOfStoreAdapter foodsOfStoreAdapter = new FoodsOfStoreAdapter(store.getArrFoods());
        LinearLayoutManager friendsLayoutManager = new LinearLayoutManager(context.getApplicationContext(), LinearLayoutManager.HORIZONTAL, false);
        holder.recyclerView_Search_Result.setAdapter(foodsOfStoreAdapter);
        holder.recyclerView_Search_Result.setNestedScrollingEnabled(true);
        holder.recyclerView_Search_Result.setLayoutManager(friendsLayoutManager);
    }

    @Override
    public int getItemCount() {
        return arrStore.size();
    }

    public static class StoreSearchResultViewHolder extends RecyclerView.ViewHolder {
        public ImageView imageView;
        public TextView txtNameStore, txtAddress, txtStar, txtTime, txtDistance;
        public RecyclerView recyclerView_Search_Result;
        public StoreSearchResultViewHolder(View itemView) {
            super(itemView);
            this.imageView = itemView.findViewById(R.id.imgStore_Search_Result);
            this.txtNameStore = itemView.findViewById(R.id.txt_storename_Search_Result);
            this.txtAddress = itemView.findViewById(R.id.txt_storeAddress_Search_Result);
            this.txtStar = itemView.findViewById(R.id.txtStar_Search_Result);
            this.txtTime = itemView.findViewById(R.id.store_near_time_Search_Result);
            this.txtDistance = itemView.findViewById(R.id.store_near_distance_Search_Result);
            this.recyclerView_Search_Result = itemView.findViewById(R.id.foodOfstoreSearchResult);
        }
    }
}