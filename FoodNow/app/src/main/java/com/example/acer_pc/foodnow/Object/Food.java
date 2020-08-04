package com.example.acer_pc.foodnow.Object;

import android.support.v7.widget.DividerItemDecoration;
import android.support.v7.widget.LinearLayoutManager;

import com.example.acer_pc.foodnow.Adapter.InforStoreFoodsAdapter;
import com.example.acer_pc.foodnow.Data.CartDetail;
import com.example.acer_pc.foodnow.Data.Utils;
import com.example.acer_pc.foodnow.R;
import com.squareup.picasso.Picasso;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.Date;
import java.util.Random;

import static com.example.acer_pc.foodnow.InformationStoreActivity.shoppingCart;

public class Food {
    private int img, cost, like;
    private String name;
    private String detail;
    private String status;

    public String getUrlImg() {
        return urlImg;
    }

    public void setUrlImg(String urlImg) {
        this.urlImg = Utils.getUrlImageStore(urlImg);
    }

    private String urlImg;
    private Double price;

    private String id;
    private int count;
    private String note;

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getCount() {
        return String.valueOf(count);
    }

    public int getCountInt(){
        return this.count;
    }

    public void setCount(int count) {
        this.count = count;
    }

    public String getNote() {
        return note;
    }

    public void setNote(String note) {
        this.note = note;
    }

    public Food(JSONObject jsonObject) throws JSONException {
        this.id = jsonObject.getString("_id");
        this.name = jsonObject.getString("Ten_mon_an");
        this.urlImg = jsonObject.getString("Ten_mon_an");
        this.urlImg = Utils.getUrlImageFood(jsonObject.getString("Hinh_anh_mon_an"));
        this.detail = jsonObject.getString("Mo_ta_mon_an");
        this.price = jsonObject.getDouble("Don_gia_mon_an");
        this.status = jsonObject.getString("Trang_thai_mon_an");
    }

    public Food() {}

    public Food NewFood(){
        Food tmp = new Food();
        tmp.setImg(this.getImg());
        tmp.setCost(this.getCostInt());
        tmp.setLike(this.getLikeInt());
        tmp.setPrice(this.getPriceDouble());
        tmp.setName(this.getName());
        tmp.setDetail(this.getDetail());
        tmp.setId(this.getId());
        tmp.setCount(1);
        tmp.setNote(this.getNote());
        return tmp;
    }

    public int getImg() {
        return img;
    }

    public void setImg(int img) {
        this.img = img;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getPrice() {
        return String.format("%.1f", price) + " đ";
    }

    public Double getPriceDouble(){
        return this.price;
    }

    public void setPrice(Double price) {
        this.price = price;
    }

    public String getCost() {
        return cost + " +";
    }

    public int getCostInt(){
        return this.cost;
    }

    public void setCost(int cost) {
        this.cost = cost;
    }

    public String getLike() {
        return "" + like;
    }

    public int getLikeInt(){
        return this.like;
    }

    public void setLike(int like) {
        this.like = like;
    }

    public String getStatus() {
        return status;
    }

    public String getDetail() {
        if(this.status.equals("0"))
            return "Quán hết món này !";
        return detail;
    }

    public void setDetail(String detail) {
        this.detail = detail;
    }

    public String getDes(){
        return this.count + " x " + this.name;
    }

    public String getTotal(){
        return String.format("%.1f", price*count) + " đ";
    }

    public void updateStatus(String status) {
        this.status = status;
    }
}
