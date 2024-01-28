<div class="row2">
         
          <h1 class="alert alert-success">THÊM MỚI SẢN PHẨM</h1>
         
         <div class="row2 form_content ">
          <div class="container">
          <form action="index.php?act=addsp" method="POST" enctype="multipart/form-data">
              <div class="row2 mb10 form_content_container">
                  <label> Danh mục </label> <br>
                  <select name="iddm" id="">
<!--                      <option value="">Danh mục 1</option>-->
<!--                      <option value="">Danh mục 2</option>-->
                      <?php
                      foreach ($listdanhmuc as $danhmuc){
                          extract($danhmuc);
                          echo '<option value="'.$id.'">'.$name.'</option>';
                      }
                      ?>
                  </select>
              </div>
           <div class="row2 mb10 form_content_container">
           <label> Tên sản phẩm </label> <br>
            <input type="text" name="tensp" placeholder="nhập vào tên san phẩm">
           </div>
           <div class="row2 mb10">
            <label>Giá sản phẩm </label> <br>
            <input type="text" name="giasp" placeholder="nhập vào của sản phẩm">
           </div>
              <div class="row2 mb10">
                  <label>Hình ảnh </label> <br>
                  <input type="file" name="hinh" >
              </div>
              <div class="row2 mb10">
                  <label>Mô tả </label> <br>
                  <textarea name="mota" cols="30" rows="10"></textarea>
              </div>
           <div class="">
         <input class="mr20" name="themmoi" type="submit" value="THÊM MỚI">
         <input  class="mr20" type="reset" value="NHẬP LẠI">

         <a href="index.php?act=listsp"><input  class="mr20" type="button" value="DANH SÁCH"></a>
           </div>
              <?php
              if(isset($thanhcong)&& ($thanhcong!="")){
                  echo $thanhcong;
              }

              ?>
          </form>
          </div>
         </div>
        </div>