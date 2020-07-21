package com.example.acer_pc.foodnow;

import android.content.Intent;
import android.graphics.Color;
import android.support.annotation.Nullable;
import android.support.design.widget.TabLayout;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v4.app.FragmentStatePagerAdapter;
import android.support.v4.app.FragmentTransaction;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.support.v7.widget.Toolbar;

import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentPagerAdapter;
import android.support.v4.view.ViewPager;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;

import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.SearchView;
import android.widget.TextView;
import android.widget.Toast;

import com.example.acer_pc.foodnow.Adapter.CartOfFragmentAdapter;
import com.example.acer_pc.foodnow.Adapter.SearchActPlaceholderFragment;
import com.example.acer_pc.foodnow.Adapter.StoreSearchResultAdapter;
import com.example.acer_pc.foodnow.Adapter.SuggestionSearchAdapter;
import com.example.acer_pc.foodnow.Data.DAL_SearchStore;
import com.example.acer_pc.foodnow.Object.Cart;
import com.example.acer_pc.foodnow.Object.Store;
import com.google.android.flexbox.AlignItems;
import com.google.android.flexbox.FlexDirection;
import com.google.android.flexbox.FlexWrap;
import com.google.android.flexbox.FlexboxLayoutManager;
import com.google.android.flexbox.JustifyContent;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.Arrays;

public class SearchActivity extends AppCompatActivity implements DAL_SearchStore.SearchStoreListener, SuggestionSearchAdapter.SuggestionSearchItemListener{
    int i = 0;
    private ImageView navigate_before_search_acti;
    private SearchView searchView;
    private DAL_SearchStore dal_searchStore;
    private LinearLayout resultSearch, searchSuggest;
    private SuggestionSearchAdapter suggestionSearchAdapter;
    private TabLayout tabLayout;
    private SearchActSectionsPagerAdapter mSectionsPagerAdapter;
    private ArrayList<Fragment> fragmentResultArrayList;
    private ViewPager mViewPager;
    private RecyclerView recyclerViewSuggestionSearch;
    private ArrayList<String> arrayListSuggestionSearch;

    void init(){
        navigate_before_search_acti = findViewById(R.id.navigate_before_search_acti);
        recyclerViewSuggestionSearch = findViewById(R.id.suggestion_list);
        tabLayout = (TabLayout) findViewById(R.id.tabs);
        mViewPager = (ViewPager) findViewById(R.id.container);
        searchView = findViewById(R.id.searchText);
        resultSearch = findViewById(R.id.resultSearchView);
        searchSuggest = findViewById(R.id.searchSuggestView);
    }

