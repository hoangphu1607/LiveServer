<?php
class home extends controllers{
    public $sach;
    private $get_url;
    public function __construct()
    {
        $this->sach = $this->model("danhsach");
     
    }
    // public function sayhi($trang = 1){
    //     $this->view("trangchu",[
    //         "page" => "thongtinsach",
    //         "phanloai"=>$this->sach->loaisach(),
    //         "thongtinsach"=>$this->sach->phantrang_sach($trang),
    //         "sotrang" =>$this->sotrang,
    //         "check"=>0
    //     ]);
    // }
    public function chi_tiet_loaisach($id=1,$trang=1){
        settype($trang, "integer");
        settype($id, "integer");
        $this->get_url = $this->sach->sotrang_theoloai($id);
        try {
        if($id<=0 || $trang==0){
            $id=1;
            $trang=1;
        }
        else if($trang > $this->get_url){
            $id=1;
            $trang=1;
        }
        $this->view("trangchu",[
            "page"=>"sach",
            "phanloai"=>$this->sach->loaisach(),
            "thongtinsach"=>$this->sach->thongtinsach_theoloai($id,$trang),
            "sotrang" =>$this->sach->sotrang_theoloai($id),
            "check"=>1,
            "id"=>$id,
            "trang"=>$trang,
        ]);
     }
     catch (\Exception $ex) {
        http_response_code(404);
        $this->view("404",[]);
        die();
    }

    }
    public function thongtinsach($id){
        $this->view("trangchu",[
            "page"=>"chitiet_sach",
            "phanloai"=>$this->sach->loaisach(),
            "ctsach"=>$this->sach->chitiet_sach($id),
        ]);
    }
    public function sayhi($trang=1){
        settype($trang, "integer");
        $this->get_url = $this->sach->sotrang();
        try {
            if ($trang == 0) {
                $trang=1;
            }
            else if($trang > $this->get_url){
                $trang=1;
            }
        ////    
            $this->view("trangchu",[
            "page"=>"sach",
            "phanloai"=>$this->sach->loaisach(),
            "thongtinsach"=>$this->sach->phantrang_sach($trang),
            "sotrang" => $this->sach->sotrang(),
            "check"=>0,
            "trang"=>$trang,
        ]);
        } 
        catch (\Exception $ex) {
            http_response_code(404);
            $this->view("404",[]);
            die();
        }
     
    }
    public function anh(){
        if(isset($_POST["gui"]) ){
            $anh = $_FILES["anh"];
            $nam = $this->model("ad");
            if($nam->insertdata($anh)){
                echo "thanh cong";
            }
            else{
                echo "that bai";
            }
        }
        $this->view("test",[
            "page"=>"giua"
        ]);
    }


} 
?>