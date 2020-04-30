package com.example.acer_pc.foodnow.Adapter;

import android.content.Context;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.example.acer_pc.foodnow.R;
import com.example.acer_pc.foodnow.SearchActivity;
import com.google.android.flexbox.AlignSelf;
import com.google.android.flexbox.FlexboxLayoutManager;

import java.util.ArrayList;

public class SuggestionSearchAdapter extends RecyclerView.Adapter<SuggestionSearchAdapter.SuggestionSearchViewHolder>{
    ArrayList<String> arrayList;
    Context context;

    public SuggestionSearchAdapter(ArrayList<String> arrayList, Context context) {
        this.arrayList = arrayList;
        this.context = context;
    }

    @Override
    public SuggestionSearchViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        LayoutInflater layoutInflater = LayoutInflater.from(parent.getContext());
        View listItem= layoutInflater.inflate(R.layout.item_suggestion_search, parent, false);
        SuggestionSearchAdapter.SuggestionSearchViewHolder viewHolder = new SuggestionSearchAdapter.SuggestionSearchViewHolder(listItem);
        return viewHolder;
    }

    @Override
    public void onBindViewHolder(final SuggestionSearchViewHolder holder, int position) {
        final String item = arrayList.get(position);
        holder.textView.setText(item.trim());
        holder.itemView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                SearchActivity.searchWithSuggestion(holder.textView.getText().toString());
            }
        });
    }

    @Override
    public int getItemCount() {
        return arrayList.size();
    }

    public static class SuggestionSearchViewHolder extends RecyclerView.ViewHolder {
        public TextView textView;
        public SuggestionSearchViewHolder(View itemView) {
            super(itemView);
            this.textView = itemView.findViewById(R.id.txtSuggestion_search);
        }
    }
}
