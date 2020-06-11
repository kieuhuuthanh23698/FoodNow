package com.example.acer_pc.foodnow;

import android.content.Context;
import android.os.Build;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.annotation.RequiresApi;
import android.support.design.widget.BottomSheetDialog;
import android.support.design.widget.BottomSheetDialogFragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.DatePicker;
import android.widget.TextView;
import android.widget.TimePicker;

import java.util.Date;

public class CustomDateTimePicker extends BottomSheetDialogFragment {

    private CustomDateTimePickerListener listener;

    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.date_time_picker_sheet, container, false);
        TextView huy, xong;
        huy = view.findViewById(R.id.confirm_shopping_cart_datetime_picker_huy);
        huy.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                dismiss();
            }
        });
        xong = view.findViewById(R.id.confirm_shopping_cart_datetime_picker_xong);
        xong.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                dismiss();
            }
        });
        final DatePicker datePicker = view.findViewById(R.id.confirm_shopping_cart_date_picker);
        final TimePicker timePicker = view.findViewById(R.id.confirm_shopping_cart_time_picker);
        timePicker.setIs24HourView(true);

        if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.O) {
            datePicker.setOnDateChangedListener(new DatePicker.OnDateChangedListener() {
                @Override
                public void onDateChanged(DatePicker datePicker, int i, int i1, int i2) {
                    if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.M) {
                        listener.onDateTimeChange("Giao ngay - " + timePicker.getHour() + ":" + timePicker.getMinute() + " - " + i2 + "/" + i1 + "/" + i);
                    }
                }
            });
        }
        timePicker.setOnTimeChangedListener(new TimePicker.OnTimeChangedListener() {
            @Override
            public void onTimeChanged(TimePicker timePicker, int i, int i1) {
                listener.onDateTimeChange(" Giao ngay - " + i + ":" + i1 + " - " + datePicker.getDayOfMonth() + "/" + datePicker.getMonth() + "/" + datePicker.getYear());
            }
        });
        return view;
//        return super.onCreateView(inflater, container, savedInstanceState);
    }

    public interface CustomDateTimePickerListener{
        void onDateTimeChange(String date);
    }

    @Override
    public void onAttach(Context context) {
        super.onAttach(context);
        try {
            listener = (CustomDateTimePickerListener) context;
        } catch (ClassCastException e) {
            throw new ClassCastException(context.toString() + " must implement CustomDateTimePickerListener");
        }
    }
}
