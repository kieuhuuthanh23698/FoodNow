package com.example.acer_pc.foodnow;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.net.wifi.WifiManager;
import android.support.design.widget.BottomNavigationView;
import android.support.design.widget.CoordinatorLayout;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentTransaction;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.MenuItem;
import android.widget.Toast;

import com.example.acer_pc.foodnow.Common.BottomNavigationBehavior;
import com.example.acer_pc.foodnow.Common.BottomNavigationViewHelper;
import com.example.acer_pc.foodnow.Data.Utils;

import java.util.Timer;
import java.util.TimerTask;

import okhttp3.internal.Util;

public class MainActivity extends AppCompatActivity {

    BottomNavigationView navView;
    Fragment fragmentHome, fragmentCart, fragmentBill, fragmentAccount;
//    boolean mShiftingMode;

    TimerTask timerTaskCheckWifi;
    Timer timer;
    WifiManager wifiManager;
    int count = 0;
    public static boolean loaded;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        navView = findViewById(R.id.nav_view);
        navView.setOnNavigationItemSelectedListener(mOnNavigationItemSelectedListener);
        navView.setSelectedItemId(R.id.navigation_home);
        CoordinatorLayout.LayoutParams layoutParams = (CoordinatorLayout.LayoutParams) navView.getLayoutParams();
        layoutParams.setBehavior(new BottomNavigationBehavior());
        BottomNavigationViewHelper.disableShiftMode(navView);
    }
    private BottomNavigationView.OnNavigationItemSelectedListener mOnNavigationItemSelectedListener = new BottomNavigationView.OnNavigationItemSelectedListener() {
        @Override
        public boolean onNavigationItemSelected(MenuItem item) {
            Fragment fragment;
            switch (item.getItemId()) {
                case R.id.navigation_home:
                    if(fragmentHome == null)
                        fragmentHome = new HomeFragment();
                    navView.getMenu().getItem(0).setChecked(true);
                    loadFragment(fragmentHome);
                    Toast.makeText(getApplicationContext(), "fragmentHome", Toast.LENGTH_SHORT).show();
                    return true;
                case R.id.navigation_cart:
                    if(fragmentCart == null)
                        fragmentCart = new CartFragment();
                    navView.getMenu().getItem(1).setChecked(true);
                    loadFragment(fragmentCart);
                    Toast.makeText(getApplicationContext(), "fragmentCart", Toast.LENGTH_SHORT).show();
                    return true;
                case R.id.navigation_bill:
                    if(fragmentBill == null)
                        fragmentBill = new BillFragment();
                    navView.getMenu().getItem(2).setChecked(true);
                    loadFragment(fragmentBill);
                    Toast.makeText(getApplicationContext(), "fragmentBill", Toast.LENGTH_SHORT).show();
                    return true;
                case R.id.navigation_account:
                    if(fragmentAccount == null)
                        fragmentAccount = new UserFragment();
                    navView.getMenu().getItem(3).setChecked(true);
                    loadFragment(fragmentAccount);
                    Toast.makeText(getApplicationContext(), "fragmentAcount", Toast.LENGTH_SHORT).show();
                    return true;
            }
            return false;
        }
    };

    private void loadFragment(Fragment fragment) {
        FragmentTransaction transaction = getSupportFragmentManager().beginTransaction();
        transaction.replace(R.id.nav_host_fragment, fragment);
        transaction.setTransition(FragmentTransaction.TRANSIT_FRAGMENT_FADE);
        transaction.addToBackStack(null);
        transaction.commit();
    }

    @Override
    protected void onResume() {
        loaded = false;
        Toast.makeText(getApplicationContext(), "Resume !" + Utils.getCurrentTime(), Toast.LENGTH_SHORT).show();
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
        super.onResume();
    }

}
