<div class="row">
    <?php
    $kq_sach = json_decode($data["thongtinsach"], true);
    foreach ($kq_sach as $sach) { ?>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="card shadow mb-4">
                <!-- Product image-->
                <img class=" hinhanh card-img-top img-thumbnail " src="public/anhsach/sach_lt_java.jpg" alt="<?php $sach["TenSach"] ?>" id="" />
                <!-- Product details-->
                <div class="card-body p-4 ">
                    <div class="text-center">
                        <!-- Product name-->
                        <h5 class="fw-bolder"><?php echo $sach["TenSach"] ?></h5>
                        <!-- Product price-->
                        <?php echo substr($sach["Noidungngan"],0,120)."...";?></p>
                    </div>
                </div>
                <!-- Product actions-->
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                    <div class="text-center "><a class="btn btn-outline-dark mt-auto" href="./home/thongtinsach/<?php  echo $sach["MaSach"] ?>">Xem thông tin</a></div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

    <!-- Area Chart -->
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card shadow mb-4">
            <!-- Product image-->
            <img class="hinhanh card-img-top img-thumbnail" src="https://itviec.com/blog/wp-content/uploads/2017/03/CLR-via-C.jpg" alt="..." />
            <!-- Product details-->
            <div class="card-body p-4 ">
                <div class="text-center">
                    <!-- Product name-->
                    <h5 class="fw-bolder">tên sách</h5>
                    <!-- Product price-->
                    mô tả ngắn
                </div>
            </div>
            <!-- Product actions-->
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Xem thông tin</a></div>
            </div>
        </div>
    </div>


    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card shadow mb-4">
            <!-- Product image-->
            <img class="card-img-top hinhanh img-thumbnail" src="https://cuongquach.com/wp-content/uploads/2019/06/lap-trinh-c-shard-tu-co-ban-den-nang-cao-pdf.jpg" alt="..." />
            <!-- Product details-->
            <div class="card-body p-4 ">
                <div class="text-center">
                    <!-- Product name-->
                    <h5 class="fw-bolder">tên sách</h5>
                    <!-- Product price-->
                    mô tả ngắn

                </div>
            </div>
            <!-- Product actions-->
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Xem thông tin</a></div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card shadow mb-4">
            <!-- Product image-->
            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
            <!-- Product details-->
            <div class="card-body p-4 ">
                <div class="text-center">
                    <!-- Product name-->
                    <h5 class="fw-bolder">tên sách</h5>
                    <!-- Product price-->
                    mô tả ngắn

                </div>
            </div>
            <!-- Product actions-->
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Xem thông tin</a></div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card shadow mb-4">
            <!-- Product image-->
            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
            <!-- Product details-->
            <div class="card-body p-4 ">
                <div class="text-center">
                    <!-- Product name-->
                    <h5 class="fw-bolder">tên sách</h5>
                    <!-- Product price-->
                    mô tả ngắn

                </div>
            </div>
            <!-- Product actions-->
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Xem thông tin</a></div>
            </div>
        </div>
    </div>


</div>