package com.example.myapplication;

import android.app.Application;
import android.util.Log;

import com.onesignal.OSNotification;
import com.onesignal.OSNotificationOpenedResult;
import com.onesignal.OSNotificationReceivedEvent;
import com.onesignal.OneSignal;

import org.json.JSONException;
import org.json.JSONObject;

public class ApplicationClass extends Application {
    private static final String ONESIGNAL_APP_ID = "374772e9-d615-43ee-b58e-d140b64a4b2a";
    @Override
    public void onCreate() {
        super.onCreate();
        // TODO: Add OneSignal initialization here

        // Logging set to help debug issues, remove before releasing your app.
        OneSignal.setLogLevel(OneSignal.LOG_LEVEL.VERBOSE, OneSignal.LOG_LEVEL.NONE);

        // OneSignal Initialization
        OneSignal.initWithContext(this);
        OneSignal.setAppId(ONESIGNAL_APP_ID);

        OneSignal.getTags(new OneSignal.OSGetTagsHandler() {
            @Override
            public void tagsAvailable(JSONObject tags) {
                boolean isSubscribed = false;
                if (tags != null && tags.has("topic")) {
                    try {
                        String topicValue = tags.getString("topic");
                        if (topicValue.equals("teacher")) {
                            isSubscribed = true;
                        }
                    } catch (JSONException e) {
                        e.printStackTrace();
                    }
                }

                if (!isSubscribed) {
                    OneSignal.sendTag("topic", "teacher");
                }
            }
        });


        OneSignal.setNotificationWillShowInForegroundHandler(new OneSignal.OSNotificationWillShowInForegroundHandler() {
            @Override
            public void notificationWillShowInForeground(OSNotificationReceivedEvent osNotificationReceivedEvent) {
                OSNotification osNotification = osNotificationReceivedEvent.getNotification();
                String title = osNotification.getTitle();
                String body = osNotification.getBody();
                String file = osNotification.getBigPicture();

                JSONObject additionalData = osNotification.getAdditionalData();
                String rowId = "";
                if (additionalData != null && additionalData.has("row_id")) {
                    rowId = additionalData.optString("row_id");
                }

                Log.d("ForOne", "Notification Received\nTitle: " + title + "\nBody: " + body);
                SQLiteDbHelper sqLiteDbHelper = new SQLiteDbHelper(getApplicationContext());
                long id =   sqLiteDbHelper.insertNotices(title,body,file,rowId);
                osNotificationReceivedEvent.complete(osNotification);
            }
        });


        OneSignal.setNotificationOpenedHandler(new OneSignal.OSNotificationOpenedHandler() {
            @Override
            public void notificationOpened(OSNotificationOpenedResult osNotificationOpenedResult) {
                OSNotification osNotification = osNotificationOpenedResult.getNotification();
                String title = osNotification.getTitle();
                String body = osNotification.getBody();
                String file = osNotification.getBigPicture();

                JSONObject additionalData = osNotification.getAdditionalData();
                String rowId = "";
                if (additionalData != null && additionalData.has("row_id")) {
                    rowId = additionalData.optString("row_id");
                }

                SQLiteDbHelper sqLiteDbHelper = new SQLiteDbHelper(getApplicationContext());
                long id =   sqLiteDbHelper.insertNotices(title,body,file,rowId);

                // Log the received notification data
                Log.d("OpenOne", "Notification Received\nTitle: " + title + "\nBody: " + body+"\n Image = "+file);

            }
        });


         // promptForPushNotifications will show the native Android notification permission prompt.
                // We recommend removing the following code and instead using an In-App Message to prompt for notification permission (See step 7)
        OneSignal.promptForPushNotifications();


    }


}
