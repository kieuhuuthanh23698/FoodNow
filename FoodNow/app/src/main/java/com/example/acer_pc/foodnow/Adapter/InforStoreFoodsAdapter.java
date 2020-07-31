package com.example.acer_pc.foodnow.Adapter;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.RelativeLayout;
import android.widget.TextView;
import android.widget.Toast;

import com.example.acer_pc.foodnow.Common.DefineVarible;
import com.example.acer_pc.foodnow.Data.CartDetail;
import com.example.acer_pc.foodnow.Data.DAL_AddProductToCart;
import com.example.acer_pc.foodnow.Data.Utils;
import com.example.acer_pc.foodnow.InformationStoreActivity;
import com.example.acer_pc.foodnow.LoadingActivity;
import com.example.acer_pc.foodnow.LoginActivity;
import com.example.acer_pc.foodnow.Object.Food;
import com.example.acer_pc.foodnow.R;
import com.example.acer_pc.foodnow.ShoppingCartActivity;
import com.squareup.picasso.Picasso;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

import static com.example.acer_pc.foodnow.InformationStoreActivity.shoppingCart;

public class InforStoreFoodsAdapter extends RecyclerView.Adapter<InforStoreFoodsAdapter.InforStoreFoodsViewHolder>{
    DAL_AddProductToCart dal_addProductToCart;
    JSONArray jsonArrayFoods;
    Context context;
    public static boolean requesting = false;

    public InforStoreFoodsAdapter(JSONArray jsonArrayFoods, Context context) {
        this.jsonArrayFoods = jsonArrayFoods;
        this.context = context;
        dal_addProductToCart = new DAL_AddProductToCart(context);
    }

