package com.example.acer_pc.foodnow;

import android.app.Dialog;
import android.content.Intent;
import android.graphics.drawable.ColorDrawable;
import android.support.annotation.NonNull;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.Html;
import android.text.Spanned;
import android.util.Log;
import android.view.View;
import android.view.Window;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.example.acer_pc.foodnow.Common.DefineVarible;
import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.OnFailureListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.FirebaseException;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.PhoneAuthCredential;
import com.google.firebase.auth.PhoneAuthProvider;

import java.util.concurrent.TimeUnit;

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
                            sendOTP();
                        }
                    });
                    dialogConfirmOpenGPS.show();
                } else {
                    Toast.makeText(VerifyPhoneNumberActivity.this, "Bạn chưa nhập số điện thoại !", Toast.LENGTH_SHORT).show();
                }
            }
        });
    }

    private String getPhonenumber(){
        String phonenumber = input.getText().toString();
        int i = phonenumber.indexOf("0");
        if(i == 0)
        {
            phonenumber = phonenumber.substring(1, phonenumber.length());
        }
        return phonenumber;
    }

    private void sendOTP(){
        PhoneAuthProvider.getInstance().verifyPhoneNumber("+84" + getPhonenumber(),
                120,
                TimeUnit.SECONDS,
                this,
                new PhoneAuthProvider.OnVerificationStateChangedCallbacks() {
                    @Override
                    public void onVerificationCompleted(PhoneAuthCredential phoneAuthCredential) {
                    }

                    @Override
                    public void onCodeSent(String s, PhoneAuthProvider.ForceResendingToken forceResendingToken) {
                        super.onCodeSent(s, forceResendingToken);
                        final String verifyId = s;
                        final Dialog dialogVerifyOTP = new Dialog(VerifyPhoneNumberActivity.this);
                        dialogVerifyOTP.requestWindowFeature(Window.FEATURE_NO_TITLE);
                        dialogVerifyOTP.getWindow().setBackgroundDrawable(new ColorDrawable(android.graphics.Color.TRANSPARENT));
                        dialogVerifyOTP.setContentView(R.layout.verrify_phone_dialog);
                        final EditText inputOTP = dialogVerifyOTP.findViewById(R.id.verrify_phone_dialog_input);
                        TextView btnResend = dialogVerifyOTP.findViewById(R.id.verrify_phone_dialog_btn_resend);
                        Spanned Text = Html.fromHtml("<a href='#'>Gửi lại</a>");
                        btnResend.setText(Text);
                        TextView btnConfirm = dialogVerifyOTP.findViewById(R.id.verrify_phone_dialog_btn_confirm);
                        btnResend.setOnClickListener(new View.OnClickListener() {
                            @Override
                            public void onClick(View view) {
                                dialogVerifyOTP.dismiss();
                                sendOTP();
                            }
                        });
                        btnConfirm.setOnClickListener(new View.OnClickListener() {
                            @Override
                            public void onClick(View view) {
                                String strOTP = inputOTP.getText().toString().trim();
                                if(!strOTP.isEmpty() && strOTP.length() == 6) {
                                    PhoneAuthCredential phoneAuthCredential1 = PhoneAuthProvider.getCredential(verifyId, strOTP);
                                    FirebaseAuth.getInstance().signInWithCredential(phoneAuthCredential1)
                                    .addOnCompleteListener(new OnCompleteListener<AuthResult>() {
                                        @Override
                                        public void onComplete(@NonNull Task<AuthResult> task) {
                                            dialogVerifyOTP.dismiss();
                                            if(task.isSuccessful()) {
                                                Intent intent = new Intent(VerifyPhoneNumberActivity.this, LoadingActivity.class);
                                                intent.setAction(Intent.ACTION_SEND);
                                                intent.putExtra("action", DefineVarible.updatePhonenumber);
                                                intent.putExtra("phonenumber", input.getText().toString().trim());
                                                startActivityForResult(intent, DefineVarible.updatePhonenumber);
                                            } else {
                                                Toast.makeText(VerifyPhoneNumberActivity.this, "Mã OTP của bạn không đúng !", Toast.LENGTH_SHORT).show();
                                            }
                                        }
                                    })
                                    .addOnFailureListener(new OnFailureListener() {
                                        @Override
                                        public void onFailure(@NonNull Exception e) {
                                            inputOTP.setText("");
                                            Toast.makeText(VerifyPhoneNumberActivity.this, "Mã OTP của bạn không đúng !", Toast.LENGTH_SHORT).show();
                                        }
                                    });
                                }
                            }
                        });
                        dialogVerifyOTP.show();
                    }

                    @Override
                    public void onCodeAutoRetrievalTimeOut(String s) {
                        super.onCodeAutoRetrievalTimeOut(s);
                    }

                    @Override
                    public void onVerificationFailed(FirebaseException e) {
                        Log.i("response", "onVerificationFailed: " + e.toString());
                        Toast.makeText(VerifyPhoneNumberActivity.this, "Số điện thoại không chính xác !", Toast.LENGTH_LONG).show();
                    }
                }
        );

    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if(requestCode == DefineVarible.updatePhonenumber){
            finish();
        }
    }
}
