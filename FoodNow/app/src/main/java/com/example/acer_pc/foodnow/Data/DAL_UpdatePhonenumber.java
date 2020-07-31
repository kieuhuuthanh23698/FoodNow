package com.example.acer_pc.foodnow.Data;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.util.Log;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.DefaultRetryPolicy;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.example.acer_pc.foodnow.InformationStoreActivity;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

import static com.example.acer_pc.foodnow.LoginActivity.user;

public class DAL_UpdatePhonenumber {
    Context context;
    boolean requesting;

    public DAL_UpdatePhonenumber(Context context) {
        this.context = context;
        requesting = false;
    }

    public void updatePhonenumber(final String phonenumber){
        if(!requesting) {
            VolleySingleton.getInstance(this.context).getRequestQueue().cancelAll("updatePhonenumber");
            requesting = true;
            Log.i("response", Utils.getCurrentTime() + "start request update Phonenumber");
            StringRequest insertRequest = new StringRequest(
                    Request.Method.POST,//method
                    Utils.urlUpdatePhonenumber,//url
                    new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {
                            Log.i("response", Utils.getCurrentTime() + response);
                            //xử lý kết quả khi request thành công
                            requesting = false;
                            try {
                                JSONObject jsonObject = new JSONObject(response);
                                if(jsonObject.getString("return_code").equals("0")){
                                    Toast.makeText(context, "Quá trình request thất bại !", Toast.LENGTH_SHORT).show();
                                } else if(jsonObject.getString("return_code").equals("1")){
                                    user.setPhone(phonenumber);
                                }
                            } catch (JSONException e) {
                                e.printStackTrace();
                            }
                            Intent intentResult = new Intent();
                            ((Activity)context).setResult(Activity.RESULT_OK, intentResult);
                            ((Activity)context).finish();
                        }
                    }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {
                    Log.e("response", Utils.getCurrentTime() + error.toString());
                    //xử lý kết quả khi request lỗi
                    requesting = false;
                    Intent intentResult = new Intent();
                    ((Activity)context).setResult(Activity.RESULT_OK, intentResult);
                    ((Activity)context).finish();
                }
            }) {
                @Override
                protected Map<String, String> getParams() throws AuthFailureError {
                    Map<String, String> params = new HashMap<String, String>();
                    params.put("token", user.getToken());
                    params.put("phonenumber", phonenumber);
                    return params;
                }
            };
            insertRequest.addMarker("updatePhonenumber");
            insertRequest.setRetryPolicy(new DefaultRetryPolicy(10000, DefaultRetryPolicy.DEFAULT_MAX_RETRIES, DefaultRetryPolicy.DEFAULT_BACKOFF_MULT));
            VolleySingleton.getInstance(this.context).getRequestQueue().add(insertRequest);
        } else {
            Toast.makeText(context, "Đang xử lý...", Toast.LENGTH_SHORT).show();
        }
    }
}
