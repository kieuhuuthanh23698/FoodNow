package com.example.acer_pc.foodnow.Adapter;

import android.os.Bundle;
import android.os.Handler;
import android.support.v4.app.Fragment;
import android.support.v7.widget.DividerItemDecoration;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.Toast;

import com.example.acer_pc.foodnow.Data.Utils;
import com.example.acer_pc.foodnow.Object.Food;
import com.example.acer_pc.foodnow.Object.FoodType;
import com.example.acer_pc.foodnow.Object.Store;
import com.example.acer_pc.foodnow.R;
import com.facebook.shimmer.ShimmerFrameLayout;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class SearchActPlaceholderFragment extends Fragment {
    private JSONArray jsonArrayStore;
    ArrayList<Store> storeArrayList;
    StoreSearchResultAdapter storeSearchResultAdapter;
    ImageView imageView;
    ShimmerFrameLayout shimmerFrameLayout;
    RecyclerView recyclerViewStoreResultSearch;
    String type;
    boolean load = false;

    public SearchActPlaceholderFragment() {}

    public void setData(JSONArray jsonArrayStore, String type){
        this.jsonArrayStore = jsonArrayStore;
        this.type = type;
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        View rootView = inflater.inflate(R.layout.fragment_search, container, false);
        imageView = rootView.findViewById(R.id.search_activity_listCarts_empty);
        recyclerViewStoreResultSearch = rootView.findViewById(R.id.storeSearchResult);
        shimmerFrameLayout = rootView.findViewById(R.id.search_activity_store_shimmer_view_container);
        load = true;
        return rootView;
    }

    @Override
    public void onResume() {
        super.onResume();
        if(!load)
            return;
        Log.i("response", type);
        recyclerViewStoreResultSearch.setVisibility(View.GONE);
        imageView.setVisibility(View.GONE);
        shimmerFrameLayout.setVisibility(View.VISIBLE);
        shimmerFrameLayout.startShimmerAnimation();
        storeArrayList = new ArrayList<>();
        if(this.jsonArrayStore != null && this.jsonArrayStore.length() > 0) {
            for (int i = 0; i < jsonArrayStore.length(); i++){
                try {
                    JSONObject jsonObjectStore = jsonArrayStore.getJSONObject(i);
                    JSONObject jsonObjectInforStore = jsonObjectStore.getJSONObject("inforCH");
                    Store store = new Store();
                    store.setId(jsonObjectInforStore.getString("_id"));
                    store.setName(jsonObjectInforStore.getString("Ten_Cua_Hang"));
                    store.setUrlImage(jsonObjectInforStore.getString("Hinh_Anh_Cua_Hang"));
                    JSONObject jsonObjectAdddress = jsonObjectInforStore.getJSONArray("diachiCH").getJSONObject(0);
                    store.setAddress(jsonObjectAdddress.getString("Dia_Chi"));
                    store.setLat(jsonObjectAdddress.getDouble("Vi_do"));
                    store.setLng(jsonObjectAdddress.getDouble("Kinh_do"));
                    store.setDistance(jsonObjectStore.getDouble("distance"));
                    JSONArray jsonArrayFoods = jsonObjectInforStore.getJSONArray("thongTinMonAns");
                    ArrayList<FoodType> foodTypeArrayList = new ArrayList<>();
                    FoodType foodType = new FoodType();
                    ArrayList<Food> arrayListFoods = new ArrayList<>();
                    for (int j = 0; j < jsonArrayFoods.length(); j++){
                        JSONObject jsonObjectFood = jsonArrayFoods.getJSONObject(j);
                        Food food = new Food();
                        food.setId(jsonObjectFood.getString("_id"));
                        food.setName(jsonObjectFood.getString("Ten_mon_an"));
                        food.setUrlImg(jsonObjectFood.getString("Hinh_anh_mon_an"));
//                        food.setCost(jsonObjectFood.getInt("So_luong_mua"));
//                        food.setLike(jsonObjectFood.getInt("So_luong_thich"));
                        arrayListFoods.add(food);
                    }
                    foodType.setArrayListFoods(arrayListFoods);
                    foodTypeArrayList.add(foodType);
                    store.setArrFoods(foodTypeArrayList);
                    storeArrayList.add(store);
                } catch (JSONException e) {
                    e.printStackTrace();
                }
            }
            storeSearchResultAdapter = new StoreSearchResultAdapter(storeArrayList, getContext());
            recyclerViewStoreResultSearch.setAdapter(storeSearchResultAdapter);
            recyclerViewStoreResultSearch.setNestedScrollingEnabled(true);
            recyclerViewStoreResultSearch.addItemDecoration(new DividerItemDecoration(getContext(), DividerItemDecoration.VERTICAL));
            LinearLayoutManager friendsLayoutManager = new LinearLayoutManager(getContext().getApplicationContext(), LinearLayoutManager.VERTICAL, false);
            recyclerViewStoreResultSearch.setLayoutManager(friendsLayoutManager);
        }
        final int len = storeArrayList.size();
        Handler handler = new Handler();
        Runnable r = new Runnable() {
            public void run() {
                shimmerFrameLayout.stopShimmerAnimation();
                shimmerFrameLayout.setVisibility(View.GONE);
                if(len > 0) {
                    recyclerViewStoreResultSearch.setVisibility(View.VISIBLE);
                    imageView.setVisibility(View.GONE);

                } else {
                    recyclerViewStoreResultSearch.setVisibility(View.GONE);
                    imageView.setVisibility(View.VISIBLE);
                }
            }
        };
        handler.postDelayed(r, 500);
    }
}
