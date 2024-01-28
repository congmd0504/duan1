<style>
    td {
        padding: 0 20px;
    }
</style>
<main class="catalog  mb ">
    <div class="boxleft">
        <?php
        extract($sanpham);
        extract($binhluan);

        ?>
        <div class="  mb">
            <div class="box_title">
                <?php echo $name; ?>
            </div>
            <div class="box_content">
                <?php
                $img = $img_path . $img;
                echo "<img src='$img' width='300'>";
                echo "<p>$mota</p>";
                ?>

            </div>
        </div>

        <div class="mb">
            <div class="box_title">BÌNH LUẬN</div>
            <div class="box_content2  product_portfolio binhluan ">
                <table>
                    <thead>
                        <th></th>
                        <th>Nội dung</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Người dùng</th>
                        <th></th>
                        <th>Thời gian</th>
                    </thead>
                    <?php

                    foreach ($binhluan as $value) :
                    ?>
                        <tr>
                            <td></td>
                            <td><?php echo $value['noidung'] ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $value['user'] ?></td>
                            <td></td>
                            <td><?php echo date("d/m/Y", strtotime($value['ngaybinhluan'])) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <?php
            if (isset($_SESSION['user_id'])) {
            ?>
                <div class="box_search">
                    <form action="index.php?act=sanphamct&idsp=<?= $id ?>" method="POST">
                        <input type="hidden" name="idpro" value="<?= $id ?>">
                        <input type="text" name="noidung">
                        <input type="submit" name="guibinhluan" value="Gửi bình luận">
                    </form>
                </div>
            <?php
            } else {
                echo "<div class='alert alert-danger '>Vui lòng đăng nhập để bình luận</div>";
            }
            ?>

        </div>

        <div class=" mb">
            <div class="box_title">SẢN PHẨM CÙNG LOẠI</div>
            <div class="tbox" style="width:95%;
    margin:20px auto;
    display:grid;
    grid-template-columns:1fr 1fr 1fr;
    gap:20px;">
            <?php
            foreach($sanphamcl as $item){
                extract($item);
                $hinh = $img_path . $img;
                echo "
                <div class='titem'>
                    <img src='$hinh' alt='' style= 'width = 20px'>
                    <a href='index.php?act=sanphamct&idsp=$id'>$name</a>
                    
                    <p>$price</p>
                </div>
                ";
            }
            ?>
                
                <!-- <div class="titem">
                    <img src="" alt="">
                    <p>giá</p>
                </div>
                <div class="titem">
                    <img src="" alt="">
                    <p>giá</p>
                </div>
                <div class="titem">
                    <img src="" alt="">
                    <p>giá</p>
                </div> -->
            </div>
        </div>
    </div>
    <?php
    include "view/boxright.php";
    ?>

</main>
<!-- <a href="index.php?act=sanphamct&idsp=<?= $value['id'] ?>">
    <?= $value['name'] ?>
</a> -->