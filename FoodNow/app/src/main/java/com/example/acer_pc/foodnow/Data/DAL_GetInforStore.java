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
import com.example.acer_pc.foodnow.InformationStoreActivity;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

import static com.example.acer_pc.foodnow.LoginActivity.user;

public class DAL_GetInforStore {
    public Context context;
    public static boolean requesting;

    public DAL_GetInforStore(Context context) {
        this.context = context;
        requesting = false;
    }

    public void getInforStore(final String idStore){
        if(requesting)
            return;
        requesting = true;
        VolleySingleton.getInstance(this.context).getRequestQueue().cancelAll("getInforStore");
        Log.i("response", "\n" + Utils.getCurrentTime() + " : start request get information store " + requesting);
        StringRequest insertRequest = new StringRequest(
                Request.Method.POST,//method
                Utils.urlInforStore,//url
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        Log.i("response", "\n" + Utils.getCurrentTime() + ":" + response);
                        //xử lý kết quả khi request thành công
                        try {
                            JSONObject jsonObjectResult = new JSONObject(response);
                            if(jsonObjectResult.getString("return_code").equals("1")){
                                InformationStoreActivity.jsonObjectInforStore = jsonObjectResult;
                                requesting = false;
                            } else if(jsonObjectResult.getString("return_code").equals("0")){
                                InformationStoreActivity.jsonObjectInforStore = null;
                                requesting = false;
                            }
                            Log.i("response", "\n" + Utils.getCurrentTime() + ": end process");
                        } catch (JSONException e) {
                            requesting = false;
                            e.printStackTrace();
                        }
                        requesting = false;
                        Log.i("response", "\n" + Utils.getCurrentTime() + ": end process");
                        InformationStoreActivity.refresh = false;
                        Intent intentResult = new Intent();
                        ((Activity)context).setResult(Activity.RESULT_OK, intentResult);
                        ((Activity)context).finish();
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Log.e("response", Utils.getCurrentTime() + error.toString());
                //xử lý kết quả khi request
                requesting = false;
                InformationStoreActivity.jsonObjectInforStore = null;
                Intent intentResult = new Intent();
                ((Activity)context).setResult(Activity.RESULT_CANCELED, intentResult);
                ((Activity)context).finish();
            }
        }) {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<String, String>();
                params.put("idCuahang", idStore);
                params.put("idKhachHang", user != null ? user.getId() : "");
                return params;
            }
        };
        insertRequest.addMarker("getInforStore");
        insertRequest.setRetryPolicy(new DefaultRetryPolicy(30000, DefaultRetryPolicy.DEFAULT_MAX_RETRIES, DefaultRetryPolicy.DEFAULT_BACKOFF_MULT));
        VolleySingleton.getInstance(this.context).getRequestQueue().add(insertRequest);
    }

}
