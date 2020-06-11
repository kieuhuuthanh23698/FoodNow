package com.example.acer_pc.foodnow;

import android.content.Intent;
import android.content.res.Resources;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.constraint.ConstraintLayout;
import android.support.design.widget.TabLayout;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentPagerAdapter;
import android.support.v4.view.ViewPager;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.acer_pc.foodnow.Adapter.CartOfFragmentAdapter;
import com.example.acer_pc.foodnow.Adapter.StoreSearchResultAdapter;
import com.example.acer_pc.foodnow.Object.Cart;
import com.example.acer_pc.foodnow.Object.Store;

import java.util.ArrayList;

public class CartFragment extends Fragment {
    private CartFragmentSectionsPagerAdapter mSectionsPagerAdapter;
    private ViewPager mViewPager;
    TabLayout tabLayout;

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_cart, container, false);

        mSectionsPagerAdapter = new CartFragmentSectionsPagerAdapter(getActivity().getSupportFragmentManager());
        mViewPager = (ViewPager) view.findViewById(R.id.fragment_cart_container);
        mViewPager.setAdapter(mSectionsPagerAdapter);

        tabLayout = (TabLayout) view.findViewById(R.id.fragment_cart_tabs);

        mViewPager.addOnPageChangeListener(new TabLayout.TabLayoutOnPageChangeListener(tabLayout));
        tabLayout.addOnTabSelectedListener(new TabLayout.ViewPagerOnTabSelectedListener(mViewPager));

        return view;
    }

    public static class CartFragmentPlaceholderFragment extends Fragment {
        private static final String PAGE = "section_number";

        public CartFragmentPlaceholderFragment() {}

        public static CartFragment.CartFragmentPlaceholderFragment newInstance(int sectionNumber) {
            CartFragment.CartFragmentPlaceholderFragment fragment = new CartFragment.CartFragmentPlaceholderFragment();
            Bundle args = new Bundle();
            args.putInt(PAGE, sectionNumber);
            fragment.setArguments(args);
            return fragment;
        }

        @Override
        public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
            View rootView = inflater.inflate(R.layout.fragment_cart_detail, container, false);
            RecyclerView recyclerViewCart = rootView.findViewById(R.id.frament_cart_detail_listCarts);
            ImageView imageView = rootView.findViewById(R.id.frament_cart_detail_listCarts_empty);
            int page = getArguments().getInt(PAGE);
            switch (page){
                case 1:
                    imageView.setVisibility(View.VISIBLE);
                    imageView.setImageResource(R.drawable.ic_cart_fragment_tab1);
                    recyclerViewCart.setVisibility(View.GONE);
                    break;
                case 2:
                    imageView.setVisibility(View.VISIBLE);
                    imageView.setImageResource(R.drawable.ic_cart_fragment_tab2);
                    recyclerViewCart.setVisibility(View.GONE);
                    break;
                case 3:
                    imageView.setVisibility(View.GONE);
                    recyclerViewCart.setVisibility(View.VISIBLE);
                    ArrayList<Cart> carts = new ArrayList<>();
                    carts.add(new Cart());
                    carts.add(new Cart());
                    carts.add(new Cart());
                    carts.add(new Cart());
                    carts.add(new Cart());
                    carts.add(new Cart());
                    carts.add(new Cart());
                    carts.add(new Cart());
                    CartOfFragmentAdapter storeSearchResultAdapter = new CartOfFragmentAdapter(carts, getContext());
                    recyclerViewCart.setAdapter(storeSearchResultAdapter);
                    recyclerViewCart.setNestedScrollingEnabled(true);
                    LinearLayoutManager friendsLayoutManager = new LinearLayoutManager(getContext().getApplicationContext(), LinearLayoutManager.VERTICAL, false);
                    recyclerViewCart.setLayoutManager(friendsLayoutManager);
                    break;
            }
            return rootView;
        }
    }

    public class CartFragmentSectionsPagerAdapter extends FragmentPagerAdapter {

        public CartFragmentSectionsPagerAdapter(FragmentManager fm) {
            super(fm);
        }

        @Override
        public Fragment getItem(int position) {
            return CartFragment.CartFragmentPlaceholderFragment.newInstance(position + 1);
        }

        @Override
        public int getCount() {
            return 3;
        }
    }
}
