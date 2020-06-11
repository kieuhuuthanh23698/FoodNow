package com.example.acer_pc.foodnow.Data;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.util.Log;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.example.acer_pc.foodnow.Adapter.InforStoreFoodsAdapter;
import com.example.acer_pc.foodnow.ConfirmCartActivity;
import com.example.acer_pc.foodnow.InformationStoreActivity;
import com.example.acer_pc.foodnow.ShoppingCartActivity;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

import static com.example.acer_pc.foodnow.InformationStoreActivity.shoppingCart;
import static com.example.acer_pc.foodnow.LoginActivity.user;

public class DAL_ConfirmShoppingCart {
    public Context context;

    public DAL_ConfirmShoppingCart(Context context) {
        this.context = context;
    }

    public void confirmShoppingCart(){
            VolleySingleton.getInstance(this.context).getRequestQueue().cancelAll("confirmShoppingCart");
            Log.i("response", Utils.getCurrentTime() + "start request confirm shopping cart");
            StringRequest insertRequest = new StringRequest(
                    Request.Method.POST,//method
                    Utils.urlConfirmShoppingCart,//url
                    new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {
                            Log.i("response", Utils.getCurrentTime() + response);
                            //xử lý kết quả khi request thành công
                            try {
                                JSONObject jsonObject = new JSONObject(response);
                                if(jsonObject.getString("return_code").equals("1")){
                                    InformationStoreActivity.shoppingCart.clear();
                                } else if(jsonObject.getString("return_code").equals("0")){
                                }
                            } catch (JSONException e) {
                                e.printStackTrace();
                            }
                            Log.i("response", Utils.getCurrentTime() + "end request get shopping cart detail");
                            Intent intentResult = new Intent();
                            ((Activity)context).setResult(Activity.RESULT_OK, intentResult);
                            ((Activity)context).finish();
                        }
                    }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {
                    Log.e("response", Utils.getCurrentTime() + error.toString());
                    //xử lý kết quả khi request lỗi
                    shoppingCart.clear();
                    Log.i("response", Utils.getCurrentTime() + "end request confirm shopping cart");
                    Intent intentResult = new Intent();
                    ((Activity)context).setResult(Activity.RESULT_OK, intentResult);
                    ((Activity)context).finish();
                }
            }) {
                @Override
                protected Map<String, String> getParams() throws AuthFailureError {
                    Map<String, String> params = new HashMap<String, String>();
                    params.put("idCuaHang", InformationStoreActivity.idStore);
                    params.put("idKhachHang", user.getId());
                    params.put("idDiaChi", ConfirmCartActivity.address.getId());
                    params.put("Do_dai_duong_di", String.valueOf(ConfirmCartActivity.doubleDistance));
                    params.put("Phi_ship", String.valueOf(ConfirmCartActivity.doubleDistanceCost));
                    params.put("Total_cart", String.valueOf(ConfirmCartActivity.doubleTotalCart));
                    params.put("Total", String.valueOf(ConfirmCartActivity.doubleDistanceCost));
                    params.put("Hinh_thuc_thanh_toan", "0");
                    params.put("note", ConfirmCartActivity.shopping_cart_note_item.getText().toString().trim());
                    return params;
                }
            };
            insertRequest.addMarker("confirmShoppingCart");
            VolleySingleton.getInstance(this.context).getRequestQueue().add(insertRequest);
    }
}
