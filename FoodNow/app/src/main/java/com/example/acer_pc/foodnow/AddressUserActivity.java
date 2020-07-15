package com.example.acer_pc.foodnow;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.DividerItemDecoration;
import android.support.v7.widget.LinearLayoutManager;
import android.view.View;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.RelativeLayout;
import android.widget.TextView;

import com.example.acer_pc.foodnow.Adapter.OtherAddressAdapter;
import com.example.acer_pc.foodnow.Object.Address;
import com.takusemba.multisnaprecyclerview.MultiSnapRecyclerView;

import java.util.ArrayList;

import static com.example.acer_pc.foodnow.LoginActivity.user;

public class AddressUserActivity extends AppCompatActivity {

    ImageView btnBack;
    RelativeLayout add_new_address;
    LinearLayout add_home_address_row, add_company_address_row;
    TextView txt_home_address_title, txt_home_address, txt_company_address_title, txt_company_address;
    OtherAddressAdapter otherAddressAdapter;
    MultiSnapRecyclerView list_other_address;

    void init(){
        btnBack = findViewById(R.id.address_user_act_btnBack);
        add_new_address = findViewById(R.id.address_user_act_add_new_address);
        add_home_address_row = findViewById(R.id.address_user_act_add_home_address_row);
        add_company_address_row = findViewById(R.id.address_user_act_add_company_address_row);
        txt_home_address_title = findViewById(R.id.address_user_act_home_address_title);
        txt_home_address = findViewById(R.id.address_user_act_home_address);
        txt_company_address_title = findViewById(R.id.address_user_act_company_address_title);
        txt_company_address = findViewById(R.id.address_user_act_company_address);
        list_other_address = findViewById(R.id.address_user_act_list_other_address);
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_address_user);
        init();
        btnBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                finish();
            }
        });
        add_new_address.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(AddressUserActivity.this, ChooseAddressActivity.class);
                startActivity(intent);
            }
        });
    }

    @Override
    protected void onResume() {
        super.onResume();
        if(user != null){
            //home address
            Address home_address = user.getDia_chi_nha();
            if(home_address != null){
                txt_home_address_title.setText("Nhà");
                txt_home_address.setText(home_address.getAddress());
                txt_home_address.setVisibility(View.VISIBLE);
            } else {
                txt_home_address_title.setText("Thêm địa chỉ Nhà");
                txt_home_address.setText("");
                txt_home_address.setVisibility(View.GONE);
            }
            //company address
            Address company_address = user.getDia_chi_cty();
            if(company_address != null){
                txt_company_address_title.setText("Công ty");
                txt_company_address.setText(company_address.getAddress());
                txt_company_address.setVisibility(View.VISIBLE);
            } else {
                txt_company_address_title.setText("Thêm địa chỉ Công ty");
                txt_company_address.setText("");
                txt_company_address.setVisibility(View.GONE);
            }
            //other address
            otherAddressAdapter = new OtherAddressAdapter(user.getDia_chi_khac());
            list_other_address.setAdapter(otherAddressAdapter);
            LinearLayoutManager friendsLayoutManager = new LinearLayoutManager(AddressUserActivity.this, android.support.v7.widget.LinearLayoutManager.VERTICAL, false);
            list_other_address.setLayoutManager(friendsLayoutManager);
            list_other_address.setNestedScrollingEnabled(false);
            list_other_address.addItemDecoration(new DividerItemDecoration(AddressUserActivity.this, DividerItemDecoration.VERTICAL));
        }
    }
}
