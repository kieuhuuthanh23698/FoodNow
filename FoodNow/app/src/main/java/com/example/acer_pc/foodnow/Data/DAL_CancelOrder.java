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

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class DAL_CancelOrder {
    Context context;
    boolean requesting;
    private CancelOrderListener listener;

    public DAL_CancelOrder(CancelOrderListener listener, Context context) {
        this.listener = listener;
        this.context = context;
        requesting = false;
    }

    public void cancelOrder(final String idOrder){
        if(!requesting) {
            VolleySingleton.getInstance(this.context).getRequestQueue().cancelAll("cancelOrder");
            requesting = true;
            Log.i("response", Utils.getCurrentTime() + "start request cancel order");
            StringRequest insertRequest = new StringRequest(
                    Request.Method.POST,//method
                    Utils.urlCancelOrder,//url
                    new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {
                            Log.i("response", Utils.getCurrentTime() + response);
                            //xử lý kết quả khi request thành công
                            try {
                                JSONObject jsonObject = new JSONObject(response);
                                if(jsonObject.getString("return_code").equals("0")){
                                    Toast.makeText(context, "Quá trình request thất bại !", Toast.LENGTH_SHORT).show();
                                    listener.onRequestCancelOrderDone(null);
                                } else if(jsonObject.getString("return_code").equals("1")){
                                    listener.onRequestCancelOrderDone(idOrder);
                                }
                            } catch (JSONException e) {
                                e.printStackTrace();
                            }
                            Log.i("response", Utils.getCurrentTime() + "end process request cancel order");
                            requesting = false;
                        }
                    }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {
                    Log.e("response", Utils.getCurrentTime() + error.toString());
                    //xử lý kết quả khi request lỗi
                    Log.i("response", Utils.getCurrentTime() + "end process request cancel order");
                    requesting = false;
                    listener.onRequestCancelOrderDone(null);
                }
            }) {
                @Override
                protected Map<String, String> getParams() throws AuthFailureError {
                    Map<String, String> params = new HashMap<String, String>();
                    params.put("idDonHang", idOrder == null ? "" : (idOrder.isEmpty() ? "" : idOrder));
                    params.put("state", "3");
                    return params;
                }
            };
            insertRequest.addMarker("cancelOrder");
            insertRequest.setRetryPolicy(new DefaultRetryPolicy(10000, DefaultRetryPolicy.DEFAULT_MAX_RETRIES, DefaultRetryPolicy.DEFAULT_BACKOFF_MULT));
            VolleySingleton.getInstance(this.context).getRequestQueue().add(insertRequest);
        } else {
            Toast.makeText(context, "Đang xử lý...", Toast.LENGTH_SHORT).show();
        }
    }

    public interface CancelOrderListener{
        void onRequestCancelOrderDone(String type);
    }
}
