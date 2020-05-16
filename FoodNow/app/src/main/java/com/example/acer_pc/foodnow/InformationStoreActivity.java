package com.example.acer_pc.foodnow;

import android.app.Activity;
import android.content.Intent;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.TabLayout;
import android.support.v4.widget.NestedScrollView;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.CardView;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.RatingBar;
import android.widget.RelativeLayout;
import android.widget.TableLayout;
import android.widget.TextView;
import android.widget.Toast;

import com.example.acer_pc.foodnow.Adapter.InforStoreFoodTypeAdapter;
import com.example.acer_pc.foodnow.Data.Utils;
import com.example.acer_pc.foodnow.Object.Food;
import com.example.acer_pc.foodnow.Object.FoodType;
import com.example.acer_pc.foodnow.Object.Store;

import java.util.ArrayList;

public class InformationStoreActivity extends AppCompatActivity {
    ImageView btnBackAct, btnFavoriteStore,imgInforStore;
    public static TextView txtNameStore;
    TextView txtAddressStore;
    RatingBar ratingBarStore;
    InforStoreFoodTypeAdapter inforStoreFoodTypeAdapter;
    RecyclerView recyclerViewListFoods;
    NestedScrollView nestedScrollViewFoods;
    Store store;
    TabLayout tabsTypeFood;
    LinearLayoutManager friendsLayoutManager;
    boolean isUserScrolling;
    //RelativeLayout view1;
    LinearLayout view2;
    CardView view3;
    public static ArrayList<Food> shoppingCart;
    RelativeLayout groupShoppingCart;
    TextView infor_store_number_shopping_cart;
    Button infor_store_confirm_cart_btn;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_information_store);
        shoppingCart = new ArrayList<>();

        btnBackAct = findViewById(R.id.btnBackActInforStore);
        btnFavoriteStore = findViewById(R.id.imgFavoriteStore);
        imgInforStore = findViewById(R.id.img_infor_store);
        txtNameStore = findViewById(R.id.txt_storename_inforAct);
        txtAddressStore = findViewById(R.id.txt_storeAddress_inforAct);
        ratingBarStore = findViewById(R.id.ratingStore);
        recyclerViewListFoods = findViewById(R.id.store_list_foods_type);
        store = new Store();
        store.setImgStore(R.drawable.img_store3);
        view3 = findViewById(R.id.view3);

        btnBackAct.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                finish();
            }
        });

        if(store.isFavorite()) {
            btnFavoriteStore.setImageResource(R.drawable.ic_favorite_black_24dp);
        } else{
            btnFavoriteStore.setImageResource(R.drawable.ic_favorite_border_black_24dp);
        }

        btnFavoriteStore.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(!store.isFavorite())
                {
                    store.setFavorite(true);
                    btnFavoriteStore.setImageResource(R.drawable.ic_favorite_black_24dp);
                }
                else{
                    store.setFavorite(false);
                    btnFavoriteStore.setImageResource(R.drawable.ic_favorite_border_black_24dp);
                }
            }
        });

        imgInforStore.setImageResource(store.getImgStore());
        txtNameStore.setText(store.getName());
        txtAddressStore.setText(store.getAddress());
        txtAddressStore.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(InformationStoreActivity.this, MapAddressStoreActivity.class);
                intent.setAction(Intent.ACTION_SEND);
                intent.putExtra("lat", store.getLat());
                intent.putExtra("lng", store.getLng());
                intent.putExtra("name", store.getName().trim());
                startActivity(intent);
            }
        });
        ratingBarStore.setRating(store.getStar_float());

        tabsTypeFood = findViewById(R.id.tabsTypeFood);
        for (FoodType i : store.getArrayListFood() ) {
            tabsTypeFood.addTab(tabsTypeFood.newTab().setText(i.getNameType()));
        }
        tabsTypeFood.setTabGravity(TabLayout.GRAVITY_CENTER);
        tabsTypeFood.setTabMode(TabLayout.MODE_SCROLLABLE);
        tabsTypeFood.addOnTabSelectedListener(new TabLayout.OnTabSelectedListener() {
            @Override
            public void onTabSelected(TabLayout.Tab tab) {
                final int position = tab.getPosition();
                //Toast.makeText(InformationStoreActivity.this, "Tab index " + position + " pressed", Toast.LENGTH_SHORT).show();
                //friendsLayoutManager.scrollToPosition(position);
                Log.i("tab", "Tab index " + position + " pressed");

                View view = recyclerViewListFoods.getChildAt(position);
                final View view2 = friendsLayoutManager.getChildAt(position);

                Log.i("tab", "Child view position " + view2.getY() + " pressed");
                //nestedScrollViewFoods.smoothScrollTo(0, (int)view2.getY());
                //recyclerViewListFoods.scrollTo(0, (int)view2.getY());
                //view2.setSelected(true);
                recyclerViewListFoods.post(new Runnable() {
                    @Override
                    public void run() {
                        //float y = recyclerViewListFoods.getY() + recyclerViewListFoods.getChildAt(position).getY();
                        //Log.i("tab","Scroll to : " + y);
                        float y = 0;
                        y += 450;
                        y += position * 3200;
                        //y += position*(35 + store.getArrayListFood().get(position).getArrayListFoods().size()*150);
                        //y = Utils.dipToPixels(InformationStoreActivity.this,y) + 270;
                        Log.i("tab","Scroll to : " + y);
                        //nestedScrollViewFoods.smoothScrollTo(0, (int)(view2.getY() - recyclerViewListFoods.getChildAt(position).getHeight()));
                        nestedScrollViewFoods.scrollTo(0, (int)(view2.getY() + recyclerViewListFoods.getY()));
                    }
                });
            }//440, 3700, 7000, 10280

            @Override
            public void onTabUnselected(TabLayout.Tab tab) {}

            @Override
            public void onTabReselected(TabLayout.Tab tab) {}
        });

        inforStoreFoodTypeAdapter = new InforStoreFoodTypeAdapter(store.getArrayListFood(), this);
        recyclerViewListFoods.setAdapter(inforStoreFoodTypeAdapter);
        friendsLayoutManager = new LinearLayoutManager(getApplicationContext(), LinearLayoutManager.VERTICAL, false);
        recyclerViewListFoods.setLayoutManager(friendsLayoutManager);
        friendsLayoutManager.setAutoMeasureEnabled(true);
        recyclerViewListFoods.setNestedScrollingEnabled(true);


        nestedScrollViewFoods = findViewById(R.id.scrollViewFoodsScroll);
        view2 = findViewById(R.id.view2);
        nestedScrollViewFoods.setOnScrollChangeListener(new NestedScrollView.OnScrollChangeListener() {
            @Override
            public void onScrollChange(NestedScrollView v, int scrollX, int scrollY, int oldScrollX, int oldScrollY) {
                Log.i("yyyy", String.valueOf(recyclerViewListFoods.getY()));
                float y = scrollY - recyclerViewListFoods.getY()*2 + 50;
                for (int i = 0; i < recyclerViewListFoods.getChildCount(); i++) {
                    float abs = Math.abs(friendsLayoutManager.getChildAt(i).getY()- y);
                    if((int)abs < recyclerViewListFoods.getY())
                    {
                        Log.i("tab_index", "Scroll to item : " + i);
                        TabLayout.Tab tab = tabsTypeFood.getTabAt(i);
                        if(tab != null)
                            tab.select();
                    }else
                    {
                        //Log.i("tab_index", "Unknown : " + abs);
                    }
                }
                //Log.i("scroll", "\ndy :" + scrollY);
                if((scrollY - oldScrollY) > 0){
                    //view1.setVisibility(View.GONE);
                    //view2.setVisibility(View.VISIBLE);
//                    int itemPosition = friendsLayoutManager.findFirstCompletelyVisibleItemPosition();
//                    Log.i("scroll", "index item recycleview: " + itemPosition);

                    if(Math.abs(scrollY - oldScrollY) > 500) {
                        Log.i("scroll", "Ping" + Math.abs(scrollY - oldScrollY));
                        //view1.setAlpha((float)1.0);
                        view2.setAlpha((float)1.0);
                    }
                    if(scrollY > 100) {
                        //view1.setAlpha((float) (view2.getAlpha() + 0.02));
                        view2.setAlpha((float) (view2.getAlpha() + 0.02));
                        Log.i("scroll", "alpha : " + view2.getAlpha());
//                        Log.i("scroll", "index : " + (v.getChildCount() - 1));
//                        TabLayout.Tab tab = tabsTypeFood.getTabAt(itemPosition);
//                        if (tab != null)
//                            tab.select();
                    }
                } else{
                    //view1.setVisibility(View.VISIBLE);
                    //view2.setVisibility(View.GONE);
                    if(scrollY <= 450)
                    {
                        //view1.setAlpha((float) (view2.getAlpha() - 0.05));
                        view2.setAlpha((float) (view2.getAlpha() - 0.05));
                    }
                    Log.i("scroll", "alpha : " + view2.getAlpha());
                    if(scrollY <= 0) {
                        ///view1.setAlpha(0);
                        view2.setAlpha(0);
                    }
                }
                //nestedScrollViewFoods.scrollTo(scrollX, scrollY);
//                groupShoppingCart = findViewById(R.id.infor_store_group_shopping_cart);
                groupShoppingCart.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View view) {
                        Intent intent = new Intent(InformationStoreActivity.this, ShoppingCartActivity.class);
                        startActivity(intent);
                    }
                });

                infor_store_confirm_cart_btn = findViewById(R.id.infor_store_confirm_cart_btn);
                infor_store_confirm_cart_btn.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View view) {
                        if(shoppingCart.size() > 0) {
                            Intent intent = new Intent(InformationStoreActivity.this, ConfirmCartActivity.class);
                            startActivity(intent);
                        }
                    }
                });
            }
        });


        recyclerViewListFoods.addOnScrollListener(new RecyclerView.OnScrollListener() {
            @Override
            public void onScrollStateChanged(RecyclerView recyclerView, int newState) {
                super.onScrollStateChanged(recyclerView, newState);
            }

            @Override
            public void onScrolled(RecyclerView recyclerView, int dx, int dy) {
                super.onScrolled(recyclerView, dx, dy);
            }
        });

        Log.i("yyyy", String.valueOf(recyclerViewListFoods.getY()));
    }

    @Override
    protected void onResume() {
        super.onResume();
        groupShoppingCart = findViewById(R.id.infor_store_group_shopping_cart);
        if(shoppingCart.size() == 0)
        {
            groupShoppingCart.setVisibility(View.GONE);
            for (FoodType j : store.getArrayListFood()) {
                for (Food t : j.getArrayListFoods()) {
                    t.setCount(0);
                    Log.i("Cart", "Update cart item " + t.getId());
                }
            }
            inforStoreFoodTypeAdapter.notifyDataSetChanged();
        }
        else
        {
            groupShoppingCart.setVisibility(View.VISIBLE);
            infor_store_number_shopping_cart = findViewById(R.id.infor_store_number_shopping_cart);
            infor_store_number_shopping_cart.setText(String.format("%d", shoppingCart.size()));
            for (Food i : shoppingCart) {
                for (FoodType j : store.getArrayListFood()) {
                    for (Food t : j.getArrayListFoods()) {
                        if(i.getId().equals(t.getId()))
                        {
                            t.setCount(i.getCountInt());
                            Log.i("Cart", "Update cart item " + t.getId());
                        }
                    }
                }
            }
            inforStoreFoodTypeAdapter.notifyDataSetChanged();
            TextView textView = findViewById(R.id.infor_store_total_cost);
            textView.setText(calculateCost() + " đ");
        }
    }

    public static String calculateCost(){
        float payCost = 0;
        for (Food item : InformationStoreActivity.shoppingCart) {
            payCost += item.getPriceDouble()*item.getCountInt();
        }
        return "" + payCost;
    }
}
