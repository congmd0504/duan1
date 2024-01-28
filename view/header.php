<?php
$dsdm = loadall_danhmuc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dự án mẫu</title>
  <link rel="stylesheet" href="css/css.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/509cc166d7.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- <style>
      form li a{
        
      }
    </style> -->
</head>

<body class="bg-success-subtle">
  <div class="boxcenter">
    <!-- BIGIN HEADER -->
    <header>
      <div class="row mb header bg-info-subtle">
        <h1>SIÊU THỊ TRỰC TUYẾN</h1>
      </div>
      <div class="row mb menu bg-success">
        <ul>

          <li class="dropdown">
            <a class="dropdownbtn" href="../../tubaph34555_WD18339/index.php">Trang chủ</a>

          <li class="dropdown">
            <a class="dropdownbtn" href="">Danh mục</a>
            <div class="dropdown_content">
              <?php
              foreach ($dsdm as $dm) {
                extract($dm);
                $linkdm = "index.php?act=sanpham&iddm=" . $id;
                echo '<a href="' . $linkdm . '">' . $name . ' </a>';
              }
              ?>
            </div>
          <li class="dropdown">
            <a class="dropdownbtn" href="">Sản phẩm</a>
          </li>
          <li class="dropdown">
            <a class="dropdownbtn" href="">Bình luận</a>

          </li>
          <li class="dropdown">
            <a class="dropdownbtn" href="index.php?act=cart">Giỏ hàng</a>

          </li>

        </ul>
      </div>
    </header>
    <!-- END HEADER -->