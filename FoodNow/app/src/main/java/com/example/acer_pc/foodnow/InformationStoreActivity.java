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
import android.text.Html;
import android.text.Spanned;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.FrameLayout;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.RatingBar;
import android.widget.RelativeLayout;
import android.widget.TableLayout;
import android.widget.TextView;
import android.widget.Toast;

import com.example.acer_pc.foodnow.Adapter.InforStoreFoodTypeAdapter;
import com.example.acer_pc.foodnow.Common.DefineVarible;
import com.example.acer_pc.foodnow.Data.CartDetail;
import com.example.acer_pc.foodnow.Data.Utils;
import com.example.acer_pc.foodnow.Object.Address;
import com.example.acer_pc.foodnow.Object.Food;
import com.example.acer_pc.foodnow.Object.FoodType;
import com.example.acer_pc.foodnow.Object.Store;
import com.squareup.picasso.Picasso;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;

public class InformationStoreActivity extends AppCompatActivity implements View.OnClickListener {
    //data
    public static String idStore;
    public static boolean refresh = false;
    public static JSONObject jsonObjectInforStore;
    private Store store;
    public static Address addressStore;
//    public static ArrayList<Food> shoppingCart;
    public static HashMap<String, CartDetail> shoppingCart;

    //button back, button yêu thích, ảnh cửa hàng
    ImageView btnBackAct, btnFavoriteStore,imgInforStore;
    //tên cửa hàng
    public static TextView txtNameStore;
    //địa chỉ cửa hàng
    Spanned Text;
    TextView txtAddressStore;
    //đánh giá
    RatingBar ratingBarStore;
    //danh sách món ăn
    NestedScrollView nestedScrollViewFoods;
    TabLayout tabsTypeFood;
    LinearLayoutManager friendsLayoutManager;
    InforStoreFoodTypeAdapter inforStoreFoodTypeAdapter;
    RecyclerView recyclerViewListFoods;
    //
    LinearLayout view2;
    //group shopping cart
    FrameLayout viewTemp;
    RelativeLayout groupShoppingCart;
    TextView infor_store_number_shopping_cart, infor_store_total_cost;
    Button infor_store_confirm_cart_btn;

    private void init(){
        //data
//        store = new Store();
//        try {
//            jsonObjectInforStore = new JSONObject("");
//        } catch (JSONException e) {
//            e.printStackTrace();
//        }
//        shoppingCart = new ArrayList<>();
        shoppingCart = new HashMap<>();
        //button back, button yêu thích, ảnh cửa hàng
        btnBackAct = findViewById(R.id.btnBackActInforStore);
        btnBackAct.setOnClickListener(this);
        btnFavoriteStore = findViewById(R.id.imgFavoriteStore);
        btnFavoriteStore.setOnClickListener(this);
        imgInforStore = findViewById(R.id.img_infor_store);
        //tên cửa hàng
        txtNameStore = findViewById(R.id.txt_storename_inforAct);
        //địa chỉ cửa hàng
        txtAddressStore = findViewById(R.id.txt_storeAddress_inforAct);
        txtAddressStore.setOnClickListener(this);
        //đánh giá
        ratingBarStore = findViewById(R.id.ratingStore);
        //danh sách món ăn
        nestedScrollViewFoods = findViewById(R.id.scrollViewFoodsScroll);
        tabsTypeFood = findViewById(R.id.tabsTypeFood);
        friendsLayoutManager = new LinearLayoutManager(getApplicationContext(), LinearLayoutManager.VERTICAL, false);
        recyclerViewListFoods = findViewById(R.id.store_list_foods_type);
        //
        view2 = findViewById(R.id.view2);
        //group shopping cart
        viewTemp = findViewById(R.id.viewTemp);
        groupShoppingCart = findViewById(R.id.infor_store_group_shopping_cart);
        groupShoppingCart.setOnClickListener(this);
        infor_store_total_cost = findViewById(R.id.infor_store_total_cost);
        infor_store_number_shopping_cart = findViewById(R.id.infor_store_number_shopping_cart);
        infor_store_confirm_cart_btn = findViewById(R.id.infor_store_confirm_cart_btn);
        infor_store_confirm_cart_btn.setOnClickListener(this);
    }


