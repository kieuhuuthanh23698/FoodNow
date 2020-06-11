package com.example.acer_pc.foodnow;

import android.content.Intent;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.support.v7.widget.DividerItemDecoration;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Toast;

import com.example.acer_pc.foodnow.Adapter.StoreNearAdapter;
import com.example.acer_pc.foodnow.Object.Store;

import java.util.ArrayList;

public class BillFragment extends Fragment {
    RecyclerView recyclerView;

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_bill, container, false);
        recyclerView = view.findViewById(R.id.facvorite_fragment_store_list);
        ArrayList<Store> arrStoreNear = new ArrayList<>();
        arrStoreNear.add(new Store());
        arrStoreNear.add(new Store());
        arrStoreNear.add(new Store());
        arrStoreNear.add(new Store());
        arrStoreNear.add(new Store());
        arrStoreNear.add(new Store());
        arrStoreNear.add(new Store());
        arrStoreNear.add(new Store());
        arrStoreNear.add(new Store());
        arrStoreNear.add(new Store());
        arrStoreNear.add(new Store());
        arrStoreNear.add(new Store());
        arrStoreNear.add(new Store());
        arrStoreNear.add(new Store());
        arrStoreNear.add(new Store());
        arrStoreNear.add(new Store());
        arrStoreNear.add(new Store());
        arrStoreNear.add(new Store());
        arrStoreNear.add(new Store());
        StoreNearAdapter storeNearAdapter = new StoreNearAdapter(arrStoreNear, getContext());
        recyclerView.setHasFixedSize(true);
        LinearLayoutManager friendsLayoutManager = new LinearLayoutManager(getActivity().getApplicationContext(), android.support.v7.widget.LinearLayoutManager.VERTICAL, false);
        recyclerView.setLayoutManager(friendsLayoutManager);
        recyclerView.setAdapter(storeNearAdapter);
        recyclerView.setNestedScrollingEnabled(false);
        recyclerView.addItemDecoration(new DividerItemDecoration(getContext(), DividerItemDecoration.VERTICAL));
        return view;
    }

    @Override
    public void onDestroy() {
        Toast.makeText(getContext(),"Home fragment exit !", Toast.LENGTH_SHORT).show();
        super.onDestroy();
    }
}
