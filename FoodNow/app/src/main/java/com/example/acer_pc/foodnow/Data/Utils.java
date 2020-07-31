package com.example.acer_pc.foodnow.Data;

import android.content.Context;
import android.content.DialogInterface;
import android.graphics.Bitmap;
import android.graphics.Canvas;
import android.graphics.drawable.Drawable;
import android.location.Address;
import android.location.Geocoder;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.support.v4.content.ContextCompat;
import android.support.v7.app.AlertDialog;
import android.util.Base64;
import android.util.DisplayMetrics;
import android.util.TypedValue;
import android.widget.Toast;

import com.example.acer_pc.foodnow.InformationStoreActivity;
import com.example.acer_pc.foodnow.MainActivity;
import com.example.acer_pc.foodnow.Object.Food;
import com.example.acer_pc.foodnow.Object.User;
import com.google.android.gms.maps.model.BitmapDescriptor;
import com.google.android.gms.maps.model.BitmapDescriptorFactory;

import java.nio.charset.Charset;
import java.security.InvalidKeyException;
import java.security.KeyFactory;
import java.security.NoSuchAlgorithmException;
import java.security.spec.InvalidKeySpecException;
import java.security.spec.X509EncodedKeySpec;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;
import java.util.Locale;

import javax.crypto.BadPaddingException;
import javax.crypto.Cipher;
import javax.crypto.IllegalBlockSizeException;
import javax.crypto.Mac;
import javax.crypto.NoSuchPaddingException;
import javax.crypto.spec.SecretKeySpec;

import static com.example.acer_pc.foodnow.LoginActivity.user;

public class Utils {
    static String uri = "http://192.168.137.1:3000";
//    static String uri = "http://192.168.1.109:3000";

//    static String ipserver = "10.21.151.197:3000";

    public static String urlLogin = uri + "/DangNhap" ;
    public static String urlFragment_Home = uri + "/fragment_home" ;
    public static String urlInforStore = uri + "/thongTinCuaHang" ;
    public static String urlAddProductToCart = uri + "/chonSanPham" ;
    public static String urlConfirmShoppingCart = uri + "/datHang" ;
    public static String urlAddUserAddress = uri + "/themDiaChi" ;
    public static String urlFavoriteStore = uri + "/Themcuahangyeuthich_khachhang" ;
    public static String urlGetFavoriteStores = uri + "/HienThiCuaHang_KhachHangYeuThich" ;
    public static String urlGetStoresOfMenu = uri + "/getDanhSachCuaHang_LoaiMonAn" ;
    public static String urlGetStoresOfSuggest = uri + "/getDanhSachCuaDanhMucHomNay" ;
    public static String urlGetStoresOfGroup = uri + "/getDanhSachCuaDanhMuc" ;
    public static String urlGetStoresOfKMHT = uri + "/getDanhSachCuaHangKMHT" ;
    public static String urlGetOrderListCustomer = uri + "/getDanhSachDonHangKH" ;
    public static String urlSeachStore = uri + "/Hienthiketqua_timkiemmonan" ;
    public static String urlCancelOrder = uri + "/capNhatTrangThaiDonHang" ;
    public static String urlUpdatePhonenumber = uri + "/capNhatSoDienThoaiKhachHang" ;

    public static String urlRegister = uri + "/addKhachHang" ;
    public static String urlCuaHang = uri + "/cuahang" ;
    public static String urlOneChiNhanh = uri + "/OneChiNhanh" ;

    public static String[] arrColor = {"#5574ff", "#2ECD9D", "#FF4081", "#FFA02ECD", "#FFFF8940", "#2cd020"};

    public static String getColor(int i){
        return arrColor[i%arrColor.length];
    }

    public static String calculateCost(){
        float payCost = 0;
        for (CartDetail item : InformationStoreActivity.shoppingCart.values()) {
            payCost += item.getPrice()*item.getCountInt();
        }
        return "" + payCost;
    }

    public static int countNumberItemCart(){
        int num = 0;
        for (CartDetail item : InformationStoreActivity.shoppingCart.values()) {
            num += item.getCountInt();
        }
        return num;
    }

    public static float dipToPixels(Context context, float dipValue){
        DisplayMetrics metrics = context.getResources().getDisplayMetrics();
        return TypedValue.applyDimension(TypedValue.COMPLEX_UNIT_DIP,  dipValue, metrics);
    }

    public static String getCurrentTime(){
        SimpleDateFormat formatter = new SimpleDateFormat("dd/MM/yyyy HH:mm:ss");
        Date date = new Date();
        return formatter.format(date) + " : ";
    }

