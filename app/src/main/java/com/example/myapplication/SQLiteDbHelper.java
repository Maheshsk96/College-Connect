package com.example.myapplication;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

import androidx.annotation.Nullable;

import com.google.android.material.tabs.TabLayout;

import java.sql.Timestamp;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

public class SQLiteDbHelper extends SQLiteOpenHelper {

    private final static String DATABASE_NAME = "MyCollegeDB";
    private final static int DATABASE_VERSION = 2;
    private final static String TABLE_NAME = "notice";
    private final static String COLUMN_ID = "id";
    private final static String COLUMN_TITLE = "title";
    private final static String COLUMN_BODY = "body";
    private final static String COLUMN_FILES = "files";
    private final static String COLUMN_TIMESTAMP = "timestamp";

    private final static String COLUMN_ROW_ID = "row_id";

    public SQLiteDbHelper(@Nullable Context context) {
        super(context, DATABASE_NAME, null, DATABASE_VERSION);
    }

    @Override
    public void onCreate(SQLiteDatabase db) {

        db.execSQL("create table "+TABLE_NAME+
                    "("+COLUMN_ID+" INTEGER PRIMARY KEY AUTOINCREMENT, "+
                        COLUMN_TITLE+" TEXT,"+
                        COLUMN_BODY+" TEXT,"+
                        COLUMN_FILES+" TEXT,"+
                        COLUMN_TIMESTAMP+" TIMESTAMP DEFAULT CURRENT_TIMESTAMP, "+COLUMN_ROW_ID+" TEXT NOT NULL UNIQUE)"
        );


    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {

        db.execSQL("DROP TABLE IF EXISTS "+TABLE_NAME);
        onCreate(db);
    }

    public long insertNotices(String title, String body, String files,String row_Id){

        SQLiteDatabase db = this.getWritableDatabase();

        ContentValues values = new ContentValues();

        values.put(COLUMN_TITLE,title);
        values.put(COLUMN_BODY,body);
        values.put(COLUMN_FILES,files);
        values.put(COLUMN_ROW_ID,row_Id);

        long insertedRowId = db.insert(TABLE_NAME, null, values);
        return insertedRowId;
    }

    public Map<String, String[]> selectNotice() {
        SQLiteDatabase db = this.getReadableDatabase();
        Cursor cursor = db.rawQuery("SELECT * FROM " + TABLE_NAME, null);

        int rowCount = cursor.getCount();

        String[] title = new String[rowCount];
        String[] body = new String[rowCount];

        int index = 0;
        while (cursor.moveToNext()) {
            title[index] = cursor.getString(1);  // Add value from first column to column1Array
            body[index] = cursor.getString(2);  // Add value from second column to column2Array
            index++;
        }

        Map<String, String[]> columnArrays = new HashMap<>();
        columnArrays.put("title", title);
        columnArrays.put("body", body);

        return columnArrays;
    }


}
