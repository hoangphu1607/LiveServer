<?php 
class ajax extends controllers{

    public function xoa_hinhct(){

        $id_hinh = $_POST['hinh'];
        $admin = $this->model('M_admin');
        echo $admin->xoa_anhct($id_hinh);
    }


}
?>