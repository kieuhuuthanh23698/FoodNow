package com.example.acer_pc.foodnow.Data;

import android.content.Context;
import android.util.Log;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

import static com.example.acer_pc.foodnow.LoginActivity.user;

public class DAL_GetOrderListCustomer {
    Context context;
    boolean requesting;
    private GetOrderListListener listener;

    public DAL_GetOrderListCustomer(GetOrderListListener listener,Context context) {
        this.context = context;
        this.listener = listener;
    }
    public void getOrderList(final String type){
        if(!requesting) {
            VolleySingleton.getInstance(this.context).getRequestQueue().cancelAll("getOrderList");
            requesting = true;
            Log.i("response", Utils.getCurrentTime() + "start request get order list");
            StringRequest insertRequest = new StringRequest(
                    Request.Method.POST,//method
                    Utils.urlGetOrderListCustomer,//url
                    new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {
                            Log.i("response", Utils.getCurrentTime() + response);
                            //xử lý kết quả khi request thành công
                            try {
                                JSONObject jsonObject = new JSONObject(response);
                                if(jsonObject.getString("return_code").equals("0")){
                                    Toast.makeText(context, "Quá trình request thất bại !", Toast.LENGTH_SHORT).show();
                                    listener.onRequestGetOrderListDone(null, type);
                                } else if(jsonObject.getString("return_code").equals("1")){
                                    listener.onRequestGetOrderListDone(jsonObject.getJSONArray("infor"), type);
                                }
                            } catch (JSONException e) {
                                e.printStackTrace();
                            }
                            Log.i("response", Utils.getCurrentTime() + "end process request get list store");
                            requesting = false;
                        }
                    }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {
                    Log.e("response", Utils.getCurrentTime() + error.toString());
                    //xử lý kết quả khi request lỗi
                    requesting = false;
                }
            }) {
                @Override
                protected Map<String, String> getParams() throws AuthFailureError {
                    Map<String, String> params = new HashMap<String, String>();
                    String idKhachHang = "";
                    if (user != null)
                        idKhachHang = user.getId();
                    params.put("idKhachHang", idKhachHang);
                    params.put("idDanhMuc", type);
                    return params;
                }
            };
            insertRequest.addMarker("getOrderList");
            VolleySingleton.getInstance(this.context).getRequestQueue().add(insertRequest);
        } else {
            Toast.makeText(context, "Đang xử lý...", Toast.LENGTH_SHORT).show();
        }
    }

    public interface GetOrderListListener{
        void onRequestGetOrderListDone(JSONArray stores, String type);
    }
}
