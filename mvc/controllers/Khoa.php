<?php
class Khoa extends controllers{
    function sayhi(){
        
        $this->view("trangchu",[
            "page" => "Khoa"            
        ]);
    }  
} 
?>