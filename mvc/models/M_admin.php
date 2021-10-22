<?php 
class M_admin extends db{
    public function ad_thongtinsach()
    {
        $qr4 = "SELECT * FROM `sach`,tacgia,loaisach WHERE sach.Maloaisach = loaisach.MaLoaiSach and sach.MaTacGia = tacgia.MaTG ORDER BY `MaSach` DESC";
        $row2 = mysqli_query($this->conn, $qr4);
        $mang = array();
        while ($kq = mysqli_fetch_array($row2)) {
            $mang[] = $kq;
        }
        return json_encode($mang);
    }

}
?>