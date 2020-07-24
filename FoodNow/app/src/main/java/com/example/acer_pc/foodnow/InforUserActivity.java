package com.example.acer_pc.foodnow;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.squareup.picasso.Picasso;

import static com.example.acer_pc.foodnow.LoginActivity.user;

public class InforUserActivity extends AppCompatActivity {

    //btn close acti
    ImageView btn_Back;
    //declare var infor user
    ImageView image;
    TextView txt_username, txt_password,txt_name, txt_phone, txt_email, txt_gender, txt_birthday;

    private void init(){
        btn_Back = findViewById(R.id.infor_user_act_btnBack);
        image = findViewById(R.id.infor_user_act_img);
        txt_username = findViewById(R.id.infor_user_act_username);
        txt_password = findViewById(R.id.infor_user_act_password);
        txt_name = findViewById(R.id.infor_user_act_name);
        txt_phone = findViewById(R.id.infor_user_act_phone_number);
        txt_email = findViewById(R.id.infor_user_act_email);
        txt_gender = findViewById(R.id.infor_user_act_gender);
        txt_birthday = findViewById(R.id.infor_user_act_birthday);
    }


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_infor_user);
        init();
        btn_Back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                finish();
            }
        });
    }

    @Override
    protected void onResume() {
        super.onResume();
        if(user != null){
            if(!user.getImg().trim().isEmpty())
                Picasso.get().load(user.getImg()).into(image);
            Log.i("response", user.toString());
            txt_username.setText(user.getUsername());
            txt_password.setText(user.getPassword());
            txt_name.setText(user.getName());
            txt_phone.setText(user.getPhone());
            txt_email.setText(user.getEmail());
            txt_gender.setText(user.getGender());
            txt_birthday.setText(user.getBirth_day());
        } else {
            Toast.makeText(InforUserActivity.this, "Không tìm thấy thông tin khách hàng !", Toast.LENGTH_SHORT).show();
            finish();
        }
    }
}
