<?php 
    function loadall_binhluan($idsp){
        $sql = "
            SELECT binhluan.id, binhluan.noidung, taikhoan.user, binhluan.ngaybinhluan, sanpham.name FROM `binhluan` 
            LEFT JOIN taikhoan ON binhluan.iduser = taikhoan.id
            LEFT JOIN sanpham ON binhluan.idpro = sanpham.id
            WHERE sanpham.id = $idsp;
        ";
        $result =  pdo_query($sql);
        return $result;
    }
    function loadall1_binhluan(){
        $sql = "SELECT binhluan.*, taikhoan.user, sanpham.name , taikhoan.id as id_taikhoan, sanpham.id as id_sanpham FROM `binhluan`LEFT JOIN taikhoan ON binhluan.iduser = taikhoan.id
        LEFT JOIN sanpham ON binhluan.idpro = sanpham.id";
        $result = pdo_query($sql);
        return $result;
    }
    function insert_binhluan($user_id,$idpro, $noidung){
        $date = date('Y-m-d');
        $sql = "
            INSERT INTO `binhluan`(`noidung`, `iduser`, `idpro`, `ngaybinhluan`) 
            VALUES ('$noidung','$user_id','$idpro','$date');
        ";
        //echo $sql;
        //die;
        pdo_execute($sql);
    }

    function delete_bl($idbl){
        $sql = "DELETE FROM binhluan where id =".$idbl;
        pdo_execute($sql);
    }

    function thongke(){
        $sql = "SELECT sanpham.id, sanpham.name,COUNT(*) so_luong,MIN(binhluan.ngaybinhluan) cu_nhat,MAX(binhluan.ngaybinhluan) moi_nhat FROM binhluan JOIN sanpham on sanpham.id = binhluan.idpro GROUP BY sanpham.id, sanpham.name HAVING so_luong >0";
        return pdo_query($sql);
    }

?>