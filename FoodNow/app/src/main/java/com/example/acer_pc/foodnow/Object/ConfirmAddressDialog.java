package com.example.acer_pc.foodnow.Object;

import android.app.Activity;
import android.content.Intent;
import android.location.Location;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.design.widget.BottomSheetDialogFragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;
import android.widget.Toast;

import com.example.acer_pc.foodnow.Common.DefineVarible;
import com.example.acer_pc.foodnow.Data.Utils;
import com.example.acer_pc.foodnow.LoadingActivity;
import com.example.acer_pc.foodnow.R;

import org.json.JSONException;

import okhttp3.internal.Util;

public class ConfirmAddressDialog extends BottomSheetDialogFragment {

    TextView btnClose, txt_address, btnConfirm;
    Double lat, lng;
    String address;
    int type;

    @Nullable
    @Override
    public View onCreateView(@NonNull final LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.confirm_address_sheet, container, false);
        btnClose = view.findViewById(R.id.confirm_address_btnClose);
        txt_address = view.findViewById(R.id.confirm_address_address);
        btnConfirm = view.findViewById(R.id.confirm_address_btnConfirm);
        lat = getArguments().getDouble("lat");
        lng = getArguments().getDouble("lng");
        type = getArguments().getInt("type");
        if (lat != null && lng != null) {
            address = Utils.getCompleteAddressString(getContext(), lat, lng);
            txt_address.setText(address);
        } else {
            Toast.makeText(getContext(), "Không thể hiển thị địa chỉ !", Toast.LENGTH_SHORT).show();
            dismiss();
        }
        btnClose.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                dismiss();
            }
        });
        btnConfirm.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intentLoading = new Intent(getContext(), LoadingActivity.class);
                intentLoading.putExtra("lat", lat);
                intentLoading.putExtra("lng", lng);
                intentLoading.putExtra("type", type);
                intentLoading.putExtra("address", address);
                intentLoading.setAction(Intent.ACTION_SEND);
                intentLoading.putExtra("action", DefineVarible.addUserAddress);
                startActivityForResult(intentLoading, DefineVarible.addUserAddress);
            }
        });
        return view;
    }

    @Override
    public void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if(requestCode == DefineVarible.addUserAddress){
            dismiss();
            getActivity().finish();
        }
    }
}
