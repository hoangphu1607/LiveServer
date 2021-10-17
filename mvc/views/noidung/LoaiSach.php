
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script src="public/js/modal/modal.js"></script>
<link rel="stylesheet" href="public/css/hoangphu.css">
<div class="container-fluid">
<?php     
    if(isset($data['result'])){
        $kq = $data['result'];
        if($kq == true){
            echo "Thêm Thành Công";
        }
        else
            echo "Thêm Thất Bại";
    }       
    
?>
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                <div class="col-lg-7 div_center">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Thêm Loại Sách</h1>
                        </div>
                        <form class="user" method="POST" enctype="multipart/form-data" action="./quantri/addLoaiSach">
                            <div class="form-group ">
                                <input type="text" class="input-group" id="MaLoaiSach" 
                                value="<?php $id_sach = $data['dongcuoi'];
                                echo ($id_sach["MaLoaiSach"]);  
                                ?>" placeholder="Mã Loại Sách" name="MaLoaiSach" readonly>
                            </div>
                            <div class="form-group ">
                                <input type="text" class="input-group" id="TenLoaiSach"
                                    placeholder="Tên Loại Sách" name="TenLoaiSach">
                            </div>
                            <div class="form-group ">
                                <input type="submit" name="submit" value="Gửi" class="btn btn-success">
                            </div>
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



