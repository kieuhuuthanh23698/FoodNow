package com.example.acer_pc.foodnow.Adapter;

import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.Toast;

import com.example.acer_pc.foodnow.CartFragment;
import com.example.acer_pc.foodnow.Data.DAL_GetOrderListCustomer;
import com.example.acer_pc.foodnow.Data.Utils;
import com.example.acer_pc.foodnow.Object.Cart;
import com.example.acer_pc.foodnow.R;
import com.facebook.shimmer.ShimmerFrameLayout;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

import static com.example.acer_pc.foodnow.LoginActivity.user;

public class CartFragmentPlaceholderFragment extends Fragment implements DAL_GetOrderListCustomer.GetOrderListListener {
    DAL_GetOrderListCustomer dal_getOrderListCustomer;
    RecyclerView recyclerViewCart;
    ImageView imageView;
    ShimmerFrameLayout shimmerFrameLayout;
    int page;

    public CartFragmentPlaceholderFragment() {}

    public void setPage(int sectionNumber){
        this.page = sectionNumber;
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        View rootView = inflater.inflate(R.layout.fragment_cart_detail, container, false);
        recyclerViewCart = rootView.findViewById(R.id.frament_cart_detail_listCarts);
        imageView = rootView.findViewById(R.id.frament_cart_detail_listCarts_empty);
        shimmerFrameLayout = rootView.findViewById(R.id.frament_cart_detail_shimmer_view_container);
        return rootView;
    }

    @Override
    public void onResume() {
        super.onResume();
        if(user == null) {
            imageView.setVisibility(View.VISIBLE);
            recyclerViewCart.setVisibility(View.GONE);
            shimmerFrameLayout.setVisibility(View.GONE);
        } else {
            imageView.setVisibility(View.GONE);
            recyclerViewCart.setVisibility(View.VISIBLE);
            shimmerFrameLayout.setVisibility(View.VISIBLE);
            shimmerFrameLayout.startShimmerAnimation();
        }
        switch (this.page){
            case 0:
                imageView.setImageResource(R.drawable.ic_cart_fragment_tab1);
                Toast.makeText(getContext(), "Start tab comming order", Toast.LENGTH_SHORT).show();
                    if(user != null) {
                        shimmerFrameLayout.setVisibility(View.VISIBLE);
                        shimmerFrameLayout.startShimmerAnimation();
                        dal_getOrderListCustomer = new DAL_GetOrderListCustomer(this, getContext());
                        dal_getOrderListCustomer.getOrderList("1");
                    }
                break;
            case 1:
                imageView.setImageResource(R.drawable.ic_cart_fragment_tab2);
                Toast.makeText(getContext(), "Start tab history order", Toast.LENGTH_SHORT).show();
                    if(user != null) {
                        shimmerFrameLayout.setVisibility(View.VISIBLE);
                        shimmerFrameLayout.startShimmerAnimation();
                        dal_getOrderListCustomer = new DAL_GetOrderListCustomer(this, getContext());
                        dal_getOrderListCustomer.getOrderList("2");
                    }
                break;
            case 2:
                imageView.setImageResource(R.drawable.ic_cart_fragment_tab3);
                Toast.makeText(getContext(), "Start tab note order", Toast.LENGTH_SHORT).show();
                    if(user != null) {
                        shimmerFrameLayout.setVisibility(View.VISIBLE);
                        shimmerFrameLayout.startShimmerAnimation();
                        dal_getOrderListCustomer = new DAL_GetOrderListCustomer(this, getContext());
                        dal_getOrderListCustomer.getOrderList("0");
                    }
                break;
        }
    }

    @Override
    public void onRequestGetOrderListDone(JSONArray stores, String type) {
        shimmerFrameLayout.setVisibility(View.GONE);
        shimmerFrameLayout.stopShimmerAnimation();
        if(stores != null && stores.length() > 0){
            imageView.setVisibility(View.GONE);
            recyclerViewCart.setVisibility(View.VISIBLE);
        } else {
            imageView.setVisibility(View.VISIBLE);
            recyclerViewCart.setVisibility(View.GONE);
            return;
        }
        ArrayList<Cart> carts = new ArrayList<>();
        for (int i = 0; i < stores.length(); i++) {
            try {
                JSONObject jsonObjectOrder = stores.getJSONObject(i);
                Cart cart = new Cart();
                JSONObject jsonObjectThongTinDonHang = jsonObjectOrder.getJSONObject("DonHang");
                cart.setState(jsonObjectThongTinDonHang.getString("Trang_thai_don_hang"));
                cart.setDate(jsonObjectThongTinDonHang.getString("updatedAt"));
                cart.setIdOrder(jsonObjectThongTinDonHang.getString("_id"));
                cart.setJsonArrayDetailCart(jsonObjectThongTinDonHang.getJSONArray("Chi_tiet_DH"));
                if(type != "0"){
                    cart.setTypePay(jsonObjectThongTinDonHang.getString("Hinh_thuc_thanh_toan"));
                    cart.setTotal(jsonObjectThongTinDonHang.getDouble("Total_cart"));
                }
                JSONObject jsonObjectThongTinCuaHang = jsonObjectOrder.getJSONArray("CuaHang").getJSONObject(0);
                cart.setNameStore(jsonObjectThongTinCuaHang.getString("Ten_Cua_Hang"));
                cart.setIdStore(jsonObjectThongTinCuaHang.getString("_id"));
                cart.setUrlImg(jsonObjectThongTinCuaHang.getString("Hinh_Anh_Cua_Hang"));
                JSONObject jsonObjectDiaChiCuaHang = jsonObjectThongTinCuaHang.getJSONArray("diachiCH").getJSONObject(0);
                cart.setAddressStore(jsonObjectDiaChiCuaHang.getString("Dia_Chi"));
                carts.add(cart);
            } catch (JSONException e) {
                e.printStackTrace();
            }
        }
        CartOfFragmentAdapter storeSearchResultAdapter = new CartOfFragmentAdapter(carts, getContext(), type);
        recyclerViewCart.setAdapter(storeSearchResultAdapter);
        recyclerViewCart.setNestedScrollingEnabled(true);
        recyclerViewCart.setHasFixedSize(true);
        LinearLayoutManager friendsLayoutManager = new LinearLayoutManager(getContext().getApplicationContext(), LinearLayoutManager.VERTICAL, false);
        recyclerViewCart.setLayoutManager(friendsLayoutManager);

    }
}
