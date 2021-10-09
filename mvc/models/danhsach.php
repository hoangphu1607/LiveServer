<?php 
class danhsach extends db{

    public function loaisach(){
        $qr3 = "SELECT * FROM `loaisach`";
        $row = mysqli_query($this->conn,$qr3);
        $mang = array();
        while($kq = mysqli_fetch_array($row)) {
            $mang[] = $kq;
         }
       return json_encode($mang);
    }
    public function thongtinsach(){
        $qr3 = "SELECT * FROM `sach`";
        $row = mysqli_query($this->conn,$qr3);
        $mang = array();
        while($kq = mysqli_fetch_array($row)) {
            $mang[] = $kq;
         }
       return json_encode($mang);
    }
    public function thongtinsach_theoloai($id){
        $qr3 = "SELECT * FROM `sach` WHERE `MaLoaiSach`=$id ";
        $row = mysqli_query($this->conn,$qr3);
        $mang = array();
        while($kq = mysqli_fetch_array($row)) {
            $mang[] = $kq;
         }
       return json_encode($mang);
    }

    public function chitiet_sach($id){
        $qr3 = "SELECT * FROM `sach`,loaisach,tacgia WHERE sach.MaLoaiSach = loaisach.MaLoaiSach and sach.MaTacGia =tacgia.MaTG AND `MaSach`=$id ";
        $row = mysqli_query($this->conn,$qr3);
        $mang = array();
        while($kq = mysqli_fetch_array($row)) {
            $mang[] = $kq;
         }
       return json_encode($mang);
    }

}
?>