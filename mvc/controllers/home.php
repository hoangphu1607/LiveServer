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
            "page"=>"thongtinsach",
            "phanloai"=>$this->sach->loaisach(),
            "thongtinsach"=>$this->sach->thongtinsach_theoloai($id)
        ]);
    }
    public function thongtinsach($id){
        $this->view("trangchu",[
            "page"=>"chitiet_sach",
            "phanloai"=>$this->sach->loaisach(),
            "ctsach"=>$this->sach->chitiet_sach($id),
        ]);
    }

} 
?>