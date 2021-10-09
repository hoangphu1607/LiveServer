<div class="row">
    <?php
    $kq_sach = json_decode($data["thongtinsach"], true);
    foreach ($kq_sach as $sach) { ?>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="card shadow mb-4">
                <!-- Product image-->
                <img class=" hinhanh card-img-top img-thumbnail " src="<?php echo $sach["AnhDaiDien"] ?>" alt="<?php echo $sach["TenSach"] ?>" id="" />
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

</div>