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

import com.example.acer_pc.foodnow.InformationStoreActivity;
import com.example.acer_pc.foodnow.Object.Food;
import com.example.acer_pc.foodnow.R;
import com.example.acer_pc.foodnow.ShoppingCartActivity;

import java.util.ArrayList;

public class InforStoreFoodsAdapter extends RecyclerView.Adapter<InforStoreFoodsAdapter.InforStoreFoodsViewHolder>{
    ArrayList<Food> arrayListFoods;
    Context context;

    public InforStoreFoodsAdapter(ArrayList<Food> arrayListFoods, Context context) {
        this.arrayListFoods = arrayListFoods;
        this.context = context;
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
        textView.setText(InformationStoreActivity.calculateCost() + " đ");
    }

    private void addToCart(Food food){
        if(InformationStoreActivity.shoppingCart.size() == 0){
            InformationStoreActivity.shoppingCart.add(food.NewFood());
            Toast.makeText(context, "Thêm mới !",Toast.LENGTH_SHORT).show();
            calculateCost();
        } else {
            for (Food item : InformationStoreActivity.shoppingCart) {
                if (item.getId().equals(food.getId())) {
                    item.setCount(item.getCountInt() + 1);
                    calculateCost();
                    Toast.makeText(context, "Tăng số lượng !", Toast.LENGTH_SHORT).show();
                    Log.i("cart", "Infor cart \n");
                    for (Food i : InformationStoreActivity.shoppingCart) {
                        Log.i("cart", "\nID : " + i.getId());
                    }
                    return;
                }
            }
            InformationStoreActivity.shoppingCart.add(food.NewFood());
            calculateCost();
            Toast.makeText(context, "Thêm mới !", Toast.LENGTH_SHORT).show();
        }
        Log.i("cart", "Infor cart \n");
        for (Food item : InformationStoreActivity.shoppingCart) {
            Log.i("cart", "\nID : " + item.getId());
        }
    }

    private void removeFromCart(Food food){
        for (Food item : InformationStoreActivity.shoppingCart) {
            if(item.getId().equals(food.getId())){
                item.setCount(item.getCountInt() - 1);
                calculateCost();
                Toast.makeText(context, "Giảm số lượng !",Toast.LENGTH_SHORT).show();
                return;
            }
        }
    }

    private void deleteFromCart(Food food){
        for (Food item : InformationStoreActivity.shoppingCart) {
            if(item.getId().equals(food.getId())){
                InformationStoreActivity.shoppingCart.remove(item);
                calculateCost();
                Toast.makeText(context, "Xóa khỏi giỏ !",Toast.LENGTH_SHORT).show();
                return;
            }
        }
    }
    @Override
    public void onBindViewHolder(final InforStoreFoodsViewHolder holder, final int position) {
        final Food food = arrayListFoods.get(position);
        holder.imageView.setImageResource(food.getImg());
        holder.txtNameFood.setText(food.getName());
        holder.txtDetailFood.setText(food.getDetail());
        holder.txtCostFood.setText(food.getCost());
        holder.txtLikeFood.setText(food.getLike());
        holder.txtPriceFood.setText(food.getPrice());
        holder.txtNumItem.setText(food.getCount());
        if(food.getCountInt() > 0)
        {
            holder.btnRemove.setVisibility(View.VISIBLE);
            holder.txtNumItem.setVisibility(View.VISIBLE);
        }
        holder.btnAdd.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                //show group cart
                RelativeLayout groupShoppingCart = ((Activity) context).findViewById(R.id.infor_store_group_shopping_cart);
                groupShoppingCart.setVisibility(View.VISIBLE);

                //shop group add/remove
                holder.btnRemove.setVisibility(View.VISIBLE);
                holder.txtNumItem.setVisibility(View.VISIBLE);

                food.setCount(food.getCountInt() + 1);
                holder.txtNumItem.setText(food.getCount());
                addToCart(food);
                InforStoreFoodTypeAdapter.inforStoreFoodsAdapter.notifyItemChanged(position);
                TextView textView = ((Activity) context).findViewById(R.id.infor_store_number_shopping_cart);
                textView.setText(String.format("%d", InformationStoreActivity.shoppingCart.size()));
            }
        });
        holder.btnRemove.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(food.getCountInt() == 1) {
                    deleteFromCart(food);
                    food.setCount(0);
                    holder.txtNumItem.setText(food.getCount());
                    //hide group add/remove
                    holder.btnRemove.setVisibility(View.GONE);
                    holder.txtNumItem.setVisibility(View.GONE);
                    InforStoreFoodTypeAdapter.inforStoreFoodsAdapter.notifyItemChanged(position);
                    TextView textView = ((Activity) context).findViewById(R.id.infor_store_number_shopping_cart);
                    textView.setText(String.format("%d", InformationStoreActivity.shoppingCart.size()));
//                    if(InformationStoreActivity.shoppingCart.size() > 1) {
//                        TextView textView = ((Activity) context).findViewById(R.id.infor_store_number_shopping_cart);
//                        textView.setText(String.format("%d", InformationStoreActivity.shoppingCart.size()));
//                    }
                    if(InformationStoreActivity.shoppingCart.size() == 0){
                        //hide group cart
                        RelativeLayout groupShoppingCart = ((Activity) context).findViewById(R.id.infor_store_group_shopping_cart);
                        groupShoppingCart.setVisibility(View.GONE);
                    }
                } else if(food.getCountInt() > 1) {
                    removeFromCart(food);
                    food.setCount(food.getCountInt() - 1);
                    holder.txtNumItem.setText(food.getCount());
                    InforStoreFoodTypeAdapter.inforStoreFoodsAdapter.notifyItemChanged(position);
                }
            }
        });
    }

    @Override
    public int getItemCount() {
        return arrayListFoods.size();
    }

    public static class InforStoreFoodsViewHolder extends RecyclerView.ViewHolder {
        public ImageView imageView;
        public TextView txtNameFood, txtDetailFood, txtCostFood, txtLikeFood, txtPriceFood,txtNumItem;
        public Button btnRemove, btnAdd;
        public InforStoreFoodsViewHolder(View itemView) {
            super(itemView);
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
