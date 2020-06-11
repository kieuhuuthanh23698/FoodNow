package com.example.acer_pc.foodnow;


import android.app.DatePickerDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.graphics.BitmapFactory;
import android.location.Location;
import android.support.v4.app.Fragment;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.View;
import android.widget.CompoundButton;
import android.widget.DatePicker;
import android.widget.RelativeLayout;
import android.widget.Switch;
import android.widget.TextView;

import com.example.acer_pc.foodnow.Adapter.ConfirmShoppingCartAdapter;
import com.example.acer_pc.foodnow.Common.DefineVarible;
import com.example.acer_pc.foodnow.Data.DAL_ConfirmShoppingCart;
import com.example.acer_pc.foodnow.Data.Utils;
import com.example.acer_pc.foodnow.Object.Address;
import com.example.acer_pc.foodnow.Object.User;
import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.MapFragment;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.model.BitmapDescriptorFactory;
import com.google.android.gms.maps.model.CameraPosition;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.MarkerOptions;
import com.google.maps.android.SphericalUtil;
import com.squareup.picasso.Picasso;

import java.text.SimpleDateFormat;
import java.util.Calendar;

import static com.example.acer_pc.foodnow.Common.DefineVarible.confirmCart;
import static com.example.acer_pc.foodnow.Common.DefineVarible.setNoteCartDetail;
import static com.example.acer_pc.foodnow.LoginActivity.user;

public class ConfirmCartActivity extends AppCompatActivity implements View.OnClickListener, OnMapReadyCallback, CustomDateTimePicker.CustomDateTimePickerListener {
    //button back
    TextView btnBack;
    //map địa chỉ giao hàng
    public static Address address;
    private GoogleMap mMap;
    MapFragment fragmentMapAddress;
    //thông tin người giao : tên + số điện thoại
    TextView txtInforUser;
    //địa chỉ giao
    TextView txtAddress;
    //khoảng cách giao hàng
    double distance = 0.1;
    TextView txtDistance;
    //thời gian đặt hàng
    TextView txtDateTime;
    //Tên cửa hàng của đơn hàng
    TextView txtNameStore;
    //danh sách các món ăn trong đơn hàng
    RecyclerView recyclerViewConfirm_shopping_cart_list;
    ConfirmShoppingCartAdapter confirmShoppingCartAdapter;
    LinearLayoutManager friendsLayoutManager;
    //số lượng món sẽ đặt
    int intCount;
    TextView txtCount;
    //tổng số tiền của giỏ hàng
    public static double doubleTotalCart;
    TextView txtTotalCart;
    //khoảng cách giao hàng phần tổng kết
    public static double doubleDistance;
    TextView txtDistanceEx;
    //phí giao hàng : tính dựa vào distance
    public static double doubleDistanceCost;
    TextView txtDistanceCost;
    //tổng toàn bộ số tiền
    public static double doubleToTalConfirm;
    TextView txtTotalConfirmcart;
    //switch tùy chọn đồ dùng nhựa
    Switch confirm_shopping_cart_switch_plastic;
    TextView confirm_shopping_cart_checked_content;
    //note cho đơn hàng
    public static TextView shopping_cart_note_item;
    //hình thức thanh toán
    RelativeLayout btnCastPaypal, btnCastMoney;
    public static boolean typeCast = false;//false is default money cast
    //button đặt hàng
    TextView confirm_shopping_cart_btn_confirm;



