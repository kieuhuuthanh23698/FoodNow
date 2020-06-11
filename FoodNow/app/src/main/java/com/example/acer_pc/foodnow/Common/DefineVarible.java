package com.example.acer_pc.foodnow.Common;

import com.example.acer_pc.foodnow.Data.DAL_AddProductToCart;
import com.example.acer_pc.foodnow.Data.DAL_GetInforFragment_Home;
import com.example.acer_pc.foodnow.Data.DAL_GetInforStore;
import com.example.acer_pc.foodnow.Data.DAL_ConfirmShoppingCart;
import com.example.acer_pc.foodnow.Data.DAL_Login;
import com.example.acer_pc.foodnow.Data.DAL_MyLocation;
public class DefineVarible {

    public static DAL_MyLocation dal_myLocation;
    public static DAL_Login dal_login;
    public static DAL_GetInforFragment_Home dal_getInforFragment_home;
    public static DAL_GetInforStore dal_getInforStore;
    public static DAL_AddProductToCart dal_addProductToCart;
    public static DAL_ConfirmShoppingCart dal_confirmShoppingCart;

    public static final int getMyLocation = 0;
    public static final int loginToServer = 1;
    public static final int getInforFragment = 2;
    public static final int getInforStore = 3;
    public static final int addProductToCart = 4;
    public static final int confirmCart = 5;
    public static final int setNoteCartDetail = 6;
}
