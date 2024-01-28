
<h3><a href="admin.html">Admin</a>/<a href="danhmuc.html">Danh mục</a></h3>
       </header>
        <!-- END HEADER -->
        <div class="row2">
         <div class="row2 font_title">
          <h1>DANH MỤC TÀI KHOẢN</h1>
         </div>
         <div class="row2 form_content ">
          <form action="#" method="POST">
           <div class="row2 mb10 formds_loai">
           <table>
            <tr>
                <th>CHỌN</th>
                <th>MÃ TÀI KHOẢN</th>
                <th>TÊN TÀI KHOẢN</th>
                <th>MẬT KHẨU</th>
                <th>EMAIL</th>
                <th>ĐỊA CHỈ</th>
                <th>SỐ ĐIỆN THOẠI</th>
                <th>QUYỀN</th>
                <th>THAO TÁC</th>
            </tr>
            <?php foreach($listTaiKhoan as $item){
                extract($item);
                $role_check = "";
                if ($role == 1) {
                    $role_check = "admin";
                }
                else{
                    $role_check = "user";
                }
                echo '
                <tr>
                <td><input type="checkbox" name="" id=""></td>
                <td>'.$id.'</td>
                <td>'.$user.'</td>
                <td>'.$pass.'</td>
                <td>'.$email.'</td>
                <td>'.$address.'</td>
                <td>'.$tel.'</td>
                <td>'.$role_check.'</td>
                <td><input type="button" value="Sửa">   <input type="button" value="Xóa"></td>
                </tr>';
            } ?>
           
            
           </table>
           </div>
           <div class="row mb10 ">
         <input class="mr20" type="button" value="CHỌN TẤT CẢ">
         <input  class="mr20" type="button" value="BỎ CHỌN TẤT CẢ">
<a href=""> <input  class="mr20" type="button" value="NHẬP THÊM"></a>
           </div>
          </form>
         </div>
        </div>