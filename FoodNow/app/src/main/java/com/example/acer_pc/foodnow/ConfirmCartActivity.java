package com.example.acer_pc.foodnow;


import android.app.Activity;
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
import android.util.Log;
import android.view.View;
import android.widget.CompoundButton;
import android.widget.DatePicker;
import android.widget.RelativeLayout;
import android.widget.Switch;
import android.widget.TextView;
import android.widget.Toast;

import com.example.acer_pc.foodnow.Adapter.ConfirmShoppingCartAdapter;
import com.example.acer_pc.foodnow.Common.Const;
import com.example.acer_pc.foodnow.Common.DefineVarible;
import com.example.acer_pc.foodnow.Data.DAL_ConfirmShoppingCart;
import com.example.acer_pc.foodnow.Data.Dal_RequestMoMo;
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

import java.util.HashMap;
import java.util.Map;
import java.util.UUID;

import vn.momo.momo_partner.AppMoMoLib;
import vn.momo.momo_partner.MoMoParameterNamePayment;

import static com.example.acer_pc.foodnow.Common.Const.*;
import static com.example.acer_pc.foodnow.Common.DefineVarible.confirmCart;
import static com.example.acer_pc.foodnow.Common.DefineVarible.dal_confirmShoppingCart;
import static com.example.acer_pc.foodnow.Common.DefineVarible.dal_requestMoMo;
import static com.example.acer_pc.foodnow.Common.DefineVarible.setNoteCartDetail;
import static com.example.acer_pc.foodnow.LoginActivity.user;

public class ConfirmCartActivity extends AppCompatActivity implements View.OnClickListener, OnMapReadyCallback, CustomDateTimePicker.CustomDateTimePickerListener, DAL_ConfirmShoppingCart.ConfirmShoppingCartListener , Dal_RequestMoMo.RequestPaymentListener{
    //button back
    TextView btnBack, btnChangeAddress;
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
    public TextView shopping_cart_note_item;
    public static String note_order;
    //hình thức thanh toán
    RelativeLayout btnCastPaypal, btnCastMoney;
    public static boolean typeCast = false;//false is default money cast
    String request_id;
    String partnerRefId;
    String partnerTransId;
    String fee;
    String merchantCode;
    String description;
    //button đặt hàng
    TextView confirm_shopping_cart_btn_confirm;
    AlertDialog.Builder alertDialog;



    private void init(){
        //map address
        fragmentMapAddress = (MapFragment) getFragmentManager().findFragmentById(R.id.confirm_shopping_cart_map_address);
        //button close activity
        btnBack = findViewById(R.id.confirm_shopping_cart_backBtn);
        btnBack.setOnClickListener(this);
        //button sửa địa chỉ nhận đơn hàng
        btnChangeAddress =  findViewById(R.id.confirm_shopping_cart_btnChangeAddress);
        btnChangeAddress.setOnClickListener(this);
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
        note_order = "";
        //hình thức thanh toán
        btnCastPaypal = findViewById(R.id.confirm_shopping_cart_cast_paypal_btn);
        btnCastPaypal.setOnClickListener(this);
        btnCastMoney = findViewById(R.id.confirm_shopping_cart_cast_money_btn);
        btnCastMoney.setOnClickListener(this);
        request_id = "requestId" + UUID.randomUUID().toString().substring(0, 5);
        partnerRefId = "partnerRefId" + UUID.randomUUID().toString().substring(0, 5);
        partnerTransId = "partnerTransId" + UUID.randomUUID().toString().substring(0, 5);
        fee = "0";
        merchantCode = "merchantCode" + UUID.randomUUID().toString().substring(0, 5);
        description = "Thanh toán cho đơn hàng của FoodNow";
        //button đặt hàng
        confirm_shopping_cart_btn_confirm = findViewById(R.id.confirm_shopping_cart_btn_confirm);
        confirm_shopping_cart_btn_confirm.setOnClickListener(this);
    }