    public static String getCompleteAddressString(Context context, double LATITUDE, double LONGITUDE) {
        String strAdd = "";
        Geocoder geocoder = new Geocoder(context, Locale.getDefault());
        try {
            List<Address> addresses = geocoder.getFromLocation(LATITUDE, LONGITUDE, 1);
            if (addresses != null) {
                Address returnedAddress = addresses.get(0);
                StringBuilder strReturnedAddress = new StringBuilder("");

                for (int i = 0; i <= returnedAddress.getMaxAddressLineIndex(); i++) {
                    strReturnedAddress.append(returnedAddress.getAddressLine(i).trim());
                }
                strAdd = strReturnedAddress.toString();
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
        return strAdd;
    }

    public static boolean getConnectivityStatus(Context context) {
//        int conn = NetworkUtil.getConnectivityStatus(context);
//        String status = null;
//        if (conn == NetworkUtil.TYPE_WIFI) {
//            status = "Wifi enabled";
//        } else if (conn == NetworkUtil.TYPE_MOBILE) {
//            status = "Mobile data enabled";
//        } else if (conn == NetworkUtil.TYPE_NOT_CONNECTED) {
//            status = "Not connected to Internet";
//        }
//        return status;
        boolean haveConnectedWifi = false;
        boolean haveConnectedMobile = false;

        ConnectivityManager cm = (ConnectivityManager) context.getSystemService(Context.CONNECTIVITY_SERVICE);
        NetworkInfo[] netInfo = cm.getAllNetworkInfo();
        for (NetworkInfo ni : netInfo) {
            if (ni.getTypeName().equalsIgnoreCase("WIFI"))
                if (ni.isConnected())
                    haveConnectedWifi = true;
            if (ni.getTypeName().equalsIgnoreCase("MOBILE"))
                if (ni.isConnected())
                    haveConnectedMobile = true;
        }
        return haveConnectedWifi || haveConnectedMobile;
    }

    public static void showMessage(String message, Context context){
        AlertDialog.Builder alertDialogBuilder = new AlertDialog.Builder(context);
        alertDialogBuilder.setMessage(message);
        AlertDialog alertDialog = alertDialogBuilder.create();
        alertDialog.show();
    }

    public static String getUrlImageStore(String nameImage){
        return uri + "/Public/Images/" + nameImage;
    }

    public static String getUrlImageFood(String nameImage){
        return uri + "/Public/Images/" + nameImage;
    }

    public static String getUrlIconVoucher(String nameImage){
        return uri + "/Public/Images/" + nameImage;
    }

    public static boolean isFavorite(String string) {
        if(user != null)
            return user.isFavorite(string);
        return false;
    }

    public static BitmapDescriptor generateBitmapDescriptorFromRes(Context context, int resId) {
        Drawable drawable = ContextCompat.getDrawable(context, resId);
        drawable.setBounds(
                0,
                0,
                drawable.getIntrinsicWidth(),
                drawable.getIntrinsicHeight());
        Bitmap bitmap = Bitmap.createBitmap(
                drawable.getIntrinsicWidth(),
                drawable.getIntrinsicHeight(),
                Bitmap.Config.ARGB_8888);
        Canvas canvas = new Canvas(bitmap);
        drawable.draw(canvas);
        return BitmapDescriptorFactory.fromBitmap(bitmap);
    }

    public static String encryptRSA(String source, String publicKey) {
        byte[] publicKeyByte = Base64.decode(publicKey, 2);
        X509EncodedKeySpec keySpec = new X509EncodedKeySpec(publicKeyByte);
        String encrypted = "";

        try {
            KeyFactory e = KeyFactory.getInstance("RSA");
            Cipher cipher = Cipher.getInstance("RSA/ECB/PKCS1Padding");
            cipher.init(1, e.generatePublic(keySpec));
            encrypted = Base64.encodeToString(cipher.doFinal(source.getBytes()), 2);
        } catch (NoSuchAlgorithmException var7) {
            var7.printStackTrace();
        } catch (NoSuchPaddingException var8) {
            var8.printStackTrace();
        } catch (InvalidKeySpecException var9) {
            var9.printStackTrace();
        } catch (InvalidKeyException var10) {
            var10.printStackTrace();
        } catch (BadPaddingException var11) {
            var11.printStackTrace();
        } catch (IllegalBlockSizeException var12) {
            var12.printStackTrace();
        }

        return encrypted;
    }

    public static String hash_hmac_sha256(String str, String secret) throws Exception{
        final Charset asciiCs = Charset.forName("US-ASCII");
        final Mac sha256_HMAC = Mac.getInstance("HmacSHA256");
        final SecretKeySpec secret_key = new javax.crypto.spec.SecretKeySpec(asciiCs.encode(str).array(), "HmacSHA256");
        sha256_HMAC.init(secret_key);
        final byte[] mac_data = sha256_HMAC.doFinal(asciiCs.encode(secret).array());
        String result = "";
        for (final byte element : mac_data)
        {
            result += Integer.toString((element & 0xff) + 0x100, 16).substring(1);
        }
        return result;
    }

}
