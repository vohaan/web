<?php 
    $id = $_GET['key'];
    require("../config/connect.php");
    $sql = "select * from dongho where ID= '$id' ";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    if(isset($_POST["btnfix"])){
        $namefilenew = $id;
        
        $ten = $_POST["txttendh"];
        $hang = $_POST["txtprovince"];
        $gt = $_POST["sltgt"];
        $may = $_POST["sltmay"];
        $day = $_POST["sltday"];
        $giatien = $_POST["txtgia"];
        $ttbs = $_POST["txtttbs"];
        $file = $_FILES["file"];

        $filename =$file["name"];
        $filetype= $file["type"];
        $filetempname= $file["tmp_name"];
        $fileError=$file["error"];
        
        $fileExt= explode(".", $filename);
        $fileActuaExt = strtolower(end($fileExt));
        if($fileError==0){
            $fullnameimg= $namefilenew."." .uniqid("",true).".".$fileActuaExt;
            $fileDestination= "../../images/filesanpham/".$fullnameimg;
            $sql = "update dongho set Name ='$ten' , Hang = '$hang', GioiTinh =  $gt, May =$may, Chat_Lieu_day = $day, Gia = $giatien, ThongTinThem = '$ttbs', File_img ='$fullnameimg' where ID= '$id' ";
            $result = mysqli_query($conn, $sql);
            
            if($result){
                move_uploaded_file($filetempname,$fileDestination);  
                mysqli_close($conn);
                echo"<script> location.href ='indexadmin.php?menu=sanpham';</script>";
                
            }
            else{
                mysqli_close($conn);
                echo "Thêm dữ liệu thất bại!" . mysqli_error($conn);
                exit();
            }
        }
        else{
            $sql = "update dongho set Name ='$ten' , Hang = '$hang', GioiTinh =  $gt, May =$may, Chat_Lieu_day = $day, Gia = $giatien, ThongTinThem = '$ttbs' where ID= '$id' ";
            $result = mysqli_query($conn, $sql);
            if($result){
                mysqli_close($conn);
                echo"<script> location.href ='indexadmin.php?menu=sanpham';</script>";
                
            }
            else{
                mysqli_close($conn);
                echo "Thêm dữ liệu thất bại!" . mysqli_error($conn);
                exit();
            }
            
        }
       

    }
    
?>


