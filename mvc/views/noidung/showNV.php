<?php $kq_nv = json_decode($data["result"], true);
?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary ">Quản lý Nhân Viên</h6>
            <a type="button" class="btn btn-success ">Thêm file excel</a>
            <div class="col-md-2">
                <button class="btn btn-success" data-toggle="modal" data-target="#modalAdd" href="">Thêm Nhân Viên</button>
                <!-- modal -->
                <div class="modal fade" id="modalAdd">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Thêm Nhân Viên</h4>
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" id="AddNV">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="TenNhanVien" placeholder="Tên Nhân Viên" name="TenNhanVien">
                                </div>
                                <div class="form-group ">
                                    <input type="number" class="form-control" id="CMND" placeholder="CMND" name="CMND">
                                </div>
                                <div class="form-group ">
                                    <input type="password" class="form-control" id="pass" placeholder="Mật Khẩu" name="pass">
                                </div>
                                <div class="form-group ">
                                    <select name="GioiTinh" id="GioiTinh" class="form-control" id="gt">
                                        <option value="Nam">Nam</option>
                                        <option value="Nu">Nữ</option>
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <button type="button " name="submit" value="Gửi" id="button_insert" class="btn btn-success">Thêm</button>

                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                </div>
                                <!-- footer -->
                                <div class="modal-footer">
                                    <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button> -->
                                </div>
                                <!-- end footer -->

                            </div>
                        </div>
                    </div>
                </div> <!-- end modal -->
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Stt</th>
                            <th>Tên Nhân Viên</th>
                            <th>Giới Tính</th>
                            <th>CMND</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Stt</th>
                            <th>Tên Nhân Viên</th>
                            <th>Giới Tính</th>
                            <th>CMND</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </tfoot>
                    <tbody id="table-NV">
                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>xoa</td>
                            <td>sua</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#button_insert').click(function() {
            var gt = document.getElementById("GioiTinh").value;
            var ten = document.getElementById("TenNhanVien").value;
            var CMND = document.getElementById("CMND").value;
            var pass = document.getElementById("pass").value;
            var data = {
                ten: ten,
                CMND: CMND,
                pass: pass,
                gt: gt,
            };
            var t = $('#dataTable').DataTable();
            $.ajax({
                url: 'admin/showTable1',
                method: 'POST',
                data: data,
                beforeSend: function() {
                    thongbao();
                },
                success: function(data) {
                    data = JSON.parse(data);
                    // $txt = '<tr> <td>10</td><td>' + data.ten + '</td><td>' + data.gt + '</td><td>' + data.CMND + '</td> <td>Sửa</td> <td>Xóa</td></tr>';
                    //$('#table-NV').prepend($txt);
                    t.row.add([
                       "<td><td>",
                       data.ten,
                       data.gt,
                       data.CMND,
                       "sua",
                       "xoa"
                    ]).draw(false);

                }
            });
        });
    });

    // /////////
    // $.ajax({
    //     url: 'admin/showTable',
    //     type: 'POST',
    //     dataType: 'text',
    //     success: function(result) {
    //         $('#table-NV').append(result);
    //     }
    // });
</script>