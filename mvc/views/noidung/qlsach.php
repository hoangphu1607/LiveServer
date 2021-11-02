<?php $kq_sach = json_decode($data["thongtinsach"], true); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý</h1>
    <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary ">Quản lý sách</h6>    
             <a type="button"  class="btn btn-success ">Thêm file excel</a>
             <a type="button" class="btn btn-success " href="admin/themsach">Thêm Sách</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Stt</th>
                            <th>Tên sách</th>
                            <th>Nội dung ngắn</th>
                            <th>Sô lượng</th>
                            <th>Ngày nhập</th>
                            <th>Hình ảnh</th>
                            <th>Giá</th>
                            <th>Ngày nhập</th>
                            <th>Loại sách</th>
                            <th>Tác giả</th>
                            <th>Khoa chuyên ngành</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                             <th>Stt</th>
                            <th>Tên sách</th>
                            <th>Nội dung ngắn</th>
                            <th>Sô lượng</th>
                            <th>Ngày nhập</th>
                            <th>Hình ảnh</th>
                            <th>Giá</th>
                            <th>Ngày nhập</th>
                            <th>Loại sách</th>
                            <th>Tác giả</th>
                            <th>Khoa chuyên ngành</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i=1 ; ?>
                        <?php foreach ($kq_sach as $sach) { ?> 
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $sach["TenSach"] ?></td>
                            <td><?php echo $sach["Noidungngan"] ?></td>
                            <td><?php echo $sach["SoLuong"] ?></td>
                            <td><?php echo $sach["NgayNhap"] ?></td>
                            <td><?php echo $sach["AnhDaiDien"] ?></td>
                            <td><?php echo $sach["Gia"] ?></td>
                            <td><?php echo $sach["NgayNhap"] ?></td>
                            <td><?php echo $sach["TenLoaiSach"] ?></td>
                            <td><?php echo $sach["TenTG"] ?></td>
                            <td><?php echo $sach["TenCN"] ?></td>
                            <td><a  type="button" class="btn btn-success" href="admin/suasach/<?php  echo $sach["MaSach"] ?>">Sửa</a></td>
                            <td><a  type="button" class="btn btn-danger" href="">Xóa</a></td>
                        </tr>
                        <?php $i++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>