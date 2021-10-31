@@ -0,0 +1,51 @@
<?php 
    $kq_KhoaHoc = json_decode($data["kq_KhoaHoc"], true);     
    
?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý</h1>
    <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary ">Quản lý Khóa Học</h6>    
             <a type="button"  class="btn btn-success ">Thêm file excel</a>
             <a type="button" class="btn btn-success " href="admin/khoacn">Thêm Khóa Học</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>Stt</th>                                             
                        <th>Tên Kháo Học</th> 
                        <th>Năm Bắt Đầu</th>                                             
                        <th>Sửa</th>
                        <th>Xóa</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>Stt</th>                                             
                        <th>Tên Kháo Học</th> 
                        <th>Năm Bắt Đầu</th>                                               
                        <th>Sửa</th>
                        <th>Xóa</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php $i=1 ; 
                        foreach ($kq_KhoaHoc as $KH) { ?> 
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $KH["TenKhoaHoc"] ?></td>
                            <td><?php echo $KH["NamBatDau"] ?></td>                                                                       
                            <td><a  type="button" class="btn btn-success" href="admin/suanhanvien/<?php  echo $CN["MaKhoaHoc"] ?>">Sửa</a></td>
                            <td><a  type="button" class="btn btn-danger" href="">Xóa</a></td>
                        </tr>
                        <?php $i++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>