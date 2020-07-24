package com.example.acer_pc.foodnow.Data;

import android.app.Activity;
import android.content.Context;
import android.util.Log;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.example.acer_pc.foodnow.InformationStoreActivity;
import com.example.acer_pc.foodnow.LoginActivity;
import com.example.acer_pc.foodnow.Object.Address;
import com.example.acer_pc.foodnow.Object.User;
import com.facebook.login.LoginManager;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

import static com.example.acer_pc.foodnow.LoginActivity.user;

public class DAL_Login {
    public Context context;

    public DAL_Login(Context context) {
        this.context = context;
    }

    public void login(){
        StringRequest insertRequest = new StringRequest(
                Request.Method.POST,//method
                Utils.urlLogin,//url
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        Log.i("response", Utils.getCurrentTime() + response);
                        //xử lý kết quả khi request thành công
                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            String return_code = jsonObject.getString("return_code");
                            int state = Integer.parseInt(return_code);
                            switch (state){
                                case 0:
                                    String error = jsonObject.getString("error_infor");
                                    Utils.showMessage(error, context);
                                    user = null;
                                    break;
                                case 1:
                                    String token = jsonObject.getString("token");
                                    JSONObject khachHangObject = jsonObject.getJSONObject("infor");
                                    String id_user = khachHangObject.getString("_id");
                                    String Ten_khach_hang = khachHangObject.getString("Ten_khach_hang");
                                    String So_dien_thoai = khachHangObject.getString("So_dien_thoai");
                                    String Email = khachHangObject.getString("Email");
                                    String Ngay_sinh = khachHangObject.getString("Ngay_sinh");
                                    String Gioi_tinh = khachHangObject.getString("Gioi_tinh");
                                    String Hinh_anh_khach_hang = khachHangObject.getString("Hinh_anh_khach_hang");
                                    String Ten_dang_nhap = khachHangObject.getString("Ten_dang_nhap");
                                    String Mat_khau = khachHangObject.getString("Mat_khau");
                                    JSONArray jsonArrayFacvoriteStore = khachHangObject.getJSONArray("Cua_hang_yeu_thich");
                                    for (int i = 0; i < jsonArrayFacvoriteStore.length(); i++) {
                                        String jsonIdStore = jsonArrayFacvoriteStore.getString(i);
                                        user.addFavoriteStore(jsonIdStore);
                                    }
                                    JSONObject Dia_chi_nha_ex = jsonObject.getJSONObject("Dia_chi_nha_ex");
                                    if(Dia_chi_nha_ex.getString("flag").equals("1")){
                                        JSONObject jsonObjectDia_chi_nha_ex = Dia_chi_nha_ex.getJSONObject("data");
                                        Address address = new Address();
                                        address.setId(jsonObjectDia_chi_nha_ex.getString("_id"));
                                        address.setLat(jsonObjectDia_chi_nha_ex.getDouble("Vi_do"));
                                        address.setLng(jsonObjectDia_chi_nha_ex.getDouble("Kinh_do"));
                                        address.setAddress(jsonObjectDia_chi_nha_ex.getString("Dia_Chi"));
                                        user.setDia_chi_nha(address);
                                    }
                                    JSONObject Dia_chi_cong_ty_ex = jsonObject.getJSONObject("Dia_chi_cong_ty_ex");
                                    if(Dia_chi_cong_ty_ex.getString("flag").equals("1")){
                                        JSONObject jsonObjectDia_chi_cong_ty_ex = Dia_chi_cong_ty_ex.getJSONObject("data");
                                        Address address = new Address();
                                        address.setId(jsonObjectDia_chi_cong_ty_ex.getString("_id"));
                                        address.setLat(jsonObjectDia_chi_cong_ty_ex.getDouble("Vi_do"));
                                        address.setLng(jsonObjectDia_chi_cong_ty_ex.getDouble("Kinh_do"));
                                        address.setAddress(jsonObjectDia_chi_cong_ty_ex.getString("Dia_Chi"));
                                        user.setDia_chi_cty(address);
                                    }
                                    JSONObject Dia_chi_khac_ex = jsonObject.getJSONObject("Dia_chi_khac_ex");
                                    if(Dia_chi_khac_ex.getString("flag").equals("1")){
                                        JSONArray jsonArrayDia_chi_khac_ex = Dia_chi_khac_ex.getJSONArray("data");
                                        for (int i = 0; i < jsonArrayDia_chi_khac_ex.length(); i++) {
                                            JSONObject jsonObjectDia_chi_khac_ex = jsonArrayDia_chi_khac_ex.getJSONObject(i);
                                            Address address = new Address();
                                            address.setId(jsonObjectDia_chi_khac_ex.getString("_id"));
                                            address.setLat(jsonObjectDia_chi_khac_ex.getDouble("Vi_do"));
                                            address.setLng(jsonObjectDia_chi_khac_ex.getDouble("Kinh_do"));
                                            address.setAddress(jsonObjectDia_chi_khac_ex.getString("Dia_Chi"));
                                            user.setDia_chi_khac(address);
                                        }
                                    }
                                    user.setToken(token);
                                    user.setId(id_user);
                                    user.setName(Ten_khach_hang);
                                    user.setPhone(So_dien_thoai);
                                    user.setEmail(Email);
                                    user.setBirth_day(Ngay_sinh);
                                    user.setGender(Gioi_tinh);
                                    user.setImg(Hinh_anh_khach_hang);
                                    user.setUsername(Ten_dang_nhap);
                                    user.setPassword(Mat_khau);
                                    InformationStoreActivity.refresh = true;
                                    break;
                            }
                        } catch (JSONException e) {
                            user = null;
                            e.printStackTrace();
                            Log.i("response", Utils.getCurrentTime() + response);
                        }
                        Log.i("response", Utils.getCurrentTime() + "end process login to server");
                        ((Activity)context).finish();
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Log.e("response", Utils.getCurrentTime() + error.toString());
                //xử lý kết quả khi request lỗi
                user = null;
                LoginManager loginManager = LoginManager.getInstance();
                if(loginManager != null)
                    loginManager.logOut();
                ((Activity)context).finish();
            }
        }) {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<String, String>();
                params.put("type", String.valueOf(user.getType_login()));
                params.put("id", user.getId());
                params.put("Ten_dang_nhap", user.getUsername());
                params.put("Mat_khau", user.getPassword());
                params.put("name", user.getName());
                params.put("picture", user.getImg());
                params.put("gender", user.getGender());
                params.put("birthday", user.getBirth_day());
                params.put("email", user.getEmail());
                return params;
            }
        };
        VolleySingleton.getInstance(this.context).getRequestQueue().add(insertRequest);
    }
}
