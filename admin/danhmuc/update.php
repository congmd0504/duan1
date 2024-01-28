<?php 
if(isset($_GET['iddm'])&&($_GET['iddm']>0)){
  $danhmuc=loadone_danhmuc($_GET['iddm']);
  var_dump($danhmuc);
  extract($danhmuc);
}


?>
<div class="row2">
    <h1 class="alert alert-success">UPDATE LOẠI HÀNG HÓA</h1>

  <div class="row2 form_content ">
    <form action="" method="POST">
      <div class="row2 mb10 form_content_container">
        <label> Mã loại </label> <br>
        <input type="text" name="maloai" value="<?php echo $id?>" placeholder="nhập vào mã loại">
      </div>
      <div class="row2 mb10">
        <label>Tên loại </label> <br>
        <input type="text" name="tenloai" value="<?php echo $name?>" placeholder="nhập vào tên">
      </div>
      <div class="">
        <input class="mr20" type="submit" name="update" value="CẬP NHẬT">
        <input class="mr20" type="reset" value="NHẬP LẠI">

        <a href="index.php?act=listdm"><input class="mr20" type="button" value="DANH SÁCH"></a>
      </div>
    </form>
  </div>
</div>