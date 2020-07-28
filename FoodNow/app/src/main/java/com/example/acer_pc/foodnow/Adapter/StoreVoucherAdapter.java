package com.example.acer_pc.foodnow.Adapter;

import android.app.Activity;
import android.content.Context;
import android.graphics.drawable.Drawable;
import android.support.v4.app.FragmentManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.example.acer_pc.foodnow.Object.InforStoreVoucherDialog;
import com.example.acer_pc.foodnow.Object.StoreVoucher;
import com.example.acer_pc.foodnow.R;

import java.util.ArrayList;

public class StoreVoucherAdapter extends RecyclerView.Adapter<StoreVoucherAdapter.StoreVoucherViewHolder>{
    ArrayList<StoreVoucher> arrayList;
    FragmentManager fragmentManager;
    boolean expand;
    Context context;

    public StoreVoucherAdapter(ArrayList<StoreVoucher> arrayList, FragmentManager fragmentManager, Context context) {
        this.arrayList = arrayList;
        this.context = context;
        if(this.arrayList.size() > 3){
            expand = false;
        }
        this.fragmentManager = fragmentManager;
    }

    @Override
    public StoreVoucherViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        Log.i("response", "view type " + viewType);
        LayoutInflater layoutInflater = LayoutInflater.from(parent.getContext());
        View view = layoutInflater.inflate(R.layout.item_store_voucher, parent, false);
        if (viewType == 1) {
            view = layoutInflater.inflate(R.layout.item_store_voucher_footer, parent, false);
        }
        StoreVoucherViewHolder viewHolder = new StoreVoucherViewHolder(view);
        return viewHolder;
    }

    public void binddingViewItem(StoreVoucherViewHolder holder, int position){
        final StoreVoucher storeVoucher = arrayList.get(position);
        holder.voucher_content.setText(storeVoucher.getContent());
        holder.view.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                InforStoreVoucherDialog inforStoreVoucherDialog = new InforStoreVoucherDialog();
                inforStoreVoucherDialog.setData(storeVoucher);
                inforStoreVoucherDialog.show(fragmentManager, "InforStoreVoucher");
            }
        });
    }

    private void bindingViewFooter(StoreVoucherViewHolder holder){
        if(expand) {
                holder.voucher_content.setText(" Thu gọn ");
//                Drawable img = context.getResources().getDrawable( R.drawable.ic_expand_less_black_24dp );
//                holder.voucher_content.setCompoundDrawables(null, img, null, null);
                holder.voucher_content.setCompoundDrawablesWithIntrinsicBounds(0, 0, R.drawable.ic_expand_less_black_24dp, 0);
        } else {
            holder.voucher_content.setText(" Xem thêm " + (arrayList.size() - 3) + " ưu đãi ");
//            Drawable img = context.getResources().getDrawable( R.drawable.ic_expand_more_black_24dp );
//            holder.voucher_content.setCompoundDrawables(null, img, null, null);
            holder.voucher_content.setCompoundDrawablesWithIntrinsicBounds(0, 0, R.drawable.ic_expand_more_black_24dp, 0);
        }
        holder.view.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                expand = !expand;
                notifyDataSetChanged();
            }
        });
    }

    @Override
    public void onBindViewHolder(StoreVoucherViewHolder holder, int position) {
        if(expand){
            if(position == arrayList.size())
                bindingViewFooter(holder);
            else
                binddingViewItem(holder, position);
        } else {
            if(position == 3)
                bindingViewFooter(holder);
            else
                binddingViewItem(holder, position);
        }
    }

    @Override
    public int getItemViewType(int position) {
        if(expand){
            if(position == arrayList.size())
                return 1;
            return 0;
        } else {
            if(position == 3)
                return 1;
            return 0;
        }
    }

    @Override
    public int getItemCount() {
        if(arrayList == null)
            return 0;
        if(expand){
            return arrayList.size() + 1;
        } else {
            if(arrayList.size() > 3)
                return 4;
            return arrayList.size();
        }
    }

    public class StoreVoucherViewHolder extends RecyclerView.ViewHolder {
        public View view;
        public TextView voucher_content;
        public StoreVoucherViewHolder(View itemView) {
            super(itemView);
            voucher_content = itemView.findViewById(R.id.item_store_voucher_content);
            view = itemView;
        }
    }
}
