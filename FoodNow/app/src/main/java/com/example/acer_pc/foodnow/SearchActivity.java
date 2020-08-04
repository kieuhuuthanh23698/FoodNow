package com.example.acer_pc.foodnow;

import android.content.ActivityNotFoundException;
import android.content.Intent;
import android.graphics.Color;
import android.speech.RecognizerIntent;
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
import java.util.Locale;

public class SearchActivity extends AppCompatActivity implements DAL_SearchStore.SearchStoreListener, SuggestionSearchAdapter.SuggestionSearchItemListener{
    int i = 0;
    private ImageView navigate_before_search_acti;
    private SearchView searchView;
    private TextView btnMic;
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
        btnMic = findViewById(R.id.search_activity_mic);
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

        btnMic.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(RecognizerIntent.ACTION_RECOGNIZE_SPEECH);
                intent.putExtra(RecognizerIntent.EXTRA_LANGUAGE_MODEL,
                        RecognizerIntent.LANGUAGE_MODEL_FREE_FORM);
                intent.putExtra(RecognizerIntent.EXTRA_LANGUAGE, Locale.getDefault());
                intent.putExtra(RecognizerIntent.EXTRA_PROMPT, getString(R.string.speech_prompt));
                try {
                    startActivityForResult(intent, 100);
                } catch (ActivityNotFoundException a) {
                    Toast.makeText(getApplicationContext(), getString(R.string.speech_not_supported), Toast.LENGTH_SHORT).show();
                }
            }
        });

    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if (resultCode == RESULT_OK && null != data) {
            ArrayList<String> result = data.getStringArrayListExtra(RecognizerIntent.EXTRA_RESULTS);
            onSuggestionSearchItemClick(result.get(0));
        }
    }

    @Override
    public void onRequestSearchStoreDone(JSONObject result) {
        if(mSectionsPagerAdapter != null) {
            mSectionsPagerAdapter.clearData();
            mSectionsPagerAdapter = null;
        }
        mSectionsPagerAdapter = new SearchActSectionsPagerAdapter(getSupportFragmentManager(), fragmentResultArrayList);
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
        mViewPager.setAdapter(mSectionsPagerAdapter);
//        tabLayout.setupWithViewPager(mViewPager);
        mViewPager.addOnPageChangeListener(new TabLayout.TabLayoutOnPageChangeListener(tabLayout));
        mViewPager.addOnPageChangeListener(new ViewPager.OnPageChangeListener() {
            @Override
            public void onPageScrolled(int position, float positionOffset, int positionOffsetPixels) {}

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

        public void refresh(int position){
            fragmentArrayList.get(position).onResume();
        }

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
