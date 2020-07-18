package com.example.acer_pc.foodnow;

import android.Manifest;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.location.Location;
import android.location.LocationManager;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.v4.app.ActivityCompat;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.example.acer_pc.foodnow.Data.Utils;
import com.example.acer_pc.foodnow.Object.ConfirmAddressDialog;
import com.google.android.gms.common.ConnectionResult;
import com.google.android.gms.common.api.GoogleApiClient;
import com.google.android.gms.location.LocationServices;
import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.MapFragment;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.model.BitmapDescriptorFactory;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.Marker;
import com.google.android.gms.maps.model.MarkerOptions;

public class ChooseAddressActivity extends AppCompatActivity implements OnMapReadyCallback, GoogleApiClient.ConnectionCallbacks, GoogleApiClient.OnConnectionFailedListener {

    ImageView btnBack, gps;
    GoogleMap mMap;
    MapFragment map;
    Marker curMarker;
    ImageView marker;
    GoogleApiClient googleApiClient;
    Location mLastLocation;
//    TextView btnConfirm;
    ConfirmAddressDialog confirmAddressDialog;
    int type;

    void init(){
        gps  = findViewById(R.id.choose_address_gps);
        map = (MapFragment) getFragmentManager().findFragmentById(R.id.choose_address_act_map);
        btnBack = findViewById(R.id.choose_address_act_btnBack);
        marker = findViewById(R.id.choose_address_act_marker);
//        btnConfirm = findViewById(R.id.choose_address_act_btnConfirm);
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_choose_address);
        init();
        if (googleApiClient == null) {
            googleApiClient = new GoogleApiClient.Builder(this)
                    .addConnectionCallbacks(this)
                    .addOnConnectionFailedListener(this)
                    .addApi(LocationServices.API)
                    .build();
        }
        map.getMapAsync(ChooseAddressActivity.this);
        confirmAddressDialog = new ConfirmAddressDialog();
        Intent intent = getIntent();
        type = intent.getIntExtra("type", -1);
        btnBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                finish();
            }
        });
        gps.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (googleApiClient != null) {
                    if (googleApiClient.isConnected()) {
                        getMyLocation();
                        LocationManager manager = (LocationManager) getSystemService(Context.LOCATION_SERVICE);
                        if (!manager.isProviderEnabled(LocationManager.GPS_PROVIDER)) {
                            AlertDialog.Builder builder = new AlertDialog.Builder(ChooseAddressActivity.this);
                            builder.setMessage("Bạn cần phải bật dịch vụ GPS thì mới có thể chọn địa chỉ !")
                                    .setCancelable(false)
                                    .setPositiveButton("Yes", new DialogInterface.OnClickListener() {
                                        public void onClick(final DialogInterface dialog, final int id) {
                                            dialog.cancel();
                                            startActivity(new Intent(android.provider.Settings.ACTION_LOCATION_SOURCE_SETTINGS));
                                        }
                                    });
                            AlertDialog alert = builder.create();
                            alert.show();
                        }
                    } else {
//                        Toast.makeText(ChooseAddressActivity.this, "!mGoogleApiClient.isConnected()", Toast.LENGTH_LONG).show();
                    }
                } else {
//                    Toast.makeText(ChooseAddressActivity.this, "mGoogleApiClient == null", Toast.LENGTH_LONG).show();
                }
            }
        });
