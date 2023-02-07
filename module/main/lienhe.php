<?php
	if(isset($_POST['submit'])){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$mess= $_POST['message'];

		$sql="INSERT INTO `cauhoi`(`name`, `email`, `messenger`) VALUES ('$name','$email','$mess')";
		require('admincp/config/connect.php');
		$result= mysqli_query($conn, $sql);
		if($result){
			echo "<script>alert('cảm ơn bạn đã gởi câu hỏi cho chúng tôi Nhân viên sẽ liên hệ lại ban sau!');</script>";

		}
        else echo "<script>alert('sai roi!');</script>";
	}
?>

<div class="header-title-main text-center">
        <span>LIÊN HỆ SHOP SECONDHEND UY TÍN NHẤT ĐÀ NẴNG</span>
    </div>
	
<div class="contact-section">
		<div class="contact-info">
			<div class="beta-map">
		
			<div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1876.1593570066568!2d108.22230909568702!3d16.032278054379603!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219ee4731eef1%3A0xaf5208526cfbbd42!2zVHLGsOG7nW5nIMSQSCBraeG6v24gdHLDumMsIEhvw6AgQ8aw4budbmcgTmFtLCBI4bqjaSBDaMOidSwgxJDDoCBO4bq1bmcsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1652060892403!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
			</div>
			<div><i class="fas fa-map-marker-alt"></i>566 Núi Thành, P. Hòa Cường Nam, Q. Hải Châu, TP. Đà Nẵng</div>
			<div><i class="fas fa-envelope"></i>ShopANT@gmail.com</div>
			<div><i class="fas fa-phone"></i>0987852903</div>
			<div><i class="fas fa-clock"></i>8h30 – 21h30</div>
			<div class="contact-form">
				<h2>Liên hệ đến chúng tôi</h2>
				<form class="contact"  method="POST">
					<input type="text" name="name" class="text-box" placeholder="Tên của bạn" required="" id="name">
					<input type="text" name="email" class="text-box" placeholder="Email or phone number" id="email" required="">
					<textarea name="message" rows="3" cols="60" placeholder="Nhập câu hỏi của bạn" id="mes"></textarea>
					<input type="submit" name="submit" class="send-btn" value="Gửi" onclick="return checkspase()">
				</form>
			</div>
		</div>
	</div>
	<script src="js/check.js"></script>