package com.example.myapplication;

import androidx.annotation.NonNull;
import androidx.appcompat.app.ActionBar;
import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.AppCompatTextView;
import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentManager;
import androidx.fragment.app.FragmentTransaction;

import android.content.Intent;
import android.graphics.drawable.ColorDrawable;
import android.os.Bundle;
import android.util.Log;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;

import com.google.android.material.badge.BadgeDrawable;
import com.google.android.material.bottomnavigation.BottomNavigationView;
import com.google.android.material.navigation.NavigationBarView;
import com.onesignal.OneSignal;

public class homePage extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home_page);

        getSupportActionBar().setDisplayOptions(ActionBar.DISPLAY_SHOW_CUSTOM);
        getSupportActionBar().setCustomView(R.layout.action_bar);
        getSupportActionBar().setBackgroundDrawable(new ColorDrawable(getColor(R.color.white)));
        getSupportActionBar().setElevation(0);
        View customActionBarView = getSupportActionBar().getCustomView();
        AppCompatTextView actionBarTitle = customActionBarView.findViewById(R.id.action_bar_title);



//
//        Button noticesButton=findViewById(R.id.noticesButton);
//        Button sendNoticeButton=findViewById(R.id.sendNoticeButton);
//
//        noticesButton.setOnClickListener(new View.OnClickListener() {
//            @Override
//            public void onClick(View v) {
//                Intent intent =new Intent(getApplicationContext(),notices.class);
//                startActivity(intent);
//            }
//        });
//
//        sendNoticeButton.setOnClickListener(new View.OnClickListener() {
//            @Override
//            public void onClick(View v) {
//                Intent intent = new Intent(getApplicationContext(),SendNoticeTo.class);
//                startActivity(intent);
//            }
//        });


        int notificationCount = NotificationCounter.getNotificationCount(homePage.this);

        BottomNavigationView bottomNavigationView = findViewById(R.id.bottom_nav_bar);

        if(notificationCount>0) {
                    BadgeDrawable badgeDrawable = bottomNavigationView.getOrCreateBadge(R.id.notice);
                    badgeDrawable.setVisible(true);
                    badgeDrawable.setNumber(notificationCount);
        }





        bottomNavigationView.setOnItemSelectedListener(new NavigationBarView.OnItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem item) {
                int idItem= item.getItemId();
                if(idItem==R.id.home){
                    loadFragment(new HomeFragment(),true);
                    actionBarTitle.setText("Home");
                }

               else if(idItem==R.id.notice){
                   loadFragment(new NoticeFragment(),false);
                    actionBarTitle.setText("Notice");
                    NotificationCounter.resetNotificationCount(homePage.this);
                    BadgeDrawable badgeDrawable = bottomNavigationView.getBadge(R.id.notice);
                    if (badgeDrawable != null) {
                        badgeDrawable.setVisible(false);
                    }
                }

               else if(idItem==R.id.class_work) {
                   loadFragment(new ClassWork(),false);
                    actionBarTitle.setText("Class Work");
                }
                else {
                    loadFragment(new Profile(),false);
                    actionBarTitle.setText("Profile");
                }

                return true;
            }
        });

        bottomNavigationView.setSelectedItemId(R.id.home);
        bottomNavigationView.setItemIconTintList(null);


    }

    public void loadFragment(Fragment fragment, boolean flag){

        FragmentManager fragmentManager =getSupportFragmentManager();
        FragmentTransaction fragmentTransaction = fragmentManager.beginTransaction();


        if(flag){
            fragmentTransaction.add(R.id.frame_layout,fragment);
        }
        else {
            fragmentTransaction.replace(R.id.frame_layout,fragment);
        }

        fragmentTransaction.commit();

    }




}