package com.example.acer_pc.foodnow.Object;

import java.util.ArrayList;

public class User {
    private String id, name, img, email, phone, birth_day, gender,token;
    private int type_login;
    private Address dia_chi_nha, dia_chi_cty;
    private ArrayList<Address> dia_chi_khac;

    public Address getAddress(){
        if(dia_chi_nha != null)
            return dia_chi_nha;
        if(dia_chi_cty != null)
            return dia_chi_cty;
        if(dia_chi_khac != null && dia_chi_khac.size() > 0)
            return dia_chi_khac.get(0);
        return null;
    }

    public Address getDia_chi_nha() {
        return dia_chi_nha;
    }

    public void setDia_chi_nha(Address dia_chi_nha) {
        this.dia_chi_nha = dia_chi_nha;
    }

    public Address getDia_chi_cty() {
        return dia_chi_cty;
    }

    public void setDia_chi_cty(Address dia_chi_cty) {
        this.dia_chi_cty = dia_chi_cty;
    }

    public ArrayList<Address> getDia_chi_khac() {
        return dia_chi_khac;
    }

    public void setDia_chi_khac(Address dia_chi_khac) {
        this.dia_chi_khac.add(dia_chi_khac);
    }

    public int getType_login() {
        return type_login;
    }

    public void setType_login(int type_login) {
        this.type_login = type_login;
    }

    public String getPhone() {
        return phone;
    }

    public void setPhone(String phone) {
        this.phone = phone;
    }

    public String getBirth_day() {
        return birth_day;
    }

    public void setBirth_day(String birth_day) {
        this.birth_day = birth_day;
    }

    public String getGender() {
        return gender;
    }

    public void setGender(String gender) {
        this.gender = gender;
    }

    public String getToken() {
        return token;
    }

    public void setToken(String token) {
        this.token = token;
    }

    public User() {
        name = "";
        img = "";
        id = "";
        email = "";
        phone = "";
        birth_day = "";
        gender = "";
        token = "";
        dia_chi_khac = new ArrayList<>();
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getImg() {
        return img;
    }

    public void setImg(String img) {
        this.img = img;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    @Override
    public String toString() {
        return "User{" +
                //bắt buộc
                "id='" + id + '\'' +
                ", name='" + name + '\'' +
                //không bắt buộc
                ", img='" + img + '\'' +
                ", email='" + email + '\'' +
                ", phone='" + phone + '\'' +
                ", birth_day='" + birth_day + '\'' +
                ", gender='" + gender + '\'' +
                ", token='" + token + '\'' +
                '}';
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }
}
