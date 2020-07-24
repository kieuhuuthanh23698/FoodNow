package com.example.acer_pc.foodnow.Data;

import android.app.Activity;
import android.content.Context;
import android.util.Log;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.example.acer_pc.foodnow.Adapter.InforStoreFoodsAdapter;
import com.example.acer_pc.foodnow.InformationStoreActivity;
import com.example.acer_pc.foodnow.LoginActivity;
import com.example.acer_pc.foodnow.UserFragment;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

import static com.example.acer_pc.foodnow.InformationStoreActivity.shoppingCart;
import static com.example.acer_pc.foodnow.LoginActivity.user;

public class DAL_AddProductToCart {
    public Context context;

    public DAL_AddProductToCart(Context context) {
        this.context = context;
    }

    public void addProductToCart(){
        if(!InforStoreFoodsAdapter.requesting) {
            VolleySingleton.getInstance(this.context).getRequestQueue().cancelAll("addProductToCart");
            InforStoreFoodsAdapter.requesting = true;
            Log.i("response", Utils.getCurrentTime() + "start request add product to cart");
            StringRequest insertRequest = new StringRequest(
                    Request.Method.POST,//method
                    Utils.urlAddProductToCart,//url
                    new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {
                            Log.i("response", Utils.getCurrentTime() + response);
                            //xử lý kết quả khi request thành công
                            try {
                                JSONObject jsonObject = new JSONObject(response);
                                if(jsonObject.getString("return_code").equals("0")){
                                    InformationStoreActivity.shoppingCart.clear();
                                    user = null;
                                } else if(jsonObject.getString("return_code").equals("1")){
                                    user.setToken(jsonObject.getString("token"));
                                }
                            } catch (JSONException e) {
                                e.printStackTrace();
                            }
                            InforStoreFoodsAdapter.requesting = false;
                        }
                    }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {
                    Log.e("response", Utils.getCurrentTime() + error.toString());
                    //xử lý kết quả khi request lỗi
                    InformationStoreActivity.shoppingCart.clear();
                    user = null;
                    InforStoreFoodsAdapter.requesting = false;
                }
            }) {
                @Override
                protected Map<String, String> getParams() throws AuthFailureError {
                    Map<String, String> params = new HashMap<String, String>();
                    params.put("cart", "");
                    if (shoppingCart != null && shoppingCart.size() > 0) {
                        try {
                            JSONArray jsonArrayShoppingCart = new JSONArray();
                            for (HashMap.Entry<String, CartDetail> item : shoppingCart.entrySet()) {
                                JSONObject jsonObjectItem = new JSONObject();
                                jsonObjectItem.put("id", item.getKey());
                                jsonObjectItem.put("count", item.getValue().getCountInt());
                                jsonObjectItem.put("note", item.getValue().getNote());
                                jsonArrayShoppingCart.put(jsonObjectItem);
                                params.put("cart", jsonArrayShoppingCart.toString());
                            }
                        } catch (Exception e) {
                            e.printStackTrace();
                        }
                    }
//                    params.put("idCuaHang", "5eba0ad05f15d311d4d6b689");
                    params.put("idCuaHang", InformationStoreActivity.idStore);
                    params.put("token", user.getToken());
                    return params;
                }
            };
            insertRequest.addMarker("addProductToCart");
            VolleySingleton.getInstance(this.context).getRequestQueue().add(insertRequest);
        }
    }
}
