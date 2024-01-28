<h3 class="alert alert-success">TỔNG HỢP BÌNH LUẬN</h3>
<table class="table">
    <thead alert-success>
        <tr>
            <th>TÊN HÀNG HÓA</th>
            <th>SỐ BL</th>
            <th>MỚI NHẤT</th>
            <th>CŨ NHẤT</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($items as $item){
            extract($item);
            $idsp = "index.php?act=listbl&idsp=".$id
        ?>
        <tr>
            <td><?=$name?></td>
            <td><?=$so_luong?></td>
            <td><?=$cu_nhat?></td>
            <td><?=$moi_nhat?></td>
            <td>
                <a href="<?=$idsp?>" class="btn btn-primary btn-sm">Chi tiết</a>
            </td>
        </tr>
        <?php }?>
    </tbody>
</table>