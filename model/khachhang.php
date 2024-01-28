<?php

function loadAll_khachhang(){
    $sql = "SELECT * FROM taikhoan";
    return pdo_query($sql);
}

function mo_kh($userid){
    $sql = "UPDATE taikhoan SET `status` = 0 WHERE id = '$userid'";
    return pdo_execute($sql);
}
function khoa_kh($userid){
    $sql = "UPDATE taikhoan SET `status` = 1 WHERE id = '$userid'";
    return pdo_execute($sql);
}   

function khoa_all(){
    $sql = "UPDATE taikhoan SET `status` = 1 WHERE `status` = 0";
    return pdo_query($sql);
}
function mo_all(){
    $sql = "UPDATE taikhoan SET `status` = 0 WHERE `status` = 1";
    return pdo_query($sql);
}



?>