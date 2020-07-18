package com.example.acer_pc.foodnow.Object;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class Suggestion {
    private String id;
    private String title;
    ArrayList<Store> arrStore;

    public Suggestion() {
        this.title = "FoodNow đi chợ";
        arrStore = new ArrayList<>();
        arrStore.add(new Store("Ẩm thực Lotte ss Quận 7","xxx"));
        arrStore.add(new Store("Bánh trà sữa Tí Đô","xxx"));
        arrStore.add(new Store("Cánh gà chiên giòn Cô Tư","xxx"));
        arrStore.add(new Store("Kem bơ Đà Lạt - Trường Chinh","xxx"));
        arrStore.add(new Store("Ẩm thực Lotte Mart Quận 7","xxx"));
        arrStore.add(new Store("Bánh trà sữa Tí Đô","xxx"));
        arrStore.add(new Store("Cánh gà chiên giòn Cô Tư","xxx"));
        arrStore.add(new Store("Kem bơ Đà Lạt - Trường Chinh","xxx"));
        arrStore.add(new Store("Ẩm thực Lotte Mart Quận 7","xxx"));
        arrStore.add(new Store("Bánh trà sữa Tí Đô","xxx"));
        arrStore.add(new Store("Cánh gà chiên giòn Cô Tư","xxx"));
        arrStore.add(new Store("Kem bơ Đà Lạt - Trường Chinh","xxx"));
        arrStore.add(new Store("Ẩm thực Lotte Mart Quận 7","xxx"));
        arrStore.add(new Store("Bánh trà sữa Tí Đô","xxx"));
        arrStore.add(new Store("Cánh gà chiên giòn Cô Tư","xxx"));
        arrStore.add(new Store("Kem bơ Đà Lạt - Trường Chinh","xxx"));
        arrStore.add(new Store("Ẩm thực Lotte Mart Quận 7","xxx"));
        arrStore.add(new Store("Bánh trà sữa Tí Đô","xxx"));
        arrStore.add(new Store("Cánh gà chiên giòn Cô Tư","xxx"));
        arrStore.add(new Store("Kem bơ Đà Lạt - Trường Chinh","xxx"));
        arrStore.add(new Store("Ẩm thực Lotte Mart Quận 7","xxx"));
        arrStore.add(new Store("Bánh trà sữa Tí Đô","xxx"));
        arrStore.add(new Store("Cánh gà chiên giòn Cô Tư","xxx"));
        arrStore.add(new Store("Kem bơ Đà Lạt - Trường Chinh","xxx"));
    }

    public Suggestion(JSONObject jsonObjectSuggestion) throws JSONException {
        this.id = jsonObjectSuggestion.getString("_id");
        this.title = jsonObjectSuggestion.getString("Chu_De_Chinh");
        JSONArray lstCH = jsonObjectSuggestion.getJSONArray("lstCH");
        this.arrStore = new ArrayList<>();
        for (int i = 0; i < lstCH.length(); i++) {
            Store store = new Store(lstCH.getJSONObject(i));
            this.arrStore.add(store);
        }
    }

    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public ArrayList<Store> getArrStore() {
        return arrStore;
    }

    public void setArrStore(ArrayList<Store> arrStore) {
        this.arrStore = arrStore;
    }

    public String getId() {
        return id == null ? "" : id;
    }
}
