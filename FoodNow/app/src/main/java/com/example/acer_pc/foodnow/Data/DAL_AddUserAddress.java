package com.example.acer_pc.foodnow.Data;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.util.Log;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.example.acer_pc.foodnow.InformationStoreActivity;
import com.example.acer_pc.foodnow.Object.Address;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

import static com.example.acer_pc.foodnow.LoginActivity.user;

public class DAL_AddUserAddress {
    Context context;
    int type;
    double lat, lng;
    String address;

    public DAL_AddUserAddress(Context context, int type, double lat, double lng, String address) {
        this.context = context;
        this.type = type;
        this.lat = lat;
        this.lng = lng;
        this.address = address;
    }

    public void addUserAddress(){
        StringRequest insertRequest = new StringRequest(
                Request.Method.POST,//method
                Utils.urlAddUserAddress,//url
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        Log.i("response", Utils.getCurrentTime() + response);
                        //xử lý kết quả khi request thành công
                        try {
                            JSONObject jsonObjectResult = new JSONObject(response);
                            if(jsonObjectResult.getString("return_code").equals("1")){
                                String type = jsonObjectResult.getString("type");
                                JSONObject jsonObjectAddress = jsonObjectResult.getJSONObject("infor");
                                Address newAddress = new Address();
                                newAddress.setId(jsonObjectAddress.getString("_id"));
                                newAddress.setLat(jsonObjectAddress.getDouble("Vi_do"));
                                newAddress.setLng(jsonObjectAddress.getDouble("Kinh_do"));
                                newAddress.setAddress(jsonObjectAddress.getString("Dia_Chi"));
                                switch (type){
                                    case "0":
                                        user.setDia_chi_khac(newAddress);
                                        break;
                                    case "1":
                                        user.setDia_chi_nha(newAddress);
                                        break;
                                    case "2":
                                        user.setDia_chi_cty(newAddress);
                                        break;
                                }
                                Toast.makeText(context, "Thêm địa chỉ thành công !", Toast.LENGTH_SHORT).show();
                            } else {
                                Toast.makeText(context, "Thêm địa chỉ thất bại !", Toast.LENGTH_SHORT).show();
                            }
                            Intent intentResult = new Intent();
                            ((Activity)context).setResult(Activity.RESULT_OK, intentResult);
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                        Log.i("response", "\n" + Utils.getCurrentTime() + ": end process");
                        ((Activity)context).finish();
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Log.e("response", Utils.getCurrentTime() + error.toString());
                //xử lý kết quả khi request lỗi
                Toast.makeText(context, "Thêm địa chỉ thất bại !", Toast.LENGTH_SHORT).show();
                Intent intentResult = new Intent();
                ((Activity)context).setResult(Activity.RESULT_CANCELED, intentResult);
                ((Activity)context).finish();
            }
        }) {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<String, String>();
                params.put("idKhachHang", user.getId());
                params.put("type", String.valueOf(type));
                params.put("lat", String.valueOf(lat));
                params.put("lng", String.valueOf(lng));
                params.put("address", address);
                return params;
            }
        };
        VolleySingleton.getInstance(this.context).getRequestQueue().add(insertRequest);
    }
}
