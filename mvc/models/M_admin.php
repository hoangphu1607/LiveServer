<?php
class M_admin extends db
{
    public function xoa_anhct($id){
        $check = false;
        $qr4 = "DELETE FROM `anhchitiet` WHERE id=$id ";
        $qr5 = "SELECT * FROM `anhchitiet` WHERE id=$id";
        if ($row2 = mysqli_query($this->conn, $qr5)){
           $kq = mysqli_fetch_array($row2);
            if (mysqli_query($this->conn, $qr4)){
                $check = true;
                unlink($kq['Link']);
            };
        
        }
        return $check;
    }
    public function suasach($masach,$tensach, $noidungngan, $soluong, $ngaynhap/*,$anh*/, $gia, $maloaisach, $matacgia,$makhoacn)
    {
        $duongdan = $this->chon_1_anh();
        $nhieu_anh = $this->chon_nhieu_anh();
        $kq = false;
        if ($duongdan['check'] == 0 && $nhieu_anh['check2'] == 0) {
            $anh =  $duongdan['duongdan'];
            $qr4 = "UPDATE `sach` SET `TenSach`='$tensach',`Noidungngan`='$noidungngan',`SoLuong`='$soluong',`NgayNhap`='$ngaynhap',`AnhDaiDien`='$anh',`Gia`='$gia',`MaLoaiSach`='$maloaisach',`MaTacGia`='$matacgia',`MakhoaCN`=$makhoacn WHERE `MaSach`='$masach'";
            if (mysqli_query($this->conn, $qr4)) {
                $kq = true;
                $cout_anh = $nhieu_anh["so_hinh_luu"];
                for ($i = 0; $i <  $cout_anh; $i++) {
                    $dd_nhieu_anh = $nhieu_anh["duongdan"][$i];
                    $qr5 = "INSERT INTO `anhchitiet` (`MaSach`, `id`, `Link`) VALUES ('$masach', NULL, '$dd_nhieu_anh')";
                    if (mysqli_query($this->conn, $qr5)) {
                        $kq = true;
                    }
                }
            }
            $mang = array("kq" => $kq, "anh" => $duongdan, "nhieuanh" => $nhieu_anh);
        } else { //không phải ảnh
            $kq = false;
            $mang = array("kq" => $kq, "anh" => $duongdan ,"nhieuanh"=> $nhieu_anh);
            unlink($duongdan['duongdan']);
        }
        return json_encode($mang);
    }

