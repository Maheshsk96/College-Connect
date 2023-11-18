package com.example.myapplication;

import android.app.NotificationManager;
import android.content.Context;
import android.os.Build;
import android.service.notification.StatusBarNotification;

public class NotificationCounter {

        public static int getNotificationCount(Context context) {
            if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.M) {
                NotificationManager notificationManager = (NotificationManager) context.getSystemService(Context.NOTIFICATION_SERVICE);
                if (notificationManager != null) {
                    StatusBarNotification[] activeNotifications = notificationManager.getActiveNotifications();
                    return activeNotifications.length;
                }
            }
            return -1;
        }

    public static void resetNotificationCount(Context context) {
        if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.M) {
            NotificationManager notificationManager = (NotificationManager) context.getSystemService(Context.NOTIFICATION_SERVICE);
            if (notificationManager != null) {
                notificationManager.cancelAll();  // Clear all notifications
            }
        }
    }


}
