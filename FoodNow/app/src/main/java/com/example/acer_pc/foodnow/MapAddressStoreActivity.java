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
    String storeName;
    private SimpleLocation location;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_map_address_store);
        txtAddress = findViewById(R.id.map_address_store);
        mapFragment = (MapFragment) getFragmentManager().findFragmentById(R.id.map);
        intent = getIntent();
//        lat = intent.getDoubleExtra("lat", 10.800313);
//        lng = intent.getDoubleExtra("lng", 106.626781);


        location = new SimpleLocation(this, false, false, 100, true);
//        if (!location.hasLocationEnabled()) {
//            SimpleLocation.openSettings(this);
//        }
//        else{
        lat = location.getLatitude();
        lng = location.getLongitude();
//        }

        storeName = intent.getStringExtra("name");
        if (storeName == null)
            storeName = "Store name";
        mapFragment.getMapAsync(MapAddressStoreActivity.this);
        txtAddress.setText(Utils.getCompleteAddressString(MapAddressStoreActivity.this, lat, lng));
        btnBack = findViewById(R.id.map_address_back);
        btnBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                finish();
            }
        });


        location.setListener(new SimpleLocation.Listener() {

            public void onPositionChanged() {
                lat = location.getLatitude();
                lng = location.getLongitude();
                txtAddress.setText(Utils.getCompleteAddressString(MapAddressStoreActivity.this, lat, lng));
                Toast.makeText(MapAddressStoreActivity.this, "Map updated !", Toast.LENGTH_SHORT).show();
                mapFragment.getMapAsync(MapAddressStoreActivity.this);
            }

        });


//        final LocationManager locationManager = (LocationManager) this.getSystemService(Context.LOCATION_SERVICE);
//
//        // Define a listener that responds to location updates
//        final LocationListener locationListener = new LocationListener() {
//            public void onLocationChanged(Location location) {
//                // Called when a new location is found by the network location provider.
//                lat = location.getLatitude();
//                lng = location.getLongitude();
//                txtAddress.setText(getCompleteAddressString(lat, lng));
//                Toast.makeText(MapAddressStoreActivity.this, "Map updated !", Toast.LENGTH_SHORT).show();
//                mapFragment.getMapAsync(MapAddressStoreActivity.this);
//            }
//
//            public void onStatusChanged(String provider, int status, Bundle extras) {
//            }
//
//            public void onProviderEnabled(String provider) {
//            }
//
//            public void onProviderDisabled(String provider) {
//            }
//        };
        final TelephonyManager telephonyManager = (TelephonyManager)getSystemService(Context.TELEPHONY_SERVICE);

        // Register the listener with the Location Manager to receive location updates
        Timer timer = new Timer();
        timer.scheduleAtFixedRate(new TimerTask() {
            @Override
            public void run() {
                runOnUiThread(new Runnable() {
                    @Override
                    public void run() {
                        if (ActivityCompat.checkSelfPermission(MapAddressStoreActivity.this, Manifest.permission.ACCESS_FINE_LOCATION) != PackageManager.PERMISSION_GRANTED && ActivityCompat.checkSelfPermission(MapAddressStoreActivity.this, Manifest.permission.ACCESS_COARSE_LOCATION) != PackageManager.PERMISSION_GRANTED) {
                            // TODO: Consider calling
                            //    ActivityCompat#requestPermissions
                            // here to request the missing permissions, and then overriding
                            //   public void onRequestPermissionsResult(int requestCode, String[] permissions,
                            //                                          int[] grantResults)
                            // to handle the case where the user grants the permission. See the documentation
                            // for ActivityCompat#requestPermissions for more details.
                            Toast.makeText(MapAddressStoreActivity.this, "ko co quyen ", Toast.LENGTH_SHORT).show();
                            return;
                        }
                        Toast.makeText(MapAddressStoreActivity.this, "tim location", Toast.LENGTH_SHORT).show();
                        //locationManager.requestLocationUpdates(LocationManager.NETWORK_PROVIDER, 0, 0, locationListener);
                        //Location location2 =  locationManager.getLastKnownLocation(LocationManager.NETWORK_PROVIDER);
                        // Called when a new location is found by the network location provider.
                        GsmCellLocation location2 = (GsmCellLocation) telephonyManager.getCellLocation();
                        Log.i("location", telephonyManager.getNetworkOperator());
                        if(RqsLocation(location2.getCid(), location2.getLac())){
                            txtAddress.setText(Utils.getCompleteAddressString(MapAddressStoreActivity.this, lat, lng));
                            Toast.makeText(MapAddressStoreActivity.this, "Map updated !", Toast.LENGTH_SHORT).show();
                            mapFragment.getMapAsync(MapAddressStoreActivity.this);
                        }else{
                            Toast.makeText(MapAddressStoreActivity.this, "Can't find Location!", Toast.LENGTH_SHORT).show();
                        }
                    }
                });
            }
        }, 0, 100);


    }

    private Boolean RqsLocation(int cid, int lac){

        Boolean result = false;

        String urlmmap = "http://www.google.com/glm/mmap";

        try {
            URL url = new URL(urlmmap);
            URLConnection conn = url.openConnection();
            HttpURLConnection httpConn = (HttpURLConnection) conn;
            httpConn.setRequestMethod("POST");
            httpConn.setDoOutput(true);
            httpConn.setDoInput(true);
            httpConn.connect();

            OutputStream outputStream = httpConn.getOutputStream();
            WriteData(outputStream, cid, lac);

            InputStream inputStream = httpConn.getInputStream();
            DataInputStream dataInputStream = new DataInputStream(inputStream);

            dataInputStream.readShort();
            dataInputStream.readByte();
            int code = dataInputStream.readInt();
            if (code == 0) {
                lat = dataInputStream.readInt();
                lng = dataInputStream.readInt();
                result = true;

            }
            Log.i("location", "\nLocation :" + cid + " + " + lac);
            Log.i("location", "\nCell location :" + lat + " + " + lng);
        } catch (IOException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }

        return result;

    }

    private void WriteData(OutputStream out, int cid, int lac) throws IOException {
        DataOutputStream dataOutputStream = new DataOutputStream(out);
        dataOutputStream.writeShort(21);
        dataOutputStream.writeLong(0);
        dataOutputStream.writeUTF("en");
        dataOutputStream.writeUTF("Android");
        dataOutputStream.writeUTF("1.0");
        dataOutputStream.writeUTF("Web");
        dataOutputStream.writeByte(27);
        dataOutputStream.writeInt(0);
        dataOutputStream.writeInt(0);
        dataOutputStream.writeInt(3);
        dataOutputStream.writeUTF("");

        dataOutputStream.writeInt(cid);
        dataOutputStream.writeInt(lac);

        dataOutputStream.writeInt(0);
        dataOutputStream.writeInt(0);
        dataOutputStream.writeInt(0);
        dataOutputStream.writeInt(0);
        dataOutputStream.flush();
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

    @Override
    protected void onResume() {
        super.onResume();
        location.beginUpdates();
    }

    @Override
    protected void onPause() {
        location.endUpdates();
        super.onPause();
    }
}
