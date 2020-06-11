package com.example.acer_pc.foodnow;

import android.Manifest;
import android.annotation.SuppressLint;
import android.app.Activity;
import android.app.Service;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.location.Criteria;
import android.location.Location;
import android.location.LocationListener;
import android.location.LocationManager;
import android.net.Uri;
import android.net.wifi.WifiManager;
import android.os.IBinder;
import android.provider.Settings;
import android.support.annotation.Nullable;
import android.support.v4.app.ActivityCompat;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.telephony.TelephonyManager;
import android.telephony.gsm.GsmCellLocation;
import android.util.Log;
import android.widget.TextView;
import android.widget.Toast;
//
//import org.apache.http.HttpResponse;
//import org.apache.http.client.HttpClient;
//import org.apache.http.client.methods.HttpGet;
//import org.apache.http.impl.client.DefaultHttpClient;
//import org.apache.http.util.EntityUtils;

public class Main2Activity extends AppCompatActivity {

    public class OpenCellID {
        String mcc; //Mobile Country Code
        String mnc; //mobile network code
        String cellid; //Cell ID
        String lac; //Location Area Code

        Boolean error;
        String strURLSent;
        String GetOpenCellID_fullresult;

        String latitude;
        String longitude;

        public Boolean isError() {
            return error;
        }

        public void setMcc(String value) {
            mcc = value;
        }

        public void setMnc(String value) {
            mnc = value;
        }

        public void setCallID(int value) {
            cellid = String.valueOf(value);
        }

        public void setCallLac(int value) {
            lac = String.valueOf(value);
        }

        public String getLocation() {
            return (latitude + " : " + longitude);
        }

        public void groupURLSent() {
            strURLSent =
                    "http://www.opencellid.org/cell/get?mcc=" + mcc
                            + "&mnc=" + mnc
                            + "&cellid=" + cellid
                            + "&lac=" + lac
                            + "&fmt=txt";
        }

        public String getstrURLSent() {
            return strURLSent;
        }

        public String getGetOpenCellID_fullresult() {
            return GetOpenCellID_fullresult;
        }

        public void GetOpenCellID() throws Exception {
            groupURLSent();
//            HttpClient client = new DefaultHttpClient();
//            HttpGet request = new HttpGet(strURLSent);
//            HttpResponse response = client.execute(request);
//            GetOpenCellID_fullresult = EntityUtils.toString(response.getEntity());
            spliteResult();
        }

        private void spliteResult() {
            if (GetOpenCellID_fullresult.equalsIgnoreCase("err")) {
                error = true;
            } else {
                error = false;
                String[] tResult = GetOpenCellID_fullresult.split(",");
                latitude = tResult[0];
                longitude = tResult[1];
            }
        }
    }

    int myLatitude, myLongitude;
    OpenCellID openCellID;


    AppLocationService appLocationService;

