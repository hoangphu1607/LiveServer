<?php 
class ajax extends controllers{

    public function loadhinh(){
        $hinh = $_FILES['anh']['name'];
        $nam = $this->model('M_admin');
         $duongdan= $nam->test($hinh);
         echo $duongdan['duongdan'];
    }

}
?>