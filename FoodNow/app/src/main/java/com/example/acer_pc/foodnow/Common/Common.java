package com.example.acer_pc.foodnow.Common;

import android.content.Context;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;

import com.example.acer_pc.foodnow.Common.IGoogleApi;

import retrofit2.Retrofit;
import retrofit2.converter.scalars.ScalarsConverterFactory;

public class Common {

    public static String convertCodeToStatus(String code)
    {
        if(code.equals("0"))
            return "Placed";
        else if (code.equals("1"))
            return  "On my way";
        else
            return "Shipped";
    }

    public static  boolean isConnectedToInterner(Context context)
    {
        ConnectivityManager connectivityManager = (ConnectivityManager)context.getSystemService(Context.CONNECTIVITY_SERVICE);
        if(connectivityManager !=null)
        {
            NetworkInfo[] info = connectivityManager.getAllNetworkInfo();
            if (info != null)
            {
                for (int i=0;i<info.length;i++)
                {

                    if (info[i].getState() == NetworkInfo.State.CONNECTED)
                        return  true;
                }

            }

        }
        return  false;
    }

    public static  final String baseURL= "https://googleapis.com";
    public static IGoogleApi getGoogleApi()
    {
        return Common.getClient(baseURL).create(IGoogleApi.class);
    }

    private  static Retrofit retrofit = null;
    public  static  Retrofit getClient(String baseURL)
    {
        if (retrofit == null)
        {
            retrofit = new Retrofit.Builder()
                    .baseUrl(baseURL)
                    .addConverterFactory(ScalarsConverterFactory.create())
                    .build();


        }
        return retrofit;
    }
}

