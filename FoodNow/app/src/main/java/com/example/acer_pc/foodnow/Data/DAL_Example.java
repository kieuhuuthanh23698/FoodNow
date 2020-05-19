package com.example.acer_pc.foodnow.Data;

import android.content.Context;
import android.util.Log;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;

import java.util.HashMap;
import java.util.Map;

public class DAL_Example {
    Context context;

    public void exampleFunction(){
        StringRequest insertRequest = new StringRequest(
                Request.Method.POST,//method
                Utils.urlLogin,//url
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        Log.i("response", Utils.getCurrentTime() + response);
                        //xử lý kết quả khi request thành công
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Log.e("response", Utils.getCurrentTime() + error.toString());
                //xử lý kết quả khi request lỗi
            }
        }) {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<String, String>();
                //params.put("key", value);
                return params;
            }
        };
        VolleySingleton.getInstance(this.context).getRequestQueue().add(insertRequest);
    }
}
