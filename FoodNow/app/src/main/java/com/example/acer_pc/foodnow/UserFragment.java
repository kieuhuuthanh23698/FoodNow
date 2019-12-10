package com.example.acer_pc.foodnow;

import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.TextView;

public class UserFragment extends Fragment {
    TextView txtName;
    Button btnLogout;

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_user, container, false);
        txtName = view.findViewById(R.id.txtName);
        btnLogout = view.findViewById(R.id.button);
        if(!LoginActivity.TOKEN.isEmpty()){
            txtName.setText(LoginActivity.NAME);
            btnLogout.setVisibility(View.GONE);
        }
        return view;
    }
}
