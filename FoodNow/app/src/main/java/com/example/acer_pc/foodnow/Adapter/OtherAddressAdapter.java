package com.example.acer_pc.foodnow.Adapter;

import android.app.Activity;
import android.content.Context;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;
import android.widget.Toast;

import com.example.acer_pc.foodnow.AddressUserActivity;
import com.example.acer_pc.foodnow.ConfirmCartActivity;
import com.example.acer_pc.foodnow.Object.Address;
import com.example.acer_pc.foodnow.R;

import java.util.ArrayList;

public class OtherAddressAdapter extends RecyclerView.Adapter<OtherAddressAdapter.OtherAddressViewHolder> {
    ArrayList<Address> addresses;
    int type;
    Context context;

    public OtherAddressAdapter(ArrayList<Address> addresses, int type, Context context) {
        this.addresses = addresses;
        this.type = type;
        this.context = context;
    }

    @Override
    public OtherAddressViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        LayoutInflater layoutInflater = LayoutInflater.from(parent.getContext());
        View listItem= layoutInflater.inflate(R.layout.item_address, parent, false);
        OtherAddressViewHolder viewHolder = new OtherAddressViewHolder(listItem);
        return viewHolder;
    }

    @Override
    public void onBindViewHolder(OtherAddressViewHolder holder, int position) {
        final Address address = addresses.get(position);
        if(address == null)
            return;
        holder.txtAddress.setText(address.getAddress());
        holder.view.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                ConfirmCartActivity.address = address;
                Toast.makeText(context, address.getAddress(), Toast.LENGTH_SHORT).show();
                if(type == 0){
                    ((Activity)context).finish();
                }
            }
        });
    }

    @Override
    public int getItemCount() {
        if(addresses == null)
            return 0;
        return addresses.size();
    }

    public class OtherAddressViewHolder extends RecyclerView.ViewHolder{
        public TextView txtAddress;
        public View view;
        public OtherAddressViewHolder(View itemView){
            super(itemView);
            view = itemView;
            txtAddress = itemView.findViewById(R.id.item_address_value);
        }
    }
}
