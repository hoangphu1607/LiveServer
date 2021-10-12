<?php
class change_password extends controllers{
    function sayhi(){
        
        $this->view("trangchu",[
            "page" => "change_password"            
        ]);
    }  
} 
?>