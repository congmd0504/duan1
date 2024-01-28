<div class="row2">
    
        <h1 class="alert alert-success">DANH SÁCH LOẠI HÀNG HÓA</h1>
    
    <div class="row2 form_content ">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <table class="bg-success-subtle">
                    <tr>
                        <th></th>
                        <th>MÃ LOẠI</th>
                        <th>TÊN LOẠI</th>
                        <th></th>
                    </tr>
                    <?php
                    foreach ($listdanhmuc as $danhmuc) {
                        extract($danhmuc);
                        $suadm = "index.php?act=suadm&iddm=" . $id;
                        $xoadm = "index.php?act=xoadm&iddm=" . $id;

                        echo'
                        <tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td>'.$id.'</td>
                        <td>'.$name.'</td>
                        <td>
                            <a href="'.$suadm.'">
                                <input type="button" value="Sửa">
                            </a> 
                            <a href="' . $xoadm .'"> 
                                <input type ="button" value="Xóa" onclick=\'return confirm("Bạn có chắc chắn muốn xóa")\'>
                            </a>
                        </td>
                        </tr>';
                    }
                    ?>

                </table>
            </div>
            <div class="">
                <input class="mr20" type="button" value="CHỌN TẤT CẢ">
                <input class="mr20" type="button" value="BỎ CHỌN TẤT CẢ">
                <a href="index.php?act=adddm"> <input class="mr20" type="button" value="NHẬP THÊM"></a>
            </div>
        </form>
    </div>
</div>




</div>