    private void setData(){
        if(user != null) {
            //set infor user
            txtInforUser.setText(user.getName() + (user.getPhone().isEmpty() ? "" : (" - " + user.getPhone())));
            //set address user
            if(address == null)
                address = user.getAddress();
            if(address == null) {
                address = new Address();
                address.setLat(0);
                address.setLng(0);
                address.setAddress("Hãy chọn địa chỉ để giao hàng...");
                distance = 0;
            } else {
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
        txtDistanceEx.setText("Phí vận chuyển (" + String.valueOf(doubleDistance) + " km)");
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
        alertDialog = new AlertDialog.Builder(ConfirmCartActivity.this);
        alertDialog.setTitle("Thông báo");
        alertDialog.setMessage("Đang xử lý đơn hàng....");
        alertDialog.setCancelable(false);
//        Intent intentShopping_cart_confirm = new Intent(ConfirmCartActivity.this, LoadingActivity.class);
//        intentShopping_cart_confirm.setAction(Intent.ACTION_SEND);
//        intentShopping_cart_confirm.putExtra("typeCast", "1");
//        startActivityForResult(intentShopping_cart_confirm, confirmCart);
//        startActivity();
    }

    @Override
    public void onClick(View view) {
        switch (view.getId()){
            case R.id.confirm_shopping_cart_backBtn:
                finish();
                break;
            case R.id.confirm_shopping_cart_btnChangeAddress:
                Intent intentChooseAddress = new Intent(ConfirmCartActivity.this, AddressUserActivity.class);
                intentChooseAddress.putExtra("type", "1");
                startActivity(intentChooseAddress);
                break;
            case R.id.confirm_shopping_cart_time:
                CustomDateTimePicker customDateTimePicker = new CustomDateTimePicker();
                customDateTimePicker.show(getSupportFragmentManager(), "CustomDateTimePicker");
                break;
            case R.id.confirm_shopping_cart_cast_paypal_btn:
                btnCastMoney.setBackgroundResource(R.drawable.un_check_button);
                btnCastPaypal.setBackgroundResource(R.drawable.check_button);
                typeCast = true;
                break;
            case R.id.confirm_shopping_cart_cast_money_btn:
                btnCastMoney.setBackgroundResource(R.drawable.check_button);
                btnCastPaypal.setBackgroundResource(R.drawable.un_check_button);
                typeCast = false;
                break;
            case R.id.shopping_cart_note_item:
                Intent intentShopping_cart_note_item = new Intent(ConfirmCartActivity.this, NoteItemActivity.class);
                intentShopping_cart_note_item.setAction(Intent.ACTION_SEND);
                startActivityForResult(intentShopping_cart_note_item, setNoteCartDetail);
                break;
            case R.id.confirm_shopping_cart_btn_confirm:
                if(!checkCart())
                    return;
                if(!typeCast){//pay with money
                    dal_confirmShoppingCart = new DAL_ConfirmShoppingCart(ConfirmCartActivity.this);
                    dal_confirmShoppingCart.confirmShoppingCart("1");
                    alertDialog.show();
                } else {//pay with momo
                    AppMoMoLib.getInstance().setEnvironment(AppMoMoLib.ENVIRONMENT.DEVELOPMENT);
                    AppMoMoLib.getInstance().setAction(AppMoMoLib.ACTION.PAYMENT);
                    AppMoMoLib.getInstance().setActionType(AppMoMoLib.ACTION_TYPE.GET_TOKEN);
                    Map<String, Object> eventValue = new HashMap<>();
                    //client Required
                    eventValue.put(MoMoParameterNamePayment.MERCHANT_NAME, merchantName);
                    eventValue.put(MoMoParameterNamePayment.MERCHANT_CODE, merchantCode);
                    eventValue.put(MoMoParameterNamePayment.AMOUNT, doubleToTalConfirm);
                    eventValue.put(MoMoParameterNamePayment.DESCRIPTION, description);
                    //client Optional
                    eventValue.put(MoMoParameterNamePayment.FEE, fee);
                    eventValue.put(MoMoParameterNamePayment.MERCHANT_NAME_LABEL, merchantNameLabel);
                    eventValue.put(MoMoParameterNamePayment.REQUEST_ID,  request_id);
                    eventValue.put(MoMoParameterNamePayment.PARTNER_CODE, partner_code);

                    eventValue.put(MoMoParameterNamePayment.REQUEST_TYPE, "payment");
                    eventValue.put(MoMoParameterNamePayment.LANGUAGE, "vi");
                    eventValue.put(MoMoParameterNamePayment.EXTRA, "");
                    //Request momo app
                    AppMoMoLib.getInstance().requestMoMoCallBack(ConfirmCartActivity.this, eventValue);
                }
                break;
        }
    }

    private boolean checkCart() {
        if(address.getAddress().trim().isEmpty()){
            Toast.makeText(ConfirmCartActivity.this, "Bạn chưa chọn địa chỉ giao hàng !", Toast.LENGTH_SHORT).show();
            return false;
        }
        if(user == null)
            return false;
        if(user.getPhone().isEmpty()) {
            Toast.makeText(ConfirmCartActivity.this, "Bạn chưa chọn địa chỉ giao hàng !", Toast.LENGTH_SHORT).show();
            return false;
        }
        return true;
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
        Log.i("response", "requestCode : " + + requestCode + ", resultCode : " + resultCode);
        if(resultCode != Activity.RESULT_OK || data == null){
            AlertDialog.Builder alertDialog = new AlertDialog.Builder(ConfirmCartActivity.this);
            alertDialog.setTitle("Thông báo");
            alertDialog.setMessage("On Activity " + requestCode + " Result Error !");
            alertDialog.setPositiveButton("OK", new DialogInterface.OnClickListener() {
                public void onClick(DialogInterface dialog, int id) {
                    dialog.cancel();
                }
            });
            alertDialog.show();
            return;
        }
        if(requestCode == setNoteCartDetail){
            note_order = data.getStringExtra("note");
            shopping_cart_note_item.setText(note_order);
        }
        if(requestCode == confirmCart){
            if(data != null && data.getStringExtra("status") != null && data.getStringExtra("status").equals("1")) {
                //thông báo cho khách hàng đơn hàng đã được đặt
                AlertDialog.Builder alertDialog = new AlertDialog.Builder(ConfirmCartActivity.this);
                alertDialog.setTitle("Thông báo");
                alertDialog.setMessage("Đơn hàng của bạn đã thanh toán thành công !");
                alertDialog.setPositiveButton("Đồng ý", new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int id) {
                        dialog.cancel();
                        finish();
                    }
                });
                alertDialog.show();
            } else if(data != null && data.getStringExtra("message") != null){
                AlertDialog.Builder alertDialog = new AlertDialog.Builder(ConfirmCartActivity.this);
                alertDialog.setTitle("Đặt hàng thất bại");
                alertDialog.setMessage(data.getStringExtra("message"));
                alertDialog.setPositiveButton("Đồng ý", new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int id) {
                        dialog.cancel();
                        finish();
                    }
                });
                alertDialog.show();
            }
        }
        if(requestCode == AppMoMoLib.getInstance().REQUEST_CODE_MOMO) {
            if(data.getIntExtra("status", -1) == 0) {
                if(data.getStringExtra("data") != null && !data.getStringExtra("data").equals("")) {
                    // TODO:
//                        Log.i("response", data.getDataString());
                    String token = data.getStringExtra("data");
                    Log.i("response", token);
                    String phonenumber = data.getStringExtra("phonenumber");
                    String plaintext = "{\n" +
                            " \"partnerCode\": \"" + merchantCode + "\",\n" +
                            " \"partnerRefId\": \""+ merchantCode +"\",\n" +
                            " \"partnerTransId\": \"" + partnerTransId + "\",\n" +
                            " \"amount\": " +  String.valueOf(doubleToTalConfirm) + ",\n" +
                            " \"description\": \"" + description + "\"\n" +
                            "}";
                    String rsa = Utils.encryptRSA(plaintext, publicKey);
                    dal_requestMoMo = new Dal_RequestMoMo(ConfirmCartActivity.this);
                    dal_requestMoMo.requestPayment(
                            request_id,
                            phonenumber,
                            partnerRefId,
                            token,
                            rsa,
                            description);
                    alertDialog.show();
                } else {
                    Toast.makeText(this, "Message: " + this.getString(R.string.not_receive_info), Toast.LENGTH_SHORT).show();
                }
            } else if(data.getIntExtra("status", -1) == 1) {
                String message = data.getStringExtra("message") != null?data.getStringExtra("message"):"Thất bại";
                Toast.makeText(this, "Message: " + message, Toast.LENGTH_SHORT).show();
            } else if(data.getIntExtra("status", -1) == 2) {
                Toast.makeText(this, "Message: " + this.getString(R.string.not_receive_info), Toast.LENGTH_SHORT).show();
            } else {
                Toast.makeText(this, "Message: " + this.getString(R.string.not_receive_info), Toast.LENGTH_SHORT).show();
            }
        } else {
            Toast.makeText(this, "Message: " + this.getString(R.string.not_receive_info_err), Toast.LENGTH_SHORT).show();
        }
    }



    @Override
    public void onDateTimeChange(String date) {
        if(txtDateTime != null)
            txtDateTime.setText(date);
    }

    void resetData(){
        distance = 0.1;
        doubleTotalCart = 0;
        doubleDistance = 0;
        doubleDistanceCost = 0;
        doubleToTalConfirm = 0;
    }

    @Override
    protected void onResume() {
        super.onResume();
        resetData();
        setData();
    }

    @Override
    public void onRequestConfirmShoppingCartDone(String result) {
        notificationResultConfirmOrder(result);
    }

    private void notificationResultConfirmOrder(String result){
        alertDialog.setTitle("Thông báo");
        alertDialog.setMessage(result);
        alertDialog.setPositiveButton("Đồng ý", new DialogInterface.OnClickListener() {
            public void onClick(DialogInterface dialog, int id) {
                dialog.cancel();
                finish();
            }
        });
        alertDialog.show();
    }

    @Override
    public void onRequestPaymentDone(String result) {
        notificationResultConfirmOrder(result);
    }
}
