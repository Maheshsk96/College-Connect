package com.example.myapplication;

import android.os.Bundle;

import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.Map;

public class NoticeFragment extends Fragment {

    ListView listView;
    public NoticeFragment() {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {


        View view = inflater.inflate(R.layout.fragment_notice, container, false);

        // Find the ListView within the inflated layout
        listView = view.findViewById(R.id.listview_frag);


        SQLiteDbHelper sq = new SQLiteDbHelper(getContext());
        Map<String, String[]> result = sq.selectNotice();
        String[] title = result.get("title");
        String[] body = result.get("body");

        ArrayList<String> arrayList = new ArrayList<>();
        for(int i=0; i<title.length; i++){
            arrayList.add(title[i]);
        }

        ArrayAdapter<String> adapter = new ArrayAdapter<String>(getContext(), android.R.layout.simple_list_item_2, android.R.id.text1, arrayList) {
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
                Toast.makeText(getContext(), arrayList.get(position),Toast.LENGTH_SHORT).show();
            }
        });

        // Rest of your code...

        return view;
    }
}