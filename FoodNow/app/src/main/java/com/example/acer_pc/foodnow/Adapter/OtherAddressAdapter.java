package com.example.acer_pc.foodnow.Adapter;

import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.example.acer_pc.foodnow.Object.Address;
import com.example.acer_pc.foodnow.R;

import java.util.ArrayList;

public class OtherAddressAdapter extends RecyclerView.Adapter<OtherAddressAdapter.OtherAddressViewHolder> {
    ArrayList<Address> addresses;

    public OtherAddressAdapter(ArrayList<Address> addresses) {
        this.addresses = addresses;
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
        Address address = addresses.get(position);
        holder.txtAddress.setText(address.getAddress());
    }

    @Override
    public int getItemCount() {
        if(addresses == null)
            return 0;
        return addresses.size();
    }

    public class OtherAddressViewHolder extends RecyclerView.ViewHolder{
        public TextView txtAddress;
        public OtherAddressViewHolder(View itemView){
            super(itemView);
            txtAddress = itemView.findViewById(R.id.item_address_value);
        }
    }
}
