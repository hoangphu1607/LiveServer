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
                header('Location: http://localhost:8080/liveserver/');
                
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
    public function ktmk($mssv){
        $qr = "SELECT * FROM `sinhvien` WHERE MSSV =$mssv ";
        $row = mysqli_query($this->conn, $qr);
        $kq = $row->num_rows;
        if($kq>0){
            $kq =1;
        }
        return json_encode($kq);
    }
}
?>