package com.example.acer_pc.foodnow.Object;

import com.example.acer_pc.foodnow.R;

public class Food {
    private int img, cost, like;
    private String name, detail;
    private Double price;

    private String id;
    private int count;

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public int getCount() {
        return count;
    }

    public void setCount(int count) {
        this.count = count;
    }

    public Food() {
        this.img = R.drawable.food;
        this.name = "Cơm chiên bò";
        this.detail = "Giá đã bao gồm 10% VAT";
        this.cost = 99;
        this.like = 99;
        this.price = 35000.0;
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

    public void setPrice(Double price) {
        this.price = price;
    }

    public String getCost() {
        return cost + " +";
    }

    public void setCost(int cost) {
        this.cost = cost;
    }

    public String getLike() {
        return "" + like;
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
}
