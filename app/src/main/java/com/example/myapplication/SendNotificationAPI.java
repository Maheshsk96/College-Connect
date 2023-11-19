package com.example.myapplication;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;

import okhttp3.Call;
import okhttp3.Callback;
import okhttp3.MediaType;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.RequestBody;
import okhttp3.Response;

public class SendNotificationAPI {



        // Constants for defining the JSON media type, FCM API URL, and server key
        public static final MediaType JSON = MediaType.parse("application/json; charset=utf-8");
        public static final String FCM_API = "#";
        public static final String SERVER_KEY = "#";

        public void sendNotificationToTopic(String topic, String title, String body) {
            OkHttpClient client = new OkHttpClient();

            // Create JSON objects for the notification and the overall JSON payload
            JSONObject json = new JSONObject();
            JSONObject notification = new JSONObject();

            try {
                // Set the title and body of the notification
                notification.put("title", title);
                notification.put("body", body);

                // Set the target topic and notification in the JSON payload
                json.put("to", "/topics/" + topic);
                json.put("notification", notification);
            } catch (JSONException e) {
                e.printStackTrace();
            }

            // Create the request body using the JSON payload
            RequestBody requestBody = RequestBody.create(JSON, json.toString());

            // Build the HTTP request with the FCM API URL, request body, and headers
            Request request = new Request.Builder()
                    .url(FCM_API)
                    .post(requestBody)
                    .addHeader("Authorization", "key=" + SERVER_KEY)
                    .addHeader("Content-Type", "application/json")
                    .build();

            // Enqueue the request for asynchronous execution
            client.newCall(request).enqueue(new Callback() {

                @Override
                public void onFailure(Call call, IOException e) {
                    // Handle failure when the request cannot be sent or a response cannot be received
                }

                @Override
                public void onResponse(Call call, Response response) throws IOException {
                    // Handle success when a response is received
                }
            });
        }


}
