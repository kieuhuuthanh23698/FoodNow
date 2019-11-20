package com.example.acer_pc.foodnow.Data;

import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.support.v7.app.AlertDialog;
import android.util.Log;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.DefaultRetryPolicy;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.acer_pc.foodnow.LoginActivity;
import com.example.acer_pc.foodnow.MainActivity;
import com.example.acer_pc.foodnow.R;
import com.example.acer_pc.foodnow.RegisterActivity;

import org.json.JSONException;
import org.json.JSONObject;

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
              Utils.url,     new Response.Listener<String>() {
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
                //showAlertDialog();
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

    public void register(final String username, final String email, final String password) {
        StringRequest insertRequest = new StringRequest(
                Request.Method.POST,
                "http://" + context.getResources().getString(R.string.ipv4) + "/addKhachHang",
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

    private void login(String TOKEN)
    {
        if(TOKEN.equals("-1"))
            Toast.makeText(context,"Thông tin đăng nhập sai !", Toast.LENGTH_SHORT).show();
        else
        {
            LoginActivity.TOKEN = TOKEN;
            Toast.makeText(context,TOKEN, Toast.LENGTH_SHORT).show();
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