    private void init(){
        //map address
        fragmentMapAddress = (MapFragment) getFragmentManager().findFragmentById(R.id.confirm_shopping_cart_map_address);
        //button close activity
        btnBack = findViewById(R.id.confirm_shopping_cart_backBtn);
        btnBack.setOnClickListener(this);
        //thông tin người đặt
        txtInforUser = findViewById(R.id.confirm_shopping_cart_infor_user);
        //địa chỉ giao hàng
        txtAddress = findViewById(R.id.confirm_shopping_cart_address);
        //khoảng cách giao hàng
        txtDistance = findViewById(R.id.confirm_shopping_cart_distance);
        //thời gian đặt hàng
        txtDateTime = findViewById(R.id.confirm_shopping_cart_time);
        txtDateTime.setOnClickListener(this);
        //Tên cửa hàng của đơn hàng
        txtNameStore = findViewById(R.id.confirm_shopping_cart_name_store);
        //danh sách các món ăn trong đơn hàng
        recyclerViewConfirm_shopping_cart_list = findViewById(R.id.confirm_shopping_cart_list);
        confirmShoppingCartAdapter = new ConfirmShoppingCartAdapter(this);
        friendsLayoutManager = new LinearLayoutManager(getApplicationContext(), LinearLayoutManager.VERTICAL, false);
        friendsLayoutManager.setAutoMeasureEnabled(true);
        //số lượng món của đơn
        txtCount = findViewById(R.id.confirm_shopping_cart_count_cart_detail);
        //tổng số tiền của giỏ hàng
        txtTotalCart = findViewById(R.id.confirm_shopping_cart_total_cart_detail);
        //khoảng cách giao hàng phần mở rộng
        txtDistanceEx = findViewById(R.id.confirm_shopping_cart_distance_ex);
        //phí giao hàng
        txtDistanceCost = findViewById(R.id.confirm_shopping_cart_distance_cost);
        //tổng số tiền của đơn hàng
        txtTotalConfirmcart = findViewById(R.id.confirm_shopping_cart_total_confirm_cart_detai);
        //switch tùy chọn đồ dùng nhựa
        confirm_shopping_cart_switch_plastic = findViewById(R.id.confirm_shopping_cart_switch_plastic);
        confirm_shopping_cart_checked_content = findViewById(R.id.confirm_shopping_cart_checked_content);
        //note cho đơn hàng
        shopping_cart_note_item = findViewById(R.id.shopping_cart_note_item);
        shopping_cart_note_item.setOnClickListener(this);
        //hình thức thanh toán
        btnCastPaypal = findViewById(R.id.confirm_shopping_cart_cast_paypal_btn);
        btnCastPaypal.setOnClickListener(this);
        btnCastMoney = findViewById(R.id.confirm_shopping_cart_cast_money_btn);
        btnCastMoney.setOnClickListener(this);
        //button đặt hàng
        confirm_shopping_cart_btn_confirm = findViewById(R.id.confirm_shopping_cart_btn_confirm);
        confirm_shopping_cart_btn_confirm.setOnClickListener(this);
    }

    private void setData(){
        if(user != null) {
            //set infor user
            txtInforUser.setText(user.getName() + (user.getPhone().isEmpty() ? "" : (" - " + user.getPhone())));
            //set address user
            address = user.getAddress();
            if(address == null)
            {
                address = new Address();
                address.setLat(0);
                address.setLng(0);
                address.setAddress("");
            } else{
                //khoảng cách giữa cửa hàng và địa chỉ giao
                LatLng latLngFrom = new LatLng(address.getLat(), address.getLng());
                LatLng latLngTo = new LatLng(InformationStoreActivity.addressStore.getLat(), InformationStoreActivity.addressStore.getLng());
                distance += SphericalUtil.computeDistanceBetween(latLngFrom, latLngTo);
                distance = Math.round((distance*0.001)*10)/10;
            }
            fragmentMapAddress.getMapAsync(ConfirmCartActivity.this);
        }
        doubleDistance += distance;
        txtDistance.setText(String.valueOf(doubleDistance) + " km");
        intCount = Utils.countNumberItemCart();
        txtCount.setText("Tổng (" + String.valueOf(intCount) + " phần)");
        doubleTotalCart = Double.parseDouble(Utils.calculateCost());
        txtTotalCart.setText( String.valueOf(doubleTotalCart) + " đ");
        txtDistanceEx.setText("Phí vận chuyển (" + String.valueOf(doubleDistance) + ")km");
        doubleDistanceCost = doubleDistance*5000;
        txtDistanceCost.setText(String.valueOf(doubleDistanceCost) + " đ");
        doubleToTalConfirm = doubleTotalCart + doubleDistanceCost;
        txtTotalConfirmcart.setText(String.valueOf(doubleToTalConfirm) + " đ");
        confirm_shopping_cart_btn_confirm.setText("Đặt hàng - " + String.valueOf(doubleTotalCart + doubleDistanceCost) + " đ");
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_confirm_cart);
        init();
        //tên cửa hàng
        txtNameStore.setText(InformationStoreActivity.txtNameStore.getText().toString().trim());
        //danh sách các món ăn
        recyclerViewConfirm_shopping_cart_list.setAdapter(confirmShoppingCartAdapter);
        recyclerViewConfirm_shopping_cart_list.setLayoutManager(friendsLayoutManager);
        recyclerViewConfirm_shopping_cart_list.setNestedScrollingEnabled(false);
        recyclerViewConfirm_shopping_cart_list.setHasFixedSize(true);
        //switch tùy chọn đồ dùng nhựa
        confirm_shopping_cart_switch_plastic.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
            @Override
            public void onCheckedChanged(CompoundButton compoundButton, boolean b) {
                if(confirm_shopping_cart_switch_plastic.isChecked()){
                    confirm_shopping_cart_checked_content.setText(getString(R.string.plastic));
                } else{
                    confirm_shopping_cart_checked_content.setText(getString(R.string.non_plastic));
                }
            }
        });
        setData();
    }

    private void changeCast(){
        if(!typeCast){//cur is money
            btnCastMoney.setBackgroundResource(R.drawable.check_button);
            btnCastPaypal.setBackgroundResource(R.drawable.border_all);
        } else
        {
            btnCastMoney.setBackgroundResource(R.drawable.border_all);
            btnCastPaypal.setBackgroundResource(R.drawable.check_button);
        }
        typeCast = !typeCast;
    }

    @Override
    public void onClick(View view) {
        switch (view.getId()){
            case R.id.confirm_shopping_cart_backBtn:
                finish();
                break;
            case R.id.confirm_shopping_cart_time:
                CustomDateTimePicker customDateTimePicker = new CustomDateTimePicker();
                customDateTimePicker.show(getSupportFragmentManager(), "CustomDateTimePicker");
                break;
            case R.id.confirm_shopping_cart_cast_paypal_btn:
                AlertDialog.Builder alertDialog = new AlertDialog.Builder(ConfirmCartActivity.this);
                alertDialog.setTitle("Notification");
                alertDialog.setMessage("Tính năng thanh toán trực tuyến qua Paypal đang được cập nhật !");
                alertDialog.setPositiveButton("OK", new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int id) {
                        dialog.cancel();
                    }
                });
                alertDialog.show();
