package com.example.acer_pc.foodnow;

import android.app.Activity;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.ImageView;

import com.example.acer_pc.foodnow.Common.DefineVarible;
import com.example.acer_pc.foodnow.Data.DAL_MyLocation;
import com.facebook.login.LoginManager;

import java.util.Timer;
import java.util.TimerTask;

public class FlashActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_flash);
        LoginManager loginManager = LoginManager.getInstance();
        if(loginManager != null)
            loginManager.logOut();
        DAL_MyLocation dal_myLocation = new DAL_MyLocation(FlashActivity.this);
        dal_myLocation.getMyLocation();
    }
}
