package com.example.myapplication;

import com.google.gson.Gson;

import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;


public class RetrofitInstance {
   public static final String API_URL = "#";
    public static RetrofitInstance instance;
    ApiInterface apiInterface;

    RetrofitInstance(){
        Retrofit retrofit = new Retrofit.Builder()
                .baseUrl(API_URL)
                .addConverterFactory(GsonConverterFactory.create()).build();
        apiInterface = retrofit.create(ApiInterface.class);
    }

    public static RetrofitInstance getInstance(){
        if(instance == null) {
            instance = new RetrofitInstance();
        }
        return instance;
    }

}
