<?php 
    $kq_tg = json_decode($data["kq_tg"], true);     
    
?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý</h1>
    <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary ">Quản lý Tác Giả</h6>    
             <a type="button"  class="btn btn-success ">Thêm file excel</a>
             <a type="button" class="btn btn-success " href="admin/TacGia">Thêm Tác Giả</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>Stt</th>                                             
                        <th>Tên Tác Giả</th>                                              
                        <th>Sửa</th>
                        <th>Xóa</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>Stt</th>                                             
                        <th>Tên Tác Giả</th>                                              
                        <th>Sửa</th>
                        <th>Xóa</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php $i=1 ; 
                        foreach ($kq_tg as $tg) { ?> 
                        <tr>
                            <td><?php echo $i ?></td>                            
                            <td><?php echo $tg["TenTG"] ?></td>                                                                       
                            <td><a  type="button" class="btn btn-success" href="admin/suanhanvien/<?php  echo $tg["MaTG"] ?>">Sửa</a></td>
                            <td><a  type="button" class="btn btn-danger" href="">Xóa</a></td>
                        </tr>
                        <?php $i++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>