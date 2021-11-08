<?php 
class ajax extends controllers{

    public function xoa_hinhct(){

        $id_hinh = $_POST['hinh'];
        $admin = $this->model('M_admin');
        echo $admin->xoa_anhct($id_hinh);
    }
    public function xoasach(){
        $thongtinsach =  $this->model("M_admin");
        if (isset($_POST['id_sach_xoa']) && !empty($_POST['id_sach_xoa'])) {
            $idsach = $_POST['id_sach_xoa'];
          echo $thongtinsach->xoasach($idsach);
        }
        
    }
    public function them_ls()
    {
        $admin = $this->model('M_admin');
            if(!empty($_POST["tensach"])){
                $tenloaisach = $_POST['tensach'];
                echo $admin -> Themloaisach($tenloaisach);          
            }
            else{
                echo json_encode(false);
            }
    }

    public function showsachsua(){
        $admin =  $this->model("M_admin");
        if (isset($_POST['maloaisach']) && !empty($_POST['maloaisach'])) {
            $idsach = $_POST['maloaisach'];
           echo $admin->showloaisach_cansua($idsach);
        }
        else{
            echo json_encode(false);
        }
        
    }

    public function suasach(){
        $admin =  $this->model("M_admin");
        if (isset($_POST['maloaisach']) && !empty($_POST['maloaisach']) && isset($_POST['tensach']) && !empty($_POST['tensach']) ) {
            $idsach = $_POST['maloaisach'];
            $tensach = $_POST['tensach'];
           echo $admin->sualoaisach($idsach,$tensach);
        }
        else{
            echo json_encode(false);
        }
        
    }
    public function xoaloaisach(){
        $admin =  $this->model("M_admin");
        if (isset($_POST['maloaisach']) && !empty($_POST['maloaisach'])){
            $maloaisach = $_POST['maloaisach'];
            echo $admin->m_xoaloaisach($maloaisach);
        }
        else{
            echo json_encode(false);
        }

    }




}
?>