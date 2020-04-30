package com.example.acer_pc.foodnow;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.support.v4.view.ViewPager;
import android.support.v7.widget.GridLayoutManager;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import com.example.acer_pc.foodnow.Adapter.StoreAdapter;
import com.example.acer_pc.foodnow.Adapter.StoreNearAdapter;
import com.example.acer_pc.foodnow.Adapter.SuggestionAdapter;
import com.example.acer_pc.foodnow.Adapter.ViewPagerAdapter;
import com.example.acer_pc.foodnow.Data.DAL;
import com.example.acer_pc.foodnow.Object.Slider;
import com.example.acer_pc.foodnow.Object.Store;
import com.example.acer_pc.foodnow.Object.Suggestion;

import java.util.ArrayList;

public class HomeFragment extends Fragment {
    //public ListView ltsCuaHang;
    private int vector = 0;
    public static StoreAdapter adapter;
    public static ArrayList<Store> arrayList;
    public ViewPager viewPager;
    public RecyclerView recyclerViewSuggestion;
    public RecyclerView recyclerViewStoreNear;
    public TextView editText;
    DAL dal;

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_home, container, false);

        viewPager = (ViewPager) view.findViewById(R.id.viewPager);
        ArrayList<Integer> arrImg = new ArrayList<Integer>();
        arrImg.add(R.drawable.sliderfood1);
        arrImg.add(R.drawable.slider_home_1);
        arrImg.add(R.drawable.slider_home_2);
        Slider slider = new Slider(arrImg);
        ViewPagerAdapter viewPagerAdapter = new ViewPagerAdapter(getContext(), slider);
        viewPagerAdapter.scale = false;
        viewPager.setAdapter(viewPagerAdapter);

        editText = view.findViewById(R.id.editText);
        editText.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(getActivity() != null) {
                    Intent intent = new Intent(getActivity(), SearchActivity.class);
                    startActivity(intent);
                    vector = 1;
                    getActivity().finish();
                }
            }
        });

        recyclerViewSuggestion = view.findViewById(R.id.susggestList);
        ArrayList<Suggestion> arrSuggestion = new ArrayList<>();
        arrSuggestion.add(new Suggestion());
        arrSuggestion.add(new Suggestion());
        arrSuggestion.add(new Suggestion());
        arrSuggestion.add(new Suggestion());
        arrSuggestion.add(new Suggestion());
        SuggestionAdapter suggestionAdapter = new SuggestionAdapter(arrSuggestion, getContext(), getActivity());
        LinearLayoutManager friendsLayoutManager = new LinearLayoutManager(getActivity().getApplicationContext(), android.support.v7.widget.LinearLayoutManager.VERTICAL, false);
        recyclerViewSuggestion.setHasFixedSize(true);
        //recyclerViewSuggestion.setLayoutManager(friendsLayoutManager);
        recyclerViewSuggestion.setLayoutManager(new GridLayoutManager(getContext(), 1));
        recyclerViewSuggestion.setAdapter(suggestionAdapter);
        recyclerViewSuggestion.setNestedScrollingEnabled(false);

        recyclerViewStoreNear = view.findViewById(R.id.storeNeartList);
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
        StoreNearAdapter storeNearAdapter = new StoreNearAdapter(arrStoreNear, getContext());
        recyclerViewStoreNear.setHasFixedSize(true);
        recyclerViewStoreNear.setLayoutManager(friendsLayoutManager);
        recyclerViewStoreNear.setAdapter(storeNearAdapter);
        recyclerViewStoreNear.setNestedScrollingEnabled(false);

//        ltsCuaHang = view.findViewById(R.id.list_store);
//        arrayList = new ArrayList<>();
//        adapter = new StoreAdapter(getContext(),arrayList);
//        ltsCuaHang.setAdapter(adapter);
        ///dal = new DAL(getContext());
        //dal.loadCuaHang();
        return view;
    }

//    public static void createList(Context context, ArrayList<Store> arr){
//        arrayList.addAll(arr);
//        adapter.notifyDataSetChanged();
//    }

//    public static void changeSlider(){
//        if(viewPager.getCurrentItem() == 0){
//            viewPager.setCurrentItem(1);
//        } else if(viewPager.getCurrentItem() == 1){
//            viewPager.setCurrentItem(2);
//        } else {
//            viewPager.setCurrentItem(0);
//        }
//    }


//    public static void goToActivity(Intent intent){
//        startActivity(intent);
//    }

    @Override
    public void onDestroy() {
        Toast.makeText(getContext(),"Home fragment exit !", Toast.LENGTH_SHORT).show();
        super.onDestroy();
        if(vector == 0) {
            Intent intent = new Intent(getContext(), WelcomeActivity.class);
            startActivity(intent);
        }
    }
}
