<?php
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/binhluan.php";
include "../model/thongke.php";
include "../model/khachhang.php";

include "header.php";
    if(isset($_GET['act'])&&($_GET['act']!="")){
        $act=$_GET['act'];
        switch($act){
            case "listsp":
                if(isset($_POST['clickOK'])&&($_POST['clickOK'])){
                    $keyw=$_POST['keyw'];
                    $iddm=$_POST['iddm'];
                }else{
                    $keyw="";
                    $iddm=0;
                }
                $listdanhmuc= loadall_danhmuc();
                $listsanpham = loadall_sanpham($keyw,$iddm);
                include "sanpham/list.php";
            break;
////////////////////////////////
            case "listdm":
                $listdanhmuc= loadall_danhmuc();
                include "danhmuc/list.php";
                break;
////////////////////////////////
            case "listbl":
                $items = thongke();
                if(isset($_GET['idsp'])){
                    $idsp = $_GET['idsp'];
                    $comments = loadall_binhluan($idsp);
                    include "binhluan/detail.php";
                }else{
                    
                    include "binhluan/list.php";
                }
                // $listComment= loadall1_binhluan();
                // include "binhluan/list.php";
            break;

////////////////////////////////
            case "listkh":
                $khachhang= loadAll_khachhang();
                include "khachhang/list.php";
            break;
////////////////////////////////
////////////////////////////////
            case "addsp":
                if(isset($_POST['themmoi'])&& ($_POST['themmoi'])){
                    $iddm = $_POST['iddm'];
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $mota = $_POST['mota'];
                    $hinh = $_FILES['hinh']['name'];
//                    echo $hinh;
                    $target_dir = "../upload/";
                    $target_file = $target_dir.basename($_FILES['hinh']['name']);
//                    echo $target_file;
                    if(move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)){
//                        echo "Bạn đã upload ảnh thành công";
                    }else{
//                        echo "Upload ảnh không thành công";
                    }
//                    echo $iddm;
                    insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm);
                    $thanhcong = "Thêm thành công";
                }

                $listdanhmuc= loadall_danhmuc();
                include "sanpham/add.php";
            break;
////////////////////////////////////////////////////////////   
            case "adddm":
                if(isset($_POST['addnew']) && ($_POST['addnew'])){
                    $maloai = $_POST['maloai'];
                    $tenloai = $_POST['tenloai'];
                    insert_danhmuc($maloai,$tenloai);
                }
                include "danhmuc/add.php";    
            break;   
////////////////////////////////////////////////////////////
            case "suasp":
                if(isset($_GET['idsp'])&&($_GET['idsp']>0)){
                    $sanpham=loadone_sanpham($_GET['idsp']);
                }
                $listdanhmuc=loadall_danhmuc();
                include "sanpham/update.php";
                break;
////////////////////////////////////////////////////////////////
            case "suadm":
                
                // $listdanhmuc=loadall_danhmuc();
                if(isset($_POST['update']) && ($_POST['update'] != '')){
                    $iddm = $_GET['iddm'];
                    $maloai = $_POST['maloai'];
                    $tenloai = $_POST['tenloai'];
                    update_danhmuc($iddm,$maloai,$tenloai);
                }
                
                include "danhmuc/update.php";
            break;
////////////////////////////////////////////////////////////////
            case "updatesp":
                if(isset($_POST['capnhat'])&&($_POST['capnhat'] !='')){
                    $iddm=$_POST['iddm'];
                    $id=$_POST['id'];
                    $tensp=$_POST['tensp'];
                    $giasp=$_POST['giasp'];
                    $mota=$_POST['mota'];
                    $hinh=$_FILES['hinh']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        echo "The file ". htmlspecialchars( basename( $_FILES["hinh"]["name"])). " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                    update_sanpham($id,$iddm,$tensp,$giasp,$mota,$hinh);
                    $thongbao="cập nhật thành công!";
                }
                $listsanpham=loadall_sanpham("",0);
                $listdanhmuc=loadall_danhmuc();
                include "sanpham/list.php";
                break;
////////////////////////////////
                case "khoakh":
                    if(isset($_GET["idkh"])){
                        khoa_kh($_GET["idkh"]);
                    }
                    $khachhang= loadAll_khachhang();
                    include "khachhang/list.php";
                break;
////////////////////////////////
                case "mokhoa":
                    if(isset($_GET["idkh"])){
                        mo_kh($_GET["idkh"]);
                    }
                    $khachhang= loadAll_khachhang();
                    include "khachhang/list.php";
                break;
////////////////////////////////
                case "khoa_all":
                    khoa_all();
                    $khachhang= loadAll_khachhang();
                    include "khachhang/list.php";
                break;
////////////////////////////////
                case "mo_all":
                    mo_all();
                    $khachhang= loadAll_khachhang();
                    include "khachhang/list.php";
                break;
////////////////////////////////
                case "xoa_bl":
                    if(isset($_GET["idbl"])){
                        delete_bl($_GET["idbl"]);
                    }
                    $comments= loadall1_binhluan();
                    include"binhluan/detail.php";
                break;
////////////////////////////////
                case"hard_delete":
                    if(isset($_GET['idsp'])){
                        hard_delete($_GET['idsp']);
                    }
                    $listsanpham=loadall_sanpham("",0);
                    include"sanpham/list.php";
                break;
//////////////////////////////////
                case"xoadm":
                    // if(isset($_GET['iddm'])){
                    //     delete($_GET['iddm']);
                    // }
                    $listdanhmuc=loadall_danhmuc();
                    include"danhmuc/list.php";
                break;
//////////////////////////////////
                case "soft_delete":
                    if(isset($_GET['idsp'])){
                        soft_delete($_GET['idsp']);
                    }
                    $listsanpham=loadall_sanpham("",0);
                    $listdanhmuc=loadall_danhmuc();
                    include "sanpham/list.php";
                break;
//////////////////////////////////
                case "thongke":
                    $dsthongke = load_thongke_sanpham_danhmuc();
                    include "thongke/list.php";
                break;
//////////////////////////////////
                case "bieudo":
                    $dsthongke = load_thongke_sanpham_danhmuc();
                    include "thongke/bieudo.php";
                break;
//////////////////////////////////
                case "quantri":
                    header("Location: ../index.php");
                break;
//////////////////////////////////
                  
            
        }
    }else{
        include "home.php";
    }
    include "footer.php";
