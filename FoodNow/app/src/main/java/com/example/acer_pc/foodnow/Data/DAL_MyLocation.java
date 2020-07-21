package com.example.acer_pc.foodnow.Data;

import android.Manifest;
import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.location.Location;
import android.support.v4.app.ActivityCompat;
import android.telephony.TelephonyManager;
import android.telephony.gsm.GsmCellLocation;
import android.util.Log;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.example.acer_pc.foodnow.FlashActivity;
import com.example.acer_pc.foodnow.MainActivity;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class DAL_MyLocation {
    private Context context;
    public static double latitude = 10.881654;
    public static double longtitude = 106.648632;
    public static String address = "";
    private String mcc = "", mnc = "", lac = "", cellid = "", url;

    public DAL_MyLocation(Context context) {
        this.context = context;
        TelephonyManager telephonyManager = (TelephonyManager) this.context.getSystemService(Context.TELEPHONY_SERVICE);
        if (ActivityCompat.checkSelfPermission(this.context, Manifest.permission.ACCESS_FINE_LOCATION) != PackageManager.PERMISSION_GRANTED && ActivityCompat.checkSelfPermission(this.context, Manifest.permission.ACCESS_COARSE_LOCATION) != PackageManager.PERMISSION_GRANTED) {
            return;
        }
        GsmCellLocation cellLocation = (GsmCellLocation) telephonyManager.getCellLocation();
        String networkOperator = telephonyManager.getNetworkOperator();
        if(!networkOperator.equals("")) {
            this.mcc = networkOperator.substring(0, 3);
            this.mnc = networkOperator.substring(3);
            this.cellid = String.valueOf(cellLocation.getCid());
            this.lac = String.valueOf(cellLocation.getLac());
        }
        this.url = "https://api.mylnikov.org/geolocation/cell?v=1.1&data=open&mcc=" + this.mcc + "&mnc=" + this.mnc + "&lac=" + this.lac+ "&cellid=" + this.cellid;
    }

    public void getMyLocation(){
        Log.i("response", Utils.getCurrentTime() + " : start request get current location");
        StringRequest insertRequest = new StringRequest(
                Request.Method.POST,//method
                url,//url
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        //xử lý kết quả khi request thành công
                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            String result = jsonObject.get("result").toString();
                            if(result.equals("200")) {
                                JSONObject data = jsonObject.getJSONObject("data");
                                String lat = data.get("lat").toString();
                                String lng = data.get("lon").toString();
                                latitude = Double.parseDouble(lat);
                                longtitude = Double.parseDouble(lng);
                                address = Utils.getCompleteAddressString(context, latitude, longtitude);
                            }
                            if(result.equals("400")){
                                Log.i("response", "\nURL : " + url);
                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                        try {
                            Thread.sleep(1000);
                            Intent intent = new Intent(context, MainActivity.class);
                            ((Activity)context).finish();
                            ((Activity)context).startActivity(intent);
                        } catch (InterruptedException e) {
                            e.printStackTrace();
                        }
                        Log.i("response", Utils.getCurrentTime() + " : end request get current location\n" + response);
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Log.e("response", Utils.getCurrentTime() + error.toString());
                try {
                    Thread.sleep(1000);
                    Intent intent = new Intent(context, MainActivity.class);
                    ((Activity)context).finish();
                    ((Activity)context).startActivity(intent);
                } catch (InterruptedException e) {
                    e.printStackTrace();
                }
            }
        }) {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<String, String>();
                return params;
            }
        };
        VolleySingleton.getInstance(this.context).getRequestQueue().add(insertRequest);
    }
}
