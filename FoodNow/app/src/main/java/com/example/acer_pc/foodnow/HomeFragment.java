package com.example.acer_pc.foodnow;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.support.v4.view.ViewPager;
import android.support.v7.widget.DividerItemDecoration;
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
import com.example.acer_pc.foodnow.Adapter.SystemGroupStoreAdapter;
import com.example.acer_pc.foodnow.Adapter.SystemVoucherAdapter;
import com.example.acer_pc.foodnow.Adapter.ViewPagerAdapter;
import com.example.acer_pc.foodnow.Common.DefineVarible;
import com.example.acer_pc.foodnow.Data.DAL;
import com.example.acer_pc.foodnow.Data.DAL_GetInforFragment_Home;
import com.example.acer_pc.foodnow.Data.DAL_MyLocation;
import com.example.acer_pc.foodnow.Object.Slider;
import com.example.acer_pc.foodnow.Object.Store;
import com.example.acer_pc.foodnow.Object.Suggestion;
import com.example.acer_pc.foodnow.Object.SystemGroupStore;
import com.example.acer_pc.foodnow.Object.SystemVoucher;

import org.json.JSONArray;
import org.json.JSONException;

import java.util.ArrayList;
import java.util.Objects;
import java.util.Timer;
import java.util.TimerTask;

public class HomeFragment extends Fragment {
    //địa chỉ hiện tại
    TextView txtMyAddress;
    //chuyển sang activity search
    public TextView goToSearchAct;
    //slider
    public ViewPager viewPager;
    ViewPagerAdapter viewPagerAdapter;
    ArrayList<Integer> arrImg;
    Slider slider;
    Timer timer;
    TimerTask timerTask;
    //support
    DAL_GetInforFragment_Home dal_getInforFragment_home;
    //khuyến mãi hệ thống
    public static JSONArray jsonArray_khuyen_mai_ht;
    public static ArrayList<SystemVoucher> arrayListSystemVoucher = new ArrayList<>();
    public RecyclerView recyclerViewSystemVoucher;
    public static SystemVoucherAdapter systemVoucherAdapter;
    //nhóm cửa hàng hệ thống
    public static JSONArray jsonArray_cua_hang_goi_y;
    public static ArrayList<SystemGroupStore> arrayListSystemGroupStore = new ArrayList<>();
    public RecyclerView recyclerViewSystemGroupStore;
    public static SystemGroupStoreAdapter systemGroupStoreAdapter;
    //danh mục cửa hàng
    public static JSONArray jsonArray_danh_muc;
    public static ArrayList<Suggestion> arrSuggestion = new ArrayList<>();
    public static SuggestionAdapter suggestionAdapter;
    public RecyclerView recyclerViewSuggestion;
    //danh sách các cửa hàng gần đây
    public static ArrayList<Store> arrStoreNear = new ArrayList<>();
    StoreNearAdapter storeNearAdapter;
    public RecyclerView recyclerViewStoreNear;

    private void init(View view){
        //text hiển thị đỉa chỉ hiện tại
        txtMyAddress = view.findViewById(R.id.fm_home_myAddress);
        //view chuyển sang activity search
        goToSearchAct = view.findViewById(R.id.fm_home_goToSearchAct);
        //slider
        arrImg = new ArrayList<Integer>();
        arrImg.add(R.drawable.slider_home_1);
        arrImg.add(R.drawable.slider_home_2);
        arrImg.add(R.drawable.sliderfood1);
        slider = new Slider(arrImg);
        viewPagerAdapter = new ViewPagerAdapter(getContext(), slider);
        viewPager = (ViewPager) view.findViewById(R.id.viewPager);
        timer = new Timer();
//        dal_getInforFragment_home = new DAL_GetInforFragment_Home(getContext());
        //khuyến mãi hệ thống
        recyclerViewSystemVoucher = view.findViewById(R.id.scrollViewVoucher);
        systemVoucherAdapter = new SystemVoucherAdapter(arrayListSystemVoucher, getContext());
        //gợi ý cửa hàng
        recyclerViewSystemGroupStore = view.findViewById(R.id.scrollViewSystemVoucher);
        systemGroupStoreAdapter = new SystemGroupStoreAdapter(arrayListSystemGroupStore, getContext());
        //danh mục cửa hàng hệ thống
        recyclerViewSuggestion = view.findViewById(R.id.susggestList);
        suggestionAdapter = new SuggestionAdapter(arrSuggestion, getContext(), getActivity());
        //danh sách cửa hàng gần đây
        recyclerViewStoreNear = view.findViewById(R.id.storeNeartList);
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
        storeNearAdapter = new StoreNearAdapter(arrStoreNear, getContext());
    }

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_home, container, false);
        init(view);