    private void setData() throws JSONException {
        //thêm vào cửa hàng yêu thích
        idStore = jsonObjectInforStore.getJSONObject("thongTinCuaHang").getString("_id");
        if(Utils.isFavorite(jsonObjectInforStore.getJSONObject("thongTinCuaHang").getString("_id"))) {
            btnFavoriteStore.setImageResource(R.drawable.ic_favorite_black_24dp);
        } else{
            btnFavoriteStore.setImageResource(R.drawable.ic_favorite_border_black_24dp);
        }
        //hình ảnh cửa hàng
        Picasso.get().load(Utils.getUrlImageStore(jsonObjectInforStore.getJSONObject("thongTinCuaHang").getString("Hinh_Anh_Cua_Hang"))).into(imgInforStore);
        //tên cửa hàng
        txtNameStore.setText(jsonObjectInforStore.getJSONObject("thongTinCuaHang").getString("Ten_Cua_Hang"));
        //data về location của cửa hàng
        addressStore = new Address();
        addressStore.setLat(jsonObjectInforStore.getJSONObject("thongTinCuaHang")
                .getJSONArray("diachiCH").getJSONObject(0)
                .getDouble("Vi_do"));
        addressStore.setLng(jsonObjectInforStore.getJSONObject("thongTinCuaHang")
                .getJSONArray("diachiCH").getJSONObject(0)
                .getDouble("Kinh_do"));
        addressStore.setAddress(jsonObjectInforStore.getJSONObject("thongTinCuaHang")
                .getJSONArray("diachiCH").getJSONObject(0)
                .getString("Dia_Chi"));
        //địa chỉ
        Text = Html.fromHtml("<a href='#'>" + addressStore.getAddress() + "</a>");
        txtAddressStore.setText(Text);
        //đánh giá cửa hàng
        float rating = Float.parseFloat(jsonObjectInforStore.getJSONObject("thongTinCuaHang").getString("Danh_Gia"));
        if(rating > 0)
            ratingBarStore.setRating(rating);
        else
            ratingBarStore.setVisibility(View.GONE);
        //tab tab type foods
        tabsTypeFood.setTabGravity(TabLayout.GRAVITY_CENTER);
        tabsTypeFood.setTabMode(TabLayout.MODE_SCROLLABLE);
        tabsTypeFood.removeAllTabs();
        for (int i = 0; i < jsonObjectInforStore.getJSONArray("lstMonAn").length(); i++){
            tabsTypeFood.addTab(tabsTypeFood.newTab().setText(jsonObjectInforStore.getJSONArray("lstMonAn").getJSONObject(i).getString("Ten_loai_mon_an")));
        }
        try {
            inforStoreFoodTypeAdapter = new InforStoreFoodTypeAdapter(jsonObjectInforStore.getJSONArray("lstMonAn"), this);
            recyclerViewListFoods.setAdapter(inforStoreFoodTypeAdapter);
            friendsLayoutManager.setAutoMeasureEnabled(true);
            recyclerViewListFoods.setLayoutManager(friendsLayoutManager);
            recyclerViewListFoods.setNestedScrollingEnabled(true);
            inforStoreFoodTypeAdapter.notifyDataSetChanged();
            //set data hash map
            initHashMapGioHang(jsonObjectInforStore.getJSONObject("DonHang"));
        } catch (JSONException e) {
            e.printStackTrace();
        }
    }

