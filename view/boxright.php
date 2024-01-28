<div class="boxright">

    <div class="mb">
        <div class="box_title">TÀI KHOẢN</div>
        <?php if (!$_SESSION) { ?>
            <div class="box_content form_account">
                <form action="index.php?act=dangnhap" method="POST">
                    <?php if (isset($loginMess) && $loginMess != '') {
                        echo "<div class='alert alert-danger'>$loginMess</div>";
                    } ?>
                    <h4>Tên đăng nhập</h4><br>
                    <input type="text" name="user" id="">
                    <h4>Mật khẩu</h4><br>
                    <input type="password" name="pass" id=""><br>
                    <input type="checkbox" name="" id="">Ghi nhớ tài khoản?
                    <br><input type="submit" value="Đăng nhập" name="dangnhap">
                    <br>
                </form>
                <li class="form_li"><a href="index.php?act=quenmk" class="text-dark">Quên mật khẩu</a></li>
                <li class="form_li"><a href="index.php?act=dangky" class="text-dark">Đăng kí thành viên</a></li>
            </div>
        <?php } else { ?>
            <div class="box border border-light">
                <p>Hello <?= $_SESSION['user'];  ?></p>
                <button class="btn btn-outline-info"><a class ="text-dark" style="text-decoration: none;" href="index.php?act=capnhat">Cập nhật tài khoản</button>
                <button class="btn btn-outline-info"><a class ="text-dark" style="text-decoration: none;" href="index.php?act=dangxuat">Đăng xuất</a></button>
                <?php
                // print_r($_SESSION);
                if(isset($_SESSION['user_id']) && $_SESSION['user'] != "" && $_SESSION['role'] == 1){
                    
                    echo '<button class="btn btn-outline-info"><a class ="text-dark" style="text-decoration: none;" href="index.php?act=quantri">Trang quản trị</a></button>';
                    
                }
                ?>
            </div>

        <?php } ?>
    </div>
    <div class="mb">
        <div class="box_title">DANH MỤC</div>
        <div class="box_content2 product_portfolio">
            <ul>
                <?php
                foreach ($dsdm as $dm) {
                    extract($dm);
                    $linkdm = "index.php?act=sanpham&iddm=" . $id;
                    echo '<li><a href="' . $linkdm . '">' . $name . ' </a></li>';
                }
                ?>
                <!--                     <li><a href="">Đồng hồ </a></li>-->
                <!--                     <li><a href="">Laptop</a></li>-->
                <!--                     <li><a href="">Điện thoại</a></li>-->
                <!--                     <li><a href="">Ipad</a></li>-->
                <!--                     <li><a href="">Tivi</a></li>-->
            </ul>
        </div>
        <div class="box_search">
            <form action="index.php?act=sanpham" method="POST">
                <input type="text" id="" placeholder="Từ khóa tìm kiếm" name="keyword">
                <input type="button" name="keyword" value="Tìm">
            </form>
        </div>
    </div>
    <!-- DANH MỤC SẢN PHẨM BÁN CHẠY -->
    <div class="mb">
        <div class="box_title">SẢN PHẨM BÁN CHẠY</div>
        <div class="box_content">
            <?php
            foreach ($dstop10 as $sp) {
                extract($sp);
                $linksp = "index.php?act=sanphamct&idsp=" . $id;
                $img = $img_path . $img;
                echo '<div class="selling_products" style="width:100%;">
                  <img src="' . $img . '" alt="anh">
                  <a href="' . $linksp . '">' . $name . '</a>
                </div>';
            }
            ?>
        </div>
    </div>
</div>