    @Override
    public InforStoreFoodsViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        LayoutInflater layoutInflater = LayoutInflater.from(parent.getContext());
        View listItem= layoutInflater.inflate(R.layout.item_food_of_types, parent, false);
        InforStoreFoodsAdapter.InforStoreFoodsViewHolder viewHolder = new InforStoreFoodsAdapter.InforStoreFoodsViewHolder(listItem);
        return viewHolder;
    }

    private void calculateCost(){
        TextView textView = ((Activity) context).findViewById(R.id.infor_store_total_cost);
        textView.setText(Utils.calculateCost() + " đ");
    }

    @Override
    public void onBindViewHolder(final InforStoreFoodsViewHolder holder, final int position) {
        JSONObject food = null;
        try {
            food = jsonArrayFoods.getJSONObject(position);
            CartDetail item = shoppingCart.get(food.getString("_id"));
            holder.idFood = food.getString("_id");
            holder.img = food.getString("Hinh_anh_mon_an");
            Picasso.get().load(Utils.getUrlImageFood(food.getString("Hinh_anh_mon_an"))).into(holder.imageView);
            holder.txtNameFood.setText(food.getString("Ten_mon_an"));
            if(item != null) {
                item.setId(food.getString("_id"));
                item.setName(food.getString("Ten_mon_an"));
                item.setImg(food.getString("Hinh_anh_mon_an"));
            }
            holder.txtDetailFood.setText(food.getString("Mo_ta_mon_an"));
//            holder.txtCostFood.setText(" " + String.valueOf(food.getDouble("So_luong_mua")));
//            holder.txtLikeFood.setText(" " + String.valueOf(food.getInt("So_luong_thich")));
            holder.price = food.getDouble("Don_gia_mon_an");
            holder.txtPriceFood.setText(String.valueOf(food.getDouble("Don_gia_mon_an")) + " đ");
            holder.txtNumItem.setText(item == null ? "0" : item.getCount());
            if(item != null && item.getCountInt() > 0)
            {
                holder.btnRemove.setVisibility(View.VISIBLE);
                holder.txtNumItem.setVisibility(View.VISIBLE);
            } else{
                holder.btnRemove.setVisibility(View.GONE);
                holder.txtNumItem.setVisibility(View.GONE);
            }
        } catch (JSONException e) {
            e.printStackTrace();
        }
        holder.btnAdd.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(!requesting) {
                    if (LoginActivity.user == null) {
                        Intent intent = new Intent(context, LoginActivity.class);
                        ((Activity) context).startActivity(intent);
                        return;
                    }
                    //show group cart
                    RelativeLayout groupShoppingCart = ((Activity) context).findViewById(R.id.infor_store_group_shopping_cart);
                    groupShoppingCart.setVisibility(View.VISIBLE);
                    //shop group add/remove
                    holder.btnRemove.setVisibility(View.VISIBLE);
                    holder.txtNumItem.setVisibility(View.VISIBLE);
                    CartDetail item = shoppingCart.get(holder.idFood);
                    if (item != null) {
                        item.setCount(item.getCountInt() + 1);
                    } else {
                        item = new CartDetail();
                        item.setId(holder.idFood);
                        item.setCount(1);
                        item.setImg(holder.img);
                        item.setName(holder.txtNameFood.getText().toString());
                        item.setPrice(holder.price);
                        shoppingCart.put(holder.idFood, item);
                    }
                    holder.txtNumItem.setText(shoppingCart.get(holder.idFood).getCount());
                    InforStoreFoodTypeAdapter.inforStoreFoodsAdapter.notifyItemChanged(position);
                    TextView textView = ((Activity) context).findViewById(R.id.infor_store_number_shopping_cart);
                    textView.setText(String.format("%d", shoppingCart.size()));
                    calculateCost();
                    dal_addProductToCart.addProductToCart();
                } else{
                    Toast.makeText(context, "Please waiting ...", Toast.LENGTH_SHORT).show();
                }
            }
        });
        holder.btnRemove.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(!requesting) {
                    if (LoginActivity.user == null) {
                        Intent intent = new Intent(context, LoginActivity.class);
                        ((Activity) context).startActivity(intent);
                        return;
                    }
                    CartDetail item = shoppingCart.get(holder.idFood);
                    if (item.getCountInt() == 1) {
                        shoppingCart.remove(item.getId());
                        holder.txtNumItem.setText("0");
                        //hide group add/remove
                        holder.btnRemove.setVisibility(View.GONE);
                        holder.txtNumItem.setVisibility(View.GONE);
                        TextView textView = ((Activity) context).findViewById(R.id.infor_store_number_shopping_cart);
                        textView.setText(String.format("%d", shoppingCart.size()));
                        RelativeLayout groupShoppingCart = ((Activity) context).findViewById(R.id.infor_store_group_shopping_cart);
                        if (shoppingCart.size() == 0) {
                            //hide group cart
                            groupShoppingCart.setVisibility(View.GONE);
                        } else {
                            //show group cart
                            groupShoppingCart.setVisibility(View.VISIBLE);
                        }
                    } else if (item.getCountInt() > 1) {
                        item.setCount(item.getCountInt() - 1);
                        holder.txtNumItem.setText(item.getCount());
                    }
                    calculateCost();
                    InforStoreFoodTypeAdapter.inforStoreFoodsAdapter.notifyItemChanged(position);
                    dal_addProductToCart.addProductToCart();
                } else{
                    Toast.makeText(context, "Please waiting ...", Toast.LENGTH_SHORT).show();
                }
            }
        });
    }

    @Override
    public int getItemCount() {
        return jsonArrayFoods.length();
    }

    public class InforStoreFoodsViewHolder extends RecyclerView.ViewHolder {
        public String idFood, img;
        public double price;
        public ImageView imageView;
        public TextView txtNameFood, txtDetailFood, txtCostFood, txtLikeFood, txtPriceFood,txtNumItem;
        public Button btnRemove, btnAdd;
        public InforStoreFoodsViewHolder(View itemView) {
            super(itemView);
            this.idFood = "";
            this.imageView = itemView.findViewById(R.id.imgFood);
            this.txtNameFood = itemView.findViewById(R.id.txtFoodName);
            this.txtDetailFood = itemView.findViewById(R.id.txtFoodDetail);
            this.txtCostFood = itemView.findViewById(R.id.txtFoodCost);
            this.txtLikeFood = itemView.findViewById(R.id.numFoodLike);
            this.txtPriceFood = itemView.findViewById(R.id.txtFoodPrice);
            this.txtNumItem = itemView.findViewById(R.id.infor_store_number_item);
            this.btnAdd = itemView.findViewById(R.id.infor_store_add_btn);
            this.btnRemove = itemView.findViewById(R.id.infor_store_remove_btn);
        }
    }
}
