package com.example.acer_pc.foodnow.Adapter;

import android.content.Context;
import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.Color;
import android.graphics.drawable.BitmapDrawable;
import android.graphics.drawable.Drawable;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.RelativeLayout;
import android.widget.TextView;

import com.example.acer_pc.foodnow.ListDetailActivity;
import com.example.acer_pc.foodnow.Object.SystemGroupStore;
import com.example.acer_pc.foodnow.R;
import com.squareup.picasso.Picasso;
import com.squareup.picasso.Target;

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
    public void onBindViewHolder(final SystemGroupStoreAdapterViewHolder holder, int position) {
        final SystemGroupStore systemGroupStore = arrayList.get(position);
        holder.main_text.setText(systemGroupStore.getMain_text());
        holder.sub_text.setText(systemGroupStore.getSub_text());
        Picasso.get().load(systemGroupStore.getBackground()).into(new Target() {
            @Override
            public void onBitmapLoaded(Bitmap bitmap, Picasso.LoadedFrom from) {
                holder.background.setBackground(new BitmapDrawable(context.getResources(), bitmap));
            }

            @Override
            public void onBitmapFailed(Exception e, Drawable errorDrawable) {
                holder.background.setBackgroundColor(Color.parseColor("#ffff"));
            }

            @Override
            public void onPrepareLoad(Drawable placeHolderDrawable) {

            }
        });
        holder.view.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(view.getContext(), ListDetailActivity.class);
                intent.setAction(Intent.ACTION_SEND);
                intent.putExtra("type", 3);
                String idDanhMuc = systemGroupStore.getId();
                intent.putExtra("idDanhMuc", idDanhMuc);
                view.getContext().startActivity(intent);
            }
        });
    }

    @Override
    public int getItemCount() {
        return arrayList.size();
    }

    public class SystemGroupStoreAdapterViewHolder extends RecyclerView.ViewHolder{
        public View view;
        public TextView main_text, sub_text;
        public RelativeLayout background;
        public SystemGroupStoreAdapterViewHolder(View itemView){
            super(itemView);
            view = itemView;
            main_text = itemView.findViewById(R.id.item_system_group_store_main_text);
            sub_text = itemView.findViewById(R.id.item_system_group_store_sub_text);
            background = itemView.findViewById(R.id.item_system_group_store_background);
        }
    }
}
