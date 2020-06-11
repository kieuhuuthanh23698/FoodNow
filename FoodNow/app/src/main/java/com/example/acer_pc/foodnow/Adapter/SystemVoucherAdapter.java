package com.example.acer_pc.foodnow.Adapter;

import android.content.Context;
import android.graphics.Color;
import android.graphics.drawable.Drawable;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.acer_pc.foodnow.Data.Utils;
import com.example.acer_pc.foodnow.Object.SystemVoucher;
import com.example.acer_pc.foodnow.R;
import com.squareup.picasso.Picasso;

import java.util.ArrayList;

import static com.example.acer_pc.foodnow.LoginActivity.user;

public class SystemVoucherAdapter extends RecyclerView.Adapter<SystemVoucherAdapter.SystemVoucherAdapterViewHolder>{
    ArrayList<SystemVoucher> arrayList;
    Context context;

    public SystemVoucherAdapter(ArrayList<SystemVoucher> arrayList, Context context) {
        this.arrayList = arrayList;
        this.context = context;
    }

    @Override
    public SystemVoucherAdapterViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        LayoutInflater layoutInflater = LayoutInflater.from(parent.getContext());
        View listItem= layoutInflater.inflate(R.layout.item_home_fragment_voucher, parent, false);
        SystemVoucherAdapterViewHolder viewHolder = new SystemVoucherAdapterViewHolder(listItem);
        return viewHolder;
    }

    @Override
    public void onBindViewHolder(SystemVoucherAdapterViewHolder holder, int position) {
        SystemVoucher systemVoucher = arrayList.get(position);
        if(systemVoucher.getIcon().trim().isEmpty())
            Picasso.get().load(systemVoucher.getIcon()).into(holder.icon);
        holder.content.setText(systemVoucher.getContent());
        holder.view.getBackground().setTint(Color.parseColor(Utils.getColor(position)));
    }

    @Override
    public int getItemCount() {
        return arrayList.size();
    }

    public static class SystemVoucherAdapterViewHolder extends RecyclerView.ViewHolder
    {
        public View view;
        public ImageView icon;
        public TextView content;
        public SystemVoucherAdapterViewHolder(View itemView){
            super(itemView);
            this.view = itemView;
            this.icon = itemView.findViewById(R.id.home_fragment_voucher_icon);
            this.content = itemView.findViewById(R.id.home_fragment_voucher_content);
        }
    }
}
