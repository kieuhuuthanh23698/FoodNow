package com.example.acer_pc.foodnow;

import android.content.Intent;
import android.graphics.Color;
import android.support.design.widget.TabLayout;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
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

import com.example.acer_pc.foodnow.Adapter.StoreSearchResultAdapter;
import com.example.acer_pc.foodnow.Adapter.SuggestionSearchAdapter;
import com.example.acer_pc.foodnow.Object.Store;
import com.google.android.flexbox.AlignItems;
import com.google.android.flexbox.FlexDirection;
import com.google.android.flexbox.FlexWrap;
import com.google.android.flexbox.FlexboxLayoutManager;
import com.google.android.flexbox.JustifyContent;

import java.util.ArrayList;

public class SearchActivity extends AppCompatActivity {
    int i = 0;
    ImageView navigate_before_search_acti;
    static SearchView searchView;
    LinearLayout resultSearch, searchSuggest;
    private SectionsPagerAdapter mSectionsPagerAdapter;
    private ViewPager mViewPager;
    private RecyclerView recyclerViewSuggestionSearch;
    ArrayList<String> arrayListSuggestionSearch;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_search);
        navigate_before_search_acti = findViewById(R.id.navigate_before_search_acti);
        navigate_before_search_acti.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                finish();
            }
        });

        arrayListSuggestionSearch = new ArrayList<>();
        arrayListSuggestionSearch.add("Cơm gà");
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
        recyclerViewSuggestionSearch = findViewById(R.id.suggestion_list);
        SuggestionSearchAdapter suggestionSearchAdapter = new SuggestionSearchAdapter(arrayListSuggestionSearch, this);
        FlexboxLayoutManager layoutManager = new FlexboxLayoutManager(this);
        layoutManager.setFlexWrap(FlexWrap.WRAP);
        layoutManager.setFlexDirection(FlexDirection.ROW);
        layoutManager.setJustifyContent(JustifyContent.FLEX_START);
        layoutManager.setAlignItems(AlignItems.FLEX_START);
        recyclerViewSuggestionSearch.setAdapter(suggestionSearchAdapter);
        recyclerViewSuggestionSearch.setLayoutManager(layoutManager);



        mSectionsPagerAdapter = new SectionsPagerAdapter(getSupportFragmentManager());
        mViewPager = (ViewPager) findViewById(R.id.container);
        mViewPager.setAdapter(mSectionsPagerAdapter);

        TabLayout tabLayout = (TabLayout) findViewById(R.id.tabs);

        mViewPager.addOnPageChangeListener(new TabLayout.TabLayoutOnPageChangeListener(tabLayout));
        tabLayout.addOnTabSelectedListener(new TabLayout.ViewPagerOnTabSelectedListener(mViewPager));

        searchView = findViewById(R.id.searchText);
        resultSearch = findViewById(R.id.resultSearchView);
        searchSuggest = findViewById(R.id.searchSuggestView);
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
                Toast.makeText(SearchActivity.this, s, Toast.LENGTH_SHORT).show();
                return true;
            }

            @Override
            public boolean onQueryTextChange(String s) {
//                //searching
//                if(s.trim().length() > 0)
//                {
//
//                }
//                //end searching
                if(s.trim().length() == 0)
                {
                    resultSearch.setVisibility(View.GONE);
                    searchSuggest.setVisibility(View.VISIBLE);
                }
                return true;
            }
        });

    }

    public static void searchWithSuggestion(String valueSearch){
        searchView.setQuery(valueSearch,true);
        searchView.setFocusable(true);
        searchView.setIconified(false);
        searchView.requestFocusFromTouch();
    }

    /**
     * A placeholder fragment containing a simple view.
     */
    public static class PlaceholderFragment extends Fragment {
        private static final String ARG_SECTION_NUMBER = "section_number";

        public PlaceholderFragment() {}

        public static PlaceholderFragment newInstance(int sectionNumber) {
            PlaceholderFragment fragment = new PlaceholderFragment();
            Bundle args = new Bundle();
            args.putInt(ARG_SECTION_NUMBER, sectionNumber);
            fragment.setArguments(args);
            return fragment;
        }

        @Override
        public View onCreateView(LayoutInflater inflater, ViewGroup container,
                                 Bundle savedInstanceState) {
            View rootView = inflater.inflate(R.layout.fragment_search, container, false);
            RecyclerView recyclerViewStoreResultSearch = rootView.findViewById(R.id.storeSearchResult);
            ArrayList<Store> storeArrayList = new ArrayList<>();
            storeArrayList.add(new Store());
            storeArrayList.add(new Store());
            storeArrayList.add(new Store());
            storeArrayList.add(new Store());
            storeArrayList.add(new Store());
            storeArrayList.add(new Store());
            storeArrayList.add(new Store());
            storeArrayList.add(new Store());
            storeArrayList.add(new Store());
            storeArrayList.add(new Store());
            StoreSearchResultAdapter storeSearchResultAdapter = new StoreSearchResultAdapter(storeArrayList, getContext());
            recyclerViewStoreResultSearch.setAdapter(storeSearchResultAdapter);
            recyclerViewStoreResultSearch.setNestedScrollingEnabled(true);LinearLayoutManager friendsLayoutManager = new LinearLayoutManager(getContext().getApplicationContext(), LinearLayoutManager.VERTICAL, false);
            recyclerViewStoreResultSearch.setLayoutManager(friendsLayoutManager);
            return rootView;
        }
    }

    public class SectionsPagerAdapter extends FragmentPagerAdapter {

        public SectionsPagerAdapter(FragmentManager fm) {
            super(fm);
        }

        @Override
        public Fragment getItem(int position) {
            return PlaceholderFragment.newInstance(position + 1);
        }

        @Override
        public int getCount() {
            return 3;
        }
    }

    @Override
    protected void onDestroy() {
        super.onDestroy();
        Intent intent = new Intent(SearchActivity.this, MainActivity.class);
        startActivity(intent);
    }
}
