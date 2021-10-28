<script src="public/ckeditor/ckeditor.js"></script>
<?php date_default_timezone_set('Asia/Ho_Chi_Minh');
$loaisach = json_decode($data["phanloai"], true);
$tacgia = json_decode($data["tacgia"], true);
?>
<!--  -->
<?php if (isset($data["thongbao_themsach"])) {
    $kq = json_decode($data["thongbao_themsach"], true);
?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>thông báo: </strong> <?php
                                        if ($kq['kq'] == 1) {
                                            echo "thêm thành công";
                                        } else {
                                            if ($kq['kq'] == 0) {
                                                echo "thêm Thất bại" . "<br>";
                                                if ($kq['anh']['check'] != 0 && $kq['nhieuanh']['check2'] != 0) {
                                                    echo $kq['anh']['thongbao'] . "<br>";
                                                    echo $kq['nhieuanh']['thongbao'];
                                                } else if ($kq['anh']['check'] != 0 && $kq['nhieuanh']['check2'] == 0) {
                                                    echo $kq['anh']['thongbao'];
                                                } else if ($kq['anh']['check'] == 0 && $kq['nhieuanh']['check2'] != 0) {
                                                    echo $kq['nhieuanh']['thongbao'];
                                                }
                                            }
                                        }   ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
}
?>
<div class="container-fluid">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row container">
                <div class="col-lg-7 div_center themsach">
                    <div class="p-5 container-fluid">
                        <div class="text-center ">
                            <?php if (isset($data['suasach'])) { ?>
                                <?php $show = json_decode($data["show_suasach"], true);
                                $hinh_ct = json_decode($data["ha_ct"], true);
                                ?>
                                <h1 class="h4 text-gray-900 ">Chỉnh sửa Sách Vào Thư Viện</h1>
                        </div>
                        <form class="form-horizontal" action="admin/suasach/<?php echo $show[0]['MaSach'] ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" class="form-control" id="txt" placeholder="tên sách" name="tensach" value="<?php echo $show[0]['TenSach'] ?>" required>
                            </div>

                            <div class="form-group ">
                                <select name="MaLoaiSach" id="MaLoaiSach" class="form-control" aria-label="Default select example" required>
                                    <option selected disabled hidden value="<?php echo $show[0]['MaLoaiSach'] ?>"> <?php echo $show[0]['TenLoaiSach'] ?> </option>
                                    <?php foreach ($loaisach as $value) { ?>
                                        <option value="<?php echo $value['MaLoaiSach'] ?>"><?php echo $value['TenLoaiSach'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group ">
                                <select name="MaTacGia" id="MaTacGia" class="form-control" aria-label="Default select example" required>
                                    <option selected disabled hidden value="<?php echo $show[0]['MaTG'] ?>"><?php echo $show[0]['TenTG'] ?></option>
                                    <?php foreach ($tacgia as $value2) { ?>
                                        <option value="<?php echo $value2['MaTG'] ?>"><?php echo $value2['TenTG'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group ">
                                <input type="number" class="form-control" id="Gia" placeholder="Giá Tiền" name="Gia" required min="0" value="<?php echo $show[0]['Gia'] ?>">
                            </div>

                            <div class="form-group ">
                                <input type="number" class="form-control" id="SoLuong" placeholder="Số Lượng" name="SoLuong" required min="0" value="<?php echo $show[0]['SoLuong'] ?>">
                            </div>

                            <div class="form-group ">
                                <label for="Anh">Chọn Ảnh Đại Diện</label>
                                <input type="file" id="idAnh" accept="image/png, image/jpeg" name="anh" >
                                <div>
                                <img id="duongdan" src="<?php echo $show[0]['AnhDaiDien'] ?>" alt="" class="img-rounded">
                                </div>
                            </div>


                            <div class="form-group ">
                                <label for="multiple">Chọn Các Ảnh Chi Tiết</label>
                                <input type="file" name="n_anh[]" multiple="multiple" id="file-input" accept="image/png, image/jpeg" onchange="preview1()" >
                                <div id="images">
                                <?php 
                                $num =0;
                                foreach ( $hinh_ct as $link) { ?>
                                    <figure id="ah<?php echo $num ?>">
                                        <img  src="<?php echo $link['Link'] ?>">
                                        <figcaption> <button id="<?php echo  $link['id'] ?>" value="<?php echo $num ?>"  type="button" class="btn btn-danger xoa_anhct" style="zoom:80%" >Xóa Hình: <?php echo pathinfo($link['Link'])['basename']; ?></button></figcaption>
                                    </figure>                              
                                    <?php $num++; } ?>
                                </div>
                                <div id="themanh_sua">
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="time">Thời Gian Nhập Sách: </label>
                                <input type="date" id="time" name="time" min="2000-01-02" max="<?php echo date('Y-m-d'); ?>" value="<?php echo $show[0]['NgayNhap'] ?>" required>
                            </div>

                            <div class="form-group ">
                                <textarea name="noidungngan" id="Noidungngan" cols="30" rows="10" class="form-control"><?php echo $show[0]['Noidungngan'] ?></textarea>
                            </div>

                            <input type="submit" class="btn btn-primary btn-user btn-block" name="gui" value="Sửa thông tin sách">

                        </form>
                        
                    <?php }
                            /////////// Dưới thêm , trên sửa ///////////////
                            else { ?>
                        <h1 class="h4 text-gray-900 ">Thêm Sách Vào Thư Viện</h1>
                    </div>
                    <form class="form-horizontal" action="admin/themsach" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" class="form-control" id="txt" placeholder="tên sách" name="tensach" required>
                        </div>

                        <div class="form-group ">
                            <select name="MaLoaiSach" id="MaLoaiSach" class="form-control" aria-label="Default select example" required>
                                <option selected disabled hidden value="">Chọn loại sách</option>
                                <?php foreach ($loaisach as $value) { ?>
                                    <option value="<?php echo $value['MaLoaiSach'] ?>"><?php echo $value['TenLoaiSach'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group ">
                            <select name="MaTacGia" id="MaTacGia" class="form-control" aria-label="Default select example" required>
                                <option selected disabled hidden value="">Chọn tác giả</option>
                                <?php foreach ($tacgia as $value2) { ?>
                                    <option value="<?php echo $value2['MaTG'] ?>"><?php echo $value2['TenTG'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group ">
                            <input type="number" class="form-control" id="Gia" placeholder="Giá Tiền" name="Gia" required min="0">
                        </div>

                        <div class="form-group ">
                            <input type="number" class="form-control" id="SoLuong" placeholder="Số Lượng" name="SoLuong" required min="0">
                        </div>

                        <div class="form-group ">
                            <label for="Anh">Chọn Ảnh Đại Diện</label>
                            <input type="file" id="idAnh" accept="image/png, image/jpeg" name="anh" required>
                            <img id="duongdan" src="" alt="" class="img-rounded">
                        </div>

                        <div class="form-group ">
                            <label for="multiple">Chọn Các Ảnh Chi Tiết</label>
                            <input type="file" name="n_anh[]" multiple="multiple" id="file-input" accept="image/png, image/jpeg" onchange="preview()" required>
                            <div id="images"></div>
                        </div>

                        <div class="form-group ">
                            <label for="time">Thời Gian Nhập Sách: </label>
                            <input type="date" id="time" name="time" min="2000-01-02" max="<?php echo date('Y-m-d'); ?>"  required>
                        </div>

                        <div class="form-group ">
                            <textarea name="noidungngan" id="Noidungngan" cols="30" rows="10" class="form-control"></textarea>
                        </div>

                        <input type="submit" class="btn btn-primary btn-user btn-block" name="gui" value="Thêm Sách Vào Thư Viện">

                    </form>
                <?php } ?>
                <hr>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    var src = document.getElementById("idAnh");
    var target = document.getElementById("duongdan");
    showImage(src, target);
    show();
</script>

<script>
    CKEDITOR.replace('Noidungngan');
</script>