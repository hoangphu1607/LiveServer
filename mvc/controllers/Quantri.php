<?php
class Quantri extends controllers{

    public function __construct()    {        
        // $this->fileExcel = $this->model("themfileExcel");
        $this->Obj = $this->model("xulydulieu");       
        $this->sach = $this->model("danhsach");
        $this->getLastRow = $this->model("xulydulieu");     
    }

    public function sayhi(){
        echo "Trang chủ quản trị";
    }  
    public function LoaiSach(){
        $laydongcuoi = $this->getLastRow->getLastRow();
        $dulieu = json_decode($laydongcuoi,true);        
            $this->view("trangchu",[
            "page" => "LoaiSach",
            "dongcuoi" => $dulieu              
        ]);            
    }  
    public function addLoaiSach(){
        if(isset($_POST['submit']) && isset($_POST['TenLoaiSach']) && isset($_POST['MaLoaiSach'])){
            if(!empty($_POST['TenLoaiSach']) && !empty($_POST['MaLoaiSach'])){
                $TenLoaiSach = $_POST['TenLoaiSach'];

                $kq = $this->Obj->Themloaisach($TenLoaiSach);

                $this->view("trangchu",[
                    "page" => "LoaiSach",                      
                    "result"=> $kq         
                ]);  
            }            
        }         
    }
    public function ThemSV(){
        $this->view("trangchu",[
            "page" => "ThemSV"            
        ]);
    }

    public function themfileExcel(){
        $this->view("trangchu",[
            "page" => "ThemSV" ,
            "themfileExcel"=>$this->file->addSV()
        ]);
    }

    public function ThemNV(){
        $this->view("trangchu",[
            "page" => "NhanVien"            
        ]);
    }
    
    public function addNV(){
        if(isset($_POST['submit']) && isset($_POST['TenNhanVien']) && isset($_POST['GioiTinh'])){
            if(!empty($_POST['TenNhanVien']) && !empty($_POST['GioiTinh'])){
                $TenNhanVien = $_POST['TenNhanVien'];
                $GioiTinh = $_POST['GioiTinh'];               

                $kq = $this->Obj->ThemNhanVien($TenNhanVien, $GioiTinh);

                $this->view("trangchu",[
                    "page" => "NhanVien",
                    "result"=> $kq 
                ]);  
            }            
        }
    }
    
    public function ThemKhoa(){
        $this->view("trangchu",[
            "page" => "Khoa"            
        ]);
    }

    public function addKhoa(){
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

    public function ThemSach(){
        $this->view("trangchu",[
            "page" => "LoaiSach"                                
        ]);
    } 
    
    public function pass(){
        $this->view("trangchu",[
            "page" => "change_password"            
        ]);
    }
}
?>