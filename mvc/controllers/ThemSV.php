<?php
class ThemSV extends controllers{


    function sayhi(){        
        $this->view("trangchu",[
            "page" => "ThemSV"            
        ]);
    } 
    
    public function themfileExcel(){
        $this->view("trangchu",[
            "page" => "themfileExcel"            
        ]);
    }
} 
?>