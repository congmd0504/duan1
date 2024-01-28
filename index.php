<?php
    session_start();
    include "model/pdo.php";
    include "model/sanpham.php";
    include "model/danhmuc.php";
    include "model/binhluan.php";
    include "model/taikhoan.php";

    include "view/header.php";
    include "global.php";
    $spnew = loadall_sanpham_home();
    $dsdm = loadall_danhmuc();
    $dstop10 = loadall_sanpham_top10();
    
    if(isset($_GET['act'])&&($_GET['act']!="")){
        $act=$_GET['act'];
        switch($act){
            case "sanpham":
                if(isset($_POST['keyword']) &&  $_POST['keyword'] != 0 ){
                    $kyw = $_POST['keyword'];
                }else{
                    $kyw = "";
                }
                if(isset($_GET['iddm']) && ($_GET['iddm']>0)){
                    $iddm=$_GET['iddm'];
                }else{
                    $iddm=0;
                }
                $dssp=loadall_sanpham($kyw,$iddm);
                
                include "view/sanpham.php";
                break;
////////////////////////////////////////////////////////////////
            case "sanphamct":
                // Kiểm tra xem người dùng đã đăng nhập hay chưa
                if (isset($_SESSION['user_id'])) {
                    $user_id = $_SESSION['user_id'];
                    echo "User ID: " . $user_id;
                    // Bây giờ có thể sử dụng $user_id ở đây 
                    if(isset($_POST['guibinhluan'])){
                    insert_binhluan($user_id,$_POST['idpro'], $_POST['noidung']);
                }
                } else {
                    echo "Người dùng chưa đăng nhập.";
                    // Thực hiện xử lý nếu người dùng chưa đăng nhập
                }

               
                if(isset($_GET['idsp']) && $_GET['idsp'] > 0){
                    $sanpham = loadone_sanpham($_GET['idsp']);
                    $sanphamcl = load_sanpham_cungloai($_GET['idsp'], $sanpham['iddm']);
                    $binhluan = loadall_binhluan($_GET['idsp']);
                    include "view/chitietsanpham.php";
                }else{
                    include "view/home.php";            
                }
                break;
////////////////////////////////////////////////////////////////
            case "dangky":
                if(isset($_POST['dangky']) && ($_POST['dangky']!="")){
                        $email = $_POST['email'];
                        $name = $_POST['user'];
                        $pswd = $_POST['pass'];
                        insert_taikhoan($email, $name,$pswd);
                        $thongbao="Đăng ký thành công";
                }
                include "view/login/dangky.php";
                break;
///////////////////////////////////////////////////////////////////
            case "dangnhap": 
                if (isset($_POST['dangnhap'])) {
                    $loginMess = dangnhap($_POST['user'], $_POST['pass']);
                    
                    include "view/home.php";
                }
                break;
///////////////////////////////////////////////////////////
            case "dangxuat":
                dangxuat();
                include "view/home.php";
                break;
            case "quenmk":
                if (isset($_POST['guiemail'])) {
                    $email = $_POST['email'];
                    $sendMailMess = sendMail($email);
                }
                include "view/login/quenmk.php";
                break;
            
                ///////////////////////////////////////////////////////////
            case "capnhat":
                $userId = "";
                if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != ""){
                    $userId = $_SESSION['user_id'];
                    $info = get_user($userId);
                
                }
                if(isset($_POST['send']) && $_POST['send'] != ""){
                    $user = $_POST['user'];
                    $email = $_POST['email'];
                    $pass = $_POST['pass'];
                    $address = $_POST['address'];
                    $tel = $_POST['tel'];
                    // uppdate_user($userId,$user, $email, $pass, $address, $tel);
                    if(uppdate_user($userId,$user, $email, $pass, $address, $tel)){
                        echo '<div class="alert alert-danger">Cập nhật thất bại</div>';
                    }else{
                        echo '<div class="alert alert-info">Cập nhật thành công</div>';
                    }
                    
                }
                include "view/capnhat/view.php";
            break;    
///////////////////////////////////////////////////////////
            case "quantri":
                header("Location: admin/index.php");
            break;
///////////////////////////////////////////////////////////
            case "cart":
                if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != "" && isset($_GET['idsp']) && $_GET['idsp'] != "") {
                    // Load thông tin sản phẩm
                    $ttsp = loadone_sanpham($_GET['idsp']);
                    extract($ttsp);
                    $soluong = 1;
                
                    // Tạo mảng sản phẩm mới
                    $item = array(
                        'id' => $id,
                        'name' => $name,
                        'price' => $price,
                        'img' => $img,
                        'soluong' => $soluong,
                    );
                
                    // Kiểm tra xem giỏ hàng đã tồn tại hay chưa
                    if (isset($_SESSION['cart'])) {
                        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
                        $product_exists = false;
                        foreach ($_SESSION['cart'] as &$cart_item) {
                            if ($cart_item['name'] === $name) {
                                $cart_item['soluong'] += $soluong;
                                $product_exists = true;
                                break;
                            }
                        }
                
                        // Nếu sản phẩm chưa tồn tại, thêm sản phẩm mới vào giỏ hàng
                        if (!$product_exists) {
                            $_SESSION['cart'][] = $item;
                        }
                    } else {
                        $_SESSION['cart'] = array($item);
                    }
                } else {
                    $thongbao = "Vui lòng đăng nhập và chọn sản phẩm để thêm sản phẩm vào giỏ hàng!!";
                }
                include "view/cart/view.php";
            break;
///////////////////////////////////////////////////////////
            case "remove":
                if (isset($_GET['name']) && !empty($_GET['name'])) {
                    $remove_product = $_GET['name'];
                    if (isset($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $key => $item) {
                            if ($item['name'] === $remove_product) {
                                unset($_SESSION['cart'][$key]);
                            }
                        }
                        // Đặt lại chỉ mục của mảng
                        $_SESSION['cart'] = array_values($_SESSION['cart']);
                    }
                }
                include "view/cart/view.php";
            break;
///////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////
        }
    }else{
        include "view/home.php";
    }
   
    include "view/footer.php";
?>