    /** Called when the activity is first created. */
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main2);
        TextView textGsmCellLocation = (TextView) findViewById(R.id.gsmcelllocation);
        TextView textMCC = (TextView) findViewById(R.id.mcc);
        TextView textMNC = (TextView) findViewById(R.id.mnc);
        TextView textCID = (TextView) findViewById(R.id.cid);
        TextView textLAC = (TextView) findViewById(R.id.lac);
        TextView textGeo = (TextView) findViewById(R.id.geo);
        TextView textRemark = (TextView) findViewById(R.id.remark);

        //retrieve a reference to an instance of TelephonyManager
        TelephonyManager telephonyManager = (TelephonyManager) getSystemService(Context.TELEPHONY_SERVICE);
        if (ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION) != PackageManager.PERMISSION_GRANTED && ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_COARSE_LOCATION) != PackageManager.PERMISSION_GRANTED) {
            // TODO: Consider calling
            //    ActivityCompat#requestPermissions
            // here to request the missing permissions, and then overriding
            //   public void onRequestPermissionsResult(int requestCode, String[] permissions,
            //                                          int[] grantResults)
            // to handle the case where the user grants the permission. See the documentation
            // for ActivityCompat#requestPermissions for more details.
            return;
        }
        GsmCellLocation cellLocation = (GsmCellLocation) telephonyManager.getCellLocation();

        String networkOperator = telephonyManager.getNetworkOperator();
        String mcc = networkOperator.substring(0, 3);
        String mnc = networkOperator.substring(3);
        textMCC.setText("mcc: " + mcc);
        textMNC.setText("mnc: " + mnc);

        int cid = cellLocation.getCid();
        int lac = cellLocation.getLac();
        textGsmCellLocation.setText(cellLocation.toString());
        textCID.setText("gsm cell id: " + String.valueOf(cid));
        textLAC.setText("gsm location area code: " + String.valueOf(lac));

        openCellID = new OpenCellID();
        String status = android.provider.Settings.Secure.getString(getContentResolver(), Settings.Secure.LOCATION_PROVIDERS_ALLOWED);
        if(!status.contains("gps")){ //if gps is disabled
            final Intent poke = new Intent();
            poke.setClassName("com.android.settings", "com.android.settings.widget.SettingsAppWidgetProvider");
            poke.addCategory(Intent.CATEGORY_ALTERNATIVE);
            poke.setData(Uri.parse("3"));
            sendBroadcast(poke);
        }
        appLocationService = new AppLocationService(Main2Activity.this);
        Location nwLocation = appLocationService.getLocation(LocationManager.PASSIVE_PROVIDER, Main2Activity.this);


        if (nwLocation != null) {
            double latitude = nwLocation.getLatitude();
            double longitude = nwLocation.getLongitude();
            Toast.makeText(
                    getApplicationContext(),
                    "Mobile Location (NW): \nLatitude: " + latitude
                            + "\nLongitude: " + longitude,
                    Toast.LENGTH_LONG).show();
        } else {
            showSettingsAlert("NETWORK");
        }

        openCellID.setMcc(mcc);
        openCellID.setMnc(mnc);
        openCellID.setCallID(cid);
        openCellID.setCallLac(lac);
        try {
//            openCellID.GetOpenCellID();
//
//            if(!openCellID.isError()){
//                textGeo.setText(openCellID.getLocation());
//
//                textRemark.setText( "nn"
//                        + "URL sent: n" + openCellID.getstrURLSent() + "nn"
//                        + "response: n" + openCellID.GetOpenCellID_fullresult);
//            }else{
//                textGeo.setText("Error");
//            }
//            double latitude = Double.parseDouble(PreferencesManager.getInstance().getLocationLongitude());
//            double longitude = Double.parseDouble(PreferencesManager.getInstance().getLocationLatitude());
            Log.i("location", openCellID.getLocation());
        } catch (Exception e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
            textGeo.setText("Exception: " + e.toString());
        }
    }

    public void showSettingsAlert(String provider) {
        AlertDialog.Builder alertDialog = new AlertDialog.Builder(
                Main2Activity.this);

        alertDialog.setTitle(provider + " SETTINGS");

        alertDialog
                .setMessage(provider + " is not enabled! Want to go to settings menu?");

        alertDialog.setPositiveButton("Settings",
                new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int which) {
                        Intent intent = new Intent(
                                Settings.ACTION_LOCATION_SOURCE_SETTINGS);
                        Main2Activity.this.startActivity(intent);
                    }
                });

        alertDialog.setNegativeButton("Cancel",
                new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int which) {
                        dialog.cancel();
                    }
                });

        alertDialog.show();
    }

    public class AppLocationService extends Service implements LocationListener {

        protected LocationManager locationManager;
        WifiManager wifiManager;
        Location location;

        private static final long MIN_DISTANCE_FOR_UPDATE = 10;
        private static final long MIN_TIME_FOR_UPDATE = 1000 * 60 * 2;

        public AppLocationService(Context context) {
//            locationManager = (LocationManager) context.getSystemService(Context.LOCATION_SERVICE);
            locationManager = (LocationManager) context.getSystemService(Context.LOCATION_SERVICE);
            wifiManager = (WifiManager) context.getSystemService(Context.WIFI_SERVICE);
        }

        public Location getLocation(String provider, Context context) {
            if (wifiManager.getWifiState() == WifiManager.WIFI_STATE_ENABLED) {
//                if (locationManager.isProviderEnabled(LocationManager.NETWORK_PROVIDER)) {
                    if (ActivityCompat.checkSelfPermission(context, Manifest.permission.ACCESS_FINE_LOCATION) != PackageManager.PERMISSION_GRANTED && ActivityCompat.checkSelfPermission(context, Manifest.permission.ACCESS_COARSE_LOCATION) != PackageManager.PERMISSION_GRANTED) {
                        // TODO: Consider calling
                        //    ActivityCompat#requestPermissions
                        // here to request the missing permissions, and then overriding
                        //   public void onRequestPermissionsResult(int requestCode, String[] permissions,
                        //                                          int[] grantResults)
                        // to handle the case where the user grants the permission. See the documentation
                        // for ActivityCompat#requestPermissions for more details.
                        return null;
                    }
//                    locationManager.requestLocationUpdates(LocationManager.NETWORK_PROVIDER, MIN_TIME_FOR_UPDATE, MIN_DISTANCE_FOR_UPDATE, this);
                    if (locationManager != null) {
//                    locationManager.requestLocationUpdates(LocationManager.GPS_PROVIDER, 0, 0, this);
//                    location = locationManager.getLastKnownLocation(LocationManager.GPS_PROVIDER);
//                        Criteria crit = new Criteria();
//                        crit.setAccuracy( Criteria.ACCURACY_COARSE );
//                        provider = locationManager.getBestProvider(crit, false);
//                        locationManager.requestLocationUpdates(provider, 120000, 10, this);
//                        location = locationManager.getLastKnownLocation(LocationManager.NETWORK_PROVIDER);
////                    locationManager.requestLocationUpdates(LocationManager.PASSIVE_PROVIDER, 0, 0, this);
////                    location = locationManager.getLastKnownLocation(LocationManager.PASSIVE_PROVIDER);
//                        return location;

                        boolean gps_enabled = false;
                        boolean network_enabled = false;

                        gps_enabled = locationManager.isProviderEnabled(LocationManager.GPS_PROVIDER);
                        network_enabled = locationManager.isProviderEnabled(LocationManager.NETWORK_PROVIDER);
                        Location net_loc = null, gps_loc = null, finalLoc = null;

                        if (gps_enabled) {
                            gps_loc = locationManager.getLastKnownLocation(LocationManager.GPS_PROVIDER);
                            locationManager.requestLocationUpdates(LocationManager.GPS_PROVIDER, 60000, 10, this);
                        }
                        if (network_enabled){
                            net_loc = locationManager.getLastKnownLocation(LocationManager.NETWORK_PROVIDER);
                            locationManager.requestLocationUpdates(LocationManager.NETWORK_PROVIDER, 60000, 10, this);
                        }

                        if (gps_loc != null && net_loc != null) {

                            //smaller the number more accurate result will
                            if (gps_loc.getAccuracy() > net_loc.getAccuracy())
                                finalLoc = net_loc;
                            else
                                finalLoc = gps_loc;

                            // I used this just to get an idea (if both avail, its upto you which you want to take as I've taken location with more accuracy)

                        } else {

                            if (gps_loc != null) {
                                finalLoc = gps_loc;
                            } else if (net_loc != null) {
                                finalLoc = net_loc;
                            }
                        }
                        return finalLoc;
                    }
//                }
            }
            return null;
        }

        @Override
        public void onLocationChanged(Location location) {
        }

        @Override
        public void onProviderDisabled(String provider) {
        }

        @Override
        public void onProviderEnabled(String provider) {
        }

        @Override
        public void onStatusChanged(String provider, int status, Bundle extras) {
        }

        @Override
        public IBinder onBind(Intent arg0) {
            return null;
        }
    }
}
