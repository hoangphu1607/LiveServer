<?php    
    class xulydulieu extends db{   

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

        public function ThemNhanVien($TenNhanVien, $GioiTinh){ 
            $result = false;
            $qr = "INSERT INTO nhanvien(TenNV,GioiTinh,MaQuyen) VALUE ('$TenNhanVien','$GioiTinh','1')";
            if(mysqli_query($this->conn,$qr)){
                $result = true;
            }
            return $result;
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

    }
?>