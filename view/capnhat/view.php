<?php
if(is_array($info)){
    extract($info);
    // var_dump($info);
}else{
    echo "lỗi";
}
var_dump($info);
?>
<main class="catalog mb">
    <div class="container border border-light" style="width: 600px;height:100%;margin: 0 auto;">
                                    
    <h1 class="alert alert-info">CẬP NHẬT TÀI KHOẢN</h1>
        
        <form action="index.php?act=capnhat" method="POST">
            <div class="mb-3" style="text-align: left;">
                <label for="ten" class="form-label" style="text-align: left;">Nhập Tên Mới</label>
                <input type="text" class="form-control" name="user" id="ten" placeholder="Nhập tên mới" value="<?=$user?>">
            </div>
            <div class="mb-3" style="text-align: left;">
                <label for="mail" class="form-label" style="text-align: left;">Nhập Email Mới</label>
                <input type="email" class="form-control" name="email" id="mail" placeholder="abc@gmail.com" value="<?= $email ?>">
            </div>
            <div class="mb-3" style="text-align: left;">
                <label for="pass" class="form-label" style="text-align: left;">Nhập Pass mới</label>
                <input type="text" class="form-control" name="pass" id="pass" placeholder="Nhập pass mới" value="<?= $pass ?>">
            </div>
            <div class="mb-3" style="text-align: left;">
                <label for="address" class="form-label" style="text-align: left;">Nhập Địa Chỉ Mới</label>
                <input type="text" class="form-control" name="address" id="address" placeholder="Nhập địa chỉ mới" value="<?= $address?>">
            </div>
            <div class="mb-3" style="text-align: left;">
                <label for="tel" class="form-label" style="text-align: left;">Nhập SĐT Mới</label>
                <input type="text" class="form-control" name="tel" id="tel" placeholder="Nhập sđt mới" value="<?= $tel ?>">
            </div>
            <input type="submit" name="send" class="btn btn-outline-success mb-1" value="Cập nhật"></input>
            <button type="reset" class="btn btn-outline-success mb-1">Nhập lại</button>
        </form>
    </div>
    <?php
    include "view/boxright.php";
    ?>
</main>