<script src="public/ckeditor/ckeditor.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
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
                            <h1 class="h4 text-gray-900 mb-4">Thêm Sinh Viên Mới</h1>
                        </div>
                        <form class="user">
                            <div class="form-group ">
                                <input type="text" class="input-group" id="TemSach"
                                    placeholder="Tên Sách" name="TenSach">
                            </div>
                            <div class="form-group ">
                                <select name="MaLoaiSach" id="MaLoaiSach" class="form-select" aria-label="Default select example">
                                    <option value="volvo">Loại Sách 1</option>
                                    <option value="saab">Loại Sách 2</option>                                                                      
                                </select>                                
                            </div>
                            <div class="form-group ">
                                <select name="MaTacGia" id="MaTacGia" class="form-select" aria-label="Default select example">
                                    <option value="volvo" >Tác Giả 1</option>
                                    <option value="saab">Tác Giả 2</option>                                                                     
                                </select>                                
                            </div>                            
                            <div class="form-group ">
                                <input type="text" class="input-group" id="Gia"
                                    placeholder="Giá Tiền" name="Gia">
                            </div>
                            <div class="form-group ">
                                <input type="text" class="input-group" id="SoLuong"
                                    placeholder="Số Lượng" name="SoLuong">
                            </div>                            
                            <div class="form-group ">
                                <label for="Anh">Chọn Ảnh Đại Diện</label>
                                <input type="file" id="idAnh" accept="image/png, image/jpeg" name="Anh">                                
                            </div>
                            <div class="form-group ">
                                <label for="multiple">Chọn Các Ảnh Chi Tiết</label>
                                <input type="file" name="multiple" multiple="multiple" id="multiple_img" accept="image/png, image/jpeg">
                            </div>
                            <div class="form-group ">
                                <label for="time">Thời Gian Nhập Sách: </label>
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

