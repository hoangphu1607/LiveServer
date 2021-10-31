
<?php $kq_nv = json_decode($data["result"], true);     
?>
<?php
    $i=1 ; 
    foreach ($kq_nv as $nv) { ?> 
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $nv["TenNV"] ?></td>
        <td><?php echo $nv["GioiTinh"] ?></td>
        <td><?php echo $nv["Cmnd_gv"] ?></td>                            
        <td><a  type="button" class="btn btn-success" href="admin/suanhanvien/<?php  echo $nv["MaNV"] ?>">Sửa</a></td>
        <td><a  type="button" class="btn btn-danger" href="">Xóa</a></td>
    </tr>
    <?php $i++; }
?>