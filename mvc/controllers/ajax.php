<?php
require_once 'public/phpspreadsheet/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ajax extends controllers
{

    public function xoa_hinhct()
    {

        $id_hinh = $_POST['hinh'];
        $admin = $this->model('M_admin');
        echo $admin->xoa_anhct($id_hinh);
    }
    public function xoasach()
    {
        $thongtinsach =  $this->model("M_admin");
        if (isset($_POST['id_sach_xoa']) && !empty($_POST['id_sach_xoa'])) {
            $idsach = $_POST['id_sach_xoa'];
            echo $thongtinsach->xoasach($idsach);
        }
    }
    public function them_ls()
    {
        $admin = $this->model('M_admin');
        if (!empty($_POST["tensach"])) {
            $tenloaisach = $_POST['tensach'];
            echo $admin->Themloaisach($tenloaisach);
        } else {
            echo json_encode(false);
        }
    }

    public function showsachsua()
    {
        $admin =  $this->model("M_admin");
        if (isset($_POST['maloaisach']) && !empty($_POST['maloaisach'])) {
            $idsach = $_POST['maloaisach'];
            echo $admin->showloaisach_cansua($idsach);
        } else {
            echo json_encode(false);
        }
    }

    public function suasach()
    {
        $admin =  $this->model("M_admin");
        if (isset($_POST['maloaisach']) && !empty($_POST['maloaisach']) && isset($_POST['tensach']) && !empty($_POST['tensach'])) {
            $idsach = $_POST['maloaisach'];
            $tensach = $_POST['tensach'];
            echo $admin->sualoaisach($idsach, $tensach);
        } else {
            echo json_encode(false);
        }
    }
    public function xoaloaisach()
    {
        $admin =  $this->model("M_admin");
        if (isset($_POST['maloaisach']) && !empty($_POST['maloaisach'])) {
            $maloaisach = $_POST['maloaisach'];
            echo $admin->m_xoaloaisach($maloaisach);
        } else {
            echo json_encode(false);
        }
    }

    public function xemfile()
    {
        $check = false;
        $mang = array();
        if (isset($_FILES['fileExecl']) && !empty($_FILES['fileExecl']['tmp_name'])) {
            $tenfile = $_FILES['fileExecl']['tmp_name'];          
            $dt = IOFactory::createReaderForFile($tenfile);
            $loadsheet = $dt->load($tenfile);
            $allsheet =  $loadsheet->getSheetNames();     
            $check = true; 
            $mang['file_ex'] = $tenfile; 
            $mang['check'] = $check; 
            $mang['kq'] = $allsheet;   
            echo json_encode($mang);        
        } else {
            $check = false; 
            $mang['check'] = $check; 
            $mang['kq'] ="không có file , vui lòng chọn file"; 
            echo json_encode($mang);
        }
    }
    public function dulieu_trongfile()
    {
        $check = false;
        $mang = array();
        if (isset($_FILES['fileExecl']) && !empty($_FILES['fileExecl']['tmp_name']) && isset($_POST['sheet']) && !empty($_POST['sheet'])) {
            $tenfile = $_FILES['fileExecl']['tmp_name']; 
            $sheet = $_POST['sheet'];         
            $dt = IOFactory::createReaderForFile($tenfile);
            $dt->setLoadSheetsOnly($sheet);
            $dt_ex = $dt->load($tenfile);
            $dl_ex = $dt_ex->getActiveSheet()->toArray('null',true,true,true);
           //*********/
           $dongcaonhat = $dt_ex->setActiveSheetIndex(0)->getHighestRow();
           $dem = 0;
           for($i = 2 ;$i <= $dongcaonhat;$i++){
               $mang[$dem]['tensach'] =$dl_ex[$i]['A'];
               $mang[$dem]['ndn_ex'] = $dl_ex[$i]['B'];
               $mang[$dem]['sl_ex'] = $dl_ex[$i]['C'];
               $mang[$dem]['ngaynhap_ex'] = $dl_ex[$i]['D'];
               $mang[$dem]['ha_ex'] = $dl_ex[$i]['E'];
               $mang[$dem]['ha_ct_ex'] = $dl_ex[$i]['F'];
               $mang[$dem]['gia_ex'] = $dl_ex[$i]['G'];
               $mang[$dem]['loaisach_ex'] = $dl_ex[$i]['H'];
               $mang[$dem]['tacgia_ex'] = $dl_ex[$i]['I'];
               $mang[$dem]['khoacn_ex'] = $dl_ex[$i]['J'];
               $mang[$dem]['stt'] =  $dem + 1;
               $dem++;
              
           }
          echo json_encode($mang);

    
        }else{

        }
    }

    public function load_ls(){
        $loadsach =  $this->model("M_admin");
        $ex_load = $loadsach->ex_loaisach();
        echo $ex_load;
    }

}