//                changeCast();
                break;
            case R.id.confirm_shopping_cart_cast_money_btn:
                changeCast();
                break;
            case R.id.shopping_cart_note_item:
                Intent intentShopping_cart_note_item = new Intent(ConfirmCartActivity.this, NoteItemActivity.class);
                intentShopping_cart_note_item.setAction(Intent.ACTION_SEND);
                startActivityForResult(intentShopping_cart_note_item, setNoteCartDetail);
            case R.id.confirm_shopping_cart_btn_confirm:
//                Intent intentShopping_cart_confirm = new Intent(ConfirmCartActivity.this, LoadingActivity.class);
//                intentShopping_cart_confirm.setAction(Intent.ACTION_SEND);
//                startActivityForResult(intentShopping_cart_confirm, confirmCart);
                DAL_ConfirmShoppingCart dal_confirmShoppingCart = new DAL_ConfirmShoppingCart(ConfirmCartActivity.this);
                dal_confirmShoppingCart.confirmShoppingCart();
                break;
        }
    }

    @Override
    public void onMapReady(GoogleMap googleMap) {
        mMap = googleMap;
        mMap.setMapType(GoogleMap.MAP_TYPE_NORMAL);
        mMap.setTrafficEnabled(false);
        mMap.setIndoorEnabled(false);
        mMap.setBuildingsEnabled(false);
        mMap.getUiSettings().setZoomControlsEnabled(true);
        mMap.moveCamera(CameraUpdateFactory.newLatLngZoom(new LatLng(address.lat, address.lng),18));
        MarkerOptions markerOptions = new MarkerOptions();
        markerOptions.position(new LatLng(address.getLat(), address.getLng()));
        markerOptions.icon(Utils.generateBitmapDescriptorFromRes(ConfirmCartActivity.this, R.drawable.ic_my_location_black_24dp));
        mMap.addMarker(markerOptions).showInfoWindow();
        mMap.moveCamera(CameraUpdateFactory.newCameraPosition(new CameraPosition.Builder()
        .target(googleMap.getCameraPosition().target)
        .zoom(18)
        .bearing(30)
        .tilt(45)
        .build()));
        txtAddress.setText(address.getAddress());
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if(requestCode == setNoteCartDetail){
            shopping_cart_note_item.setText(data.getStringExtra("note"));
        }
        if(requestCode == confirmCart){
            finish();
        }
    }

    @Override
    public void onDateTimeChange(String date) {
        if(txtDateTime != null)
            txtDateTime.setText(date);
    }
}
