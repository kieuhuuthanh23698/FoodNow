package com.example.acer_pc.foodnow;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.DividerItemDecoration;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.DisplayMetrics;
import android.view.Gravity;
import android.view.View;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.FrameLayout;
import android.widget.TextView;

import com.example.acer_pc.foodnow.Adapter.ShoppingCartAdapter;

public class ShoppingCartActivity extends AppCompatActivity {
    private FrameLayout shoppingActEmptyFrame;
    private RecyclerView recyclerViewShoppingCart;
    public static ShoppingCartAdapter shoppingCartAdapte;
    private TextView numItemCart, totalCost, deleteAll_btn;
    private Button confirm_cart_btn;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_shopping_cart);

        DisplayMetrics dm = new DisplayMetrics();
        getWindowManager().getDefaultDisplay().getMetrics(dm);

        int width = dm.widthPixels;
        int height = dm.heightPixels;

        getWindow().setLayout((int)(width*1), (int)(height*1));

        WindowManager.LayoutParams layoutParams = getWindow().getAttributes();
        layoutParams.gravity = Gravity.BOTTOM;
        layoutParams.x = 0;
        layoutParams.y = -20;

        getWindow().setAttributes(layoutParams);

        shoppingActEmptyFrame = findViewById(R.id.shoppingActEmptyFrame);
        shoppingActEmptyFrame.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                finish();
            }
        });

        deleteAll_btn = findViewById(R.id.shopping_cart_deleteAll_btn);
        deleteAll_btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                InformationStoreActivity.shoppingCart.clear();
                finish();
            }
        });

        recyclerViewShoppingCart = findViewById(R.id.list_shopping_cart);
        shoppingCartAdapte = new ShoppingCartAdapter(this);
        recyclerViewShoppingCart.setAdapter(shoppingCartAdapte);
        LinearLayoutManager friendsLayoutManager = new LinearLayoutManager(getApplicationContext(), LinearLayoutManager.VERTICAL, false);
        recyclerViewShoppingCart.setLayoutManager(friendsLayoutManager);
        recyclerViewShoppingCart.addItemDecoration(new DividerItemDecoration(this, DividerItemDecoration.VERTICAL));

        numItemCart = findViewById(R.id.shopping_cart_number_item_cart);
        numItemCart.setText(String.format("%d", InformationStoreActivity.shoppingCart.size()));

        totalCost = findViewById(R.id.shopping_cart_total_cost);
        totalCost.setText("" + InformationStoreActivity.calculateCost());
        confirm_cart_btn = findViewById(R.id.shopping_cart_confirm_cart_btn);
        confirm_cart_btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(InformationStoreActivity.shoppingCart.size() > 0) {
                    Intent intent = new Intent(ShoppingCartActivity.this, ConfirmCartActivity.class);
                    startActivity(intent);
                }
            }
        });
    }

    @Override
    protected void onResume() {
        super.onResume();
        shoppingCartAdapte.notifyDataSetChanged();
    }
}
