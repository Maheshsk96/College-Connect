package com.example.myapplication;

import android.content.Context;
import android.util.Log;

import com.onesignal.OSNotification;
import com.onesignal.OSNotificationReceivedEvent;
import com.onesignal.OneSignal;

import org.json.JSONObject;

public class NotificationService implements OneSignal.OSRemoteNotificationReceivedHandler {

    @Override
    public void remoteNotificationReceived(Context context, OSNotificationReceivedEvent osNotificationReceivedEvent) {

        OSNotification osNotification = osNotificationReceivedEvent.getNotification();

        String title = osNotification.getTitle();
        String body = osNotification.getBody();
        String file = osNotification.getBigPicture();

        JSONObject additionalData = osNotification.getAdditionalData();
        String rowId = "";
        if (additionalData != null && additionalData.has("row_id")) {
            rowId = additionalData.optString("row_id");
        }

        SQLiteDbHelper sqLiteDbHelper = new SQLiteDbHelper(context.getApplicationContext());
        long id =   sqLiteDbHelper.insertNotices(title,body,file,rowId);

        Log.d("BackOne","\ntitle = "+title+"\nbody = "+body+"\nfile = "+file+"\nID = "+rowId);
        osNotificationReceivedEvent.complete(osNotification);
    }
}
