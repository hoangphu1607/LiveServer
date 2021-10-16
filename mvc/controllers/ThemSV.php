<?php
class ThemSV extends controllers{
    private $fileExcel;
    public function __construct()
    {
        $this->fileExcel = $this->model("themfileExcel");
    }

    function sayhi(){        
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

} 
?>