//        Intent  intent = new Intent(getActivity(), CheckGPSActivity.class);
//        startActivity(intent);

        //view chuyển activity
        goToSearchAct.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(getActivity() != null) {
                    Intent intent = new Intent(getActivity(), SearchActivity.class);
                    startActivity(intent);
                }
            }
        });
        //slider
        viewPagerAdapter.scale = false;
        viewPager.setAdapter(viewPagerAdapter);
        timerTask = new TimerTask() {
            @Override
            public void run() {
                Objects.requireNonNull(getActivity()).runOnUiThread(new Runnable() {
                    @Override
                    public void run() {
                        changeSlider();
                    }
                });
            }
        };
        timer.scheduleAtFixedRate(timerTask,0,5000);
        //khuyến mãi hệ thống
        recyclerViewSystemVoucher.setHasFixedSize(true);
        recyclerViewSystemVoucher.setLayoutManager( new LinearLayoutManager(getActivity().getApplicationContext(), android.support.v7.widget.LinearLayoutManager.HORIZONTAL, false));
        recyclerViewSystemVoucher.setAdapter(systemVoucherAdapter);
        recyclerViewSystemVoucher.setNestedScrollingEnabled(false);
        recyclerViewStoreNear.addItemDecoration(new DividerItemDecoration(getContext(), DividerItemDecoration.VERTICAL));
        //nhóm cửa hàng hệ thống
        recyclerViewSystemGroupStore.setHasFixedSize(true);
        recyclerViewSystemGroupStore.setLayoutManager( new LinearLayoutManager(getActivity().getApplicationContext(), android.support.v7.widget.LinearLayoutManager.HORIZONTAL, false));
        recyclerViewSystemGroupStore.setAdapter(systemGroupStoreAdapter);
        recyclerViewSystemGroupStore.setNestedScrollingEnabled(false);
        recyclerViewStoreNear.addItemDecoration(new DividerItemDecoration(getContext(), DividerItemDecoration.VERTICAL));
        //danh mục cửa hàng hệ thống
        recyclerViewSuggestion.setHasFixedSize(true);
        recyclerViewSuggestion.setLayoutManager(new GridLayoutManager(getContext(), 1));
        recyclerViewSuggestion.setAdapter(suggestionAdapter);
        recyclerViewSuggestion.setNestedScrollingEnabled(false);
        //danh sách cửa hàng gần đây
        recyclerViewStoreNear.setHasFixedSize(true);
        recyclerViewStoreNear.setLayoutManager(new LinearLayoutManager(getContext(), LinearLayoutManager.VERTICAL, false));
        recyclerViewStoreNear.setAdapter(storeNearAdapter);
        recyclerViewStoreNear.setNestedScrollingEnabled(false);
        recyclerViewStoreNear.addItemDecoration(new DividerItemDecoration(getContext(), DividerItemDecoration.VERTICAL));


        Intent intentGetInforFrament = new Intent(getContext(), LoadingActivity.class);
        intentGetInforFrament.setAction(Intent.ACTION_SEND);
        intentGetInforFrament.putExtra("action", DefineVarible.getInforFragment);
        startActivityForResult(intentGetInforFrament, DefineVarible.getInforFragment);
        return view;
    }

    public void changeSlider(){
        if(viewPager != null) {
            if (viewPager.getCurrentItem() == 0) {
                viewPager.setCurrentItem(1);
            } else if (viewPager.getCurrentItem() == 1) {
                viewPager.setCurrentItem(2);
            } else {
                viewPager.setCurrentItem(0);
            }
        }
    }

    @Override
    public void onPause() {
        super.onPause();
        if(timerTask != null)
            timerTask.cancel();
    }

    @Override
    public void onResume() {
        super.onResume();
        if(timerTask != null)
            timerTask.run();
        if(DAL_MyLocation.latitude != 0 && DAL_MyLocation.longtitude != 0 && !DAL_MyLocation.address.equals("")) {
            txtMyAddress.setText(DAL_MyLocation.address);
        } else {
            txtMyAddress.setText("Tìm vị trí hiện tại....");
        }
//        if(dal_getInforFragment_home != null)
//            dal_getInforFragment_home.getInforFragmentHome();
    }

    @Override
    public void onDestroy() {
        Toast.makeText(getContext(),"Home fragment exit !", Toast.LENGTH_SHORT).show();
        super.onDestroy();
    }

    @Override
    public void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if(requestCode == DefineVarible.getInforFragment){
            //convert data
            if(jsonArray_khuyen_mai_ht != null) {
                arrayListSystemVoucher.clear();
                for (int i = 0; i < jsonArray_khuyen_mai_ht.length(); i++) {
                    SystemVoucher systemVoucher = null;
                    try {
                        systemVoucher = new SystemVoucher(jsonArray_khuyen_mai_ht.getJSONObject(i));
                    } catch (JSONException e) {
                        e.printStackTrace();
                    }
                    arrayListSystemVoucher.add(systemVoucher);
                }
            }
            if(jsonArray_cua_hang_goi_y != null) {
                arrayListSystemGroupStore.clear();
                for (int i = 0; i < jsonArray_cua_hang_goi_y.length(); i++) {
                    SystemGroupStore systemGroupStore = null;
                    try {
                        systemGroupStore = new SystemGroupStore(jsonArray_cua_hang_goi_y.getJSONObject(i));
                    } catch (JSONException e) {
                        e.printStackTrace();
                    }
                    arrayListSystemGroupStore.add(systemGroupStore);
                }
            }
            if(jsonArray_danh_muc != null) {
                arrSuggestion.clear();
                for (int i = 0; i < jsonArray_danh_muc.length(); i++) {
                    Suggestion suggestion = null;
                    try {
                        suggestion = new Suggestion(jsonArray_danh_muc.getJSONObject(i));
                    } catch (JSONException e) {
                        e.printStackTrace();
                    }
                    arrSuggestion.add(suggestion);
                }
            }
            //update adapter
            if(arrSuggestion != null && arrSuggestion.size() > 0){
                if(suggestionAdapter != null)
                    suggestionAdapter.notifyDataSetChanged();
            }
            if(arrayListSystemVoucher != null && arrayListSystemVoucher.size() > 0){
                if(systemVoucherAdapter != null)
                    systemVoucherAdapter.notifyDataSetChanged();
            }
            if(arrayListSystemGroupStore != null && arrayListSystemGroupStore.size() > 0){
                if(systemGroupStoreAdapter != null)
                    systemGroupStoreAdapter.notifyDataSetChanged();
            }
        }
    }
}
