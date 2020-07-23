package com.example.acer_pc.foodnow;

import android.app.Activity;
import android.app.Notification;
import android.app.NotificationChannel;
import android.app.NotificationManager;
import android.app.PendingIntent;
import android.app.TaskStackBuilder;
import android.content.Context;
import android.content.Intent;
import android.net.wifi.WifiManager;
import android.os.Build;
import android.support.annotation.NonNull;
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
import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.FirebaseApp;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;
import com.google.firebase.iid.FirebaseInstanceId;
import com.google.firebase.iid.InstanceIdResult;

import java.util.HashMap;
import java.util.Map;
import java.util.Timer;
import java.util.TimerTask;

import okhttp3.internal.Util;

import static android.app.NotificationManager.IMPORTANCE_DEFAULT;
import static com.example.acer_pc.foodnow.LoginActivity.user;

public class MainActivity extends AppCompatActivity {

    BottomNavigationView navView;
    Fragment fragmentHome, fragmentCart, fragmentBill, fragmentAccount;
//    boolean mShiftingMode;

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
//        Toast.makeText(getApplicationContext(), "Resume !" + Utils.getCurrentTime(), Toast.LENGTH_SHORT).show();
        FirebaseInstanceId.getInstance().getInstanceId().addOnCompleteListener(new OnCompleteListener<InstanceIdResult>() {
            @Override
            public void onComplete(@NonNull Task<InstanceIdResult> task) {
                if (!task.isSuccessful()) {
                    Log.i("response", "getInstanceId failed", task.getException());
                    return;
                }
                // Get new Instance ID token
                String token = task.getResult().getToken();
                // Log and toast
                Log.i("response", token);
                FirebaseDatabase database;
                DatabaseReference myRef;
                FirebaseApp.initializeApp(getApplicationContext());
                database = FirebaseDatabase.getInstance();
                if(user != null) {
                    myRef = database.getReference("token_list/" + user.getId());
                    Map<String, String> token_user = new HashMap<>();
                    token_user.put("idUser", user.getId());
                    token_user.put("token_divice", token);
                    myRef.setValue(token_user);
                }
            }
        });

        super.onResume();
    }

}
