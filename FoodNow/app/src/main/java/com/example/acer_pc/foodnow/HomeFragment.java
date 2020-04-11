package com.example.acer_pc.foodnow;

import android.app.ProgressDialog;
import android.content.Context;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ListView;
import android.widget.ProgressBar;

import com.example.acer_pc.foodnow.Adapter.StoreAdapter;
import com.example.acer_pc.foodnow.Data.DAL;
import com.example.acer_pc.foodnow.Object.Store;

import java.util.ArrayList;

public class HomeFragment extends Fragment {
    public static ListView ltsCuaHang;
    public static StoreAdapter adapter;
    public static ArrayList<Store> arrayList;
    DAL dal;

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_home, container, false);
        ltsCuaHang = view.findViewById(R.id.list_store);
        arrayList = new ArrayList<>();
        adapter = new StoreAdapter(getContext(),arrayList);
        ltsCuaHang.setAdapter(adapter);
        dal = new DAL(getContext());
        dal.loadCuaHang();
        return view;
    }

    public static void createList(Context context, ArrayList<Store> arrayList){
    }
}
