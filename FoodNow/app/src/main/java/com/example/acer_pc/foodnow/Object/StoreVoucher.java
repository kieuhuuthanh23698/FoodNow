package com.example.acer_pc.foodnow.Object;

public class StoreVoucher {
    private String HanSuDung, ThoiGianGiaoHang, MaGiamGia, PhanTram_GiamGia, MoTa;
    //MaGiamGia, HanSuDung, ThoiGianGiaoHang, Icon, PhanTram_GiamGia, MoTa


    public StoreVoucher() {
        this.HanSuDung = "";
        this.ThoiGianGiaoHang = "";
        this.MaGiamGia = "";
        this.PhanTram_GiamGia = "";
        this.MoTa = "";
    }

    public void setHanSuDung(String hanSuDung) {
        HanSuDung = hanSuDung;
    }

    public void setThoiGianGiaoHang(String thoiGianGiaoHang) {
        ThoiGianGiaoHang = thoiGianGiaoHang;
    }

    public void setMaGiamGia(String maGiamGia) {
        MaGiamGia = maGiamGia;
    }

    public void setPhanTram_GiamGia(String phanTram_GiamGia) {
        PhanTram_GiamGia = phanTram_GiamGia;
    }

    public void setMoTa(String moTa) {
        MoTa = moTa;
    }

    public String getContent() {
        return "Nhập mã : " + MaGiamGia + " giãm " + PhanTram_GiamGia + " % giá trị đơn hàng, chỉ áp dụng thanh toán Momo.";
    }

    public String getCode() {
        return "Nhập " + MaGiamGia + " : Giảm " + PhanTram_GiamGia + " %.";
    }

    public String getCode2() {
        return "Giảm giá : " + PhanTram_GiamGia + " % - Mã : " + MaGiamGia;
    }

    public String getTime(){
        return "Hạn sử dụng : " + HanSuDung;
    }

    public String getApprove(){
        return "Thời gian áp dụng giao hàng : " + ThoiGianGiaoHang;
    }

    public String getDescription(){
        if(!MoTa.isEmpty()){
            return "Áp dụng : " + MoTa;
        }
        return "";
    }
}
