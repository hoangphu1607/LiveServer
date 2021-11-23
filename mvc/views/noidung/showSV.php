<?php 
    $kq_sv = json_decode($data["kq_sv"], true);     
    
?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý</h1>
    <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary ">Quản lý Sinh Viên</h6>    
             <a type="button"  class="btn btn-success ">Thêm file excel</a>
             <a type="button" class="btn btn-success " href="admin/addsinhvien">Thêm Sinh Viên</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>Stt</th>
                        <th>MSSV</th>                       
                        <th>Họ Tên</th>
                        <th>CMND</th> 
                        <th>Giới Tính</th>
                        <th>Khoa</th>
                        <th>Khoa Chuyên Ngành</th>                        
                        <th>Sửa</th>
                        <th>Xóa</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>Stt</th>
                        <th>MSSV</th>                       
                        <th>Họ Tên</th>
                        <th>CMND</th> 
                        <th>Giới Tính</th>
                        <th>Khoa</th>
                        <th>Khoa Chuyên Ngành</th>                        
                        <th>Sửa</th>
                        <th>Xóa</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php $i=1 ; 
                        foreach ($kq_sv as $sv) { ?> 
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $sv["MSSV"] ?></td>
                            <td><?php echo $sv["HoTen"] ?></td>
                            <td><?php echo $sv["CMND"] ?></td>  
                            <td><?php echo $sv["GioiTinh"] ?></td>        
                            <td><?php echo $sv["TenKhoaHoc"] ?></td>
                            <td><?php echo $sv["TenCN"] ?></td>                                              
                            <td><a  type="button" class="btn btn-success" href="admin/suanhanvien/<?php  echo $sv["IDSV"] ?>">Sửa</a></td>
                            <td><a  type="button" class="btn btn-danger" href="">Xóa</a></td>
                        </tr>
                        <?php $i++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>