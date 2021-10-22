<?php $kq_sach = json_decode($data["thongtinsach"], true); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Quản lý sách</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên sách</th>
                            <th>Nội dung ngắn</th>
                            <th>Chương</th>
                            <th>Sô lượng</th>
                            <th>Ngày nhập</th>
                            <th>Hình ảnh</th>
                            <th>Giá</th>
                            <th>Ngày nhập</th>
                            <th>Loại sách</th>
                            <th>Tác giả</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tên sách</th>
                            <th>Nội dung ngắn</th>
                            <th>Chương</th>
                            <th>Sô lượng</th>
                            <th>Ngày nhập</th>
                            <th>Hình ảnh</th>
                            <th>Giá</th>
                            <th>Ngày nhập</th>
                            <th>Loại sách</th>
                            <th>Tác giả</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($kq_sach as $sach) { ?> 
                        <tr>
                            <td><?php echo $sach["TenSach"] ?></td>
                            <td><?php echo $sach["Noidungngan"] ?></td>
                            <td><?php echo $sach["Chuong"] ?></td>
                            <td><?php echo $sach["SoLuong"] ?></td>
                            <td><?php echo $sach["NgayNhap"] ?></td>
                            <td><?php echo "CHUA CO" ?></td>
                            <td><?php echo $sach["Gia"] ?></td>
                            <td><?php echo $sach["NgayNhap"] ?></td>
                            <td><?php echo $sach["TenLoaiSach"] ?></td>
                            <td><?php echo $sach["TenTG"] ?></td>
                            <td><?php echo "sua" ?></td>
                            <td><?php echo "xoa" ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>