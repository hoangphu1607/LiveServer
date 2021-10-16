<?php
class NhanVien extends controllers{
    function sayhi(){        
        $this->view("trangchu",[
            "page" => "NhanVien"            
        ]);
    }  
} 
?>