    public function ad_thongtinsach()
    {
        $qr4 = "SELECT * FROM `sach`,tacgia,loaisach,khoachuyennganh WHERE sach.Maloaisach = loaisach.MaLoaiSach and sach.MaTacGia = tacgia.MaTG and sach.MakhoaCN = khoachuyennganh.MaKhoaCN ORDER BY `MaSach` DESC";
        $row2 = mysqli_query($this->conn, $qr4);
        $mang = array();
        while ($kq = mysqli_fetch_array($row2)) {
            $mang[] = $kq;
        }
        return json_encode($mang);
    }
    public function khoacn()
    {
        $qr4 = "SELECT * FROM `khoachuyennganh`";
        $row2 = mysqli_query($this->conn, $qr4);
        $mang = array();
        while ($kq = mysqli_fetch_array($row2)) {
            $mang[] = $kq;
        }
        return json_encode($mang);
    }
    public function themsach($tensach, $noidungngan, $soluong, $ngaynhap/*,$anh*/, $gia, $maloaisach, $matacgia,$makhoacn)
    {
        $duongdan = $this->chon_1_anh();
        $nhieu_anh = $this->chon_nhieu_anh();
        $kq = false;
        if ($duongdan['check'] == 0 && $nhieu_anh['check2'] == 0) {
            $anh =  $duongdan['duongdan'];
            $qr4 = "INSERT INTO `sach` (`MaSach`, `TenSach`, `Noidungngan`, `SoLuong`, `NgayNhap`, `AnhDaiDien`, `Gia`, `MaLoaiSach`, `MaTacGia`,`MakhoaCN`) VALUES (NULL, '$tensach', '$noidungngan', '$soluong', '$ngaynhap', ' $anh', '$gia', '$maloaisach', '$matacgia','$makhoacn')";
            if (mysqli_query($this->conn, $qr4)) {
                $kq = true;
                $cout_anh = $nhieu_anh["so_hinh_luu"];
                $masach = $this->conn->insert_id;
                for ($i = 0; $i <  $cout_anh; $i++) {
                    $dd_nhieu_anh = $nhieu_anh["duongdan"][$i];
                    $qr5 = "INSERT INTO `anhchitiet` (`MaSach`, `id`, `Link`) VALUES ('$masach', NULL, '$dd_nhieu_anh')";
                    if (mysqli_query($this->conn, $qr5)) {
                        $kq = true;
                    }
                }
            }
            $mang = array("kq" => $kq, "anh" => $duongdan, "nhieuanh" => $nhieu_anh);
        } else {
            $kq = false;
            $mang = array("kq" => $kq, "anh" => $duongdan ,"nhieuanh"=> $nhieu_anh);
            unlink($duongdan['duongdan']);
        }

        return json_encode($mang);
    }
    public function show_sach_sua($masach){
        $qr4 = "SELECT * FROM `sach`,tacgia,loaisach,khoachuyennganh WHERE sach.Maloaisach = loaisach.MaLoaiSach and sach.MaTacGia = tacgia.MaTG AND sach.MakhoaCN = khoachuyennganh.MaKhoaCN AND sach.MaSach= $masach";
        $row2 = mysqli_query($this->conn, $qr4);
        $mang = array();
        while ($kq = mysqli_fetch_array($row2)) {
            $mang[] = $kq;
        }
        return json_encode($mang);
        
    }
    public function show_anh_ct_sua($masach){
        $qr4 = "SELECT * FROM anhchitiet WHERE anhchitiet.MaSach = $masach";
        $row2 = mysqli_query($this->conn, $qr4);
        $mang = array();
        while ($kq = mysqli_fetch_array($row2)) {
            $mang[] = $kq;
        }
        return json_encode($mang);
    }

