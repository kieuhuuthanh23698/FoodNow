package com.example.acer_pc.foodnow.Adapter;

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
import com.example.acer_pc.foodnow.Object.Store;
import com.example.acer_pc.foodnow.R;
import com.squareup.picasso.Picasso;

import java.util.ArrayList;

public class StoreNearAdapter extends RecyclerView.Adapter<StoreNearAdapter.StoreNearViewHolder>{
    ArrayList<Store> arrStore;
    Context context;

    public StoreNearAdapter(ArrayList<Store> arrStore, Context context) {
        this.arrStore = arrStore;
        this.context = context;
    }

    @Override
    public StoreNearViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        LayoutInflater layoutInflater = LayoutInflater.from(parent.getContext());
        View listItem= layoutInflater.inflate(R.layout.item_store_full, parent, false);
        StoreNearAdapter.StoreNearViewHolder viewHolder = new StoreNearAdapter.StoreNearViewHolder(listItem);
        return viewHolder;
    }

    @Override
    public void onBindViewHolder(StoreNearViewHolder holder, int position) {
        final  Store store = arrStore.get(position);
        if(!store.getUrlImage().trim().isEmpty())
            Picasso.get().load(store.getUrlImage()).into(holder.imageView);
        holder.txtNameStore.setText(store.getName().trim());
        holder.txtAddress.setText(store.getAddress());
        holder.txtStar.setText(store.getStar());
        holder.txtTime.setText(store.getTime());
        String s = store.getDistance();
        holder.txtDistance.setText(store.getDistance());
        holder.view.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(view.getContext(), InformationStoreActivity.class);
                intent.setAction(Intent.ACTION_SEND);
                intent.putExtra("idStore", store.getId());
                Toast.makeText(view.getContext(), "Get information store", Toast.LENGTH_SHORT).show();
                view.getContext().startActivity(intent);
            }
        });
    }

    @Override
    public int getItemCount() {
        return arrStore.size();
    }

    public class StoreNearViewHolder extends RecyclerView.ViewHolder {
        public View view;
        public ImageView imageView;
        public TextView txtNameStore, txtAddress, txtStar, txtTime, txtDistance;
        public StoreNearViewHolder(View itemView) {
            super(itemView);
            this.imageView = itemView.findViewById(R.id.imgStore_full);
            this.txtNameStore = itemView.findViewById(R.id.txt_storename_full);
            this.txtAddress = itemView.findViewById(R.id.txt_storeAddress_full);
            this.txtStar = itemView.findViewById(R.id.txtStar);
            this.txtTime = itemView.findViewById(R.id.store_near_time);
            this.txtDistance = itemView.findViewById(R.id.store_near_distance);
            this.view = itemView;
//            this.imageView.setOnClickListener(new View.OnClickListener() {
//                @Override
//                public void onClick(View view) {
//                    Intent intent = new Intent(view.getContext(), InformationStoreActivity.class);
//                    view.getContext().startActivity(intent);
//                    Toast.makeText(view.getContext(), "Get information store", Toast.LENGTH_SHORT).show();
//                }
//            });
        }
    }
}
