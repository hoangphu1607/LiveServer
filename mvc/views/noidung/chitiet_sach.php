    <!-- Product section-->
    <section class="py-0">
        <?php $kq_ctsach = json_decode($data["ctsach"], true); ?>
        <div class="container-fluid px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-4"><img class="card-img-top mb-5 mb-md-0 img-thumbnail hinhanhct" src="<?php echo $kq_ctsach[0]["AnhDaiDien"]; ?>" alt="<?php echo $kq_ctsach[0]["TenSach"]; ?> " /></div>
                <div class="col-md-8">
                    <h1 class="display-5 fw-bolder"> <?php echo $kq_ctsach[0]["TenSach"]; ?> </h1>
                    <div class="fs-5 mb-3">
                        <a href="./home/chi_tiet_loaisach/<?php echo $kq_ctsach[0]["MaLoaiSach"]  ?>" class="badge badge-success">Loại sách: <?php echo $kq_ctsach[0]["TenLoaiSach"]; ?> </a>
                        <br>
                        <a href="#" class="badge badge-info">Tên tác giả: <?php echo $kq_ctsach[0]["TenTG"]; ?> </a>
                        <br>
                        <a href="./home/chi_tiet_loaisach/<?php echo $kq_ctsach[0]["MaKhoaCN"]  ?>" class="badge badge-primary">Khoa chuyên nghành: <?php echo $kq_ctsach[0]["TenCN"]; ?> </a>
                    </div>
                    <div class="lead"> <?php echo $kq_ctsach[0]["Noidungngan"]; ?> </div>
                    <div class="d-flex">
                        <!-- <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" /> -->
                        <?php if(empty($kq_ctsach[0]["file"])){ ?>
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                            <i class="bi-cart-fill me-1"></i>
                            Đặt sách
                        </button>
                        <?php } else { ?>
                            <button class="btn btn-outline-dark flex-shrink-0" type="button" id="btn_dowload">
                            <i class="bi-cart-fill me-1"></i>
                            Dowload
                            </button>
                            <input type="hidden" class="form-control" id="tenfile" placeholder="tên sách" value="<?php echo basename($kq_ctsach[0]["file"]) ?>" required>
                       <?php } ?>

                    </div>
                </div>
            </div>
        </div>
        <?php
        /*
            <div class="container-fluid px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Tổng Quan Sách</h2>
                <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-12">
                <p class="lead"><?php echo $kq_ctsach[0]["Chuong"]; ?></p>
                </div>
                </div>
            </div>
            */
        ?>
    </section>



    <!-- Related items section-->
    <section class="py-1 bg-light">
        <div class="container-fluid px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">Sách liên quan</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php $kq_ctanhlq = json_decode($data["anhlq"], true);
                foreach ($kq_ctanhlq as $value_anhlq) {
                ?>
                    <div class="col mb-6">
                        <div class="card h-100 ">
                            <!-- Product image-->
                            <img class="card-img-top" src="<?php echo $value_anhlq['AnhDaiDien'] ?>" alt="ảnh sách liên quan" />
                            <!-- Product details-->
                            <div class="card-body p-4" >
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo $value_anhlq['TenSach'] ?></h5>
                                    <!-- Product price-->
                                    <?php if (strlen($value_anhlq["Noidungngan"]) > 50) {
                                    ?>
                                        <div><?php echo substr($value_anhlq["Noidungngan"], 0, 50) . "...."; ?></div>
                                        <p style="color:blue;">xem them</p>
                                    <?php
                                    } else {  ?>
                                        <div><?php echo substr($value_anhlq["Noidungngan"], 0, 50); ?></div>
                                    <?php } ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="./home/thongtinsach/<?php echo $value_anhlq["MaSach"] ?>">Xem thông tin sách</a></div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>