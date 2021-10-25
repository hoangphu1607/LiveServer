<?php
class M_admin extends db
{
    public function test($a){
        $hinhanh = $a;
        $foder_luu = "public/uploads/";
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
    public function themsach($tensach, $noidungngan, $soluong, $ngaynhap/*,$anh*/, $gia, $maloaisach, $matacgia)
    {
        $duongdan = $this->chon_1_anh();
        $nhieu_anh = $this->chon_nhieu_anh();
        $kq = false;
        if ($duongdan['check'] == 0 && $nhieu_anh['check2'] == 0) {
            $anh =  $duongdan['duongdan'];
            $qr4 = "INSERT INTO `sach` (`MaSach`, `TenSach`, `Noidungngan`, `SoLuong`, `NgayNhap`, `AnhDaiDien`, `Gia`, `MaLoaiSach`, `MaTacGia`) VALUES (NULL, '$tensach', '$noidungngan', '$soluong', '$ngaynhap', ' $anh', '$gia', '$maloaisach', '$matacgia')";
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
        }

        return json_encode($mang);
    }
    public function chon_1_anh()
    {
        $hinhanh = $_FILES['anh']['name'];
        $foder_luu = "public/uploads/";
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
        $foder_luu = "public/uploads/";
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
}
