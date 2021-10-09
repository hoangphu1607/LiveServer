<script src="public/ckeditor/ckeditor.js"></script>

<body class="bg-gradient-primary">

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Thêm Sách Vào Thư Viện</h1>
                        </div>
                        <form class="user">
                            <div class="form-group ">
                                <input type="text" class="form-control form-control-user" id="TemSach"
                                    placeholder="Tên Sách" name="TenSach">
                            </div>
                            <div class="form-group ">
                                <select name="MaLoaiSach" id="MaLoaiSach" class="form-control form-control-user">
                                    <option value="volvo">Loại Sách 1</option>
                                    <option value="saab">Loại Sách 2</option>                                                                      
                                </select>                                
                            </div>
                            <div class="form-group ">
                                <select name="MaTacGia" id="MaTacGia" class="form-control form-control-user">
                                    <option value="volvo" >Tác Giả 1</option>
                                    <option value="saab">Tác Giả 2</option>                                                                     
                                </select>                                
                            </div>
                            <div class="form-group ">
                                <select name="MaNXB" id="MaNXB" class="form-control form-control-user">
                                    <option value="volvo" >NXB 1</option>
                                    <option value="saab">NXB 2</option>                                                                     
                                </select>                                
                            </div>
                            <div class="form-group ">
                                <input type="text" class="form-control form-control-user" id="Gia"
                                    placeholder="Giá Tiền" name="Gia">
                            </div>
                            <div class="form-group ">
                                <input type="text" class="form-control form-control-user" id="SoLuong"
                                    placeholder="Số Lượng" name="SoLuong">
                            </div>                            
                            <div class="form-group ">
                                <input type="file" id="idAnh" accept="image/png, image/jpeg" name="Anh">
                                
                            </div>
                            <div class="form-group ">
                               
                                <input type="file" name="multiple" multiple="multiple" id="multiple_img" accept="image/png, image/jpeg">
                            </div>
                            <div class="form-group ">
                                <label for="time">Thời Gian Nhập: </label>
                                <input type="date" id="time" name="time">
                            </div>
                            <div class="form-group ">
                               <textarea name="noidungngna" id="Noidungngan" cols="30" rows="10"></textarea>
                            </div>
                            
                            

                            <!-- <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                    placeholder="Email Address">
                            </div> -->
                            
                            <a href="#" class="btn btn-primary btn-user btn-block">
                                Thêm Sách Vào Thư Viện
                            </a>
                            <!-- <hr>
                            <a href="index.html" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Register with Google
                            </a>
                            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                            </a> -->
                        </form>
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
<script >
    CKEDITOR.replace('Noidungngan');
</script>
</body>

