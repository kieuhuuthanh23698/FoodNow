package com.example.acer_pc.foodnow;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.example.acer_pc.foodnow.Data.DAL;

public class RegisterActivity extends AppCompatActivity {

    EditText username, email, pass, repass;
    Button register;
    DAL dal;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);
        init();
        register.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if(!username.getText().toString().isEmpty() && !email.getText().toString().isEmpty() && !pass.getText().toString().isEmpty() && !repass.getText().toString().isEmpty())
                {
                    if(pass.getText().toString().equals(repass.getText().toString()))
                    {
                        dal.register(username.getText().toString(), email.getText().toString(), pass.getText().toString());
                    }
                    else
                        Toast.makeText(RegisterActivity.this, "Re password không giống nhau !", Toast.LENGTH_SHORT).show();
                }
                else
                    Toast.makeText(RegisterActivity.this, "Thông tin không được để trống !", Toast.LENGTH_SHORT).show();
            }
        });
    }

    private void init(){
        username = findViewById(R.id.edt_register_username);
        email = findViewById(R.id.edt_email);
        pass = findViewById(R.id.edt_register_pass);
        repass = findViewById(R.id.edt_register_repass);
        register = findViewById(R.id.btn_register);
        dal = new DAL(RegisterActivity.this);
    }

}
