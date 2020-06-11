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
import android.widget.ImageView;
import android.widget.TextView;

import com.example.acer_pc.foodnow.Adapter.ShoppingCartAdapter;
import com.example.acer_pc.foodnow.Common.DefineVarible;
import com.example.acer_pc.foodnow.Data.CartDetail;
import com.example.acer_pc.foodnow.Data.DAL_AddProductToCart;
import com.example.acer_pc.foodnow.Data.Utils;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import static com.example.acer_pc.foodnow.InformationStoreActivity.shoppingCart;

public class ShoppingCartActivity extends AppCompatActivity implements View.OnClickListener{
    //data
    DAL_AddProductToCart dal_addProductToCart;
    public static JSONArray jsonObjectCartDetail;
    //vùng trống
    private FrameLayout shoppingActEmptyFrame;
    //button close
    private ImageView btn_close;
    //button delete all shopping cart
    private TextView deleteAll_btn;
    //list shopping cart
    private RecyclerView recyclerViewShoppingCart;
    public ShoppingCartAdapter shoppingCartAdapte;
    //group shopping cart
    private TextView numItemCart, totalCost;
    private Button confirm_cart_btn;

    private void init(){
        //DAL
        dal_addProductToCart = new DAL_AddProductToCart(ShoppingCartActivity.this);
        //vùng trống
        shoppingActEmptyFrame = findViewById(R.id.shoppingActEmptyFrame);
        shoppingActEmptyFrame.setOnClickListener(this);
        //button close activity
        btn_close = findViewById(R.id.shopping_cart_btn_close);
        btn_close.setOnClickListener(this);
        //button clear shopping cart
        deleteAll_btn = findViewById(R.id.shopping_cart_deleteAll_btn);
        deleteAll_btn.setOnClickListener(this);
        //list shopping cart
        recyclerViewShoppingCart = findViewById(R.id.list_shopping_cart);
        //group shopping cart
        numItemCart = findViewById(R.id.shopping_cart_number_item_cart);
        totalCost = findViewById(R.id.shopping_cart_total_cost);
        confirm_cart_btn = findViewById(R.id.shopping_cart_confirm_cart_btn);
        confirm_cart_btn.setOnClickListener(this);
    }

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

        init();

        shoppingCartAdapte = new ShoppingCartAdapter(ShoppingCartActivity.this);
        recyclerViewShoppingCart.setAdapter(shoppingCartAdapte);
        recyclerViewShoppingCart.setLayoutManager(new LinearLayoutManager(getApplicationContext(), LinearLayoutManager.VERTICAL, false));
        recyclerViewShoppingCart.addItemDecoration(new DividerItemDecoration(this, DividerItemDecoration.VERTICAL));
        //group shopping cart
        numItemCart.setText(String.format("%d", shoppingCart.size()));
        totalCost.setText("" + Utils.calculateCost());
    }

    @Override
    protected void onResume() {
        super.onResume();
        shoppingCartAdapte.notifyDataSetChanged();
    }

    @Override
    public void onClick(View view) {
        switch (view.getId()){
            case R.id.shoppingActEmptyFrame:
                finish();
                break;
            case R.id.shopping_cart_btn_close:
                finish();
                break;
            case R.id.shopping_cart_deleteAll_btn:
                shoppingCart.clear();
                shoppingCartAdapte.notifyDataSetChanged();
                dal_addProductToCart.addProductToCart();
                finish();
                break;
            case R.id.shopping_cart_confirm_cart_btn:
                if(shoppingCart.size() > 0) {
                    Intent intent = new Intent(ShoppingCartActivity.this, ConfirmCartActivity.class);
                    startActivity(intent);
                    finish();
                }
                break;
            default:
                return;
        }
    }
}
