package com.example.acer_pc.foodnow;

import android.app.Dialog;
import android.content.Intent;
import android.graphics.drawable.ColorDrawable;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.view.Window;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.example.acer_pc.foodnow.Common.DefineVarible;

import im.delight.android.location.SimpleLocation;

public class VerifyPhoneNumberActivity extends AppCompatActivity {

    ImageView btnBack;
    EditText input;
    TextView btnConfirm;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_verify_phone_number);
        btnBack = findViewById(R.id.verrify_phone_act_btnBack);
        input = findViewById(R.id.verrify_phone_act_input_phone);
        btnConfirm = findViewById(R.id.verrify_phone_act_btn_confirm);

        btnBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                finish();
            }
        });

        btnConfirm.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(!input.getText().toString().trim().isEmpty()){
                    //cập nhật
                    final Dialog dialogConfirmOpenGPS = new Dialog(VerifyPhoneNumberActivity.this);
                    dialogConfirmOpenGPS.requestWindowFeature(Window.FEATURE_NO_TITLE);
                    dialogConfirmOpenGPS.getWindow().setBackgroundDrawable(new ColorDrawable(android.graphics.Color.TRANSPARENT));
                    dialogConfirmOpenGPS.setContentView(R.layout.notification_dialog);
                    TextView content, btnConfirm;
                    content = dialogConfirmOpenGPS.findViewById(R.id.notication_content);
                    content.setText("Bạn có muốn cập nhật số điện thoại ?");
                    btnConfirm = dialogConfirmOpenGPS.findViewById(R.id.notication_btn_confirm);
                    btnConfirm.setOnClickListener(new View.OnClickListener() {
                        @Override
                        public void onClick(View view) {
                            dialogConfirmOpenGPS.dismiss();
                            Intent intent = new Intent(VerifyPhoneNumberActivity.this, LoadingActivity.class);
                            intent.setAction(Intent.ACTION_SEND);
                            intent.putExtra("action", DefineVarible.updatePhonenumber);
                            intent.putExtra("phonenumber", input.getText().toString().trim());
                            startActivityForResult(intent, DefineVarible.updatePhonenumber);
                        }
                    });
                } else {
                    Toast.makeText(VerifyPhoneNumberActivity.this, "Bạn chưa nhập số điện thoại !", Toast.LENGTH_SHORT).show();
                }
            }
        });
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if(requestCode == DefineVarible.updatePhonenumber){
            finish();
        }
    }
}
