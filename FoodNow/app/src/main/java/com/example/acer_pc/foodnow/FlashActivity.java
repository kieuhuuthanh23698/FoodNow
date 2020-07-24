package com.example.acer_pc.foodnow;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.net.wifi.WifiManager;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.widget.ImageView;

import com.example.acer_pc.foodnow.Common.DefineVarible;
import com.example.acer_pc.foodnow.Data.DAL_MyLocation;
import com.example.acer_pc.foodnow.Data.Utils;
import com.facebook.login.LoginManager;

import java.util.Timer;
import java.util.TimerTask;

import static com.example.acer_pc.foodnow.MainActivity.loaded;

public class FlashActivity extends AppCompatActivity {

    TimerTask timerTaskCheckWifi;
    Timer timer;
    WifiManager wifiManager;
    int count = 0;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_flash);
        LoginManager loginManager = LoginManager.getInstance();
        if(loginManager != null)
            loginManager.logOut();
//        if(timerTaskCheckWifi == null) {
//            timerTaskCheckWifi = new TimerTask() {
//                @Override
//                public void run() {
//                    runOnUiThread(new Runnable() {
//                        @Override
//                        public void run() {
//                            wifiManager = (WifiManager) getApplicationContext().getSystemService(Context.WIFI_SERVICE);
//                            if (!loaded) {
//                                if (wifiManager.getWifiState() != WifiManager.WIFI_STATE_ENABLED || !Utils.getConnectivityStatus(getApplicationContext())) {
//                                    loaded = true;
//                                    Log.i("wifi", "Wifi is not connected ! " + count);
//                                    Intent intent = new Intent(getApplicationContext(), CheckWifiActivity.class);
//                                    startActivity(intent);
//                                } else {
//                                    Log.i("wifi", "Wifi is connected ! " + count);
//                                }
//                            } else {
//                                    Log.i("wifi", "Not check wifi ! " + count);
//                            }
//                            count++;
//                        }
//                    });
//                }
//            };
//            timer = new Timer();
//            timer.scheduleAtFixedRate(timerTaskCheckWifi, 0, 100);
//        } else {
//            timerTaskCheckWifi.run();
//        }
//        DAL_MyLocation dal_myLocation = new DAL_MyLocation(FlashActivity.this);
//        dal_myLocation.getMyLocation();
        Intent intent = new Intent(FlashActivity.this, MainActivity.class);
        startActivity(intent);
    }
}
