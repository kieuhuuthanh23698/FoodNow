package com.example.acer_pc.foodnow.Object;

import com.example.acer_pc.foodnow.R;

public class Cart {
    private int imgStore;

    public int getImgStore() {
        return imgStore;
    }

    public void setImgStore(int imgStore) {
        this.imgStore = imgStore;
    }

    public void setTotal(Double total) {
        this.total = total;
    }

    private String nameStore;
    private String addressStore;
    private Double total;
    private int countItem;

    public Cart() {
        imgStore = R.drawable.img_store2;
        nameStore = "Cơm Tấm Cali - Nguyễn Chí Thanh";
        addressStore = "125 Nguyễn Chí Thanh, P.9, Quận 5, TP.HCM";
        total = 35000.0;
        countItem = 4;
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

    public double getTotal() {
        return total;
    }

    public void setTotal(double total) {
        this.total = total;
    }

    public int getCountItem() {
        return countItem;
    }

    public void setCountItem(int countItem) {
        this.countItem = countItem;
    }

    public String getToTal_Full(){
        return String.format("%.1f", total) + " đ ( " + countItem + " Phần)";
    }
}
