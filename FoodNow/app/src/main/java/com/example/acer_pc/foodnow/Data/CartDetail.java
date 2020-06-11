package com.example.acer_pc.foodnow.Data;

public class CartDetail {
    private int count;
    private String id;
    private String note;
    private String name;
    private double price;
    private String img;

    public CartDetail(int count, String id,String note, String name, double price) {
        this.count = count;
        this.id = id;
        this.note = note;
        this.name = name;
        this.price = price;
    }

    public String getImg() {
        return Utils.getUrlImageFood(this.img);
    }

    public void setImg(String img) {
        this.img = img;
    }



    public CartDetail() {}

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public double getPrice() {
        return price;
    }

    public void setPrice(double price) {
        this.price = price;
    }

    public int getCountInt() {
        return count;
    }

    public String getCount() {
        return String.valueOf(count);
    }

    public void setCount(int count) {
        this.count = count;
    }

    public String getNote() {
        return note == null ? "" : note;
    }

    public void setNote(String note) {
        this.note = note;
    }

    public String getDes() {
        return this.count + " x "+ this.name;
    }

    public String getTotal() {
        return String.valueOf(this.price*this.count) + " đ";
    }
}
