<?php
class ThemSach extends controllers{
    function sayhi(){
        
        $this->view("trangchu",[
            "page" => "ThemSach"            
        ]);
    }  
} 
?>