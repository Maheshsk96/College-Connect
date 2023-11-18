package com.example.myapplication;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import java.sql.ResultSet;
import java.util.ArrayList;
import java.util.List;
import java.util.Map;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class notices extends AppCompatActivity {

    ArrayList<NotificationModel> notificationModels;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_notices);

        ListView listView=findViewById(R.id.listview);

        RetrofitInstance.getInstance().apiInterface.getNotice().enqueue(new Callback<NoticeModel>() {
            @Override
            public void onResponse(Call<NoticeModel> call, Response<NoticeModel> response) {
                NoticeModel noticeModel = response.body();
                if(response.isSuccessful()) {

                }
            }

            @Override
            public void onFailure(Call<NoticeModel> call, Throwable t) {
                Log.d("API notice",t.getLocalizedMessage());
            }
        });

//        ArrayList<String> arrayList = new ArrayList<>();
//        ArrayAdapter<String> adapter = new ArrayAdapter<String>(notices.this, android.R.layout.simple_dropdown_item_1line, arrayList);
//        listView.setAdapter(adapter);
//
//
//        RetrofitInstance.getInstance().apiInterface.getData().enqueue(new Callback<ArrayList<NotificationModel>>() {
//            @Override
//            public void onResponse(Call<ArrayList<NotificationModel>> call, Response<ArrayList<NotificationModel>> response) {
//                if (response.isSuccessful()) {
//                    notificationModels = response.body();
//                    for (int i = 0; i < notificationModels.size(); i++) {
//                        arrayList.add(String.valueOf(notificationModels.get(i).getId()));
//                    }
//                    adapter.notifyDataSetChanged();
//                } else {
//                    Log.e("Api Notice", "Response unsuccessful: " + response.message());
//                }
//
//            }
//
//            @Override
//            public void onFailure(Call<ArrayList<NotificationModel>> call, Throwable t) {
//                Log.e("Api Notice",t.getLocalizedMessage());
//            }
//        });
//
        SQLiteDbHelper sq = new SQLiteDbHelper(getApplicationContext());
        Map<String, String[]> result = sq.selectNotice();
        String[] title = result.get("title");
        String[] body = result.get("body");

        ArrayList<String> arrayList = new ArrayList<>();
        for(int i=0; i<title.length; i++){
            arrayList.add(title[i]);
        }


//        ArrayList<String> arrayList = new ArrayList<>();
//        arrayList.add("test 1 ");
//        arrayList.add("test 2 ");

        ArrayAdapter<String> adapter = new ArrayAdapter<String>(notices.this, android.R.layout.simple_list_item_2, android.R.id.text1, arrayList) {
            @Override
            public View getView(int position, View convertView, ViewGroup parent) {
                View view = super.getView(position, convertView, parent);

                TextView text1 = view.findViewById(android.R.id.text1);
                TextView text2 = view.findViewById(android.R.id.text2);

                text1.setText(title[position]);
                text2.setText(body[position]);

                return view;
            }
        };

        listView.setAdapter(adapter);


        listView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                Toast.makeText(notices.this, arrayList.get(position),Toast.LENGTH_SHORT).show();
            }
        });

    }


}