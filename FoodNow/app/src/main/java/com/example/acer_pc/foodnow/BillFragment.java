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
import android.widget.ImageView;
import android.widget.Toast;

import com.example.acer_pc.foodnow.Adapter.StoreNearAdapter;
import com.example.acer_pc.foodnow.Data.DAL_GetStores;
import com.example.acer_pc.foodnow.Object.Store;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

import static com.example.acer_pc.foodnow.LoginActivity.user;

public class BillFragment extends Fragment implements DAL_GetStores.GetStoresListener {
    RecyclerView recyclerView;
    ImageView imageViewEmptyStore;
    StoreNearAdapter storeNearAdapter;
    DAL_GetStores dal_getStores;
    ArrayList<Store> arrStoreNear;

    void init(View view){
        recyclerView = view.findViewById(R.id.facvorite_fragment_store_list);
        imageViewEmptyStore = view.findViewById(R.id.fragment_bill_img_empty_store);
    }

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_bill, container, false);
        init(view);
        return view;
    }

    @Override
    public void onDestroy() {
        Toast.makeText(getContext()," stores fragment exit !", Toast.LENGTH_SHORT).show();
        super.onDestroy();
    }

    @Override
    public void onResume() {
        super.onResume();
        if(user != null) {
            dal_getStores = new DAL_GetStores(this, getContext(), 0, "");
            dal_getStores.getStores();
            arrStoreNear = new ArrayList<>();
        }
    }

    @Override
    public void onRequestGetStoresDone(JSONArray stores) {
        for (int i = 0; i < stores.length(); i++) {
            try {
                JSONObject jsonObjectStore = stores.getJSONObject(i);
                Store store = new Store();
                JSONObject jsonObjectThongTinCuaHang = jsonObjectStore.getJSONArray("ThongTinCuaHang").getJSONObject(0);
                store.setId(jsonObjectThongTinCuaHang.getString("_id"));
                store.setName(jsonObjectThongTinCuaHang.getString("Ten_Cua_Hang"));
                store.setStar(Double.parseDouble(jsonObjectThongTinCuaHang.getString("Danh_Gia")));
                store.setUrlImage(jsonObjectThongTinCuaHang.getString("Hinh_Anh_Cua_Hang"));
                JSONObject jsonObjectDiaChiCuaHang = jsonObjectStore.getJSONArray("DiaChiCuaHang").getJSONObject(0);
                store.setAddress(jsonObjectDiaChiCuaHang.getString("Dia_Chi"));
                store.setLat(Double.parseDouble(jsonObjectDiaChiCuaHang.getString("Vi_do")));
                store.setLng(Double.parseDouble(jsonObjectDiaChiCuaHang.getString("Kinh_do")));
                arrStoreNear.add(store);
            } catch (JSONException e) {
                e.printStackTrace();
            }
        }
        if(arrStoreNear.size() > 0)
            imageViewEmptyStore.setVisibility(View.GONE);
        storeNearAdapter = new StoreNearAdapter(arrStoreNear, getContext());
        recyclerView.setHasFixedSize(true);
        LinearLayoutManager friendsLayoutManager = new LinearLayoutManager(getActivity().getApplicationContext(), android.support.v7.widget.LinearLayoutManager.VERTICAL, false);
        recyclerView.setLayoutManager(friendsLayoutManager);
        recyclerView.setAdapter(storeNearAdapter);
        recyclerView.setNestedScrollingEnabled(false);
        recyclerView.addItemDecoration(new DividerItemDecoration(getContext(), DividerItemDecoration.VERTICAL));
    }
}
