<?php 
    $id=$_GET["dongho"];
    $sql="select * from dongho where ID='$id'";
    require("admincp/config/connect.php");
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $gioitinh=$row['GioiTinh'];
?>
<div class="header-title-main text-center">
        <span><?php echo "Sản phẩm ".$row['Name'] ?></span>
    </div>
<div class="small-container single-product">
    
    <div class="row">
        <div class="col-2">
        <img src="<?php echo "images/filesanpham/".$row['File_img']; ?>" alt="">
        </div>
        <div class="col-3">
            <h1>Quần áo <?php if($row['GioiTinh']==1) echo "Nam";
                                else if($row['GioiTinh']==0) echo "Nữ";
                                else if($row['GioiTinh']==2) echo "Đôi";
                                else if($row['GioiTinh']==3) echo "Treo Tường";

                ?></h1>
                <p class="title-id">ID sản phẩm: <?php echo $id;?></p>
                <ul class="policy">
            <li>
                <i class="fa fa-gift" aria-hidden="true"></i><span>Mua Online Với Nhiều Chương Trình Ưu Đãi</span>
            </li>
            <li>
                <i class="fa fa-truck" aria-hidden="true"></i><span>Miễn phí vận chuyển trên toàn quốc</span>
            </li>
            <li>
                <i class="fa fa-heartbeat" aria-hidden="true"></i><span>Bảo hành chính hãng</span>
            </li>
            <li>
                <i class=" fa fa-refresh" aria-hidden="true"></i><span>Đổi hàng miễn phí trong 7 ngày khi chưa sử dụng</span>
            </li>
            <li>
                <i class="fa fa-gift" aria-hidden="true"></i><span>Tặng túi thơm &amp; Giảm 50% cho 2 lần đặt tiếp theo</span>
            </li>
            </ul>
            <h4><?php solve($row['Gia']); ?></h4>
            
            <form action="module/main/themvaogiohang.php?idsanpham=<?php echo $id;?>" method="post">
                <input type="number" value="1" min = "1" name="soluong" class="input">
                <!-- <a href="#" class="btn">Thêm vào giỏ hàng</a> -->
                <input type="submit" value="Thêm vào giỏ hàng" class="btn" name='themsanpham' onclick="tbadd()"> 
            </form>
        </div>
        <div class="clear"></div>
    </div>
    
</div>
<script>
    function tbadd(){
        alert('đã thêm sản phẩm vào giỏ hàng');
    }
</script>
<?php
    require('admincp/config/connect.php');
    $sql="SELECT * FROM `dongho` WHERE GioiTinh=$gioitinh AND NOT ID='$id' LIMIT 4" ;
    $result = mysqli_query($conn, $sql);
?>
<div class="danhmuc-conten lq">
    <div class="wrapper-thongtin">
        <div class="thongtin">
            <table>
                <h2>Thông tin thêm</h2>
                <tr>
                    <th class="fontTH">Đổi hàng miễn phí</th>
                    <td class="fontTD"> 7 ngày khi chưa sử dụng</td>
                </tr>
                <tr>
                    <th class="fontTH">Hãng</th>
                    <td class="fontTD"><?php echo $row['Hang']; ?></td>
                </tr>
                <tr>
                    <th class="fontTH">Chất liệu</th>
                    <td class="fontTD"><?php if($row['May']==1) echo "cotol 95%"; else echo"cotol 100%"; ?></td>
                </tr>
                <tr>
                    <th class="fontTH">Xuất xứ</th>
                    <td class="fontTD"><?php if($row['Chat_Lieu_Day']==1) echo "Mỹ"; else if($row['Chat_Lieu_Day']==0) echo"Việt Nam"; else echo "nhựa cao cấp" ?></td>
                </tr>
                <tr>
                <tr>
                    <th class="fontTH">size mặt số</th>
                    <td class="fontTD"><?php if($row['GioiTinh']==1) echo "over size"; else if($row['GioiTinh']==0) echo"local brand";?></td>
                </tr>
                <tr>
                    <th class="fontTH">Thương hiệu</th>
                    <td class="fontTD">Việt Nam</td>
                </tr>

        
            </table>
        </div>
        <div class="mota">
            <h2>Mô tả</h2>
            <h3><strong>Đặc điểm nổi bật của Secondhand Local brand <?php echo strtoupper($row['Hang']).' '.$row['Name'] ?>:</strong></h3>
            <ul>
                <li>✅ Đầy đủ kiểu dáng</li>
                <li>✅ Chất liệu thoáng, mát, thoải mái khi sử dụng</li>
                <li>✅ Thiết kế trẻ trung và năng động, phù hợp cho nhiều phong cách</li>
                <li>✅ Chất liệu cotol chất lượng cao</li>
                <li>✅ Giá rẻ, phù hợp cho mọi đối tượng khách hàng</li>
            </ul>
        </div>
    </div>
    <div class="clear"></div>
    <div class="header-title-main text-center color">
        <span>Sản phẩm liên quan</span>
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
    </div>
</div>