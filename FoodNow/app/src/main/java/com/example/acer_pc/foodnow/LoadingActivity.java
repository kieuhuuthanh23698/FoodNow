package com.example.acer_pc.foodnow;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.widget.ImageView;

import com.example.acer_pc.foodnow.Common.DefineVarible;
import com.example.acer_pc.foodnow.Data.DAL_AddProductToCart;
import com.example.acer_pc.foodnow.Data.DAL_AddUserAddress;
import com.example.acer_pc.foodnow.Data.DAL_GetInforFragment_Home;
import com.example.acer_pc.foodnow.Data.DAL_GetInforStore;
import com.example.acer_pc.foodnow.Data.DAL_ConfirmShoppingCart;
import com.example.acer_pc.foodnow.Data.DAL_Login;
import com.example.acer_pc.foodnow.Data.DAL_MyLocation;
import com.example.acer_pc.foodnow.Data.Utils;

import java.util.Timer;
import java.util.TimerTask;

import static com.example.acer_pc.foodnow.Common.DefineVarible.*;

public class LoadingActivity extends AppCompatActivity {

    private ImageView imageView;
    private int radius;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_loading);
        imageView = findViewById(R.id.ic_loading);
        imageView = findViewById(R.id.ic_loading);
        Timer timer = new Timer();
        timer.scheduleAtFixedRate(new TimerTask() {
            @Override
            public void run() {
                runOnUiThread(new Runnable() {
                    @Override
                    public void run() {
                        imageView.setRotation(radius);
                        radius++;
                        if(radius == 180)
                            radius = 0;
                    }
                });
            }
        }, 0 , 5);
        Intent intent = getIntent();
        int action = intent.getIntExtra("action", -1);
        switch (action){
            default:
                finish();
            case DefineVarible.getMyLocation:
                dal_myLocation = new DAL_MyLocation(LoadingActivity.this);
                dal_myLocation.getMyLocation();
                break;
            case DefineVarible.loginToServer:
                dal_login = new DAL_Login(LoadingActivity.this);
                dal_login.login();
                break;
            case DefineVarible.getInforFragment:
                dal_getInforFragment_home = new DAL_GetInforFragment_Home(LoadingActivity.this);
                dal_getInforFragment_home.getInforFragmentHome();
                break;
            case DefineVarible.getInforStore:
                dal_getInforStore = new DAL_GetInforStore(LoadingActivity.this);
                String idStore = intent.getStringExtra("idStore");
                dal_getInforStore.getInforStore(idStore);
                break;
            case DefineVarible.addProductToCart:
                dal_addProductToCart = new DAL_AddProductToCart(LoadingActivity.this);
                dal_addProductToCart.addProductToCart();
                break;
            case DefineVarible.confirmCart:
                dal_confirmShoppingCart = new DAL_ConfirmShoppingCart(LoadingActivity.this);
                dal_confirmShoppingCart.confirmShoppingCart();
                break;
            case DefineVarible.addUserAddress:
                int type = intent.getIntExtra("type", -1);
                double lat = intent.getDoubleExtra("lat", 0);
                double lng = intent.getDoubleExtra("lng", 0);
                String address = intent.getStringExtra("address");
                dal_addUserAddress = new DAL_AddUserAddress(LoadingActivity.this, type, lat, lng, address);
                dal_addUserAddress.addUserAddress();
                break;
        }
    }

    @Override
    protected void onDestroy() {
        super.onDestroy();
        Log.i("response", "\n" + Utils.getCurrentTime() + "Loading Destroyed !");
    }
}
