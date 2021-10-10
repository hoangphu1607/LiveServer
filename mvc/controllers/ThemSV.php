<?php
class ThemSV extends controllers{
    function sayhi(){        
        $this->view("trangchu",[
            "page" => "ThemSV"            
        ]);
    }  
} 
?>