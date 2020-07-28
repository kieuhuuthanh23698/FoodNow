package com.example.acer_pc.foodnow.Object;

import android.app.Dialog;
import android.graphics.drawable.ColorDrawable;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.design.widget.BottomSheetDialogFragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.acer_pc.foodnow.R;

public class InforStoreVoucherDialog extends BottomSheetDialogFragment {
    private ImageView btnClose;
    private StoreVoucher storeVoucher;
    TextView code, code2, time, approve, description;

    public void setData(StoreVoucher storeVoucher) {
        this.storeVoucher = storeVoucher;
    }

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.infor_store_voucher_sheet, container, false);
        btnClose = view.findViewById(R.id.infor_store_voucher_btn_close);
        btnClose.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                dismiss();
            }
        });
        code = view.findViewById(R.id.infor_store_voucher_code);
        code.setText(storeVoucher.getContent());
        code2 = view.findViewById(R.id.infor_store_voucher_code_2);
        code2.setText(storeVoucher.getCode2());
        time = view.findViewById(R.id.infor_store_voucher_time);
        time.setText(storeVoucher.getTime());
        approve = view.findViewById(R.id.infor_store_voucher_approve);
        approve.setText(storeVoucher.getApprove());
        description = view.findViewById(R.id.infor_store_voucher_description);
        description.setText(storeVoucher.getDescription());
        return view;
    }
}
