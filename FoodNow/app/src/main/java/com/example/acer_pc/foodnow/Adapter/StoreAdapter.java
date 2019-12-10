package com.example.acer_pc.foodnow.Adapter;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.acer_pc.foodnow.Object.Store;
import com.example.acer_pc.foodnow.R;

import java.util.ArrayList;

public class StoreAdapter extends ArrayAdapter<Store> {
    public StoreAdapter(@NonNull Context context, @NonNull ArrayList<Store> objects) {
        super(context, 0, objects);
    }

    @NonNull
    @Override
    public View getView(int position, @Nullable View convertView, @NonNull ViewGroup parent) {if(convertView == null)
        convertView = LayoutInflater.from(getContext()).inflate(R.layout.activity_strore_detail, parent, false);
        Store store = getItem(position);
        ImageView imageStore = convertView.findViewById(R.id.imgStore);
        imageStore.setImageResource(R.drawable.phuclong);
        TextView txtStoreName = convertView.findViewById(R.id.txt_storename);
        txtStoreName.setText(store.getName());
        TextView txtStoreAddress = convertView.findViewById(R.id.txt_storeAddress);
        txtStoreAddress.setText(store.getAddress());
        return convertView;
    }
}
