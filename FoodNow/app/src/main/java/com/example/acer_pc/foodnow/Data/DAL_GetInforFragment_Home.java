package com.example.acer_pc.foodnow.Data;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.util.Log;

import com.android.volley.AuthFailureError;
import com.android.volley.DefaultRetryPolicy;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.example.acer_pc.foodnow.HomeFragment;
import com.example.acer_pc.foodnow.Object.Store;
import com.example.acer_pc.foodnow.Object.Suggestion;
import com.example.acer_pc.foodnow.Object.SystemGroupStore;
import com.example.acer_pc.foodnow.Object.SystemVoucher;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

import okhttp3.internal.Util;

public class DAL_GetInforFragment_Home {
    public Context context;

    public DAL_GetInforFragment_Home(Context context) {
        this.context = context;
    }

    public void getInforFragmentHome(){
        Log.i("response", "\n" + Utils.getCurrentTime() + " : start request get information fragment home" + Utils.urlFragment_Home);
        VolleySingleton.getInstance(this.context).getRequestQueue().cancelAll("getInforFragment_Home");
        StringRequest insertRequest = new StringRequest(
                Request.Method.POST,//method
                Utils.urlFragment_Home,//url
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        Log.i("response", "\n" + Utils.getCurrentTime() + ":" + response);
                        //xử lý kết quả khi request thành công
                        try {
                            JSONObject jsonObjectResult = new JSONObject(response);
                            if(jsonObjectResult.getString("return_code").equals("1")){
                                HomeFragment.jsonArray_khuyen_mai_ht = jsonObjectResult.getJSONArray("lst_khuyen_mai_ht");
                                HomeFragment.jsonArray_cua_hang_goi_y = jsonObjectResult.getJSONArray("lst_cua_hang_goi_y");
                                HomeFragment.jsonArray_danh_muc = jsonObjectResult.getJSONArray("lst_danh_muc");
                                HomeFragment.jsonArray_cua_hang_gan_day = jsonObjectResult.getJSONArray("lst_cua_hang_gan_day");
                            } else {
                                HomeFragment.arrayListSystemVoucher.clear();
                                HomeFragment.arrSuggestion.clear();
                                HomeFragment.arrayListSystemGroupStore.clear();
                                HomeFragment.arrStoreNear.clear();
                            }
                            Intent intentResult = new Intent();
                            ((Activity)context).setResult(Activity.RESULT_OK, intentResult);
                            ((Activity)context).finish();
                            Log.i("response", "\n" + Utils.getCurrentTime() + ": end process request get information fragment home");
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Log.e("response", Utils.getCurrentTime() + error.toString());
                //xử lý kết quả khi request lỗi
                Intent intentResult = new Intent();
                ((Activity)context).setResult(Activity.RESULT_CANCELED, intentResult);
                ((Activity)context).finish();
            }
        }) {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<String, String>();
                params.put("lat", String.valueOf(DAL_MyLocation.latitude));
                params.put("lng", String.valueOf(DAL_MyLocation.longtitude));
                return params;
            }
        };
        insertRequest.addMarker("getInforFragment_Home");
        insertRequest.setRetryPolicy(new DefaultRetryPolicy(30000, DefaultRetryPolicy.DEFAULT_MAX_RETRIES, DefaultRetryPolicy.DEFAULT_BACKOFF_MULT));
        VolleySingleton.getInstance(this.context).getRequestQueue().add(insertRequest);
    }
}