    public function chon_1_anh()
    {
        $hinhanh = $_FILES['anh']['name'];
        $foder_luu = "public/anhsach/";
        $duongdan = $foder_luu . basename($hinhanh);
        $uploadOk = 0;
        $thongbao = "";
        $duoifile = strtolower(pathinfo($duongdan, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["anh"]["tmp_name"]);
        if ($check === false) {
            $uploadOk++;
        }
        // Check file size
        if ($_FILES["anh"]["size"] > 3 * 1024 * 1024) {
            $uploadOk++;
        }

        // // Allow certain file formats
        if (
            $duoifile != "jpg" && $duoifile != "png" && $duoifile != "jpeg"
            && $duoifile != "gif"
        ) {
            $uploadOk++;
        }


        // Check if file already exists
        if (file_exists($duongdan)) {
            $dem = 0;
            $ten = pathinfo($hinhanh, PATHINFO_FILENAME);
            $tenhinh = $ten . '.' . $duoifile;
            while (file_exists($foder_luu . $tenhinh)) {
                $dem++;
                $hinhanh = $ten . $dem . '.' . $duoifile;
                $tenhinh = $hinhanh;
            }
            $duongdan = $foder_luu . basename($hinhanh);
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
           move_uploaded_file($_FILES["anh"]["tmp_name"], $duongdan);
        }
         else {          
                $thongbao = "Vui lòng kiểm tra lại hình ảnh đại diện";         
        }
        $kq = array("thongbao" => $thongbao, "duongdan" => $duongdan, "check" => $uploadOk);
        return $kq;
    }
    public function chon_nhieu_anh()
    {
        $anh = $_FILES['n_anh'];
        $dem_anh = count($anh["name"]);
        $foder_luu = "public/anhchitiet_sach/";
        //biến thông báo
        $uploadOk = 0;
        $so_hinh_luu = 0;
        $thongbao2="";
        for ($i = 0; $i < $dem_anh; $i++) {
            $duongdan = $foder_luu . basename($anh["name"][$i]);

            $duoifile = strtolower(pathinfo($duongdan, PATHINFO_EXTENSION));
            $check = getimagesize($anh["tmp_name"][$i]);
            //kiểm tra có phải là ảnh không
            if ($check === false) {
                $uploadOk++;
            }
            //kiểm tra size ảnh
            if ($anh["size"][$i] > 3 * 1024 * 1024) {
                $uploadOk++;
            }
            //kiểm tra đuôi ảnh
            if ($duoifile != "jpg" && $duoifile != "png" && $duoifile != "jpeg" && $duoifile != "gif") {
                $uploadOk++;
            }
        }
        //tối đa 4 tấm hình
        // if($dem_anh > 5){
        //     $uploadOk ++;
        // } 
        //mang luu duong dan;
        $mangluu = array();
        if ($uploadOk == 0) {
            for ($i = 0; $i < $dem_anh; $i++) {
                $duongdan = $foder_luu . basename($anh["name"][$i]);
                $duoifile = strtolower(pathinfo($duongdan, PATHINFO_EXTENSION));
                $check = getimagesize($anh["tmp_name"][$i]);
                //kiểm tra ảnh có tồn tại không
                if (file_exists($duongdan)) {
                    $dem = 0;
                    $ten = pathinfo($anh["name"][$i], PATHINFO_FILENAME);
                    $tenhinh = $ten . '.' . $duoifile;
                    while (file_exists($foder_luu . $tenhinh)) {
                        $dem++;
                        $anh["name"][$i] = $ten . $dem . '.' . $duoifile;
                        $tenhinh = $anh["name"][$i];
                    }
                    $duongdan = $foder_luu . basename($anh["name"][$i]);
                }

                //upload anh    
                if (move_uploaded_file($anh["tmp_name"][$i], $duongdan)) {
                    $mangluu[] = $duongdan;
                    $so_hinh_luu ++;
                }
            }
        } else {
            $thongbao2 = "Vui lòng kiểm tra lại những hình ảnh chi tiết";
        }
        $kq = array("check2" => $uploadOk, "thongbao" => $thongbao2, "duongdan" => $mangluu,"so_hinh_luu"=> $so_hinh_luu);
        return $kq;
    }
    public function showDSKhoa(){
        $result = false;
        $sql = "SELECT * FROM `khoahoc`";
        $row = mysqli_query($this->conn, $sql);
        $mang = array();
        while ($kq = mysqli_fetch_array($row)) {
            $mang[] = $kq;
        }
        return json_encode($mang);
    }
    public function getLastRow(){
        $tv = mysqli_query($this->conn,"SELECT MaLoaiSach FROM loaisach WHERE MaLoaiSach=(SELECT max(MaLoaiSach) FROM loaisach)");
        $kq = mysqli_fetch_assoc($tv) ;
        return json_encode($kq);          
    }
    
    public function Themloaisach($TenLoaiSach){ 
        $result = false;
        $qr = "INSERT INTO loaisach(TenLoaiSach) VALUE ('$TenLoaiSach')";
        if(mysqli_query($this->conn,$qr)){
            $result = true;
        }
        return $result;
    } 
    public function ThemNhanVien($TenNhanVien, $GioiTinh, $CMND, $pass){ 
        $result = false;
        $qr = "INSERT INTO nhanvien(TenNV,GioiTinh,MaQuyen,Cmnd_gv,Matkhau_gv) VALUE ('$TenNhanVien','$GioiTinh','1','$CMND','$pass')";
        if(mysqli_query($this->conn,$qr)){
            $result = true;
        }
        return $result;
    } 
    
    public function showNhanVien(){
        $result = false;
        $sql = "SELECT * FROM nhanvien";
        $row = mysqli_query($this->conn, $sql);
        $mang = array();
        while ($kq = mysqli_fetch_array($row)) {
            $mang[] = $kq;
        }
        return json_encode($mang);
    }
    public function addKhoa($TenKhoa){ 
        $result = false;
        $qr = "INSERT INTO khoachuyennganh(TenCN) VALUE ('$TenKhoa')";
        if(mysqli_query($this->conn,$qr)){
            $result = true;
        }
        return $result;
    }
    public function addTacGia($TenTacGia){ 
        $result = false;
        $qr = "INSERT INTO tacgia(TenTG) VALUE ('$TenTacGia')";
        if(mysqli_query($this->conn,$qr)){
            $result = true;
        }
        return $result;
    }

    public function showKhoaCN(){
        $result = false;
        $sql = "SELECT * FROM khoachuyennganh";
        $row = mysqli_query($this->conn, $sql);
        $mang = array();
        while ($kq = mysqli_fetch_array($row)) {
            $mang[] = $kq;
        }
        return json_encode($mang);
    }
    public function newSinhVien($MSSV, $TenSV, $CMND, $GioiTinh, $MaKhoa, $MatKhau, $KhoaCN){
        $result = false;
        $qr = "INSERT INTO sinhvien(`MSSV`, `HoTen`, `CMND`, `GioiTinh`, `MaKhoa`, `MaQuyen`, `MatKhau`, `MaKhoaCN`) 
        VALUE ('$MSSV','$TenSV','$CMND','$GioiTinh','$MaKhoa','3','$MatKhau','$KhoaCN')";        
        if(mysqli_query($this->conn,$qr)){
            $result = true;
        }
        return $result;
    }

    public function showSinhVien(){
        $sql = "SELECT * FROM sinhvien,khoahoc,khoachuyennganh 
        WHERE sinhvien.MaKhoa = khoahoc.MaKhoaHoc and sinhvien.MaKhoaCN = khoachuyennganh.MaKhoaCN";
        $row = mysqli_query($this->conn, $sql);
        $mang = array();
        while ($kq = mysqli_fetch_array($row)) {
            $mang[] = $kq;
        }
        return json_encode($mang);
    }

    public function showTacGia(){ 
        $sql = "SELECT * FROM tacgia";
        $row = mysqli_query($this->conn, $sql);
        $mang = array();
        while ($kq = mysqli_fetch_array($row)) {
            $mang[] = $kq;
        }
        return json_encode($mang);
    } 

    public function addKhoaHoc($TenKhoaHoc,$NamBatDau)
    {
        $result = false;
        $qr = "INSERT INTO khoahoc(TenKhoaHoc,NamBatDau) VALUE ('$TenKhoaHoc','$NamBatDau')";
        if(mysqli_query($this->conn,$qr)){
            $result = true;
        }
        return $result;
    }
    public function showKhoaHoc()
    {
        $sql = "SELECT * FROM khoahoc";
        $row = mysqli_query($this->conn, $sql);
        $mang = array();
        while ($kq = mysqli_fetch_array($row)) {
            $mang[] = $kq;
        }
        return json_encode($mang);
    }

    public function showTable_NV()
    {        
        $sql = "SELECT * FROM nhanvien";
        $row = mysqli_query($this->conn, $sql);
        $mang = array();
        while ($kq = mysqli_fetch_array($row)) {
            $mang[] = $kq;
        }
        $i = 1;    
            
        foreach($mang as $nv){
            if($i % 2 == 0){
                echo "<tr class='even'>"; 
            }
            else{
                echo "<tr class='odd'>"; 
            }          
            echo '<td class="sorting_1"> '. $i.'</td>';
            echo '<td> '. $nv["TenNV"].'</td>';
            echo '<td> '. $nv["GioiTinh"].'</td>';
            echo '<td> '. $nv["Cmnd_gv"].'</td>';
            echo '<td><a  type="button" class="btn btn-success" href="admin/suanhanvien/' .$nv["MaNV"] .'">Sửa</a></td>';
            echo '<td><a  type="button" class="btn btn-danger" href="">Xóa</a></td>';                            
            echo "</tr>";
            $i++;
        }
    }
        
}
