package com.example.acer_pc.foodnow.Data;

import android.content.Context;
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

public class DAL_SearchStore {
    Context context;
    boolean requesting;
    private SearchStoreListener listener;

    public DAL_SearchStore(Context context) {
        this.context = context;
        try {
            listener = (SearchStoreListener) context;
        } catch (ClassCastException e) {
            throw new ClassCastException(context.toString() + " must implement SearchStoreListener");
        }
        requesting = false;
    }

    public void searchStore(final String valueSearch){
        if(!requesting) {
            VolleySingleton.getInstance(this.context).getRequestQueue().cancelAll("searchStore");
            requesting = true;
            Log.i("response", Utils.getCurrentTime() + "start request search store");
            StringRequest insertRequest = new StringRequest(
                    Request.Method.POST,//method
                    Utils.urlSeachStore,//url
                    new Response.Listener<String>(){
                        @Override
                        public void onResponse(String response) {
                            Log.i("response", Utils.getCurrentTime() + response);
                            //xử lý kết quả khi request thành công
                            try {
                                JSONObject jsonObject = new JSONObject(response);
                                if(jsonObject.getString("return_code").equals("0")){
                                    Toast.makeText(context, "Quá trình request thất bại !", Toast.LENGTH_SHORT).show();
                                    listener.onRequestSearchStoreDone(null);
                                } else if(jsonObject.getString("return_code").equals("1")){
                                    listener.onRequestSearchStoreDone(jsonObject);
                                }
                            } catch (JSONException e) {
                                e.printStackTrace();
                            }
                            Log.i("response", Utils.getCurrentTime() + "end process request search store");
                            requesting = false;
                        }
                    }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {
                    Log.e("response", Utils.getCurrentTime() + error.toString());
                    //xử lý kết quả khi request lỗi
                    Log.i("response", Utils.getCurrentTime() + "end process request search store");
                    requesting = false;
                }
            }) {
                @Override
                protected Map<String, String> getParams() throws AuthFailureError {
                    Map<String, String> params = new HashMap<String, String>();
                    params.put("valueSearch", valueSearch);
                    params.put("lat", String.valueOf(DAL_MyLocation.latitude));
                    params.put("lng", String.valueOf(DAL_MyLocation.longtitude));
                    return params;
                }
            };
            insertRequest.addMarker("searchStore");
            insertRequest.setRetryPolicy(new DefaultRetryPolicy(10000, DefaultRetryPolicy.DEFAULT_MAX_RETRIES, DefaultRetryPolicy.DEFAULT_BACKOFF_MULT));
            VolleySingleton.getInstance(this.context).getRequestQueue().add(insertRequest);
        } else {
            Toast.makeText(context, "Đang xử lý...", Toast.LENGTH_SHORT).show();
        }
    }

    public interface SearchStoreListener{
        void onRequestSearchStoreDone(JSONObject result);
    }
}
