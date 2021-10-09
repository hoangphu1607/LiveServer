<?php 
class noidung extends controllers{

    function sayhi(){
        $this->view("trangchu",[
            "page" => "thongtinsach",
            "phanloai"=>$this->sach->loaisach(),
            "thongtinsach"=>$this->sach->thongtinsach(),
        ]);   
}
    function test($id){
        $nam = $this->model("danhsach");
        $this->view("trangchu",[
            "page"=>"giua2",
            "id"=>$id,
            "phanloai"=>$nam->loaisach(),
        ]);
    }
    
    function test1(){
        $nam = $this->model("danhsach");
        $this->view("trangchu",[
            "page"=>"thongtinsach",
            "phanloai"=>$nam->loaisach(),
        ]);
    }
    


}
?>