<div class="add"></div>
<div class="addsp">
    <a href="indexadmin.php?menu=sanpham"><button class="button-exit"><i class="fa fa-close"></i></button></a>
        <h2 class="header-form">Thêm sản phẩm mới</h2>
        <hr width="100%" size="8px">

        <div class="content">
            <form method="POST" enctype="multipart/form-data">
                
                <div class="row">
                    <div class="col-35">
                        <label for="" >Tên sản phẩm:</label>
                    </div>

                    <div class="col-65">
                        <input type="text" name="txttendh"placeholder="Nhập tên sản phấm" id="tendh" value="<?php echo $row["Name"] ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-35">
                        <label for="">Hãng:</label>
                    </div>

                    <div class="col-65">
                        <select id="province" name="txtprovince">
                        <option value="None">None</option>
                            <option value="5TheWay">5TheWay</option>
                            <option value="Dirtycoins">Dirtycoins</option>
                            <option value="Bad Habits">Bad Habits</option>
                            <option value="Hades">Hades</option>
                            <option value="Now Saigon">Now Saigon</option>
                            <option value="TSUN">TSUN</option>
                            <option value="LYOS">LYOS</option>
                            <option value="Grimm DC">Grimm DC</option>
                            <option value="SWE">SWE</option>
                            <option value="Regods">Regods</option>
                            <option value="Degrey">Degrey</option>
                            <option value="Yellow Flicker">Yellow Flicker</option>
                            <option value="Colkids">Colkids</option>
                            <option value="Uncover">Uncover</option>
                            <option value=" Viger"> Viger</option>
                            <option value="The Collector">The Collector</option>
                            <option value="Patek Philippe">Patek Philippe</option>
                            <option value="TS Tag Heuer">Thụy Sỹ Tag Heuer</option>
                            <option value="Rolex Swiss Made">Rolex Swiss Made</option>
                            <option value="Omega">Omega</option>
                            <option value="Longines">Longines</option>
                            <option value="Tissot">Tissot</option>
                            <option value="Timex"> Timex</option>
                            <option value="Calvin Klein">Calvin Klein</option>
                            <option value="Movado">Movado</option>
                            <option value="BENTLEY">BENTLEY</option>
                            <option value="SEIKO">SEIKO</option>
                            <option value="Citizen">Citizen</option>
                            <option value="Orient">Orient</option>
                            <option value="Casio">Casio</option>
                            <option value="Fossil">Fossil</option>
                            <option value="Michael Kors">Michael Kors</option>
                            <option value="Ogival">Ogival</option>
                            <option value="Daniel Wellington">Daniel Wellington</option>
                            <option value="Anne Klein">Anne Klein</option>
                            <option value="ALEXANDRE CHRISTIE">ALEXANDRE CHRISTIE</option>
                            <option value="Guess">Guess
                            </option>
                        </select>
                    </div>
                </div>

                 <div class="row">
                    <div class="col-35">
                        <label for="">Giới tính:</label>
                    </div>

                    <select name="sltgt" id="gt">
                        <option value="1" <?php if($row['GioiTinh']==1) echo "selected"; ?>>Nam</option>
                        <option value="0" <?php if($row['GioiTinh']==0) echo "selected"; ?>>Nữ</option>
                        <option value="2" <?php if($row['GioiTinh']==2) echo "selected"; ?>>Đôi</option>
                        <option value="3" <?php if($row['GioiTinh']==3) echo "selected"; ?>>Phụ kiện</option>

                    </select>
                </div>

                <div class="row">
                    <div class="col-35">
                        <label for="" >Chất liệu:</label>
                    </div>

                    <select name="sltmay" id="may">
                        <option value="1" <?php if($row['May']==1) echo "selected"; ?>>Cotton 4 chiều (90-95% Cotton)</option>
                        <option value="0" <?php if($row['May']==0) echo "selected"; ?>>T-shirt 100% cotto</option>
                    </select>
                </div>

                <div class="row">
                    <div class="col-35">
                        <label for="" >Xuất xứ:</label>
                    </div>

                    <select name="sltday" id="day">
                        <option value="1" <?php if($row['Chat_Lieu_Day']==1) echo "selected"; ?>>Mỹ</option>
                        <option value="0" <?php if($row['Chat_Lieu_Day']==0) echo "selected"; ?>>Việt Nam</option>
                        <option value="2" <?php if($row['Chat_Lieu_Day']==2) echo "selected"; ?>>Thái Lan</option>
                    </select>
                </div>

                <div class="row">
                    <div class="col-35">
                        <label for="" >Giá:</label>
                    </div>

                    <div class="col-65">
                        <input type="number" name="txtgia" id="gia" value="<?php echo $row['Gia'];?>">(VND)
                    </div>
                </div>

                <div class="row">
                    <div class="col-35">
                        <label for="" >Thông tin bổ sung:</label>
                    </div>

                    <div class="col-65">
                        <textarea rows="2" cols="40" autofocus name="txtttbs"  id="ttbs" value = "<?php echo$row["ThongTinThem"] ?>"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-35">
                        <label for="">Hình ảnh:</label>
                    </div>

                    <div class="col-65">
                        <input type="file" value="Browse..." name="file" id="igame">
                    </div>
                </div>

                <div class="button">
                    <input type="submit" name="btnfix" value="Sửa">
                    <input type="reset" name="btncancel"value="Nhập lại">
                </div>
            </form>
        </div>
    </div>