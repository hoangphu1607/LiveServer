<?php 
class admin extends controllers{
    public function __construct()
    {   
        $this->sach = $this->model("danhsach");
        $this->mk =  $this->model("xl_dn");
        
    }
    public function sayhi(){
        if(isset($_SESSION["dangnhap"])){
            header('Location: http://localhost/LiveServer/');
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
            header('Location: http://localhost/LiveServer/');
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
            header('Location: http://localhost/LiveServer/admin');
        }
        else{
            header('Location: http://localhost/LiveServer/admin');
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
    public function themsach(){
        //&& isset($_POST['tensach']) && isset($_POST['MaLoaiSach']) && isset($_POST['MaTacGia']) && isset($_POST['Gia']) && isset($_POST['SoLuong']) &&  isset($_FILES['anh'])  && isset($_FILES['n_anh']) && isset($_POST['time']) && isset($_POST['noidungngan']) 
        if(isset($_POST['gui'])){
            if(!empty($_POST["tensach"]) && !empty($_POST["MaLoaiSach"]) && !empty($_POST["MaTacGia"]) && !empty($_POST["Gia"])
            && !empty($_POST["SoLuong"]) && !empty($_FILES["anh"]) && !empty($_FILES["n_anh"]) && !empty($_POST["time"]) && !empty($_POST["noidungngan"])){
                $tensach = $_POST["tensach"];
                $maloaisach = $_POST["MaLoaiSach"];
                $matacgia = $_POST["MaTacGia"];
                $gia =$_POST["Gia"];
                $soluong = $_POST["SoLuong"];
                //
                /*
                $anh = $_FILES["anh"];
                $n_anh = $_FILES["n_anh"];
                */
                //
                $thoigian = $_POST["time"] ;
                $noidungngan = $_POST["noidungngan"];
                $nam = $this->model('M_admin');
                $this->view("trangchu",[
                    "page"=>"ThemSach",
                    "phanloai"=>$this->sach->loaisach(),
                    "thongbao_themsach"=>$nam->themsach($tensach,$noidungngan,$soluong,$thoigian/*,$anh*/,$gia,$maloaisach,$matacgia),
                    "tacgia"=>$this->sach->tacgia(),
                ]);
                
            }
            else{
                echo "nhap đủ thong tin";//viet sau
            }

        }
        else{ $this->view("trangchu",[
            "page"=>"ThemSach",
            "phanloai"=>$this->sach->loaisach(),
            "tacgia"=>$this->sach->tacgia(),
        ]);
        }
        
    }
    public function suasach($masach){
        if(isset($_POST['gui'])){
            if(!empty($_POST["tensach"]) && !empty($_POST["MaLoaiSach"]) && !empty($_POST["MaTacGia"]) && !empty($_POST["Gia"])
            && !empty($_POST["SoLuong"]) && !empty($_POST["time"]) && !empty($_POST["noidungngan"]) ){

                $tensach = $_POST["tensach"];
                $maloaisach = $_POST["MaLoaiSach"];
                $matacgia = $_POST["MaTacGia"];
                $gia =$_POST["Gia"];
                $soluong = $_POST["SoLuong"];
                $thoigian = $_POST["time"] ;
                $noidungngan = $_POST["noidungngan"];

                if(empty($_FILES['anh']['name'])  && !empty($_FILES['n_anh']['name'][0])){
                    echo "chưa có anh dt";
                    //update ảnh chi tiết
                }
                else if(empty($_FILES['n_anh']['name'][0]) && !empty($_FILES['anh']['name'])){
                    echo "chưa có anh ct";
                      //update ảnh đại diện
                }
                else if(empty($_FILES['anh']['name']) && empty($_FILES['n_anh']['name'][0])){
                    echo "cả 2 đều không có";
                      //update nội dung

                }
                else {
                    echo "cả 2 đều có";
                      //update tất cả
                }
                
                
  
                
        }
    }
    $admin = $this->model('M_admin');
    $this->view("trangchu",[
        "page"=>"ThemSach",
        "show_suasach"=>$admin->show_sach_sua($masach),
        "ha_ct"=>$admin->show_anh_ct_sua($masach),
        "phanloai"=>$this->sach->loaisach(),
        "tacgia"=>$this->sach->tacgia(),
        "suasach"=>1,
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
        echo "day la quan ly sinh vien";
    }
    public function khoa_hoc(){
        echo "day la quan ly khoa hoc";
    }
    public function khoacn(){
        echo "day la quan ly khoa chuyen nganh";
    }
    public function thongke(){
        echo "day la thong ke";
    }
    public function muontra(){
        echo "day la muon tra";
    }
}
