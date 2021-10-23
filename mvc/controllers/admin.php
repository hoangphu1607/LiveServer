<?php 
class admin extends controllers{
    public function __construct()
    {   
        $this->sach = $this->model("danhsach");
        $this->mk =  $this->model("xl_dn");
    }
    public function sayhi(){
        if(isset($_SESSION["dangnhap"])){
            header('Location: http://localhost/live/');
        }
        $this->view("trangchu",[
            "page"=>"v_dangnhap",
            "phanloai"=>$this->sach->loaisach(),
            "hiden"=>1,
            "phanquyen"=>1
        ]);
    }
    public function xldn(){
        if(isset($_SESSION["dangnhap"])){
            header('Location: http://localhost/live/');
        }
        else {
        if(isset($_POST["dangnhap"]) && isset($_POST["mssv"]) && isset($_POST["matkhau"]) ){
            if(!empty($_POST["mssv"]) && !empty($_POST["matkhau"])){
                $mssv = $_POST["mssv"];
                $matkhau =$_POST["matkhau"];              
                $this->view("trangchu",[
                    "page"=>"v_dangnhap",
                    "phanloai"=>$this->sach->loaisach(),
                    "hiden"=>1,
                    "dangnhap"=> $this->mk->ktdn_gv($mssv,$matkhau),
                    "phanquyen"=>1
                ]);
               
               //  if(isset($_SESSION["dangnhap"]))
               // $mahoa_matkhau=password_hash($matkhau,PASSWORD_DEFAULT);
               // $a=password_hash($mssv,PASSWORD_DEFAULT);
               //pass:123 sv
              
            }
            else{
                $this->view("trangchu",[
                    "page"=>"v_dangnhap",
                    "phanloai"=>$this->sach->loaisach(),
                    "hiden"=>1,
                    "dangnhap"=>json_encode("Không bỏ tróng dữ liệu"),
                    "phanquyen"=>1
                    
                ]);
            }
        }
        else{
            $this->view("trangchu",[
                "page"=>"v_dangnhap",
                "phanloai"=>$this->sach->loaisach(),
                "hiden"=>1,
                "dangnhap"=>json_encode("Vui lòng đăng nhập"),
                "phanquyen"=>1
            ]);
        }
    }

    }
    public function dangxuat(){
        if(isset($_SESSION["dangnhap"])){
            unset($_SESSION["dangnhap"]);
            header('Location: http://localhost/live/admin');
        }
        else{
            header('Location: http://localhost/live/admin');
        }
    }

    public function qls(){
        $thongtinsach =  $this->model("M_admin");
        $this->view("trangchu",[
            "page"=>"qlsach",
            "phanloai"=>$this->sach->loaisach(),
            "thongtinsach"=>$thongtinsach->ad_thongtinsach(),
        ]);
        
    }
    public function ql_ls(){
        $this->view("trangchu",[
            "page"=>"loaisach",
            "phanloai"=>$this->sach->loaisach(),
         
        ]);
            
    }
    public function giaovien(){
        echo "day la quan ly giao vien";
    }
    public function sinhvien(){
        $this->view("trangchu",[
            "page" => "ThemSV"            
        ]);
    }

    public function addsinhvien(){        
        $this->view("trangchu",[
            "page" => "ThemSV"            
        ]);
    }
    public function khoacn(){
        $this->view("trangchu",[
            "page" => "Khoa"            
        ]);
    }
    public function addkhoacn(){
        if(isset($_POST['submit']) && isset($_POST['TenKhoa'])){
            if(!empty($_POST['TenKhoa'])){
                $TenKhoa = $_POST['TenKhoa'];                               

                $kq = $this->Obj->addKhoa($TenKhoa);

                $this->view("trangchu",[
                    "page" => "Khoa",
                    "result"=> $kq 
                ]);  
            }            
        }
    }
    public function khoa(){
        echo "day la quan ly khoa chuyen nganh";
    }
    public function thongke(){
        echo "day la thong ke";
    }
    public function muontra(){
        echo "day la muon tra";
    }

    public function tacgia(){
        $this->view("trangchu",[
            "page" => "TacGia"            
        ]);
    }
    public function addTacGia(){
        if(isset($_POST['submit']) && isset($_POST['TenTacGia'])){
            if(!empty($_POST['TenTacGia'])){
                $TenTacGia = $_POST['TenTacGia'];                               

                $kq = $this->Obj->addTacGia($TenTacGia);

                $this->view("trangchu",[
                    "page" => "TacGia",
                    "result"=> $kq 
                ]);  
            }            
        }
    }
}
?>