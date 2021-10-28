
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script src="public/js/modal/modal.js"></script>

<div class="container-fluid">
<?php 
    if(isset($data["ketquaKhoa"]) && $data["ketquaCN"]){
        $kq_khoa = json_decode($data["ketquaKhoa"], true);                                    
        $kq_CN = json_decode($data["ketquaCN"],true);
    }    
    // print_r($kq_CN);
?>
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                <div class="col-lg-7 div_center">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Thêm Sinh Viên Mới</h1>
                        </div>
                        <form class="user" action="admin/addsinhvien" method="POST">
                            <div class="form-group ">
                                <input type="text" class="input-group" id="MSSV"
                                    placeholder="Mã Số Sinh Viên" name="MSSV">
                            </div>
                            <div class="form-group ">
                                <input type="text" class="input-group" id="TenSv"
                                    placeholder="Tên Sinh Viên" name="TenSv">
                            </div>
                            <div class="form-group ">
                                <input type="text" class="input-group" id="CMND"
                                    placeholder="CMND" name="CMND">
                            </div>                            
                            <div class="form-group ">
                                <select name="GioiTinh" id="GioiTinh" class="form-select" aria-label="Default select example">
                                    <option value="Nam">Nam</option>
                                    <option value="Nu">Nữ</option>                                                                      
                                </select>                                
                            </div>
                            <div class="form-group ">
                                <select name="KhoaHoc" id="Khoa" class="form-select" aria-label="Default select example">
                                    <?php
                                        foreach($kq_khoa as $khoa){
                                            ?>
                                                <option value="<?php echo $khoa["MaKhoaHoc"] ?>"> <?php echo $khoa["TenKhoaHoc"] ?></option>
                                            <?php
                                        }
                                    ?>
                                </select>                                
                            </div>   
                            <div class="form-group ">
                                <select name="KhoaCN" id="Khoa" class="form-select" aria-label="Default select example">
                                <?php
                                    foreach($kq_CN as $CN){
                                        ?>
                                            <option value="<?php echo $CN["MaKhoaCN"] ?>"> <?php echo $CN["TenCN"] ?></option>
                                        <?php
                                    }
                                ?>                                                                  
                                </select>                                
                            </div> 
                            <div class="form-group ">
                                <input type="password" class="input-group" id="MatKhau"
                                    placeholder="Mật Khẩu" name="MatKhau">
                            </div>
                            <!-- <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                    placeholder="Email Address">
                            </div> -->
                            <div class="form-group ">
                                <!-- <button class="btn btn-success">
                                    <i class="fas fa-user-plus"></i>
                                    <span>Thêm Sinh Viên</span> 
                                </button> -->
                                <input type="submit" id = "submit" name = "submit" class="btn btn-success fas fa-user-plus" value="Thêm Sinh Viên">
                            </div>
                            <!-- <hr>
                            <a href="index.html" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Register with Google
                            </a>
                            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                            </a> -->
                        </form>    
                        <div class="form-group ">
                                <a href="./ThemSV/themfileExcel" class="btn btn-success">Thêm bằng file Excel</a>                    
                        </div>                    
                        <hr>
                        <!-- <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div> -->
                        <!-- <div class="text-center">
                            <a class="small" href="login.html">Already have an account? Login!</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>



