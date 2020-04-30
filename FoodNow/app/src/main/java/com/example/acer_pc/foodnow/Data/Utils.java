package com.example.acer_pc.foodnow.Data;

import android.content.Context;
import android.util.DisplayMetrics;
import android.util.TypedValue;

public class Utils {
    static String ipserver = "192.168.137.1:3000";

    public static String urlLogin = "http://" + ipserver + "/DangNhap" ;
    public static String urlRegister = "http://" + ipserver + "/addKhachHang" ;
    public static String urlCuaHang = "http://" + ipserver + "/cuahang" ;
    public static String urlOneChiNhanh = "http://" + ipserver + "/OneChiNhanh" ;

    public static float dipToPixels(Context context, float dipValue){
        DisplayMetrics metrics = context.getResources().getDisplayMetrics();
        return TypedValue.applyDimension(TypedValue.COMPLEX_UNIT_DIP,  dipValue, metrics);
    }
}
