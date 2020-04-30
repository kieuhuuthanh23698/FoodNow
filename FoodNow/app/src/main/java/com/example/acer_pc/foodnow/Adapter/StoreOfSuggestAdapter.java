package com.example.acer_pc.foodnow.Adapter;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.example.acer_pc.foodnow.InformationStoreActivity;
import com.example.acer_pc.foodnow.MainActivity;
import com.example.acer_pc.foodnow.Object.Store;
import com.example.acer_pc.foodnow.R;

import java.util.ArrayList;

public class StoreOfSuggestAdapter extends RecyclerView.Adapter<StoreOfSuggestAdapter.StoreSuggestViewHolder> {
    ArrayList<Store> arrStore;
    Context context;
    Activity activity;

    public StoreOfSuggestAdapter(ArrayList<Store> arrStore, Context context, Activity activity) {
        this.arrStore = arrStore;
        this.context = context;
        this.activity = activity;
    }

    @Override
    public StoreSuggestViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        LayoutInflater layoutInflater = LayoutInflater.from(parent.getContext());
        View listItem= layoutInflater.inflate(R.layout.item_store, parent, false);
        StoreSuggestViewHolder viewHolder = new StoreSuggestViewHolder(listItem);
        return viewHolder;
    }

    @Override
    public void onBindViewHolder(StoreSuggestViewHolder holder, int position) {
        final Store store = arrStore.get(position);
        holder.imageView.setImageResource(store.getImgStore());
        holder.imageView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
//                Intent intent = new Intent(activity, InformationStoreActivity.class);
            }
        });
        holder.textView.setText(store.getName());
    }

    @Override
    public int getItemCount() {
        return arrStore.size();
    }

    public static class StoreSuggestViewHolder extends RecyclerView.ViewHolder {
        public ImageView imageView;
        public TextView textView;
        public StoreSuggestViewHolder(View itemView) {
            super(itemView);
            this.imageView = itemView.findViewById(R.id.imgStoreSuggest);
            this.textView = itemView.findViewById(R.id.nameStoreSuggest);
            itemView.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    Intent intent = new Intent(view.getContext(), InformationStoreActivity.class);
                    view.getContext().startActivity(intent);
                    Toast.makeText(view.getContext(), "Get information store", Toast.LENGTH_SHORT).show();
                }
            });
        }
    }
}
