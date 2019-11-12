package com.example.foodnow;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.text.Html;
import android.text.Spanned;
import android.text.method.LinkMovementMethod;
import android.view.View;
import android.widget.TextView;

import org.w3c.dom.Text;

public class LoginActivity extends AppCompatActivity {

    TextView hyperlink, register;
    Spanned Text;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        AnhXa();
        //======================================
        Text= Html.fromHtml("<a href='https://www.android-examples.com//'>Quên mật khẩu</a>");
        hyperlink.setMovementMethod(LinkMovementMethod.getInstance());
        hyperlink.setText(Text);

        //=======================================
        final Intent intent=new Intent(LoginActivity.this,RegisterActivity.class);
        register.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(intent);
            }
        });

    }

    private void AnhXa()
    {
        hyperlink=findViewById(R.id.textQMK);
        register=findViewById(R.id.link_register);
    }
}
