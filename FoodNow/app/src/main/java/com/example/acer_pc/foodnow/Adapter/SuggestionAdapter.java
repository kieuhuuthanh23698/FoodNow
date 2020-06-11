package com.example.acer_pc.foodnow.Adapter;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.support.v7.widget.DividerItemDecoration;
import android.support.v7.widget.GridLayoutManager;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.RelativeLayout;
import android.widget.TextView;

import com.example.acer_pc.foodnow.InformationStoreActivity;
import com.example.acer_pc.foodnow.Object.Suggestion;
import com.example.acer_pc.foodnow.R;

import java.util.ArrayList;

public class SuggestionAdapter extends RecyclerView.Adapter<SuggestionAdapter.SuggestViewHolder> {
    private ArrayList<Suggestion> arrSuggestion;
    private Context context;
    private Activity activity;

    public SuggestionAdapter(ArrayList<Suggestion> arrSuggestion, Context context, Activity activity) {
        this.arrSuggestion = arrSuggestion;
        this.context = context;
        this.activity = activity;
    }

    @Override
    public SuggestionAdapter.SuggestViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        LayoutInflater layoutInflater = LayoutInflater.from(parent.getContext());
        View listItem= layoutInflater.inflate(R.layout.item_suggest, parent, false);
        SuggestViewHolder viewHolder = new SuggestViewHolder(listItem);
        return viewHolder;
    }

    @Override
    public void onBindViewHolder(SuggestionAdapter.SuggestViewHolder holder, int position) {
        final Suggestion suggestion = arrSuggestion.get(position);
        holder.title.setText(suggestion.getTitle());
        StoreOfSuggestAdapter storeOfSuggestAdapter = new StoreOfSuggestAdapter(suggestion.getArrStore(), context, activity);
        LinearLayoutManager friendsLayoutManager = new LinearLayoutManager(context.getApplicationContext(), LinearLayoutManager.HORIZONTAL, false);
        holder.suggestion_list_store.setHasFixedSize(true);
        holder.suggestion_list_store.setLayoutManager(friendsLayoutManager);
        holder.suggestion_list_store.setAdapter(storeOfSuggestAdapter);
        holder.suggestion_list_store.addItemDecoration(new DividerItemDecoration(context, DividerItemDecoration.HORIZONTAL));
    }

    @Override
    public int getItemCount() {
        return this.arrSuggestion.size();
    }

    public static class SuggestViewHolder extends RecyclerView.ViewHolder {
        public TextView title;
        public RecyclerView suggestion_list_store;
        public SuggestViewHolder(View itemView) {
            super(itemView);
            this.title = itemView.findViewById(R.id.titleSuggest);
            this.suggestion_list_store = itemView.findViewById(R.id.suggestion_list_store);
        }
    }
}
