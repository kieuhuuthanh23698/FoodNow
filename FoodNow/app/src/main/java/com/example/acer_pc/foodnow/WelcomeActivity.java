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
    private Button btnWelcome;
    private ViewPager viewPager;
    private ArrayList<Integer> arrImg;
    private ViewPagerAdapter viewPagerAdapter;
    private LinearLayout sliderDotspanel;
    private int dotscount;
    private ImageView[] dots;
    private TextView titleBig, titleSmall;
    private String[] strTitleBig = {"BẠN MỚI TỚI","GIẢM GIÁ KHỦNG","CHẤT KHỎI CHÊ"};
    private String[] strTitleSmall = {"Xin chào ! Mình là FoodNow - Ứng dụng giao đồ ăn mới toanh tại Việt Nam",
                                "Tha hồ ăn ngon, không cần nhìn giá",
                                "Đồ ăn quá trời, tha hồ mà lựa"};

    private void initView(){
        setContentView(R.layout.activity_welcome);
        btnWelcome = findViewById(R.id.btnWelcome);
        titleBig = findViewById(R.id.titleBig);
        titleSmall = findViewById(R.id.titleSmall);
        viewPager = (ViewPager) findViewById(R.id.viewPager);
        sliderDotspanel = (LinearLayout) findViewById(R.id.SliderDots);

    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        initView();
        arrImg = new ArrayList<Integer>();
        arrImg.add(R.drawable.slider1);
        arrImg.add(R.drawable.ic_app);
        arrImg.add(R.drawable.slider3);
        Slider slider = new Slider(arrImg);
        viewPagerAdapter = new ViewPagerAdapter(this, slider);
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
                titleSmall.setText(strTitleSmall[position]);
                if(viewPager.getCurrentItem() == 0){
                    btnWelcome.setText("Tiếp theo");
                } else if(viewPager.getCurrentItem() == 1){
                    btnWelcome.setText("Tiếp theo");
                } else {
                    btnWelcome.setText("Bắt đầu chọn món");
                }
            }

            @Override
            public void onPageScrollStateChanged(int state) {

            }
        });

        btnWelcome.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(viewPager != null) {
                    if (viewPager.getCurrentItem() == 0) {
                        viewPager.setCurrentItem(1);
                        btnWelcome.setText("Tiếp theo");
                    } else if (viewPager.getCurrentItem() == 1) {
                        viewPager.setCurrentItem(2);
                        btnWelcome.setText("Bắt đầu chọn món");
                    } else {
                        Intent intent = new Intent(WelcomeActivity.this, FlashActivity.class);
                        startActivity(intent);
                        finish();
                    }
                }
            }
        });
    }
}
