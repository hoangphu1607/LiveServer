<?php
class danhsach extends db
{
    private $sotin1trang = 8;

    public function loaisach()
    {
        $qr3 = "SELECT * FROM `loaisach`";
        $row = mysqli_query($this->conn, $qr3);
        $mang = array();
        while ($kq = mysqli_fetch_array($row)) {
            $mang[] = $kq;
        }
        return json_encode($mang);
    }
    // WHERE `MaLoaiSach`=$id
    public function thongtinsach_theoloai($id,$trang)
    {
        $tranghientai = ($trang - 1) * $this->sotin1trang;
        $qr4 = "SELECT * FROM `sach` WHERE `MaLoaiSach`=$id LIMIT  $tranghientai,$this->sotin1trang";
        $row2 = mysqli_query($this->conn, $qr4);

        $mang = array();
        while ($kq = mysqli_fetch_array($row2)) {
            $mang[] = $kq;
        }
        return  json_encode($mang);
    }

    public function chitiet_sach($id)
    {
        $qr3 = "SELECT * FROM `sach`,loaisach,tacgia WHERE sach.MaLoaiSach = loaisach.MaLoaiSach and sach.MaTacGia =tacgia.MaTG AND `MaSach`=$id ";
        $row = mysqli_query($this->conn, $qr3);
        $mang = array();
        while ($kq = mysqli_fetch_array($row)) {
            $mang[] = $kq;
        }
        return json_encode($mang);
    }
    public function sotrang(){
        $qr3 = "SELECT MaSach FROM `sach`";
        $row = mysqli_query($this->conn, $qr3);
        $tong_so_sp = $row->num_rows;
        return ceil($tong_so_sp / $this->sotin1trang);
        
    }
    public function sotrang_theoloai($id){
        $qr3 = "SELECT MaSach FROM `sach` WHERE MaLoaiSach=$id";
        $row = mysqli_query($this->conn, $qr3);
        $tong_so_sp = $row->num_rows;
        return ceil($tong_so_sp / $this->sotin1trang);
        
    }

    public function phantrang_sach($trang)
    {
        $tranghientai = ($trang - 1) * $this->sotin1trang;
        $qr4 = "SELECT * FROM `sach` LIMIT  $tranghientai,$this->sotin1trang";
        $row2 = mysqli_query($this->conn, $qr4);
        $mang = array();
        while ($kq = mysqli_fetch_array($row2)) {
            $mang[] = $kq;
        }
        return json_encode($mang);
    }

    public function sotrang_theotimkiem($tensach){
        $qr3 = "SELECT MaSach FROM `sach` WHERE `TenSach` LIKE '%$tensach%' ORDER BY `MaSach` DESC";
        $row = mysqli_query($this->conn, $qr3);
        $tong_so_sp = $row->num_rows;
        return ceil($tong_so_sp / $this->sotin1trang);
        
    }
    public function timkiemtensach($trang,$tensach){
        $tranghientai = ($trang - 1) * $this->sotin1trang;
        $qr4 = "SELECT * FROM `sach` WHERE `TenSach` LIKE '%$tensach%' ORDER BY `MaSach` DESC LIMIT $tranghientai,$this->sotin1trang";
        $row2 = mysqli_query($this->conn, $qr4);
        if($row2->num_rows > 0){
            $mang = array();
            while ($kq = mysqli_fetch_array($row2)) {
                $mang[] = $kq;
            }
            return json_encode($mang);
        }
        else{
            $mang = 0;
            return json_encode($mang);
        }
     
    }
    
}
