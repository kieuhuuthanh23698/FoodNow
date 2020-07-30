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
import com.android.volley.toolbox.JsonObjectRequest;
import com.example.acer_pc.foodnow.Common.Const;
import com.example.acer_pc.foodnow.InformationStoreActivity;
import com.example.acer_pc.foodnow.LoadingActivity;

import org.json.JSONException;
import org.json.JSONObject;

import java.nio.charset.Charset;
import java.util.HashMap;
import java.util.Map;

import javax.crypto.Mac;
import javax.crypto.spec.SecretKeySpec;

import static com.example.acer_pc.foodnow.Common.Const.accessKey;
import static com.example.acer_pc.foodnow.Common.DefineVarible.dal_confirmShoppingCart;

public class Dal_RequestMoMo {
    Context context;
    private RequestPaymentListener listener;
    private boolean requesting;

    public Dal_RequestMoMo(Context context) {
        this.context = context;
        try {
            listener = (RequestPaymentListener) context;
        } catch (ClassCastException e) {
            throw new ClassCastException(context.toString() + " must implement RequestPaymentListener");
        }
        requesting = false;
    }

    public void requestPayment(final String request_id, final String phonenumber, final String partnerRefId, final String data, final String rsa, final String description){
        if(requesting)
            return;
        requesting = true;
        JSONObject jsonObject = new JSONObject();
        try{
            jsonObject.put("partnerCode", Const.partner_code);
            jsonObject.put("customerNumber", phonenumber);
            jsonObject.put("partnerRefId",partnerRefId);
            jsonObject.put("appData", data);
            jsonObject.put("hash", rsa);
            jsonObject.put("description", description);
            jsonObject.put("version", 2);
            jsonObject.put("payType", 3);
            Log.i("response", jsonObject.toString());

        }catch(Exception e){
            Log.i("response", e.toString());
//            Intent intentResult = new Intent();
//            ((Activity)context).setResult(Activity.RESULT_OK, intentResult);
//            intentResult.putExtra("status", "0");
//            intentResult.putExtra("message", "Create data pay momo failed !");
//            ((Activity)context).finish();
            requesting = false;
            listener.onRequestPaymentDone("Thanh toán thất bại !");
            return;
        }
        VolleySingleton.getInstance(this.context).getRequestQueue().cancelAll("requestPayment");
        Log.i("response", "start request payment");
        JsonObjectRequest insertRequest = new JsonObjectRequest(
                Request.Method.POST, "https://test-payment.momo.vn/pay/app", jsonObject,
                new Response.Listener<JSONObject>() {
                    @Override
                    public void onResponse(JSONObject response) {
                        Intent intentResult = new Intent();
                        ((Activity)context).setResult(Activity.RESULT_OK, intentResult);
                        Log.i("response", "response infor : " + response.toString());
                        try {
                            if(response.getString("status").equals("0")) {
                                requesting = false;
                                requestConfirm_volley(
                                        request_id,
                                        Const.partner_code,
                                        response.getInt("amount"),
                                        partnerRefId,
                                        response.getString("transid"),
                                        response.getString("signature"),
                                        phonenumber);
                            } else {
//                                intentResult.putExtra("status", "0");
//                                intentResult.putExtra("message", "Request pay momo failed !");
//                                ((Activity)context).finish();
                                requesting = false;
                                listener.onRequestPaymentDone("Thanh toán thất bại !");
                            }
                        } catch (JSONException e) {
//                            intentResult.putExtra("status", "0");
//                            intentResult.putExtra("message", "Convert data pay momo failed !");
//                            ((Activity)context).finish();
                            requesting = false;
                            listener.onRequestPaymentDone("Thanh toán thất bại !");
                            e.printStackTrace();
                        }
                    }
                }, new Response.ErrorListener() {

            @Override
            public void onErrorResponse(VolleyError error) {
                // As of f605da3 the following should work
                Log.i("response", "response error : " + error.toString());
//                Intent intentResult = new Intent();
//                ((Activity)context).setResult(Activity.RESULT_OK, intentResult);
//                intentResult.putExtra("status", "0");
//                intentResult.putExtra("message", error.toString());
//                ((Activity)context).finish();
                requesting = false;
                listener.onRequestPaymentDone("Thanh toán thất bại !");
            }
        }) {
            @Override
            public Map<String, String> getHeaders() throws AuthFailureError {
                HashMap<String, String> headers = new HashMap<String, String>();
                headers.put("Content-Type", "application/json; charset=utf-8");
                return headers;
            }
        };
        insertRequest.addMarker("requestPayment");
        insertRequest.setRetryPolicy(new DefaultRetryPolicy(20000, DefaultRetryPolicy.DEFAULT_MAX_RETRIES, DefaultRetryPolicy.DEFAULT_BACKOFF_MULT));
        VolleySingleton.getInstance(this.context).getRequestQueue().add(insertRequest);
    }

