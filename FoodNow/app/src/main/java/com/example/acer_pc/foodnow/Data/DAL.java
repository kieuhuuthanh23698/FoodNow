package com.example.acer_pc.foodnow.Data;

import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.support.v7.app.AlertDialog;
import android.util.Log;
import android.view.View;
import android.widget.ProgressBar;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.DefaultRetryPolicy;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.acer_pc.foodnow.HomeFragment;
import com.example.acer_pc.foodnow.LoginActivity;
import com.example.acer_pc.foodnow.MainActivity;
import com.example.acer_pc.foodnow.Object.Store;
import com.example.acer_pc.foodnow.R;
import com.example.acer_pc.foodnow.RegisterActivity;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

import static com.example.acer_pc.foodnow.LoginActivity.TOKEN;

public class DAL {
    Context context;

    public DAL(Context context) {
        this.context = context;
    }

    public void login(final String username, final String password){
        StringRequest insertRequest = new StringRequest(
                Request.Method.POST,
                Utils.urlLogin,
                new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                Log.e("TEST", "Login respone : " + response.toString());// -1 or token
                login(response.toString());
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Log.e("TEST","Login error : " +  error.toString());
                login("-1");
            }
        }) {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<String, String>();
                params.put("TaiKhoan", username);
                params.put("MatKhau", password);
                return params;
            }
        };
        VolleySingleton.getInstance(this.context).getRequestQueue().add(insertRequest);
    }

    public void getOneChiNhanh(final String idChiNhanh, final String name){
        StringRequest insertRequest = new StringRequest(
                Request.Method.POST,
                Utils.urlOneChiNhanh,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        Log.e("TEST", "Load one chi nhánh respone : " + response);
                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            HomeFragment.arrayList.add(new Store(name, jsonObject.getString("Dia_chi_chi_nhanh")));
                            HomeFragment.adapter.notifyDataSetChanged();
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Log.e("TEST","Load one chi nhánh error : " +  error.toString());
            }
        }) {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<String, String>();
                params.put("idChiNhanh", idChiNhanh);
                return params;
            }
        };
        VolleySingleton.getInstance(this.context).getRequestQueue().add(insertRequest);
        try {
            Thread.sleep(5000);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
    }

    public void loadCuaHang(){

        final AlertDialog.Builder alertdialog = new AlertDialog.Builder(context);
        alertdialog.setTitle("Please wait......."); // Alert Box Title
        alertdialog.setMessage("");
        alertdialog.setIcon(R.drawable.loading);

        final AlertDialog alt = alertdialog.create();
        alt.show();

        StringRequest insertRequest = new StringRequest(
                Request.Method.GET,
                Utils.urlCuaHang,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        Log.e("TEST", "Load stores respone : " + response.toString());
                        JSONArray jsonArray = null;
                        try {
                            jsonArray = new JSONArray(response.toString());
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                        for (int j = 0; j < jsonArray.length(); j++) {
                            Store store = null;
                            try {
                                JSONObject storeObj = jsonArray.getJSONObject(j);
                                JSONArray chiNhanhS = storeObj.getJSONArray("Chi_Nhanh_id");
                                if(chiNhanhS.length() == 0)
                                    //store = new Store(storeObj.getString("Ten_cua_hang"), storeObj.getString( "Dia_chi_cua_hang_chinh"));
                                    continue;
                                if(chiNhanhS.length() == 1)
                                {
                                    getOneChiNhanh(chiNhanhS.get(0).toString(), storeObj.getString("Ten_cua_hang"));
                                    continue;
                                }
                                else {
                                    store = new Store(storeObj.getString("Ten_cua_hang"), "Có " + storeObj.getJSONArray("Chi_Nhanh_id").length() + " chi nhánh !");
                                }
                                HomeFragment.arrayList.add(store);
                                HomeFragment.adapter.notifyDataSetChanged();
                            } catch (JSONException e) {
                                e.printStackTrace();
                            }
                        }
                        alt.cancel();
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                alt.cancel();
                Log.e("TEST","Load stores error : " +  error.toString());
            }
        }) {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<String, String>();
                return params;
            }
        };
        VolleySingleton.getInstance(this.context).getRequestQueue().add(insertRequest);
    }

    public void register(final String username, final String email, final String password) {
        StringRequest insertRequest = new StringRequest(
                Request.Method.POST,
                Utils.urlRegister,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        Log.e("TEST", "Register respone : " + response.toString());
                        register(response.toString());
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Log.e("TEST", "Register error : " + error.toString());
                register("-1");
                //showAlertDialog();
            }
        }) {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<String, String>();
                params.put("TaiKhoan", username);
                params.put("MatKhau", password);
                params.put("TenKhachHang", email);
                return params;
            }
        };
        VolleySingleton.getInstance(this.context).getRequestQueue().add(insertRequest);
    }



    private void register(String res)
    {
        Log.e("TEST", "res : " + res);
        if (res.equals("-1") || res.isEmpty())
            Toast.makeText(context, "Đăng ký thất bại ! ", Toast.LENGTH_SHORT).show();
        else {
            Toast.makeText(context, "Đăng ký thành công !", Toast.LENGTH_SHORT).show();
            Intent intent = new Intent(context, LoginActivity.class);
            context.startActivity(intent);
        }
    }

    private void login(String TOKEN){
        if(TOKEN.equals("-1"))
            Toast.makeText(context,"Thông tin đăng nhập sai !", Toast.LENGTH_SHORT).show();
        else
        {
            JSONArray jsonArray = null;
            JSONObject jsonObject = null;
            try {
                jsonArray = new JSONArray(TOKEN);
                jsonObject = jsonArray.optJSONObject(0);
            } catch (JSONException e) {
                e.printStackTrace();
            }
            try {
                if(jsonObject != null)
                {
                    LoginActivity.TOKEN = jsonObject.getString("token");
                    LoginActivity.NAME = jsonObject.getString("name");
                }
            } catch (JSONException e) {
                e.printStackTrace();
            }
            Toast.makeText(context,"Đăng nhập thành công !", Toast.LENGTH_SHORT).show();
            Intent intent=new Intent(context,MainActivity.class);
            context.startActivity(intent);
        }
    }

    public void showAlertDialog(){
        AlertDialog.Builder builder = new AlertDialog.Builder(context);
        builder.setTitle("ThangCoder.Com");
        builder.setMessage("Bạn có muốn đăng xuất không?");
        builder.setCancelable(false);
        builder.setPositiveButton("Ứ chịu", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialogInterface, int i) {
                Toast.makeText(context, "Không thoát được", Toast.LENGTH_SHORT).show();
            }
        });
        builder.setNegativeButton("Đăng xuất", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialogInterface, int i) {
                dialogInterface.dismiss();
            }
        });
        AlertDialog alertDialog = builder.create();
        alertDialog.show();

    }
}