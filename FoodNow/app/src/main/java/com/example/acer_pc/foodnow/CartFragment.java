package com.example.acer_pc.foodnow;

import android.content.Intent;
import android.content.res.Resources;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.constraint.ConstraintLayout;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.FrameLayout;
import android.widget.LinearLayout;
import android.widget.RelativeLayout;
import android.widget.TextView;
import android.widget.Toast;

import java.util.Timer;
import java.util.TimerTask;

public class CartFragment extends Fragment {

    TimerTask timerTask;
    Timer timer;
    int count = 0;
    FrameLayout frameLayout;
    TextView bat;

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_cart, container, false);
        frameLayout = view.findViewById(R.id.timer);
        bat = view.findViewById(R.id.bat);
        timerTask = null;
        timerTask = new TimerTask() {
            @Override
            public void run() {
                getActivity().runOnUiThread(new Runnable() {
                    @Override
                    public void run() {
                        int width = (int) (count / Resources.getSystem().getDisplayMetrics().density);
                        RelativeLayout.LayoutParams layoutParams = (RelativeLayout.LayoutParams) frameLayout.getLayoutParams();
                        layoutParams.width = width;
                        frameLayout.setLayoutParams(layoutParams);
                        bat.setText(String.valueOf((int)(width*100/130)) + " %");
                        count++;
                        if(width == 130)
                           count = 0;
                    }
                });
            }
        };
        timer = new Timer();
        timer.scheduleAtFixedRate(timerTask,0,50);

        return view;
    }

    @Override
    public void onDestroy() {
        Toast.makeText(getContext(),"Home fragment exit !", Toast.LENGTH_SHORT).show();
        super.onDestroy();
    }
}
