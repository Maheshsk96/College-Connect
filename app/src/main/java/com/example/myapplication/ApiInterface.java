package com.example.myapplication;

import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.http.GET;
import retrofit2.http.POST;

public interface ApiInterface {

//    @GET("/posts")
//   Call <ArrayList<NotificationModel>> getData();

    @POST("/getMsg.php")
    Call <NoticeModel> getNotice();













}
