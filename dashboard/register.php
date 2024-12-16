<?php

include '../connect.php';

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);


   $phone = $_POST['phone'];
   $phone = filter_var($phone, FILTER_SANITIZE_STRING);

   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $select_tutor = $conn->prepare("SELECT * FROM `admins` WHERE phone = ?");
   $select_tutor->execute([$phone]);
   
   if($select_tutor->rowCount() > 0){
      $message[] = 'الرقم مسجل بالفعل';
   }else{ 
         $insert_tutor = $conn->prepare("INSERT INTO `admins` ( name, phone, password) VALUES(?,?,?)");
         $insert_tutor->execute([$name, $phone, $pass]);
         $message[] = 'تم التسجيل بنجاح .. سجل دخول الان';
      }
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>تسجيل حساب جديد </title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/register.css">

</head>
<body style="padding-left: 0;">

<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message form">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<!-- register section starts  -->

<section class="form-container" dir="rtl" >

   <form class="register" action="" method="post" enctype="multipart/form-data">
      <img src="../img/logo.png" width="100" height="100" alt="">
      <h1> تسجيل حساب جديد </h1>

      <div class="flex">

         <div class="col">
            <p> الاسم  <span>*</span></p>
            <input type="text" name="name" placeholder=" ادخل اسمك هنا .. " maxlength="50" required class="box">
            <p> موبايل <span>*</span></p>
            <input type="text" name="phone" placeholder=" ادخل رقمك هنا .. " maxlength="20" required class="box">
            <p> كلمة المرور <span>*</span></p>
            <input type="text" name="pass" placeholder=" ادخل رقمك هنا .. " maxlength="20" required class="box">
         </div>

      </div>

      <input type="submit" name="submit" value=" تسجيل " class="btn">
      <p class="link"> لديك حساب بالفعل ؟  <a href="login.php" class="login-btn"> تسجيل الدخول  </a></p>
   </form>

</section>

<!-- registe section ends -->












<script>

let darkMode = localStorage.getItem('dark-mode');
let body = document.body;

const enabelDarkMode = () =>{
   body.classList.add('dark');
   localStorage.setItem('dark-mode', 'enabled');
}

const disableDarkMode = () =>{
   body.classList.remove('dark');
   localStorage.setItem('dark-mode', 'disabled');
}

if(darkMode === 'enabled'){
   enabelDarkMode();
}else{
   disableDarkMode();
}

</script>
   
</body>
</html>