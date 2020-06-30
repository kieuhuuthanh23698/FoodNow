package com.example.acer_pc.foodnow.Object;

import com.example.acer_pc.foodnow.Data.Utils;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class SystemVoucher {
    private String id, MaGiamGia, Icon;
    private int GioBD, GioKT, PhanTram_GiamGia;
    private ArrayList<String> DanhSach_CH;

    public SystemVoucher(JSONObject jsonObjectSystemVoucher) throws JSONException {
        id = jsonObjectSystemVoucher.getString("_id");
        MaGiamGia = jsonObjectSystemVoucher.getString("MaGiamGia");
        Icon = jsonObjectSystemVoucher.getString("Icon");
        GioBD = jsonObjectSystemVoucher.getInt("GioBD");
        GioKT = jsonObjectSystemVoucher.getInt("GioKT");
        PhanTram_GiamGia = jsonObjectSystemVoucher.getInt("PhanTram_GiamGia");
        JSONArray jsonArrayDanhSach_CH = jsonObjectSystemVoucher.getJSONArray("DanhSach_CN");
//        for (int i = 0; i < jsonArrayDanhSach_CH.length(); i++) {
//            JSONObject jsonObjectItem_CH = jsonArrayDanhSach_CH.getJSONObject(i);
//            DanhSach_CH.add(jsonObjectItem_CH.toString());
//        }
    }

    public String getContent(){
        if(id.isEmpty())
            return "";
        return "NHẬP " + MaGiamGia + " " + String.valueOf(PhanTram_GiamGia) + "% " +
                "Off/ " + String.valueOf(GioBD) + "h - " + String.valueOf(GioKT) + "h";
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getMaGiamGia() {
        return MaGiamGia;
    }

    public void setMaGiamGia(String maGiamGia) {
        MaGiamGia = maGiamGia;
    }

    public String getIcon() {
        return Utils.getUrlIconVoucher(this.Icon);
    }

    public void setIcon(String icon) {
        Icon = icon;
    }

    public int getGioBD() {
        return GioBD;
    }

    public void setGioBD(int gioBD) {
        GioBD = gioBD;
    }

    public int getGioKT() {
        return GioKT;
    }

    public void setGioKT(int gioKT) {
        GioKT = gioKT;
    }

    public int getPhanTram_GiamGia() {
        return PhanTram_GiamGia;
    }

    public void setPhanTram_GiamGia(int phanTram_GiamGia) {
        PhanTram_GiamGia = phanTram_GiamGia;
    }

    public ArrayList<String> getDanhSach_CH() {
        return DanhSach_CH;
    }

    public void setDanhSach_CH(ArrayList<String> danhSach_CH) {
        DanhSach_CH = danhSach_CH;
    }
}
