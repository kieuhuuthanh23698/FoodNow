package com.example.acer_pc.foodnow;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.View;
import android.widget.RelativeLayout;
import android.widget.TextView;

import com.example.acer_pc.foodnow.Adapter.ConfirmShoppingCartAdapter;

public class ConfirmCartActivity extends AppCompatActivity {
    TextView txtNameStore;
    RecyclerView recyclerViewConfirm_shopping_cart_list;
    LinearLayoutManager friendsLayoutManager;

    RelativeLayout btnCastPaypal, btnCastMoney;
    boolean typeCast = false;//false is default money cast

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_confirm_cart);
        txtNameStore = findViewById(R.id.confirm_shopping_cart_name_store);
        txtNameStore.setText(InformationStoreActivity.txtNameStore.getText().toString().trim());

        recyclerViewConfirm_shopping_cart_list = findViewById(R.id.confirm_shopping_cart_list);
        ConfirmShoppingCartAdapter confirmShoppingCartAdapter = new ConfirmShoppingCartAdapter(this);
        recyclerViewConfirm_shopping_cart_list.setAdapter(confirmShoppingCartAdapter);
        friendsLayoutManager = new LinearLayoutManager(getApplicationContext(), LinearLayoutManager.VERTICAL, false);
        recyclerViewConfirm_shopping_cart_list.setLayoutManager(friendsLayoutManager);
        recyclerViewConfirm_shopping_cart_list.setNestedScrollingEnabled(false);
        recyclerViewConfirm_shopping_cart_list.setHasFixedSize(true);
        friendsLayoutManager.setAutoMeasureEnabled(true);

        btnCastPaypal = findViewById(R.id.confirm_shopping_cart_cast_paypal_btn);
        btnCastMoney = findViewById(R.id.confirm_shopping_cart_cast_money_btn);

        btnCastPaypal.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                changeCast();
            }
        });

        btnCastMoney.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                changeCast();
            }
        });
    }

    private void changeCast(){
        if(!typeCast){//cur is money
            btnCastMoney.setBackgroundResource(R.drawable.check_button);
            btnCastPaypal.setBackgroundResource(R.drawable.border_all);
        } else
        {
            btnCastMoney.setBackgroundResource(R.drawable.border_all);
            btnCastPaypal.setBackgroundResource(R.drawable.check_button);
        }
        typeCast = !typeCast;
    }
}
