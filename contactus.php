<?php
    include 'header.php';
    include 'connect.php';
?>
<link rel="stylesheet" href="css/contactus.css">
<title>تسجل الدخول</title>
<div class="login">
    <form action="" method="post" enctype="multipart/form-data">
        <h1>تواصل معنا</h1>
        <input type="text" placeholder="رقم الموبايل" class="txtinp" required name="phone">
        <textarea name="message" class="txtinp" required  placeholder="سيب رسالتك هنا ... " id=""></textarea>
        <input type="submit" value="ارسال" class="btnlog" name="btnlog" >
        <br>
        <span>او من خلال </span>
        <br>
        <div class="social">
            <a href="#"> <i class="fa-brands fa-facebook"></i> </a>
            <a href="#"> <i class="fa-brands fa-whatsapp"></i> </a>
            <a href="#"> <i class="fa-solid fa-phone-flip"></i> </a>
            <a href="#"> <i class="fa-solid fa-location-dot"></i> </a>
        </div>

    </form>


</div>