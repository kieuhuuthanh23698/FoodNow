package com.example.acer_pc.foodnow.Adapter;

import android.content.Context;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.example.acer_pc.foodnow.Object.SystemGroupStore;
import com.example.acer_pc.foodnow.R;

import java.util.ArrayList;

public class SystemGroupStoreAdapter extends RecyclerView.Adapter<SystemGroupStoreAdapter.SystemGroupStoreAdapterViewHolder>{

    ArrayList<SystemGroupStore> arrayList;
    Context context;

    public SystemGroupStoreAdapter(ArrayList<SystemGroupStore> arrayList, Context context) {
        this.arrayList = arrayList;
        this.context = context;
    }

    @Override
    public SystemGroupStoreAdapterViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        LayoutInflater layoutInflater = LayoutInflater.from(parent.getContext());
        View listItem= layoutInflater.inflate(R.layout.item_home_fragment_system_group_store, parent, false);
        SystemGroupStoreAdapterViewHolder viewHolder = new SystemGroupStoreAdapterViewHolder(listItem);
        return viewHolder;
    }

    @Override
    public void onBindViewHolder(SystemGroupStoreAdapterViewHolder holder, int position) {
        SystemGroupStore systemGroupStore = arrayList.get(position);
        holder.main_text.setText(systemGroupStore.getMain_text());
        holder.sub_text.setText(systemGroupStore.getSub_text());
    }

    @Override
    public int getItemCount() {
        return arrayList.size();
    }

    public static class SystemGroupStoreAdapterViewHolder extends RecyclerView.ViewHolder{
        public TextView main_text, sub_text;
        public SystemGroupStoreAdapterViewHolder(View itemView){
            super(itemView);
            main_text = itemView.findViewById(R.id.item_system_group_store_main_text);
            sub_text = itemView.findViewById(R.id.item_system_group_store_sub_text);
        }
    }
}
