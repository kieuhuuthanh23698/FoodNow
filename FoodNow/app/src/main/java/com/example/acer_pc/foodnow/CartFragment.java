package com.example.acer_pc.foodnow;

import android.app.Activity;
import android.content.Intent;
import android.content.res.Resources;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.constraint.ConstraintLayout;
import android.support.design.widget.TabLayout;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentActivity;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentPagerAdapter;
import android.support.v4.app.FragmentStatePagerAdapter;
import android.support.v4.view.ViewPager;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.example.acer_pc.foodnow.Adapter.CartFragmentPlaceholderFragment;
import com.example.acer_pc.foodnow.Adapter.CartOfFragmentAdapter;
import com.example.acer_pc.foodnow.Adapter.StoreSearchResultAdapter;
import com.example.acer_pc.foodnow.Data.DAL_GetOrderListCustomer;
import com.example.acer_pc.foodnow.Data.DAL_GetStores;
import com.example.acer_pc.foodnow.Data.Utils;
import com.example.acer_pc.foodnow.Object.Cart;
import com.example.acer_pc.foodnow.Object.Store;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

import static com.example.acer_pc.foodnow.LoginActivity.user;

public class CartFragment extends Fragment {
    private CartFragmentSectionsPagerAdapter mSectionsPagerAdapter;
    private ViewPager mViewPager;
    TabLayout tabLayout;

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_cart, container, false);
        mViewPager = view.findViewById(R.id.fragment_cart_container);
        tabLayout = view.findViewById(R.id.fragment_cart_tabs);
        return view;
    }

    @Override
    public void onActivityCreated(@Nullable Bundle savedInstanceState) {
        super.onActivityCreated(savedInstanceState);
        if(mSectionsPagerAdapter == null) {
            mSectionsPagerAdapter = new CartFragmentSectionsPagerAdapter(getChildFragmentManager());
            mSectionsPagerAdapter.addFragment(0, "ĐANG ĐẾN");
            mSectionsPagerAdapter.addFragment(1, "LỊCH SỬ");
            mSectionsPagerAdapter.addFragment(2, "ĐƠN NHÁP");
        }
        mViewPager.setOffscreenPageLimit(mSectionsPagerAdapter.getCount());
        mViewPager.setAdapter(mSectionsPagerAdapter);
        mViewPager.addOnPageChangeListener(new TabLayout.TabLayoutOnPageChangeListener(tabLayout));
        mViewPager.addOnPageChangeListener(new ViewPager.OnPageChangeListener() {
            @Override
            public void onPageScrolled(int position, float positionOffset, int positionOffsetPixels) { }

            @Override
            public void onPageSelected(int position) {
                mSectionsPagerAdapter.refresh(position);
            }

            @Override
            public void onPageScrollStateChanged(int state) {}
        });
        tabLayout.addOnTabSelectedListener(new TabLayout.ViewPagerOnTabSelectedListener(mViewPager));
        tabLayout.addOnTabSelectedListener(new TabLayout.OnTabSelectedListener() {
            @Override
            public void onTabSelected(TabLayout.Tab tab) {}

            @Override
            public void onTabUnselected(TabLayout.Tab tab) {}

            @Override
            public void onTabReselected(TabLayout.Tab tab) {
                mSectionsPagerAdapter.refresh(tab.getPosition());
            }
        });
    }

    public class CartFragmentSectionsPagerAdapter extends FragmentStatePagerAdapter {
        private ArrayList<Fragment> fragmentArrayList = new ArrayList<>();
        private ArrayList<String> titleArrayList = new ArrayList<>();

        public CartFragmentSectionsPagerAdapter(FragmentManager fm) {
            super(fm);
        }

        public void refresh(int position){
            fragmentArrayList.get(position).onResume();
        }

        @Override
        public Fragment getItem(int position) {
            return fragmentArrayList.get(position);
        }

        @Override
        public int getCount() {
            return fragmentArrayList.size();
        }

        @Nullable
    @Override
    public CharSequence getPageTitle(int position) {
        return titleArrayList.get(position);
    }

    public Fragment addFragment(int position, String title){
        CartFragmentPlaceholderFragment fragment = new CartFragmentPlaceholderFragment();
        fragment.setPage(position);
        fragmentArrayList.add(fragment);
        titleArrayList.add(title);
        return fragment;
    }

}
}
