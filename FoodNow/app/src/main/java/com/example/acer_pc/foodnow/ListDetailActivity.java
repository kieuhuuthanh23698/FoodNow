package com.example.acer_pc.foodnow;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.DividerItemDecoration;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.acer_pc.foodnow.Adapter.StoreNearAdapter;
import com.example.acer_pc.foodnow.Data.DAL_GetStores;
import com.example.acer_pc.foodnow.Data.DAL_MyLocation;
import com.example.acer_pc.foodnow.Data.Utils;
import com.example.acer_pc.foodnow.Object.Store;
import com.facebook.shimmer.ShimmerFrameLayout;
import com.google.android.gms.maps.model.LatLng;
import com.google.maps.android.SphericalUtil;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

import static com.example.acer_pc.foodnow.LoginActivity.user;

public class ListDetailActivity extends AppCompatActivity implements DAL_GetStores.GetStoresListener{

    TextView btnBack;
    ImageView imageViewEmptyStore;
    ShimmerFrameLayout shimmer;
    RecyclerView recyclerView;
    StoreNearAdapter storeNearAdapter;
    DAL_GetStores dal_getStores;
    ArrayList<Store> arrStoreNear;
    int type;
    String idDanhMuc;

    void init(){
        btnBack = findViewById(R.id.list_storedetail_act_btn_back);
        shimmer = findViewById(R.id.list_storedetail_act_shimmer_view_container);
        recyclerView = findViewById(R.id.list_storedetail_act_store_list);
        imageViewEmptyStore = findViewById(R.id.list_storedetail_act_img_empty_store);
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_list_detail);
        init();
        Intent intent = getIntent();
        this.type = intent.getIntExtra("type", -1);
        this.idDanhMuc = intent.getStringExtra("idDanhMuc");
        btnBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                finish();
            }
        });
    }

    @Override
    public void onResume() {
        super.onResume();
        shimmer.setVisibility(View.VISIBLE);
        shimmer.startShimmerAnimation();
        if(type != -1 && idDanhMuc != null) {
            dal_getStores = new DAL_GetStores(this, ListDetailActivity.this, type, idDanhMuc);
            dal_getStores.getStores();
            arrStoreNear = new ArrayList<>();
        } else {
            shimmer.stopShimmerAnimation();
            shimmer.setVisibility(View.GONE);
            imageViewEmptyStore.setVisibility(View.VISIBLE);
            recyclerView.setVisibility(View.GONE);
        }
    }

    @Override
    public void onRequestGetStoresDone(JSONArray stores) {
        shimmer.stopShimmerAnimation();
        shimmer.setVisibility(View.GONE);
        if(stores != null && stores.length() > 0) {
            imageViewEmptyStore.setVisibility(View.GONE);
            recyclerView.setVisibility(View.VISIBLE);
            for (int i = 0; i < stores.length(); i++) {
                try {
                    JSONObject jsonObjectStore = stores.getJSONObject(i);
                    int isInclude = jsonObjectStore.getInt("isInclude");
                    if(isInclude == 0)
                        continue;
                    Store store = new Store();
                    JSONObject jsonObjectThongTinCuaHang = jsonObjectStore.getJSONObject("CH");
                    store.setId(jsonObjectThongTinCuaHang.getString("_id"));
                    store.setName(jsonObjectThongTinCuaHang.getString("Ten_Cua_Hang"));
                    //store.setStar(Double.parseDouble(jsonObjectThongTinCuaHang.getString("Danh_Gia")));
                    store.setUrlImage(jsonObjectThongTinCuaHang.getString("Hinh_Anh_Cua_Hang"));
                    JSONObject jsonObjectDiaChiCuaHang = jsonObjectStore.getJSONObject("DiaChi");
                    store.setAddress(jsonObjectDiaChiCuaHang.getString("Dia_Chi"));
                    store.setLat(Double.parseDouble(jsonObjectDiaChiCuaHang.getString("Vi_do")));
                    store.setLng(Double.parseDouble(jsonObjectDiaChiCuaHang.getString("Kinh_do")));
                    long distance = 0;
                    LatLng latLngFrom = new LatLng(store.getLat(), store.getLng());
                    LatLng latLngTo = new LatLng(DAL_MyLocation.latitude, DAL_MyLocation.longtitude);
                    distance += SphericalUtil.computeDistanceBetween(latLngFrom, latLngTo);
                    distance = Math.round((distance*0.001)*10)/10;
                    store.setDistance(0.0);
                    arrStoreNear.add(store);
                } catch (JSONException e) {
                    e.printStackTrace();
                }
            }
            if (arrStoreNear.size() == 0)
                imageViewEmptyStore.setVisibility(View.VISIBLE);
            else
                recyclerView.setVisibility(View.VISIBLE);
            storeNearAdapter = new StoreNearAdapter(arrStoreNear, ListDetailActivity.this);
            recyclerView.setHasFixedSize(true);
            LinearLayoutManager friendsLayoutManager = new LinearLayoutManager(ListDetailActivity.this.getApplicationContext(), android.support.v7.widget.LinearLayoutManager.VERTICAL, false);
            recyclerView.setLayoutManager(friendsLayoutManager);
            recyclerView.setAdapter(storeNearAdapter);
            recyclerView.setNestedScrollingEnabled(false);
            recyclerView.addItemDecoration(new DividerItemDecoration(ListDetailActivity.this, DividerItemDecoration.VERTICAL));
        } else {
            imageViewEmptyStore.setVisibility(View.VISIBLE);
            recyclerView.setVisibility(View.GONE);
        }
    }
}
