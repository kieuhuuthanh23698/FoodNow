package com.example.acer_pc.foodnow.Object;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class SystemGroupStore {
    private String id, main_text, sub_text, background;
    private ArrayList<String> arrayListDanhSach_CH;

    public SystemGroupStore(JSONObject jsonObjectSystemGroupStore) throws JSONException {
        id = jsonObjectSystemGroupStore.getString("_id");
        main_text = jsonObjectSystemGroupStore.getString("Thongtin_Chinh");
        sub_text = jsonObjectSystemGroupStore.getString("Thongtin_Phu");
        background = jsonObjectSystemGroupStore.getString("HinhAnh_CH");
//        JSONArray jsonArrayDanhSach_CH = jsonObjectSystemGroupStore.getJSONArray("DanhSach_CH");
//        for (int i = 0; i < jsonArrayDanhSach_CH.length(); i++) {
//            arrayListDanhSach_CH.add(jsonArrayDanhSach_CH.get(i).toString());
//        }
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getMain_text() {
        return main_text;
    }

    public void setMain_text(String main_text) {
        this.main_text = main_text;
    }

    public String getSub_text() {
        return sub_text;
    }

    public void setSub_text(String sub_text) {
        this.sub_text = sub_text;
    }

    public String getBackground() {
        return background;
    }

    public void setBackground(String background) {
        this.background = background;
    }

    public ArrayList<String> getArrayListDanhSach_CH() {
        return arrayListDanhSach_CH;
    }

    public void setArrayListDanhSach_CH(ArrayList<String> arrayListDanhSach_CH) {
        this.arrayListDanhSach_CH = arrayListDanhSach_CH;
    }
}
