package com.example.acer_pc.foodnow;

import android.Manifest;
import android.app.Activity;
import android.app.Dialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.graphics.drawable.ColorDrawable;
import android.location.Location;
import android.location.LocationManager;
import android.net.wifi.WifiManager;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.v4.app.ActivityCompat;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.view.Window;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.example.acer_pc.foodnow.Common.DefineVarible;
import com.example.acer_pc.foodnow.Data.DAL_MyLocation;
import com.example.acer_pc.foodnow.Data.Utils;
import com.facebook.login.LoginManager;
import com.google.android.gms.common.ConnectionResult;
import com.google.android.gms.common.api.GoogleApiClient;
import com.google.android.gms.location.LocationListener;
import com.google.android.gms.location.LocationServices;
import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.model.BitmapDescriptorFactory;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.MarkerOptions;

import java.util.Timer;
import java.util.TimerTask;

import im.delight.android.location.SimpleLocation;

import static com.example.acer_pc.foodnow.MainActivity.loaded;

public class FlashActivity extends AppCompatActivity implements LocationListener{
    private Dialog dialogConfirmOpenGPS;
    private SimpleLocation location;
    private boolean dialogShow;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_flash);
        LoginManager loginManager = LoginManager.getInstance();
        if(loginManager != null)
            loginManager.logOut();

        location = new SimpleLocation(this, false, false, 100, true);

        dialogConfirmOpenGPS = new Dialog(FlashActivity.this);
        dialogConfirmOpenGPS.requestWindowFeature(Window.FEATURE_NO_TITLE);
        dialogConfirmOpenGPS.getWindow().setBackgroundDrawable(new ColorDrawable(android.graphics.Color.TRANSPARENT));
        dialogConfirmOpenGPS.setContentView(R.layout.notification_dialog);
        TextView content, btnConfirm;
        content = dialogConfirmOpenGPS.findViewById(R.id.notication_content);
        content.setText("Bạn nên bật dịch vụ GPS để có được trải nghiệm tốt hơn");
        btnConfirm = dialogConfirmOpenGPS.findViewById(R.id.notication_btn_confirm);
        btnConfirm.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                dialogConfirmOpenGPS.dismiss();
                SimpleLocation.openSettings(FlashActivity.this);
            }
        });
        dialogConfirmOpenGPS.setCanceledOnTouchOutside(false);
        dialogConfirmOpenGPS.setOnDismissListener(new DialogInterface.OnDismissListener() {
            @Override
            public void onDismiss(DialogInterface dialogInterface) {
                dialogShow = false;
            }
        });

        DAL_MyLocation.address = Utils.getCompleteAddressString(FlashActivity.this, DAL_MyLocation.latitude, DAL_MyLocation.longtitude);
        Intent intent = new Intent(FlashActivity.this, MainActivity.class);
        startActivity(intent);
        finish();

        location.setListener(new SimpleLocation.Listener() {
            public void onPositionChanged() {
                Toast.makeText(FlashActivity.this, "Đang tìm địa chỉ...", Toast.LENGTH_SHORT).show();
                if(location != null) {
                    DAL_MyLocation.latitude = location.getLatitude();
                    DAL_MyLocation.longtitude = location.getLongitude();
                    DAL_MyLocation.address = Utils.getCompleteAddressString(FlashActivity.this, location.getLatitude(), location.getLongitude());
                    Intent intent = new Intent(FlashActivity.this, MainActivity.class);
                    startActivity(intent);
                    finish();
                } else {
                    checkGSP();
                }
            }
        });
    }

    private void checkGSP(){
        if (!location.hasLocationEnabled()) {
            requestOpenGPS();
        }
    }

    private void requestOpenGPS(){
//        if(!dialogShow) {
            location.beginUpdates();
            dialogConfirmOpenGPS.show();
//        }
    }

    @Override
    protected void onResume() {
        super.onResume();
        location.beginUpdates();
//        if (!location.hasLocationEnabled()) {
            requestOpenGPS();
//        }
    }

    @Override
    protected void onDestroy() {
        super.onDestroy();
        location.endUpdates();
    }

    @Override
    public void onLocationChanged(Location location) {
        Log.i("response", location.toString());
    }
}
