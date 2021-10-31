<?php $kq_nv = json_decode($data["result"], true);     
?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý</h1>
    <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary ">Quản lý Nhân Viên</h6>    
             <a type="button"  class="btn btn-success ">Thêm file excel</a>
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
                            <div class="form-group ">
                                <input type="text" class="input-group" id="TenNhanVien"
                                    placeholder="Tên Nhân Viên" name="TenNhanVien">
                            </div>
                            <div class="form-group ">                                
                                <input type="text" class="input-group" id="CMND"
                                    placeholder="CMND" name="CMND">
                            </div>
                            <div class="form-group ">
                                <input type="password" class="input-group" id="pass"
                                    placeholder="Mật Khẩu" name="pass">
                            </div>
                            <div class="form-group ">
                                <select name="GioiTinh" id="GioiTinh">
                                    <option value="Nam">Nam</option>
                                    <option value="Nu">Nữ</option>
                                </select>
                            </div>                            
                            <div class="form-group ">
                                <input type="button" name="submit" value="Gửi" id="button_insert" class="btn btn-success">
                                
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
                    <tbody>
                    <?php $i=1 ; 
                        foreach ($kq_nv as $nv) { ?> 
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $nv["TenNV"] ?></td>
                            <td><?php echo $nv["GioiTinh"] ?></td>
                            <td><?php echo $nv["Cmnd_gv"] ?></td>                            
                            <td><a  type="button" class="btn btn-success" href="admin/suanhanvien/<?php  echo $nv["MaNV"] ?>">Sửa</a></td>
                            <td><a  type="button" class="btn btn-danger" href="">Xóa</a></td>
                        </tr>
                        <?php $i++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
   $('#AddNV').click(function()
    {
        $.ajax({
            url : 'admin/showTable',
            type : 'POST',
            dataType : 'text',
            success : function (result){
                $('#table-NV').html(result);
            }
        });
    }); 
    $.ajax({
        url : 'admin/showTable',
        type : 'POST',
        dataType : 'text',
        success : function (result){
            $('#table-NV').html(result);
        }
    });
</script>