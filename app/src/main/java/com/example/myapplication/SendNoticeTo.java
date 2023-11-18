package com.example.myapplication;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

public class SendNoticeTo extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_send_notice_to);

        EditText topic=findViewById(R.id.topic);
        EditText title=findViewById(R.id.title);
        EditText body=findViewById(R.id.body);
        Button send=findViewById(R.id.send);

        send.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                String sTopic= topic.getText().toString();
                String sTitle= title.getText().toString();
                String sBody= body.getText().toString();

                SendNotificationAPI notificationAPI=new SendNotificationAPI();
                notificationAPI.sendNotificationToTopic(sTopic,sTitle,sBody);

            }
        });


    }
}