<?php ob_start(); ?>

<?php

    if(isset($_POST["btnadd"])){
        $namefilenew = $_POST["txtmadh"];
        $id= $_POST["txtmadh"];
        $ten = $_POST["txttendh"];
        $hang = $_POST["txtprovince"];
        $gt = $_POST["sltgt"];
        $may = $_POST["sltmay"];
        $day = $_POST["sltday"];
        $soluong= $_POST["txtsl"];
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
            require("../config/connect.php");
            $sql = "insert into dongho(ID, Name, Hang, GioiTinh, May, Chat_Lieu_day, SoLuongCon, Gia, ThongTinThem, File_img) values('$id', '$ten' , '$hang', $gt, $may, $day, $soluong, $giatien, '$ttbs', '$fullnameimg')";
            $result = mysqli_query($conn, $sql);
            if($result){
                
                move_uploaded_file($filetempname,$fileDestination);
                mysqli_close($conn);
                echo"<script> location.href ='indexadmin.php?menu=sanpham';</script>";
            }
            else{
                echo "Thêm dữ liệu thất bại!" . mysqli_error($conn);
                mysqli_close($conn);
            }
            
        }
        else{
            echo "you had an error";
        }
    }


?>

<div class="add"></div>
<div class="addsp">
    <a href="indexadmin.php?menu=sanpham"><button class="button-exit"><i class="fa fa-close"></i></button></a>
        <h2 class="header-form">Thêm sản phẩm</h2>
        <hr width="100%" size="8px">

        <div class="content">
            <form method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-35">
                        <label for="">Mã sản phẩm:</label>
                    </div>

                    <div class="col-65">
                        <input type="text" name="txtmadh" placeholder="Nhập mã sản phẩm" id="madh">
                    </div>
                </div>

                <div class="row">
                    <div class="col-35">
                        <label for="" >Tên sản phẩm:</label>
                    </div>

                    <div class="col-65">
                        <input type="text" name="txttendh"placeholder="Nhập tên sản phẩm" id="tendh">
                    </div>
                </div>

                <div class="row">
                    <div class="col-35">
                        <label for="">Hãng</label>
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
                        <option value="1">Nam</option>
                        <option value="0">Nữ</option>
                        <option value="2">Đôi</option>
                        <option value="3">Phụ Kiện</option>

                    </select>
                </div>

                <div class="row">
                    <div class="col-35">
                        <label for="" >Chất liệu:</label>
                    </div>

                    <select name="sltmay" id="may">
                        <option value="1">Cotton 4 chiều (90-95% Cotton)</option>
                        <option value="0">T-shirt 100% cotton</option>
                    </select>
                </div>

                <div class="row">
                    <div class="col-35">
                        <label for="" >Xuất xứ</label>
                    </div>

                    <select name="sltday" id="day">
                        <option value="1">Mỹ</option>
                        <option value="0">Việt Nam</option>
                        <option value="2">Thái Lan</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-35">
                        <label for="" >Số lượng còn:</label>
                    </div>

                    <div class="col-65">
                        <input type="number" name="txtsl" size="10" maxlength="10" id="soluong">
                    </div>
                </div>
                <div class="row">
                    <div class="col-35">
                        <label for="" >Giá:</label>
                    </div>

                    <div class="col-65">
                        <input type="number" name="txtgia" id="gia">(VND)
                    </div>
                </div>

                <div class="row">
                    <div class="col-35">
                        <label for="" >Thông tin bổ sung:</label>
                    </div>

                    <div class="col-65">
                        <textarea rows="2" cols="40" autofocus name="txtttbs"  id="ttbs"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-35">
                        <label for="">Hình ảnh</label>
                    </div>

                    <div class="col-65">
                        <input type="file" value="Browse..." name="file" id="igame">
                    </div>
                </div>

                <div class="button">
                    <input type="submit" name="btnadd" value="Thêm mới" >
                    <input type="reset" name="btncancel"value="Nhập lại">
                </div>
            </form>
        </div>
    </div>
