package com.example.acer_pc.foodnow.Object;

import android.util.Log;

import com.example.acer_pc.foodnow.Data.Utils;
import com.example.acer_pc.foodnow.R;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

public class Cart {
    private String state, date, urlImg;
    private String idStore, nameStore, idOrder;
    private String addressStore;
    private String typePay;
    private Double total;

    public void setJsonArrayDetailCart(JSONArray jsonArrayDetailCart) {
        this.jsonArrayDetailCart = jsonArrayDetailCart;
    }

    private JSONArray jsonArrayDetailCart;
    private int countItem;

    public String getTypePayString(){
        if (state.equals("0"))
            return "";
        return typePay;
    }

    public String getTypePay() {
        if (state.equals("0"))
            return "";
        if(typePay.equals("1"))
            return " - Tiền mặt";
        return " - Paypal";
    }

    public void setTypePay(String typePay) {
        this.typePay = typePay;
    }

    public Cart() {
    }

    public String getIdStore() {
        return idStore;
    }

    public void setIdStore(String idStore) {
        this.idStore = idStore;
    }

    public String getIdOrder() {
        return idOrder;
    }

    public void setIdOrder(String idOrder) {
        this.idOrder = idOrder;
    }

    public String getStateString() {
        String result = "";
        switch (state){
            case "1":
                result = "Chờ xác nhận";
                break;
            case "2":
                result = "Đang giao";
                break;
            case "3":
                result = "Đã hủy";
                break;
            case "4":
                result = "Đã giao";
                break;
        }
        return result;
    }

    public String getState(){
        return this.state;
    }

    public void setState(String state) {
        this.state = state;
    }

    public String getDate() {
        Log.i("response", "date " + date);
        Log.i("response", "date " + date.substring(0, 10) + " | " + date.substring(11, 16));
        return date.substring(0, 10) + " | " + date.substring(11, 16);
    }

    public void setDate(String date) {
        this.date = date;
    }

    public String getUrlImg() {
        return Utils.getUrlImageStore(this.urlImg);
    }

    public void setUrlImg(String urlImg) {
        this.urlImg = urlImg;
    }

    public String getNameStore() {
        return nameStore;
    }

    public void setNameStore(String nameStore) {
        this.nameStore = nameStore;
    }

    public String getAddressStore() {
        return addressStore;
    }

    public void setAddressStore(String addressStore) {
        this.addressStore = addressStore;
    }

    public void setTotal(Double total) {
        this.total = total;
    }

    public double getTotal() {
        if(total == null) {
            total = 0.0;
            for (int i = 0; i < jsonArrayDetailCart.length(); i++) {
                try {
                    JSONObject jsonObjectOrder = jsonArrayDetailCart.getJSONObject(i);
                    total += jsonObjectOrder.getDouble("Don_gia");
                } catch (JSONException e) {
                    e.printStackTrace();
                }
            }
        }
        return total;
    }

    public int getCountItem() {
        countItem = 0;
        for (int i = 0; i < jsonArrayDetailCart.length(); i++) {
            try {
                JSONObject jsonObjectOrder = jsonArrayDetailCart.getJSONObject(i);
                countItem += jsonObjectOrder.getInt("SoLuong");
            } catch (JSONException e) {
                e.printStackTrace();
            }
        }
        return countItem;
    }

    public void setCountItem(int countItem) {
        this.countItem = countItem;
    }

    public String getToTal_Full(){
        return String.format("%.1f", getTotal()) + " đ ( " + getCountItem() + " Phần )" + getTypePay();
    }
}
