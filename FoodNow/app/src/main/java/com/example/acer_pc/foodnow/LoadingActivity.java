package com.example.acer_pc.foodnow;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.ImageView;

import com.example.acer_pc.foodnow.Common.DefineVarible;
import com.example.acer_pc.foodnow.Data.DAL_MyLocation;

import java.util.Timer;
import java.util.TimerTask;

public class LoadingActivity extends AppCompatActivity {

    private ImageView imageView;
    private int radius;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_loading);
        imageView = findViewById(R.id.ic_loading);
        imageView = findViewById(R.id.ic_loading);
        Timer timer = new Timer();
        timer.scheduleAtFixedRate(new TimerTask() {
            @Override
            public void run() {
                runOnUiThread(new Runnable() {
                    @Override
                    public void run() {
                        imageView.setRotation(radius);
                        radius++;
                        if(radius == 180)
                            radius = 0;
                    }
                });
            }
        }, 0 , 5);
        Intent intent = getIntent();
        int action = intent.getIntExtra("action", -1);
        switch (action){
            case -1:
                break;
            case DefineVarible.getMyLocation:
                DAL_MyLocation dal_myLocation = new DAL_MyLocation(LoadingActivity.this);
                dal_myLocation.getMyLocation();
                break;
        }
    }
}