    public void requestConfirm_volley(String request_id, String partner_code, int amount, String partnerRefId, String transid, String signature, String phone){
        if(requesting)
            return;
        requesting = true;
        JSONObject jsonObject = new JSONObject();
        try{
            String v = "partnerCode="+partner_code+"&partnerRefId="+partnerRefId+"&requestType=capture&requestId="+request_id+"&momoTransId=" + transid;
            jsonObject.put("partnerCode", partner_code);
            jsonObject.put("partnerRefId",partnerRefId);
            jsonObject.put("requestType","capture");
            jsonObject.put("requestId",request_id);
            jsonObject.put("momoTransId", transid);
            jsonObject.put("signature", Utils.hash_hmac_sha256(accessKey, v));
            jsonObject.put("customerNumber", phone);
            Log.i("response", jsonObject.toString());
        }catch(Exception e){
            Log.i("response", e.toString());
//            Intent intentResult = new Intent();
//            ((Activity)context).setResult(Activity.RESULT_OK, intentResult);
//            intentResult.putExtra("status", "0");
//            intentResult.putExtra("message", "Create data confirm pay momo failed !");
//            ((Activity)context).finish();
            requesting = false;
            listener.onRequestPaymentDone("Xác nhận thanh toán thất bại !");
            return;
        }
        VolleySingleton.getInstance(this.context).getRequestQueue().cancelAll("requestConfirm_volley");
        Log.i("response", "start request cofirm payment");
        JsonObjectRequest insertRequest = new JsonObjectRequest(
                Request.Method.POST, "https://test-payment.momo.vn/pay/confirm", jsonObject,
                new Response.Listener<JSONObject>() {
                    @Override
                    public void onResponse(JSONObject response) {
                        Log.i("response", "response infor : " + response.toString());
                        Intent intentResult = new Intent();
                        ((Activity)context).setResult(Activity.RESULT_OK, intentResult);
                        try {
                            if(response.getString("status").equals("0")) {
                            dal_confirmShoppingCart = new DAL_ConfirmShoppingCart(context);
                            dal_confirmShoppingCart.confirmShoppingCart("0");
//                                InformationStoreActivity.shoppingCart.clear();
//                                intentResult.putExtra("status", "1");
//                                ((Activity) context).finish();
                            } else {
//                                intentResult.putExtra("status", "0");
//                                intentResult.putExtra("message", "Request confirm pay momo failed !");
//                                ((Activity)context).finish();
                                requesting = false;
                                listener.onRequestPaymentDone("Xác nhận thanh toán thất bại !");
                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
//                            intentResult.putExtra("status", "0");
//                            intentResult.putExtra("message", "Convert data pay momo failed !");
//                            ((Activity)context).finish();
                            requesting = false;
                            listener.onRequestPaymentDone("Xác nhận thanh toán thất bại !");
                        }
                    }
                }, new Response.ErrorListener() {

            @Override
            public void onErrorResponse(VolleyError error) {
                Log.i("response", "response error : " + error.toString());
//                Intent intentResult = new Intent();
//                ((Activity)context).setResult(Activity.RESULT_OK, intentResult);
//                intentResult.putExtra("status", "0");
//                intentResult.putExtra("message", error.toString());
//                ((Activity)context).finish();
                requesting = false;
                listener.onRequestPaymentDone("Xác nhận thanh toán thất bại !");
            }
        }) {
            @Override
            public Map<String, String> getHeaders() throws AuthFailureError {
                HashMap<String, String> headers = new HashMap<String, String>();
                headers.put("Content-Type", "application/json; charset=utf-8");
                return headers;
            }
        };
        insertRequest.addMarker("requestConfirm_volley");
        insertRequest.setRetryPolicy(new DefaultRetryPolicy(20000, DefaultRetryPolicy.DEFAULT_MAX_RETRIES, DefaultRetryPolicy.DEFAULT_BACKOFF_MULT));
        VolleySingleton.getInstance(this.context).getRequestQueue().add(insertRequest);
    }

    public interface RequestPaymentListener{
        void onRequestPaymentDone(String result);
    }
}
