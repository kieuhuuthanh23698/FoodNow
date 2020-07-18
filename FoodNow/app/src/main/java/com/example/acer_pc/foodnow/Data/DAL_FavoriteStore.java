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
import com.example.acer_pc.foodnow.Adapter.InforStoreFoodsAdapter;
import com.example.acer_pc.foodnow.CustomDateTimePicker;
import com.example.acer_pc.foodnow.InformationStoreActivity;
import com.example.acer_pc.foodnow.R;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

import static com.example.acer_pc.foodnow.InformationStoreActivity.shoppingCart;
import static com.example.acer_pc.foodnow.LoginActivity.user;

public class DAL_FavoriteStore {
    Context context;
    boolean requesting;
    private FavoriteStoreListener listener;

    public DAL_FavoriteStore(Context context) {
        this.context = context;
        try {
            listener = (FavoriteStoreListener) context;
        } catch (ClassCastException e) {
            throw new ClassCastException(context.toString() + " must implement FavoriteStoreListener");
        }
        requesting = false;
    }

    public void favoriteStore(final String favorite){
        if(!requesting) {
            VolleySingleton.getInstance(this.context).getRequestQueue().cancelAll("favoriteStore");
            requesting = true;
            Log.i("response", Utils.getCurrentTime() + "start request favorite store");
            StringRequest insertRequest = new StringRequest(
                    Request.Method.POST,//method
                    Utils.urlFavoriteStore,//url
                    new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {
                            Log.i("response", Utils.getCurrentTime() + response);
                            //xử lý kết quả khi request thành công
                            try {
                                JSONObject jsonObject = new JSONObject(response);
                                if(jsonObject.getString("return_code").equals("0")){
                                    Toast.makeText(context, "Quá trình request thất bại !", Toast.LENGTH_SHORT).show();
                                } else if(jsonObject.getString("return_code").equals("1")){
                                    if(jsonObject.getString("type").toString().equals("1")) {
                                        user.addFavoriteStore(InformationStoreActivity.idStore);
                                    }
                                    else if(jsonObject.getString("type").toString().equals("0")){
                                        user.removeFavoriteStore(InformationStoreActivity.idStore);
                                    }
                                    listener.onRequestFavoriteStoreDone(jsonObject.getString("type").toString());
                                }
                            } catch (JSONException e) {
                                e.printStackTrace();
                            }
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
                    params.put("idCuaHang", InformationStoreActivity.idStore);
                    params.put("idKhachHang", user.getId());
                    params.put("favorite", favorite);
                    return params;
                }
            };
            insertRequest.addMarker("favoriteStore");
            insertRequest.setRetryPolicy(new DefaultRetryPolicy(10000, DefaultRetryPolicy.DEFAULT_MAX_RETRIES, DefaultRetryPolicy.DEFAULT_BACKOFF_MULT));
            VolleySingleton.getInstance(this.context).getRequestQueue().add(insertRequest);
        } else {
            Toast.makeText(context, "Đang xử lý...", Toast.LENGTH_SHORT).show();
        }
    }

    public interface FavoriteStoreListener{
        void onRequestFavoriteStoreDone(String type);
    }
}
