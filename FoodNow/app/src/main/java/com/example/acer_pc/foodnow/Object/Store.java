package com.example.acer_pc.foodnow.Object;

import com.example.acer_pc.foodnow.R;

public class Store {
    int imgStore;
    String name = "", address = "";

    public Store(String name, String address) {
        imgStore = R.id.imgStore;
        this.name = name;
        this.address = address;
    }

    public int getImgStore() {
        return imgStore;
    }

    public void setImgStore(int imgStore) {
        this.imgStore = imgStore;
    }

    public String getName() {
        return name;
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
}
