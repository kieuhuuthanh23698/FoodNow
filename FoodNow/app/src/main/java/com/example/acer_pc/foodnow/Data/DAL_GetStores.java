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
import com.example.acer_pc.foodnow.Object.User;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

import okhttp3.internal.Util;

import static com.example.acer_pc.foodnow.LoginActivity.user;

public class DAL_GetStores {
    Context context;
    boolean requesting;
    private GetStoresListener listener;
    int type;
    String idDanhMuc;

    public DAL_GetStores(GetStoresListener getStoresListener, Context context, int type, String idDanhMuc) {
        this.context = context;
        listener = getStoresListener;
        this.type = type;
        this.idDanhMuc = idDanhMuc;
        requesting = false;
    }

    public void getStores(){
        if(!requesting) {
            VolleySingleton.getInstance(this.context).getRequestQueue().cancelAll("getStores");
            requesting = true;
            Log.i("response", Utils.getCurrentTime() + "start request get list store");
            StringRequest insertRequest = new StringRequest(
                    Request.Method.POST,//method
                    getURL(),//url
                    new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {
                            Log.i("response", Utils.getCurrentTime() + response);
                            //xử lý kết quả khi request thành công
                            try {
                                JSONObject jsonObject = new JSONObject(response);
                                if(jsonObject.getString("return_code").equals("0")){
                                    Toast.makeText(context, "Quá trình request thất bại !", Toast.LENGTH_SHORT).show();
                                    listener.onRequestGetStoresDone(null);
                                } else if(jsonObject.getString("return_code").equals("1")){
                                    listener.onRequestGetStoresDone(jsonObject.getJSONArray("infor"));
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
                    if(type == 0) {
                        if (user != null)
                            idKhachHang = user.getId();
                        else
                            idKhachHang = "";
                        params.put("idKhachHang", idKhachHang);
                    } else {
                        params.put("idDanhMuc", idDanhMuc);
                    }
                    return params;
                }
            };
            insertRequest.addMarker("getStores");
            VolleySingleton.getInstance(this.context).getRequestQueue().add(insertRequest);
        } else {
            Toast.makeText(context, "Đang xử lý...", Toast.LENGTH_SHORT).show();
        }
    }

    private String getURL(){
        String url = "";
        switch (type){
            case 0:
                url = Utils.urlGetFavoriteStores;
                break;
            case 1:
                url = Utils.urlGetStoresOfMenu;
                break;
            case 2:
                url = Utils.urlGetStoresOfKMHT;
                break;
            case 3:
                url = Utils.urlGetStoresOfSuggest;
                break;
            case 4:
                url = Utils.urlGetStoresOfGroup;
                break;
        }
        return url;
    }

    public interface GetStoresListener{
        void onRequestGetStoresDone(JSONArray stores);
    }
}
