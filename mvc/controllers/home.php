<?php
class home extends controllers{
    private $sach;
    public function __construct()
    {
        $this->sach = $this->model("danhsach");
    }
    public function sayhi(){
        $this->view("trangchu",[
            "page" => "thongtinsach",
            "phanloai"=>$this->sach->loaisach(),
            "thongtinsach"=>$this->sach->thongtinsach(),
        ]);
    }

    public function chi_tiet_loaisach($id){
        $this->view("trangchu",[
            "page"=>"giua2",
            "id"=>$id,
            "phanloai"=>$this->sach->loaisach(),
        ]);
    }
    public function thongtinsach($id){
        $this->view("trangchu",[
            "page"=>"chitiet_sach",
            "id"=>$id,
            "phanloai"=>$this->sach->loaisach(),
        ]);
    }

} 
?>