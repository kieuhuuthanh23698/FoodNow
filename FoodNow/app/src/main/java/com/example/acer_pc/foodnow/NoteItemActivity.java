package com.example.acer_pc.foodnow;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.Editable;
import android.text.TextWatcher;
import android.util.DisplayMetrics;
import android.view.Gravity;
import android.view.View;
import android.view.WindowManager;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.example.acer_pc.foodnow.Object.Food;

public class NoteItemActivity extends AppCompatActivity {

    private EditText noteItem;
    private TextView noteItemLenght, closeBtn, doneBtn;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_note_item);

        DisplayMetrics dm = new DisplayMetrics();
        getWindowManager().getDefaultDisplay().getMetrics(dm);

        int width = dm.widthPixels;
        int height = dm.heightPixels;

        getWindow().setLayout((int)(width*1), (int)(height*1));

        WindowManager.LayoutParams layoutParams = getWindow().getAttributes();
        layoutParams.gravity = Gravity.CENTER;
        layoutParams.x = 0;
        layoutParams.y = -20;

        getWindow().setAttributes(layoutParams);

        noteItem = findViewById(R.id.note_item_value);
        noteItemLenght = findViewById(R.id.note_item_lenght);
        closeBtn = findViewById(R.id.note_item_close_btn);
        doneBtn = findViewById(R.id.note_item_done_btn);

        Intent intent = getIntent();
        final String id = intent.getStringExtra("id");
        String note = intent.getStringExtra("note");
        if (note.trim().length() > 0)
            noteItem.setText(note.trim());

        noteItemLenght.setText(noteItem.length() + " / 500");

        noteItem.addTextChangedListener(new TextWatcher() {
            @Override
            public void beforeTextChanged(CharSequence charSequence, int i, int i1, int i2) { }

            @Override
            public void onTextChanged(CharSequence charSequence, int i, int i1, int i2) {}

            @Override
            public void afterTextChanged(Editable editable) {
                noteItemLenght.setText(noteItem.length() + " / 500");
            }
        });

        closeBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                finish();
            }
        });

        doneBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                for (Food item : InformationStoreActivity.shoppingCart) {
                    if(item.getId().equals(id))
                    {
                        item.setNote(noteItem.getText().toString().trim());
                        finish();
                    }
                }
            }
        });
    }
}
