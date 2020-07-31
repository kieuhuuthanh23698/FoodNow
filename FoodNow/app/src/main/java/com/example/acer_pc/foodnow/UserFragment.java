package com.example.acer_pc.foodnow;

import android.content.Intent;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.RelativeLayout;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.squareup.picasso.Picasso;

import static com.example.acer_pc.foodnow.LoginActivity.loginManager;
import static com.example.acer_pc.foodnow.LoginActivity.mGoogleSignInClient;
import static com.example.acer_pc.foodnow.LoginActivity.user;

public class UserFragment extends Fragment {
    //infor user
    ImageView imageView;
    TextView txtName, btnLogin, btnLogout;
    //row
    RelativeLayout infor_user_row, address_user_row, phone_user_row;

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_user, container, false);
        init(view);
        btnLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(getContext(), LoginActivity.class);
                startActivity(intent);
            }
        });
        infor_user_row.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(user != null){
                    Intent intent = new Intent(getContext(), InforUserActivity.class);
                    startActivity(intent);
                }
            }
        });
        address_user_row.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(user != null){
                    Intent intent = new Intent(getContext(), AddressUserActivity.class);
                    intent.putExtra("type", 1);
                    startActivity(intent);
                }
            }
        });
        phone_user_row.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(getContext(), VerifyPhoneNumberActivity.class);
                startActivity(intent);
            }
        });
        btnLogout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(user.getType_login() == 0){
                    loginManager.logOut();
                    txtName.setText("");
                    txtName.setVisibility(View.GONE);
                    imageView.setImageResource(R.drawable.user);
                    btnLogin.setVisibility(View.VISIBLE);
                    btnLogout.setVisibility(View.GONE);
                } else if(user.getType_login() == 1){
                    mGoogleSignInClient.signOut().addOnCompleteListener(new OnCompleteListener<Void>() {
                        @Override
                        public void onComplete(@NonNull Task<Void> task) {
                            if(task.isSuccessful()){
                                loginManager.logOut();
                                txtName.setText("");
                                txtName.setVisibility(View.GONE);
                                imageView.setImageResource(R.drawable.user);
                                btnLogin.setVisibility(View.VISIBLE);
                                btnLogout.setVisibility(View.GONE);
                            }
                        }
                    });
                }
                user = null;
            }
        });
        return view;
    }

    private void init(View view){
        //infor user
        imageView = view.findViewById(R.id.fragment_user_image);
        txtName = view.findViewById(R.id.fragment_user_name);
        btnLogin = view.findViewById(R.id.fragment_user_login_button);
        btnLogout = view.findViewById(R.id.fragment_user_logout_button);
        //rows
        infor_user_row = view.findViewById(R.id.fragment_user_infor_user_row);
        address_user_row = view.findViewById(R.id.fragment_user_address_user_row);
        phone_user_row = view.findViewById(R.id.fragment_user_phone_user_row);
    }

    @Override
    public void onDestroy() {
        Toast.makeText(getContext(),"Home fragment exit !", Toast.LENGTH_SHORT).show();
        super.onDestroy();
    }

    @Override
    public void onResume() {
        super.onResume();
        if(user != null){
            Toast.makeText(getContext(), "Login success !", Toast.LENGTH_SHORT).show();
            txtName.setVisibility(View.VISIBLE);
            txtName.setText(user.getName());
            if(!user.getImg().trim().isEmpty())
                Picasso.get().load(user.getImg()).into(imageView);
            btnLogin.setVisibility(View.GONE);
            btnLogout.setVisibility(View.VISIBLE);
        }
    }
}
