package com.example.acer_pc.foodnow.Object;

import com.example.acer_pc.foodnow.R;

import java.util.Date;
import java.util.Random;

public class Food {
    private int img, cost, like;
    private String name, detail;
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

    public Food() {
        Date date = new Date();
        Random rn = new Random();
        this.id = String.valueOf(date.getTime() + rn.nextInt(2147483647));
        this.count = 0;
        this.note = "";

        this.img = R.drawable.food;
        this.name = "Cơm chiên bò";
        this.detail = "Giá đã bao gồm 10% VAT";
        this.cost = 99;//số người đã mua
        this.like = 99;//số người đã like
        this.price = 35000.0;
    }

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

    public String getDetail() {
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
}
