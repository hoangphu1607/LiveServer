<?php 
class xl_dn extends db{ 
    public function ktdn($mssv,$matkhau){
        $qr = "SELECT * FROM `sinhvien` WHERE MSSV =$mssv"; // AND MatKhau='$matkhau' 
        $row = mysqli_query($this->conn, $qr);
        $num = $row->num_rows;
        $kq=null;
        if($num > 0){
            $kq_tv = mysqli_fetch_array($row);
            $mk_hash = $kq_tv["MatKhau"];
            if(password_verify($matkhau,$mk_hash) == true){
                $_SESSION["dangnhap"][0]=$kq_tv["IDSV"];
                $_SESSION["dangnhap"][1]=$kq_tv["HoTen"];
                $_SESSION["dangnhap"]["gioitinh"]=$kq_tv["GioiTinh"];
                header('Location: http://localhost/LiveServer/');
                
            }
            else{
                $kq="Sai mật khẩu";
            }
            
        }
        else{
            $kq="Không tìm thấy tài khoản";
        }
        return json_encode($kq);
        
    }
    //  
    public function ktdn_gv($mssv,$matkhau){
        $qr = "SELECT * FROM `nhanvien` WHERE Cmnd_gv =$mssv "; // AND MatKhau='$matkhau' 
        $row = mysqli_query($this->conn, $qr);
        $num = $row->num_rows;
        $kq=null;
        if($num > 0){
            $kq_tv = mysqli_fetch_array($row);
            $mk_hash = $kq_tv["Matkhau_gv"];
            if(password_verify($matkhau,$mk_hash) == true){
                $_SESSION["dangnhap"][0]=$kq_tv["MaNV"];
                $_SESSION["dangnhap"][1]=$kq_tv["TenNV"];
                $_SESSION["dangnhap"][2]=$kq_tv["MaQuyen"];
                $_SESSION["dangnhap"]["gioitinh"]=$kq_tv["GioiTinh"];
                header('Location: http://localhost/LiveServer/');
                
            }
            else{
                $kq="Sai mật khẩu";
            }
            
        }
        else{
            $kq="Không tìm thấy tài khoản";
        }
        return json_encode($kq);
        
    }
}
?>