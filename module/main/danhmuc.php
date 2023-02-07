<?php
    
    $danhmuc= $_GET['menu'];
    if($danhmuc=='top100'){
        $sql= "SELECT * FROM (SELECT DDH.IdDongHo FROM dondathang AS DDH 
        GROUP BY DDH.IdDongHo, DDH.SoLuong ORDER BY SOLUONG DESC LIMIT 100) AS TAP INNER JOIN dongho AS DH ON TAP.IdDongHo = dh.ID ";
    }
    else if($danhmuc == 'Hang'){
        $hang= $_GET['value'];
        $sql= "select * from dongho where Hang='$hang'";
    }
    else if($danhmuc== 'nam'){
        $sql="select * from dongho where GioiTinh=1";
    }
    else if($danhmuc== 'nu'){
        $sql="select * from dongho where GioiTinh=0";
    }
    else if($danhmuc== 'doi'){
        $sql="select * from dongho where GioiTinh=2";
    }
    else if($danhmuc== 'treotuong'){
        $sql="select * from dongho where GioiTinh=3";
    }
    else if($danhmuc=='co'){
        $sql="select * from dongho where May =1 and not Hang='None'";
    }
    else if($danhmuc=='pin'){
        $sql="select * from dongho where May =0 and not Hang='None'";
    }
    require('admincp/config/connect.php');
    $result = mysqli_query($conn, $sql);
?>
<div class="danhmuc-conten">
    <div class="header-title-main text-center">
        <span><?php 
            if($danhmuc=="top100")echo "TOP 100 SẢN PHẨM";
            else if($danhmuc=="Hang") echo"ĐỒHÃNG ".strtoupper($hang);
            else if($danhmuc=="nam") echo"ĐỒ NAM";
            else if($danhmuc=="nu") echo"ĐỒ NỮ";
            else if($danhmuc=="doi") echo"ĐỒ ĐÔI";
            else if($danhmuc=="treotuong") echo"PHỤ KIỆN";
            else if($danhmuc=="pin") echo"Cotton 4 chiều (90-95% Cotton";
            else if($danhmuc=="co") echo"T-shirt 100% cotton";

        ?></span>
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