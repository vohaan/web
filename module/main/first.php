<div class="conten">
    <div class="hearder-main">
        <div class="title-main-header">
            <div class="title">
                <span>ĐỒ SECONHAND ĐẲNG CẤP BẬC NHẤT ĐÀ NẴNG</span>
            </div>
            <div class="subtilte">
                <span>Chúng tôi cam kết mang lại những giá trị cao nhất, chế độ hậu đãi tốt nhất & sản phẩm cao cấp nhất khi khách hàng đến với ANT.shop</span>
            </div>
        </div>
        <div class="icon-warrap text-center">
            <div class="icon-list">
                <div class="icon-box-faicon">
                    <img src="images/icon/icon-chat-luong.png" alt="">
                </div>
                <div class="title-con">
                    <h5>CHẾ ĐỘ ƯU ĐÃI</h5>
                </div>
            </div>
            <div class="icon-list">
                <div class="icon-box-faicon">
                    <img src="images/icon/icon-khuyen-mai.png" alt="">
                </div>
                <div class="title-con">
                    <h5>GIẢ ĐẾN 50% GIÁ CHÍNH HÃNG</h5>
                </div>
            </div>
            <div class="icon-list">
                <div class="icon-box-faicon">
                    <img src="images/icon/icon-van-chuyen.png" alt="">
                </div>
                <div class="title-con">
                    <h5>CHUYỂN HÀNG COD MIỄN PHÍ TOÀN QUỐC</h5>
                </div>
            </div>
            <div class="icon-list">
                <div class="icon-box-faicon">
                    <img src="images/icon/icon-uy-tinh.png" alt="">
                </div>
                <div class="title-con">
                    <h5>CHẾ ĐỘ 1 ĐỔI 1 TRONG 7 NGÀY ĐẦU</h5>
                </div>
            </div>
            <div class="icon-list">
                <div class="icon-box-faicon">
                    <img src="images/icon/icon-qua-tang.png" alt="">
                </div>
                <div class="title-con">
                    <h5>TẶNG TÚI THƠM BẢO QUẢN ĐỒ CAO CẤP</h5>
                </div>
            </div><div class="icon-list">
                <div class="icon-box-faicon">
                    <img src="images/icon/icon-tiet-kiem.png" alt="">
                </div>
                <div class="title-con">
                    <h5>GIẢM GIÁ ĐÉN 50% CHO LẦN MUA TIẾP THEO</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <?php
        require("admincp/config/connect.php");
        $sql="SELECT * FROM (SELECT DDH.IdDongHo FROM dondathang AS DDH 
        GROUP BY DDH.IdDongHo, DDH.SoLuong ORDER BY SOLUONG DESC LIMIT 8) AS TAP INNER JOIN dongho AS DH ON TAP.IdDongHo = dh.ID ";
        $result = mysqli_query($conn,$sql);
        
    ?>
    
    <div class="hot">
        <div class="title-sp">
            <p>SẢN PHẨM BÁN CHẠY NHẤT</p>
        </div>
        <div class="dongho">
            <ul class="list-dongho text-center">
                <?php while($row= mysqli_fetch_assoc($result)){ ?>
                <li class="list-con text-center"><a href="index.php?dongho=<?php echo $row['ID']; ?>">
                    <div class="img">
                        <img src="<?php echo "images/filesanpham/".$row['File_img']; ?>" alt="">
                    </div>
                    <div class="titel-list">
                        <span><?php echo $row['Name']; ?></span><br><br>
                        <span><?php solve($row['Gia']); ?></span>
                    </div>
                </a></li>
                <?php } mysqli_close($conn);?>
            </ul>
            <div class="clear"></div>
            <div class="button-add text-center">
                <a class="button" href="index.php?menu=top100">XEM THÊM</a>
            </div>
        </div>
    </div>
    <div class="img-menu">
        <div class="wrapper-img left-conten">
            <a href="index.php?menu=nam">
                <div class="main-wrap-img">
                    <img src="images/icon/mau1.jpg" alt="">
                </div>
                <div class="main-wrap-title">
                    <p>ĐỒ NAM</p>
                </div>
            </a>
        </div>
        <div class="wrapper-img right-conten">
            <a href="index.php?menu=nu">
                <div class="main-wrap-img">
                    <img src="images/icon/mau2.jpg" alt="">
                </div>
                <div class="main-wrap-title">
                    <p>ĐỒ NỮ</p>
                </div>
            </a>
        </div>
        <div class="clear"></div>
        <div class="bottom">
            <div class="wrapper-img left-conten">
                <a href="index.php?menu=top100">
                    <div class="main-wrap-img">
                        <img class="sub" src="images/icon/TOP100.jpg" alt="">
                    </div>
                </a>
            </div>
            <div class="wrapper-img left-conten" style="margin-left: 20px;">
                <a href="index.php?menu=co">
                    <div class="main-wrap-img">
                        <img class="sub" src="images/icon/95.jpg" alt="">
                    </div>
                </a>
            </div>
            <div class="wrapper-img left-conten" style="margin-left: 20px;">
                <a href="index.php?menu=pin">
                    <div class="main-wrap-img">
                        <img class="sub" src="images/icon/100.jpg" alt="">
                    </div>
                </a>
            </div>
            <div class="wrapper-img left-conten" style="margin-left: 20px;">
                <a href="index.php?menu=doi">
                    <div class="main-wrap-img">
                        <img class="sub" src="images/icon/TOPDODOI.jpg" alt="">
                    </div>
                </a>
            </div>
        </div>
    </div>
    <?php
        require("admincp/config/connect.php");
        $sql="SELECT * FROM dongho WHERE GioiTinh = 3 LIMIT 8";
        $result = mysqli_query($conn,$sql);
        
    ?>
    <div class="clear"></div>
    

</div>

