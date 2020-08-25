package com.example.acer_pc.foodnow.Object;

import com.example.acer_pc.foodnow.Data.Utils;
import com.example.acer_pc.foodnow.R;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class Store {
    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    private String id;
    private int imgStore;
    private String urlImage;
    private String name = "", address = "";
    private double star = 0.0, distance = 0.0;
    private int time = 0;
    private ArrayList<FoodType> arrayListFood;
    private boolean isFavorite;
    private double lat, lng;

    public Store(JSONObject jsonObjectStore) throws JSONException {
        this.id = jsonObjectStore.getString("_id");
        this.name = jsonObjectStore.getString("Ten_Cua_Hang");
        this.urlImage = Utils.getUrlImageStore(jsonObjectStore.getString("Hinh_Anh_Cua_Hang"));
    }

    public String getUrlImage() {
        return urlImage;
    }

    public void setUrlImage(String urlImage) {
        this.urlImage = Utils.getUrlImageStore(urlImage);
    }

    public double getLat() {
        return lat;
    }

    public void setLat(double lat) {
        this.lat = lat;
    }

    public double getLng() {
        return lng;
    }

    public void setLng(double lng) {
        this.lng = lng;
    }

    public Store(String name, String address) {
        this.name = name;
        this.imgStore = R.drawable.img_store2;
        this.address = "125 Nguyễn Chí Thanh, P.9, Quận 5, TP.HCM";
        this.star = 4.6;
        this.distance = 0.3;
        this.time = 10;
        this.arrayListFood = new ArrayList<>();
        for (int i = 0; i < 6; i++) {
            FoodType foodType = new FoodType();
            foodType.setNameType("Food Type " + i);
            this.arrayListFood.add(foodType);
        }
        this.isFavorite = false;
        this.lat = 10.788968;
        this.lng = 106.660849;
    }

    public Store() {
        this.imgStore = R.drawable.img_store3;
        this.name = "Cơm Tấm Cali - Nguyễn Chí Thanh";
        this.address = "125 Nguyễn Chí Thanh, P.9, Quận 5, TP.HCM";
        this.star = 4.6;
        this.distance = 0.3;
        this.time = 10;
        this.arrayListFood = new ArrayList<>();
        for (int i = 0; i < 6; i++) {
            FoodType foodType = new FoodType();
            foodType.setNameType("Food Type " + i);
            this.arrayListFood.add(foodType);
        }
        this.isFavorite = false;
        this.lat = 10.800313;
        this.lng = 106.626781;
    }

    public Store(int imgStore, String name, String address, double star, double distance, int time, ArrayList<FoodType> arrFoods, boolean isFavorite) {
        this.imgStore = imgStore;
        this.name = name;
        this.address = address;
        this.star = star;
        this.distance = distance;
        this.time = time;
        this.arrayListFood = arrFoods;
        this.isFavorite = isFavorite;
    }

    public int getImgStore() {
        return imgStore;
    }

    public void setImgStore(int imgStore) {
        this.imgStore = imgStore;
    }

    public String getName() {
        return "      " + name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getAddress() {
        return address;
    }

    public void setAddress(String address) {
        this.address = address;
    }

    public String getStar() {
        return String.format("%.1f", star);
    }

    public float getStar_float() {
        return (float)star;
    }

    public void setStar(double star) {
        this.star = star;
    }

    public String getDistance() {
        if(distance == 0.0)
            return "";
        return " " + String.format("%.1f", distance) + " km";
    }

    public void setDistance(double distance) {
        this.distance = distance/1000;

    }

    public String getTime() {
        return time + " phút";
    }

    public void setTime(int time) {
        this.time = time;
    }

    public ArrayList<Food> getArrFoods() {
        ArrayList<Food> arrFoods = new ArrayList<>();
        for (int i = 0; i < arrayListFood.size(); i++) {
            arrFoods.addAll(arrayListFood.get(i).getArrayListFoods());
        }
        return arrFoods;
    }

    public void setArrFoods(ArrayList<FoodType> arrFoods) {
        this.arrayListFood = arrFoods;
    }

    public boolean isFavorite() {
        return isFavorite;
    }

    public void setFavorite(boolean favorite) {
        isFavorite = favorite;
    }

    public ArrayList<FoodType> getArrayListFood() {
        return arrayListFood;
    }
}
