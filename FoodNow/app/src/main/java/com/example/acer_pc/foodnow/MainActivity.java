package com.example.acer_pc.foodnow;

import android.app.Activity;
import android.content.Intent;
import android.support.design.widget.BottomNavigationView;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentTransaction;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.MenuItem;

import java.util.Timer;

public class MainActivity extends AppCompatActivity {

    BottomNavigationView navView;
    Fragment fragmentHome, fragmentCart, fragmentBill, fragmentAccount;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        navView = findViewById(R.id.nav_view);
        navView.setOnNavigationItemSelectedListener(mOnNavigationItemSelectedListener);
        navView.setSelectedItemId(R.id.navigation_home);


        Timer timer = new Timer();
//        timer.scheduleAtFixedRate(new TimerTask() {
//
//            @Override
//            public void run() {
//                changeSlider();
//            }
//        }, 2000, 4000);
    }
    private BottomNavigationView.OnNavigationItemSelectedListener
            mOnNavigationItemSelectedListener
            = new BottomNavigationView.OnNavigationItemSelectedListener() {
        @Override
        public boolean onNavigationItemSelected(MenuItem item) {
            Fragment fragment;
            switch (item.getItemId()) {
                case R.id.navigation_home:
//                    fragment = new HomeFragment();
//                    loadFragment(fragment);
                    if(fragmentHome == null)
                        fragmentHome = new HomeFragment();
                    loadFragment(fragmentHome);
                    return true;
                case R.id.navigation_cart:
//                    fragment = new CartFragment();
//                    loadFragment(fragment);
                    if(fragmentCart == null)
                        fragmentCart = new CartFragment();
                    loadFragment(fragmentCart);
                    return true;
                case R.id.navigation_bill:
//                    fragment = new BillFragment();
//                    loadFragment(fragment);
                    if(fragmentBill == null)
                        fragmentBill = new BillFragment();
                    loadFragment(fragmentBill);
                    return true;
                case R.id.navigation_account:
                    fragment = new UserFragment();
                    loadFragment(fragment);
                    return true;
            }
            return false;
        }
    };


//    public static void goToActivity(Intent intent){
//
//    }

    private void loadFragment(Fragment fragment) {
        FragmentTransaction transaction = getSupportFragmentManager().beginTransaction();
        transaction.replace(R.id.nav_host_fragment, fragment);
        transaction.setTransition(FragmentTransaction.TRANSIT_FRAGMENT_OPEN);
        transaction.addToBackStack(null);
        transaction.commit();
    }
}
