<?php
class LoaiSach extends controllers{
    function sayhi(){        
        $this->view("trangchu",[
            "page" => "LoaiSach"            
        ]);
    }  
} 
?>