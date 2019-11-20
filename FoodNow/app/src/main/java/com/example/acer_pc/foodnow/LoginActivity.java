package com.example.acer_pc.foodnow;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.Html;
import android.text.Spanned;
import android.text.method.LinkMovementMethod;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.example.acer_pc.foodnow.Data.DAL;

import org.json.JSONException;
import org.json.JSONObject;

public class LoginActivity extends AppCompatActivity {
    public static String TOKEN;

    TextView hyperlink, register;
    EditText username, password;
    Button login;
    DAL dal;

    Spanned Text;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        init();
        //======================================
        Text = Html.fromHtml("<a href='#'>Quên mật khẩu</a>");
        hyperlink.setMovementMethod(LinkMovementMethod.getInstance());
        hyperlink.setText(Text);

        //======================================= ĐĂNG KÝ
        register.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent=new Intent(LoginActivity.this,RegisterActivity.class);
                startActivity(intent);
            }
        });

        //======================================= LOGIN
        login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if(!username.getText().toString().isEmpty() && !password.getText().toString().isEmpty())
                {
                    dal.login(username.getText().toString(), password.getText().toString());
                }
                else
                    Toast.makeText(LoginActivity.this, "Hãy nhập thông tin đầy đủ !", Toast.LENGTH_SHORT).show();
            }
        });
    }

    private void init(){
        hyperlink=findViewById(R.id.textQMK);
        register=findViewById(R.id.link_register);
        username = findViewById(R.id.edt_register_username);
        password = findViewById(R.id.edt_register_password);
        login = findViewById(R.id.btn_login);
        dal = new DAL(LoginActivity.this);
    }
}
