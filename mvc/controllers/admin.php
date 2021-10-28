<?php 
class admin extends controllers{
    public $Location = "Location: http://localhost:8080/liveserver/";
    public function __construct()
    {   
        $this->sach = $this->model("danhsach");
        $this->mk =  $this->model("xl_dn");
        $this->Obj = $this->model("xulydulieu");
        
    }
    public function sayhi(){
        if(isset($_SESSION["dangnhap"][2])){
            header($this->Location);
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
            header($this->Location);
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
            header($this->Location);
        }
        else{
            header($this->Location);
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
        }
        $this->view("trangchu",[
            "page"=>"ThemSach",
            "phanloai"=>$this->sach->loaisach(),
            "tacgia"=>$this->sach->tacgia(),
        ]);
        
    }
    public function suasach($masach){
        $this->view("trangchu",[
            "page"=>"ThemSach",
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
        $kq = $this->model("M_admin");  
        $this->view("trangchu",[
            "page" => "ThemSV",   
            "ketquaKhoa"=>  $kq->showDSKhoa(),
            "ketquaCN" => $kq->showKhoaCN()
        ]);
    }

    public function addsinhvien(){
        $kq = $this->model("M_admin"); 
        if(isset($_POST['submit']) && isset($_POST['MSSV']) && isset($_POST['TenSv']) && isset($_POST['CMND']) && isset($_POST['GioiTinh']) 
        && isset($_POST['KhoaHoc']) && isset($_POST['KhoaCN']) && isset($_POST['MatKhau'])){
            $MSSV = $_POST['MSSV'];
            $TenSv = $_POST['TenSv'];
            $CMND = $_POST['CMND'];
            $GioiTinh = $_POST['GioiTinh'];
            $KhoaHoc = $_POST['KhoaHoc'];
            $KhoaCN = $_POST['KhoaCN'];            
            $MatKhau = password_hash($_POST['MatKhau'], PASSWORD_DEFAULT);
            $insert = $this->model("M_admin");
            $this->view("trangchu",[
                "page" => "ThemSV",   
                "ketquaKhoa"=>  $kq->showDSKhoa(),
                "ketquaCN" => $kq->showKhoaCN(),
                "insert" => $insert-> newSinhVien($MSSV, $TenSv, $CMND, $GioiTinh, $KhoaHoc, $MatKhau, $KhoaCN)
            ]);
        }  
        else{
            
            $this->view("trangchu",[
                "page" => "ThemSV",   
                "ketquaKhoa"=>  $kq->showDSKhoa(),
                "ketquaCN" => $kq->showKhoaCN()             
            ]);
        }
        
    }
    public function showSinhVien(){
        $kq_sv = $this->model("M_admin")->showSinhVien();
        $this->view("trangchu",[
            "page" => "showSV",
            "kq_sv" => $kq_sv            
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

                $kq = $this->model("M_admin")->addKhoa($TenKhoa);

                $this->view("trangchu",[
                    "page" => "Khoa",
                    "result"=> $kq 
                ]);  
            }            
        }
    }
    public function showKhoaCN()
    {
        $kq_khoaCN = $this->model("M_admin")->showKhoaCN();
        $this->view("trangchu",[
            "page" => "showKhoaCN",
            "kq_khoaCN" => $kq_khoaCN            
        ]);
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

                $kq = $this->model("M_admin")->addTacGia($TenTacGia);

                $this->view("trangchu",[
                    "page" => "TacGia",
                    "result"=> $kq 
                ]);  
            }            
        }
    }
    public function showTacGia()
    {
        $kq_tg = $this->model("M_admin")->showTacGia();
        $this->view("trangchu",[
            "page" => "showTacGia",
            "kq_tg" => $kq_tg            
        ]);
    }
    public function NhanVien(){
        $this->view("trangchu",[
            "page" => "NhanVien"            
        ]);
    }
    public function ShowNV(){
        $kq = $this->model("M_admin")->showNhanVien(); 
        $this->view("trangchu",[
            "page" => "shownv", 
            "result" => $kq                      
        ]);
    }
    public function addNV(){
        if(isset($_POST['submit']) && isset($_POST['TenNhanVien']) && isset($_POST['GioiTinh']) && isset($_POST['pass']) && isset($_POST['CMND'])){
            if(!empty($_POST['TenNhanVien']) && !empty($_POST['GioiTinh']) && !empty($_POST['CMND']) && !empty($_POST['pass'])){
                $TenNhanVien = $_POST['TenNhanVien'];
                $GioiTinh = $_POST['GioiTinh'];               
                $CMND = $_POST['CMND'];
                $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);                

                $this->view("trangchu",[
                    "page" => "NhanVien",
                    "result"=> $this->model("M_admin")->ThemNhanVien($TenNhanVien, $GioiTinh, $CMND, $pass),
                ]);  
            }            
        }
    }
}
?>