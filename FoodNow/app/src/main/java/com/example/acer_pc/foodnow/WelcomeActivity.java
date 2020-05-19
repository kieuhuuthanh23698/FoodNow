package com.example.acer_pc.foodnow;

import android.content.Intent;
import android.graphics.Color;
import android.os.Handler;
import android.support.v4.content.ContextCompat;
import android.support.v4.view.ViewPager;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;
import com.example.acer_pc.foodnow.Adapter.ViewPagerAdapter;
import com.example.acer_pc.foodnow.Object.Slider;

import android.support.v7.app.AppCompatActivity;

import java.util.ArrayList;

public class WelcomeActivity extends AppCompatActivity {
    Button btnWelcome;
    ViewPager viewPager;
    LinearLayout sliderDotspanel;
    private int dotscount;
    private ImageView[] dots;
    TextView titleBig, titleSmall;
    String[] strTitleBig = {"BẠN MỚI TỚI","GIẢM GIÁ KHỦNG","CHẤT KHỎI CHÊ"};
    String[] strTitleSmall = {"Xin chào ! Mình là FoodNow - Ứng dụng giao đồ ăn mới toanh tại Việt Nam",
                                "Tha hồ ăn ngon, không cần nhìn giá",
                                "Đồ ăn quá trời, tha hồ mà lựa"};

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_welcome);
//        new Handler().postDelayed(new Runnable() {
//            @Override
//            public void run() {
//                Intent intent = new Intent(WelcomeActivity.this, LoginActivity.class);
//                startActivity(intent);
//                finish();
//            }
//        }, 3000);
        btnWelcome = findViewById(R.id.btnWelcome);
        titleBig = findViewById(R.id.titleBig);
        titleSmall = findViewById(R.id.titleSmall);
        viewPager = (ViewPager) findViewById(R.id.viewPager);
        sliderDotspanel = (LinearLayout) findViewById(R.id.SliderDots);
        ArrayList<Integer> arrImg = new ArrayList<Integer>();
        arrImg.add(R.drawable.slider1);
        arrImg.add(R.drawable.ic_app);
        arrImg.add(R.drawable.slider1);
        Slider slider = new Slider(arrImg);
        ViewPagerAdapter viewPagerAdapter = new ViewPagerAdapter(this, slider);
        viewPager.setAdapter(viewPagerAdapter);
        dotscount = viewPagerAdapter.getCount();
        dots = new ImageView[dotscount];
        for(int i = 0; i < dotscount; i++){

            dots[i] = new ImageView(this);
            dots[i].setImageDrawable(ContextCompat.getDrawable(getApplicationContext(), R.drawable.nonactive_dot));

            LinearLayout.LayoutParams params = new LinearLayout.LayoutParams(LinearLayout.LayoutParams.WRAP_CONTENT, LinearLayout.LayoutParams.WRAP_CONTENT);

            params.setMargins(8, 0, 8, 0);

            sliderDotspanel.addView(dots[i], params);

        }

        dots[0].setImageDrawable(ContextCompat.getDrawable(getApplicationContext(), R.drawable.active_dot));

        viewPager.addOnPageChangeListener(new ViewPager.OnPageChangeListener() {
            @Override
            public void onPageScrolled(int position, float positionOffset, int positionOffsetPixels) {

            }

            @Override
            public void onPageSelected(int position) {

                for(int i = 0; i< dotscount; i++){
                    dots[i].setImageDrawable(ContextCompat.getDrawable(getApplicationContext(), R.drawable.nonactive_dot));
                }

                dots[position].setImageDrawable(ContextCompat.getDrawable(getApplicationContext(), R.drawable.active_dot));
                titleBig.setText(strTitleBig[position]);
                titleSmall.setText(strTitleSmall[position]);//347599
                if(viewPager.getCurrentItem() == 0){
                    //btnWelcome.setBackgroundColor(Color.parseColor("#CCFF0000"));
                    //btnWelcome.setTextColor(Color.parseColor("#ffff"));
                    btnWelcome.setText("Tiếp theo");
                } else if(viewPager.getCurrentItem() == 1){
                    //btnWelcome.setBackgroundColor(Color.parseColor("#CCFF0000"));
                    //btnWelcome.setTextColor(Color.parseColor("#ffff"));
                    btnWelcome.setText("Tiếp theo");
                } else {
                    btnWelcome.setText("Bắt đầu chọn món");
                    //btnWelcome.setBackgroundColor(Color.parseColor("#CCFF0000"));
                    //btnWelcome.setTextColor(Color.parseColor("#347599"));
                }
            }

            @Override
            public void onPageScrollStateChanged(int state) {

            }
        });

        btnWelcome.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(viewPager.getCurrentItem() == 0){
                    viewPager.setCurrentItem(1);
                    btnWelcome.setText("Tiếp theo");
                } else if(viewPager.getCurrentItem() == 1){
                    viewPager.setCurrentItem(2);
                    btnWelcome.setText("Bắt đầu chọn món");
                } else {
                    //viewPager.setCurrentItem(0);
                    //btnWelcome.setText("Tiếp theo");
                    //Intent intent = new Intent(WelcomeActivity.this, LoginActivity.class);
                    Intent intent = new Intent(WelcomeActivity.this, MainActivity.class);
                    startActivity(intent);
                    finish();
                }
            }
        });
    }
}
