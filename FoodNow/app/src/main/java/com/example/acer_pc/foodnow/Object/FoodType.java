package com.example.acer_pc.foodnow.Object;

import android.support.v7.widget.DividerItemDecoration;
import android.support.v7.widget.LinearLayoutManager;
import android.util.Log;

import com.example.acer_pc.foodnow.Adapter.InforStoreFoodsAdapter;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class FoodType {
    private String nameType;
    ArrayList<Food> arrayListFoods;

    public FoodType() {
    }

    public FoodType(JSONObject jsonObject) throws JSONException{
        this.nameType = "";
        this.arrayListFoods = new ArrayList<>();
        this.nameType = jsonObject.getString("Ten_loai_mon_an");
        JSONArray jsonArrayFoods = jsonObject.getJSONArray("monans");
        for (int i = 0; i < jsonArrayFoods.length(); i++) {
            JSONObject item = null;
            try {
                item = jsonArrayFoods.getJSONObject(i);
                Food food = new Food(item);
                this.arrayListFoods.add(food);
            } catch (JSONException e) {
                e.printStackTrace();
            }
        }
    }

    public String getNameType() {
        return nameType;
    }

    public void setNameType(String nameType) {
        this.nameType = nameType;
    }

    public ArrayList<Food> getArrayListFoods() {
        Log.i("response", "getArrayListFoods: " + arrayListFoods.size());
        return arrayListFoods;
    }

    public void setArrayListFoods(ArrayList<Food> arrayListFoods) {
        this.arrayListFoods = arrayListFoods;
    }

    public void updateStatusFood(String idMonAn, String status) {
        for (int i = 0; i < arrayListFoods.size(); i++) {
            if(arrayListFoods.get(i).getId().equals(idMonAn))
                arrayListFoods.get(i).updateStatus(status);
        }
    }
}
