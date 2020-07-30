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
import com.example.acer_pc.foodnow.Adapter.InforStoreFoodsAdapter;
import com.example.acer_pc.foodnow.ConfirmCartActivity;
import com.example.acer_pc.foodnow.InformationStoreActivity;
import com.example.acer_pc.foodnow.ShoppingCartActivity;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

import static com.example.acer_pc.foodnow.ConfirmCartActivity.*;
import static com.example.acer_pc.foodnow.InformationStoreActivity.idStore;
import static com.example.acer_pc.foodnow.InformationStoreActivity.shoppingCart;
import static com.example.acer_pc.foodnow.LoginActivity.user;

public class DAL_ConfirmShoppingCart {
    public Context context;
    private ConfirmShoppingCartListener listener;
    private boolean requesting;

    public DAL_ConfirmShoppingCart(Context context) {
        this.context = context;
        try {
            listener = (ConfirmShoppingCartListener) context;
        } catch (ClassCastException e) {
            throw new ClassCastException(context.toString() + " must implement ConfirmShoppingCartListener");
        }
        requesting = false;
    }

    public void confirmShoppingCart(final String typeCast){
        if(!requesting) {
            requesting = true;
            VolleySingleton.getInstance(this.context).getRequestQueue().cancelAll("confirmShoppingCart");
            Log.i("response", Utils.getCurrentTime() + "start request confirm shopping cart");
            StringRequest insertRequest = new StringRequest(
                    Request.Method.POST,//method
                    Utils.urlConfirmShoppingCart,//url
                    new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {
                            Log.i("response", Utils.getCurrentTime() + response);
                            Log.i("response", Utils.getCurrentTime() + "end request get shopping cart detail");
                            //xử lý kết quả khi request thành công
                            Intent intentResult = new Intent();
                            ((Activity) context).setResult(Activity.RESULT_OK, intentResult);
                            try {
                                JSONObject jsonObject = new JSONObject(response);
                                if (jsonObject.getString("return_code").equals("1")) {
                                    InformationStoreActivity.shoppingCart.clear();
//                                    intentResult.putExtra("status", "1");
//                                    ((Activity) context).finish();
                                    requesting = false;
                                    listener.onRequestConfirmShoppingCartDone("Đặt hàng thành công !");
                                } else if (jsonObject.getString("return_code").equals("0")) {
//                                    intentResult.putExtra("status", "0");
//                                    intentResult.putExtra("message", "Request confirm order to server failed !");
//                                    ((Activity) context).finish();
                                    requesting = false;
                                    listener.onRequestConfirmShoppingCartDone("Đặt hàng thất bại !");
                                }
                            } catch (JSONException e) {
                                e.printStackTrace();
//                                intentResult.putExtra("status", "0");
//                                intentResult.putExtra("message", "Convert data confirm order error !");
//                                ((Activity) context).finish();
                                requesting = false;
                                listener.onRequestConfirmShoppingCartDone("Đặt hàng thất bại !");
                            }
                        }
                    }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {
                    Log.e("response", Utils.getCurrentTime() + error.toString());
                    //xử lý kết quả khi request lỗi
                    shoppingCart.clear();
                    Log.i("response", Utils.getCurrentTime() + "end request confirm shopping cart");
//                    Intent intentResult = new Intent();
//                    ((Activity)context).setResult(Activity.RESULT_OK, intentResult);
//                    intentResult.putExtra("status", "0");
//                    intentResult.putExtra("message", error.toString());
//                    ((Activity) context).finish();
                    listener.onRequestConfirmShoppingCartDone("Đặt hàng thất bại !");
                    requesting = false;

                }
            }) {
                @Override
                protected Map<String, String> getParams() throws AuthFailureError {
                    Map<String, String> params = new HashMap<String, String>();
                    params.put("idCuaHang", idStore);
                    params.put("idKhachHang", user.getId());
                    params.put("idDiaChi", address.getId());
                    params.put("Do_dai_duong_di", String.valueOf(doubleDistance));
                    params.put("Phi_ship", String.valueOf(doubleDistanceCost));
                    params.put("Total_cart", String.valueOf(doubleTotalCart));
                    params.put("Total", String.valueOf(doubleToTalConfirm));
                    params.put("Hinh_thuc_thanh_toan", typeCast);
                    params.put("note", note_order);
                    return params;
                }
            };
            insertRequest.addMarker("confirmShoppingCart");
            insertRequest.setRetryPolicy(new DefaultRetryPolicy(20000, DefaultRetryPolicy.DEFAULT_MAX_RETRIES, DefaultRetryPolicy.DEFAULT_BACKOFF_MULT));
            VolleySingleton.getInstance(this.context).getRequestQueue().add(insertRequest);
        } else {

        }
    }

    public interface ConfirmShoppingCartListener{
        void onRequestConfirmShoppingCartDone(String result);
    }
}