    private void initHashMapGioHang(JSONObject donHang) throws JSONException {
        String return_code = donHang.getString("return_code");
        if(return_code.equals("1")){
            for (int i = 0; i < donHang.getJSONArray("infor").length(); i++) {
                JSONObject jsonObjectCartDetail = donHang.getJSONArray("infor").getJSONObject(i);
                CartDetail cartDetail = shoppingCart.get(jsonObjectCartDetail.getString("IdMonAn"));
                if(cartDetail == null) {
                    cartDetail = new CartDetail();
                    cartDetail.setCount(jsonObjectCartDetail.getInt("SoLuong"));
                    cartDetail.setId(jsonObjectCartDetail.getString("_id"));
                    cartDetail.setNote(jsonObjectCartDetail.getString("GhiChu"));
                    cartDetail.setPrice(jsonObjectCartDetail.getDouble("Don_gia"));
                    shoppingCart.put(jsonObjectCartDetail.getString("IdMonAn"), cartDetail);
                } else{
                    cartDetail.setCount(jsonObjectCartDetail.getInt("SoLuong"));
                    cartDetail.setId(jsonObjectCartDetail.getString("_id"));
                    cartDetail.setNote(jsonObjectCartDetail.getString("GhiChu"));
                    cartDetail.setPrice(jsonObjectCartDetail.getDouble("Don_gia"));
                }
            }
        } else {
            shoppingCart.clear();
        }
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_information_store);
        init();
        //scoll main view
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
                    }
                }
                if((scrollY - oldScrollY) > 0){
                    if(scrollY > 500) {
                        view2.setAlpha((float)1.0);
                    }
                    if(scrollY > 100) {
                        view2.setAlpha((float) (view2.getAlpha() + 0.02));
                    }
                } else{
                    if(scrollY <= 450)
                    {
                        view2.setAlpha((float) (view2.getAlpha() - 0.05));
                    }
                    if(scrollY <= 0) {
                        view2.setAlpha(0);
                    }
                }
            }
        });
        //config tab type foods
        tabsTypeFood.addOnTabSelectedListener(new TabLayout.OnTabSelectedListener() {
            @Override
            public void onTabSelected(TabLayout.Tab tab) {
                final int position = tab.getPosition();
                View view = recyclerViewListFoods.getChildAt(position);
                final View view2 = friendsLayoutManager.getChildAt(position);
                if(view2 != null && recyclerViewListFoods != null) {
                    recyclerViewListFoods.post(new Runnable() {
                        @Override
                        public void run() {
                            float y = 0;
                            y += 450;
                            y += position * 3200;
                            nestedScrollViewFoods.scrollTo(0, (int) (view2.getY() + recyclerViewListFoods.getY()));
                        }
                    });
                }
            }

            @Override
            public void onTabUnselected(TabLayout.Tab tab) {}

            @Override
            public void onTabReselected(TabLayout.Tab tab) {}
        });
        //danh sách foods
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
        getInforStore();
    }

    private void getInforStore(){
        Intent intentGetInforStore = new Intent(InformationStoreActivity.this, LoadingActivity.class);
        intentGetInforStore.setAction(Intent.ACTION_SEND);
        intentGetInforStore.putExtra("action", DefineVarible.getInforStore);
        intentGetInforStore.putExtra("idStore", getIntent().getStringExtra("idStore"));
        startActivityForResult(intentGetInforStore, DefineVarible.getInforStore);
    }

    @Override
    protected void onResume() {
        super.onResume();
        if(inforStoreFoodTypeAdapter != null) {
            if (shoppingCart.size() == 0) {
                groupShoppingCart.setVisibility(View.GONE);
                viewTemp.setVisibility(View.GONE);
                inforStoreFoodTypeAdapter.notifyDataSetChanged();
            } else {
                if (groupShoppingCart != null) {
                    groupShoppingCart.setVisibility(View.VISIBLE);
                    viewTemp.setVisibility(View.VISIBLE);
                }
                infor_store_number_shopping_cart.setText(String.format("%d", shoppingCart.size()));
                inforStoreFoodTypeAdapter.notifyDataSetChanged();
                infor_store_total_cost.setText(Utils.calculateCost() + " đ");
            }
        }
        if(refresh == true){
            getInforStore();
        }
        if(inforStoreFoodTypeAdapter != null){
            inforStoreFoodTypeAdapter.notifyDataSetChanged();
        }
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if(requestCode == DefineVarible.getInforStore){
            if(jsonObjectInforStore != null)
            {
                try {
                    setData();
                } catch (JSONException e) {
                    e.printStackTrace();
                }
            } else {
                finish();
            }
        }
    }

    @Override
    public void onClick(View view) {
        switch (view.getId()){
            case R.id.btnBackActInforStore://quay lại màn hình chính
                finish();
                break;
            case R.id.imgFavoriteStore://đổi trạng thái yêu thích cửa hàng
                if(!store.isFavorite())
                {
                    store.setFavorite(true);
                    btnFavoriteStore.setImageResource(R.drawable.ic_favorite_black_24dp);
                }
                else{
                    store.setFavorite(false);
                    btnFavoriteStore.setImageResource(R.drawable.ic_favorite_border_black_24dp);
                }
                break;
            case R.id.txt_storeAddress_inforAct://chuyển sang màn hình map địa chỉ cửa hàng
                if(jsonObjectInforStore != null) {
                    Intent intent = new Intent(InformationStoreActivity.this, MapAddressStoreActivity.class);
                    intent.setAction(Intent.ACTION_SEND);
                    try {
                        intent.putExtra("lat", addressStore.getLat());
                        intent.putExtra("lng", addressStore.getLng());
                        intent.putExtra("dia_chi", addressStore.getAddress());
                        intent.putExtra("name", jsonObjectInforStore.getJSONObject("thongTinCuaHang")
                                .getString("Ten_Cua_Hang"));
                        startActivity(intent);
                    } catch (JSONException e) {
                        e.printStackTrace();
                    }
                }
                break;
            case R.id.infor_store_group_shopping_cart:
                Intent intentShoppingCartActivity = new Intent(InformationStoreActivity.this, ShoppingCartActivity.class);
                startActivity(intentShoppingCartActivity);
                break;
            case R.id.infor_store_confirm_cart_btn:
                if(shoppingCart.size() > 0) {
                    Intent intentConfirmCartActivity = new Intent(InformationStoreActivity.this, ConfirmCartActivity.class);
                    startActivity(intentConfirmCartActivity);
                }
                break;
        }
    }
}
