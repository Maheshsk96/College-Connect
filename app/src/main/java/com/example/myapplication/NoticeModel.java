package com.example.myapplication;

import java.sql.Timestamp;

public class NoticeModel {
    int id;

    String topic;
    String title;
    String body;
    String files;
    String timestamp;

    public NoticeModel(int id, String topic, String title, String body, String files, String timestamp) {
        this.id = id;
        this.topic = topic;
        this.title = title;
        this.body = body;
        this.files = files;
        this.timestamp = timestamp;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getTopic(){
        return topic;
    }

    public void setTopic(String topic){
        this.topic = topic;
    }

    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public String getBody() {
        return body;
    }

    public void setBody(String body) {
        this.body = body;
    }

    public String getFiles() {
        return files;
    }

    public void setFiles(String files) {
        this.files = files;
    }

    public String getTimestamp() {
        return timestamp;
    }

    public void setTimestamp(String timestamp) {
        this.timestamp = timestamp;
    }
}
