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


}
?>