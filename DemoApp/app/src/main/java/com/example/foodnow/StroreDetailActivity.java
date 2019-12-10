package com.example.foodnow;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;

public class StroreDetailActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_strore_detail);
        getSupportActionBar().setTitle("Cửa hàng Phúc Long");
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
    }
}
