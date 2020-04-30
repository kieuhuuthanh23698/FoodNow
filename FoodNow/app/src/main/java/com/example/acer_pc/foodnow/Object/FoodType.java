package com.example.acer_pc.foodnow.Object;

import java.util.ArrayList;

public class FoodType {
    private String nameType;
    ArrayList<Food> arrayListFoods;

    public FoodType() {
        this.nameType = "Bún mì";
        this.arrayListFoods = new ArrayList<>();
        this.arrayListFoods.add(new Food());
        this.arrayListFoods.add(new Food());
        this.arrayListFoods.add(new Food());
        this.arrayListFoods.add(new Food());
        this.arrayListFoods.add(new Food());
        this.arrayListFoods.add(new Food());
        this.arrayListFoods.add(new Food());
        this.arrayListFoods.add(new Food());
        this.arrayListFoods.add(new Food());
        this.arrayListFoods.add(new Food());
    }

    public String getNameType() {
        return nameType;
    }

    public void setNameType(String nameType) {
        this.nameType = nameType;
    }

    public ArrayList<Food> getArrayListFoods() {
        return arrayListFoods;
    }

    public void setArrayListFoods(ArrayList<Food> arrayListFoods) {
        this.arrayListFoods = arrayListFoods;
    }
}
