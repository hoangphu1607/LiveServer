<?php 
class sinhvien extends db{
    public function getsinhvien(){
        return "nam mai";
    }
    public function tong($a,$b){
        return $a + $b;
    }

    public function sach(){
        $qr = "SELECT * FROM `sach`";
        return mysqli_query($this->conn,$qr);
    }
}
?>