    void setUpDataSuggestionSearch(){
        arrayListSuggestionSearch = new ArrayList<>();
        arrayListSuggestionSearch.add("Cơm");
        arrayListSuggestionSearch.add("Cơm Văn Phòng Libbi");
        arrayListSuggestionSearch.add("Bún đậu");
        arrayListSuggestionSearch.add("Hủ tiếu");
        arrayListSuggestionSearch.add("Bún bò");
        arrayListSuggestionSearch.add("Cơm tấm");
        arrayListSuggestionSearch.add("Pizza");
        arrayListSuggestionSearch.add("Cháo");
        arrayListSuggestionSearch.add("Mì cay");
        arrayListSuggestionSearch.add("Sinh tố");
        arrayListSuggestionSearch.add("Chè");
        arrayListSuggestionSearch.add("Trà sữa");
        arrayListSuggestionSearch.add("Xôi");
        suggestionSearchAdapter = new SuggestionSearchAdapter(arrayListSuggestionSearch, this);
        FlexboxLayoutManager layoutManager = new FlexboxLayoutManager(SearchActivity.this);
        layoutManager.setFlexWrap(FlexWrap.WRAP);
        layoutManager.setFlexDirection(FlexDirection.ROW);
        layoutManager.setJustifyContent(JustifyContent.FLEX_START);
        layoutManager.setAlignItems(AlignItems.FLEX_START);
        recyclerViewSuggestionSearch.setAdapter(suggestionSearchAdapter);
        recyclerViewSuggestionSearch.setLayoutManager(layoutManager);
    }



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_search);
        init();
        setUpDataSuggestionSearch();
        dal_searchStore = new DAL_SearchStore(SearchActivity.this);
        fragmentResultArrayList = new ArrayList<>();
        navigate_before_search_acti.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                finish();
            }
        });


        mViewPager.addOnPageChangeListener(new TabLayout.TabLayoutOnPageChangeListener(tabLayout));
        tabLayout.addOnTabSelectedListener(new TabLayout.ViewPagerOnTabSelectedListener(mViewPager));

        searchView.setOnCloseListener(new SearchView.OnCloseListener() {
            @Override
            public boolean onClose() {
                resultSearch.setVisibility(View.GONE);
                searchSuggest.setVisibility(View.VISIBLE);
                return true;
            }
        });
        searchView.setOnQueryTextListener(new SearchView.OnQueryTextListener() {
            @Override
            public boolean onQueryTextSubmit(String s) {
                resultSearch.setVisibility(View.VISIBLE);
                searchSuggest.setVisibility(View.GONE);
                searchView.clearFocus();
                Toast.makeText(SearchActivity.this, s, Toast.LENGTH_SHORT).show();
                dal_searchStore.searchStore(s.trim());
                return true;
            }

            @Override
            public boolean onQueryTextChange(String s) {
                if(s.trim().length() == 0)
                {
                    resultSearch.setVisibility(View.GONE);
                    searchSuggest.setVisibility(View.VISIBLE);
                }
                return true;
            }
        });

    }

    @Override
    public void onRequestSearchStoreDone(JSONObject result) {
        if(mSectionsPagerAdapter != null) {
            mSectionsPagerAdapter.clearData();
//            mSectionsPagerAdapter.notifyDataSetChanged();
        }
        try {
            SearchActPlaceholderFragment frament_nearestResult = new SearchActPlaceholderFragment();
            if(result != null)
                frament_nearestResult.setData(result.getJSONArray("nearestResult"), "nearestResult");
            else
                frament_nearestResult.setData(null, "nearestResult");
            fragmentResultArrayList.add(frament_nearestResult);
        } catch (JSONException e) {
            e.printStackTrace();
        }
        try {
            SearchActPlaceholderFragment frament_distanceRestul = new SearchActPlaceholderFragment();
            if(result != null)
                frament_distanceRestul.setData(result.getJSONArray("distanceRestul"), "distanceRestul");
            else
                frament_distanceRestul.setData(null, "distanceRestul");
            fragmentResultArrayList.add(frament_distanceRestul);
        } catch (JSONException e) {
            e.printStackTrace();
        }
        try {
            SearchActPlaceholderFragment frament_orderResult = new SearchActPlaceholderFragment();
            if(result != null)
                frament_orderResult.setData(result.getJSONArray("orderResult"), "orderResult");
            else
                frament_orderResult.setData(null, "orderResult");
            fragmentResultArrayList.add(frament_orderResult);
        } catch (JSONException e) {
            e.printStackTrace();
        }
        mSectionsPagerAdapter = new SearchActSectionsPagerAdapter(SearchActivity.this.getSupportFragmentManager() , fragmentResultArrayList);
        mViewPager.setAdapter(mSectionsPagerAdapter);
        tabLayout.setupWithViewPager(mViewPager);
//        mViewPager.addOnPageChangeListener(new TabLayout.TabLayoutOnPageChangeListener(tabLayout));
//        tabLayout.addOnTabSelectedListener(new TabLayout.ViewPagerOnTabSelectedListener(mViewPager));
//        mSectionsPagerAdapter.notifyDataSetChanged();
    }

    @Override
    public void onSuggestionSearchItemClick(String valueSearch) {
        searchView.setQuery(valueSearch,true);
        searchView.setFocusable(true);
        searchView.setIconified(false);
        searchView.clearFocus();
        searchView.requestFocusFromTouch();
    }

    public class SearchActSectionsPagerAdapter extends FragmentStatePagerAdapter {
        ArrayList<Fragment> fragmentArrayList;
        private ArrayList<String> titleArrayList = new ArrayList<String>(Arrays.asList(new String[]{"GẦN ĐÚNG", "GẦN ĐÂY", "ĐẶT NHIỀU"}));

        public SearchActSectionsPagerAdapter(FragmentManager fm, ArrayList<Fragment> fragmentArrayList) {
            super(fm);
            this.fragmentArrayList = fragmentArrayList;
        }

        @Override
        public int getItemPosition(Object object) {
            return POSITION_NONE;
        }

        @Override
        public Fragment getItem(int position) {
            return fragmentArrayList.get(position);
        }

        public void clearData(){
            fragmentArrayList.clear();
        }

//        @Override
//        public void destroyItem(ViewGroup container, int position, Object object) {
//            FragmentManager manager = ((Fragment) object).getFragmentManager();
//            FragmentTransaction trans = manager.beginTransaction();
//            trans.remove((Fragment) object);
//            trans.commit();
//        }

        @Nullable
        @Override
        public CharSequence getPageTitle(int position) {
            return titleArrayList.get(position);
        }

        @Override
        public int getCount() {
            return fragmentArrayList.size();
        }
    }

}
