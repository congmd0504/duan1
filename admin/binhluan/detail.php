<h3 class="alert alert-success">CHI TIẾT BÌNH LUẬN</h3>
    <?php
        foreach($comments as $comment){
                extract($comment);
        }
    ?>

    <h3>HÀNG HÓA: <?=$name?></h3>
    <table class="table">
        <thead class="alert-success">
            <tr>
                <th></th>
                <th>NỘI DUNG</th>
                <th>NGÀY BL</th>
                <th>NGƯỜI BL</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($comments as $comment){
                extract($comment);
                $xoabl = "index.php?act=xoa_bl&idbl=".$id;
            ?>
            <tr>
                <th><input type="checkbox" name="ma_bl[]" value="<?=$id?>"></th>
                <td><?=$noidung?></td>
                <td><?=$ngaybinhluan?></td>
                <td><?=$user?></td>
                <td>
                    <a href="<?=$xoabl?>" >
                        <input type ="button" class="btn btn-danger btn-md" value="Xóa" onclick='return confirm("Bạn có chắc chắn muốn xóa")'>
                    </a>
                </td>
            </tr>
            <?php
             }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6">
                    <button id="check-all" type="button" class="btn btn-outline-primary ">Chọn tất cả</button>
                    <button id="clear-all" type="button" class="btn btn-outline-danger">Bỏ chọn tất cả</button>
                    <button type="button" class="btn btn-danger">Xóa</button>
                </td>
            </tr>
        </tfoot>
    </table>
</form>