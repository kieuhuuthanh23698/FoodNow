package com.example.acer_pc.foodnow;

import android.Manifest;
import android.annotation.SuppressLint;
import android.content.Context;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.location.Address;
import android.location.Geocoder;
import android.location.Location;
import android.location.LocationListener;
import android.location.LocationManager;
import android.support.v4.app.ActivityCompat;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.telephony.TelephonyManager;
import android.telephony.gsm.GsmCellLocation;
import android.util.Log;
import android.view.View;
import android.widget.TextView;
import android.widget.Toast;

import com.example.acer_pc.foodnow.Data.Utils;
import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.MapFragment;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.model.BitmapDescriptorFactory;
import com.google.android.gms.maps.model.CameraPosition;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.MarkerOptions;

import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.URL;
import java.net.URLConnection;
import java.sql.Time;
import java.util.List;
import java.util.Locale;
import java.util.Timer;
import java.util.TimerTask;

import im.delight.android.location.SimpleLocation;

public class MapAddressStoreActivity extends AppCompatActivity implements OnMapReadyCallback {

    private GoogleMap mMap;
    TextView txtAddress, btnBack;
    MapFragment mapFragment;
    Intent intent;
    double lat, lng;
    String storeName, address;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_map_address_store);
        txtAddress = findViewById(R.id.map_address_store);
        mapFragment = (MapFragment) getFragmentManager().findFragmentById(R.id.map);
        intent = getIntent();
        lat = intent.getDoubleExtra("lat", 10.800313);
        lng = intent.getDoubleExtra("lng", 106.626781);
        storeName = intent.getStringExtra("name");
        if (storeName == null)
            storeName = "Store name";
        address = intent.getStringExtra("dia_chi");
        if (address == null)
            address = "";
        mapFragment.getMapAsync(MapAddressStoreActivity.this);
        txtAddress.setText(address);
        btnBack = findViewById(R.id.map_address_back);
        btnBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                finish();
            }
        });
        Geocoder geocoder = new Geocoder(this);
//        geocoder.
    }

    @Override
    public
    void onMapReady(GoogleMap googleMap) {
        mMap = googleMap;
        mMap.setMapType(GoogleMap.MAP_TYPE_NORMAL);
        mMap.setTrafficEnabled(false);
        mMap.setIndoorEnabled(false);
        mMap.setBuildingsEnabled(false);
        mMap.getUiSettings().setZoomControlsEnabled(true);

        final LatLng hcmus = new LatLng(lat, lng);
        mMap.moveCamera(CameraUpdateFactory.newLatLngZoom(hcmus,18));
        mMap.addMarker(new MarkerOptions()
                .position(hcmus)
                .title(storeName)
                .icon(BitmapDescriptorFactory.fromResource(R.drawable.ic_store_map))
        ).showInfoWindow();

        mMap.moveCamera(CameraUpdateFactory.newCameraPosition(new CameraPosition.Builder()
                .target(googleMap.getCameraPosition().target)
                .zoom(18)
                .bearing(30)
                .tilt(45)
                .build()));
    }
}