//        btnConfirm.setOnClickListener(new View.OnClickListener() {
//            @Override
//            public void onClick(View view) {
//                Toast.makeText(ChooseAddressActivity.this, "Xác nhận địa chỉ",Toast.LENGTH_SHORT).show();
//            }
//        });
    }

    @Override
    public void onMapReady(GoogleMap googleMap) {
        mMap = googleMap;
        mMap.setMapType(GoogleMap.MAP_TYPE_NORMAL);
        mMap.setTrafficEnabled(false);
        mMap.setIndoorEnabled(false);
        mMap.setBuildingsEnabled(false);
        mMap.getUiSettings().setZoomControlsEnabled(true);
        mMap.moveCamera(CameraUpdateFactory.newLatLngZoom(new LatLng(10.908173, 106.644207),17));
        mMap.setOnCameraIdleListener(new GoogleMap.OnCameraIdleListener() {
            @Override
            public void onCameraIdle() {
                marker.setVisibility(View.GONE);
//                btnConfirm.setVisibility(View.VISIBLE);
                LatLng center = mMap.getCameraPosition().target;
                Bundle bundle = new Bundle();
                bundle.putDouble("lat", center.latitude);
                bundle.putDouble("lng", center.longitude);
                bundle.putInt("type", type);
                confirmAddressDialog.setArguments(bundle);
                confirmAddressDialog.show(getSupportFragmentManager(), "ConfirmAddressDialog");
                if(curMarker != null)
                    curMarker.remove();
                curMarker = mMap.addMarker(new MarkerOptions().position(center)
                        .title(Utils.getCompleteAddressString(ChooseAddressActivity.this,center.latitude, center.longitude))
                        .icon(BitmapDescriptorFactory.fromResource(R.drawable.ic_store_map)));
                curMarker.showInfoWindow();
            }
        });
        mMap.setOnCameraMoveListener(new GoogleMap.OnCameraMoveListener() {
            @Override
            public void onCameraMove() {
                marker.setVisibility(View.VISIBLE);
//                btnConfirm.setVisibility(View.GONE);
                confirmAddressDialog.dismiss();
                if(curMarker != null)
                    curMarker.remove();
            }
        });
    }

    private void getMyLocation() {
        if (ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION)
                != PackageManager.PERMISSION_GRANTED
                && ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_COARSE_LOCATION)
                != PackageManager.PERMISSION_GRANTED) {
            ActivityCompat.requestPermissions(ChooseAddressActivity.this, new String[]{Manifest.permission.ACCESS_FINE_LOCATION}, 1);
            return;
        }
        mLastLocation = LocationServices.FusedLocationApi.getLastLocation(googleApiClient);
        if (mLastLocation != null) {
//            Toast.makeText(ChooseAddressActivity.this, String.valueOf(mLastLocation.getLatitude()) + "\n" + String.valueOf(mLastLocation.getLongitude()), Toast.LENGTH_LONG).show();
            mMap.clear();
            mMap.moveCamera(CameraUpdateFactory.newLatLngZoom(new LatLng(mLastLocation.getLatitude(), mLastLocation.getLongitude()),17));
            if(curMarker != null)
                curMarker.remove();
            curMarker = mMap.addMarker(new MarkerOptions().position(new LatLng(mLastLocation.getLatitude(), mLastLocation.getLongitude()))
                    .title(Utils.getCompleteAddressString(ChooseAddressActivity.this,mLastLocation.getLatitude(), mLastLocation.getLongitude()))
                    .icon(BitmapDescriptorFactory.fromResource(R.drawable.ic_store_map)));
        }else{
//            btnConfirm.setVisibility(View.GONE);
//            Toast.makeText(ChooseAddressActivity.this, "mLastLocation == null", Toast.LENGTH_LONG).show();
        }
    }

    @Override
    protected void onStart() {
        googleApiClient.connect();
        super.onStart();
    }

    @Override
    protected void onStop() {
        googleApiClient.disconnect();
        super.onStop();
    }

    @Override
    public void onConnected(@Nullable Bundle bundle) {
        getMyLocation();
    }

    @Override
    public void onConnectionSuspended(int i) {
//        Toast.makeText(ChooseAddressActivity.this, "onConnectionSuspended: " + String.valueOf(i), Toast.LENGTH_LONG).show();
    }

    @Override
    public void onConnectionFailed(@NonNull ConnectionResult connectionResult) {

    }
}
