<div class="row2">

    <h1 class="alert alert-success">DANH SÁCH LOẠI HÀNG HÓA</h1>

    <div class="row2 form_content ">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <table class="bg-success-subtle">
                    <tr>
                        <th></th>
                        <th>MÃ KH</th>
                        <th>TÊN KH</th>
                        <th>ADRESS</th>
                        <th>EMAIL</th>
                        <th>PASS</th>
                        <th>TEL</th>
                        <th></th>
                        <th>Trạng thái</th>
                    </tr>
                    <?php
                    $khoa_all = "index.php?act=khoa_all";
                    $mo_all = "index.php?act=mo_all";
                    foreach ($khachhang as $value) {
                        extract($value);

                        $khoakh = "index.php?act=khoakh&idkh=" . $id;
                        $mokhoa = "index.php?act=mokhoa&idkh=" . $id;

                        $info = "";
                        if ($status == 0) {
                            $info = "Đang mở";
                        } else {
                            $info = "Đang khóa";
                        }

                        echo '
                        <tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td>' . $id . '</td>
                        <td>' . $user . '</td>
                        <td>' . $address . '</td>
                        <td>' . $email . '</td>
                        <td>' . $pass . '</td>
                        <td>' . $tel . '</td>
                        <td>
                            
                            <a href="' . $khoakh . '"> 
                                <input type ="button" value="Khóa" onclick=\'return confirm("Bạn có chắc chắn muốn khóa khách hàng này không?")\'>
                            </a>
                            <a href="' . $mokhoa . '"> 
                                <input type ="button" value="Mở Khóa" onclick=\'return confirm("Bạn có chắc chắn muốn mở khóa cho khách hàng này không?")\'>
                            </a>
                        </td>
                        <td>' . $info . '</td>
                        </tr>';
                    }
                    ?>

                </table>
            </div>
            <div class="">
                <a href="<?= $khoa_all?>">
                    <input class="mr20" type="button" value="KHÓA TẤT CẢ">
                </a>
                <a href="<?= $mo_all?>">
                    <input class="mr20" type="button" value="BỎ KHÓA TẤT CẢ">
                </a>

            </div>
        </form>
    </div>
</div>




</div>