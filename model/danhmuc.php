<?php
function loadall_danhmuc(){
    $sql="select * from danhmuc order by id desc";
    $listdanhmuc=pdo_query($sql);
    return  $listdanhmuc;
}
function loadone_danhmuc($iddm){
    $sql = "select * from danhmuc where id = ".$iddm;
    $result = pdo_query_one($sql);
    return $result;
}
function insert_danhmuc($maloai, $tenloai){
    $sql = "INSERT INTO `danhmuc`(`id`, `name`) VALUES ('$maloai', '$tenloai');";
    pdo_execute($sql);
}
function update_danhmuc($iddm,$maloai, $tenloai){
    $sql = "UPDATE `danhmuc` SET `id`= '{$maloai}', `name`='{$tenloai}' WHERE `id`= '$iddm'";
    pdo_execute($sql);
}
function delete($iddm){
    $sql = "DELETE FROM danhmuc WHERE id=" .$iddm;
    pdo_execute($sql);
}