<?php

include '../connect.php';

if(isset($_COOKIE['tutor_id'])){
   $tutor_id = $_COOKIE['tutor_id'];
}else{
   $tutor_id = '';
   header('location: login.php');
}

   include 'header.php';

if(isset($_POST['cr_article'])){

      $title = $_POST['title'];
      $title = filter_var($title, FILTER_SANITIZE_STRING);

      $article = $_POST['article'];
      $article = filter_var($article, FILTER_SANITIZE_STRING);

      $image = $_FILES['image']['name'];
      $image = filter_var($image, FILTER_SANITIZE_STRING);
      $ext = pathinfo($image, PATHINFO_EXTENSION);
      $rename = unique_id().'.'.$ext;
      $image_size = $_FILES['image']['size'];
      $image_tmp_name = $_FILES['image']['tmp_name'];
      $image_folder = '../uploaded_files/'.$rename;
   
      $add_courses = $conn->prepare("INSERT INTO `articles` ( title, article , img , user_id ) VALUES(?,?,?,?)");
      $add_courses->execute([$title, $article, $rename, $tutor_id]);
   
      move_uploaded_file($image_tmp_name, $image_folder);
      header('location: index.php');

      
}

if(isset($_POST['cr_news'])){

   $title = $_POST['title'];
   $title = filter_var($title, FILTER_SANITIZE_STRING);

   $news = $_POST['news'];
   $news = filter_var($news, FILTER_SANITIZE_STRING);

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $ext = pathinfo($image, PATHINFO_EXTENSION);
   $rename = unique_id().'.'.$ext;
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = '../uploaded_files/'.$rename;

   $add_courses = $conn->prepare("INSERT INTO `news` ( title, news , img , user_id ) VALUES(?,?,?,?)");
   $add_courses->execute([$title, $news, $rename, $tutor_id]);

   move_uploaded_file($image_tmp_name, $image_folder);
   header('location: index.php');
   
}

if(isset($_POST['cr_event'])){

   $title = $_POST['title'];
   $title = filter_var($title, FILTER_SANITIZE_STRING);

   $description = $_POST['description'];
   $description = filter_var($description, FILTER_SANITIZE_STRING);

   $date = $_POST['date'];
   $date = filter_var($date, FILTER_SANITIZE_STRING);

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $ext = pathinfo($image, PATHINFO_EXTENSION);
   $rename = unique_id().'.'.$ext;
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = '../uploaded_files/'.$rename;

   $add_courses = $conn->prepare("INSERT INTO `events` ( title, event , img , date , user_id ) VALUES(?,?,?,?,?)");
   $add_courses->execute([$title, $description, $rename, $date ,$tutor_id]);

   move_uploaded_file($image_tmp_name, $image_folder);
   header('location: index.php');
   
}

if(isset($_POST['up_product'])){

   $product_name = $_POST['product_name'];
   $product_name = filter_var($product_name, FILTER_SANITIZE_STRING);

   $description = $_POST['description'];
   $description = filter_var($description, FILTER_SANITIZE_STRING);

   $phone = $_POST['phone'];
   $phone = filter_var($phone, FILTER_SANITIZE_STRING);

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $ext = pathinfo($image, PATHINFO_EXTENSION);
   $rename = unique_id().'.'.$ext;
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = '../uploaded_files/'.$rename;

   $add_playlist = $conn->prepare("INSERT INTO `products` ( product_name, description, phone , img  ) VALUES(?,?,?,?)");
   $add_playlist->execute([ $product_name, $description, $phone ,$rename ]);

   move_uploaded_file($image_tmp_name, $image_folder);

   header('location: index.php');

}




?>
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/register.css">
<link rel="stylesheet" href="css/popup.css">

   
<section class="dashboard" >

   <h1 class="heading">لوحة التحكم</h1>
   
   <div class="box-container">
      <table dir="rtl">
         <tr>
            <th colspan="3">الخيارات</th>
         </tr>
         <tbody>
            <tr>
               <td>المقالات</td>
               <td><a id="addCourseModalBtn">اضافة</a></td>
               <td><a href="myarticle.php">عرض</a></td>
            </tr>
            <tr>
               <td>المنتجات</td>
               <td><a id="addContentModalBtn">اضافة</a></td>
               <td><a href="myproduct.php">عرض</a></td>
            </tr>

            <tr>
               <td>الفاعليات</td>
               <td><a id="addExamModalBtn">اضافة</a></td>
               <td><a href="myevents.php">عرض</a></td>
            </tr>

            <tr>
               <td>الاخبار</td>
               <td><a id="addQuestionModalBtn">اضافة</a></td>
               <td><a href="mynews.php">عرض</a></td>
            </tr>
            <tr>
               <td>الاعضاء</td>
               <td colspan="2" ><a href="subscriptions.php" id="">عرض</a></td>
            </tr>
         </tbody>
      </table>
   </div>

</section>

<!-- addCourseModal -->
<div id="addCourseModal" class="modal">
        <div class="modal-content">
            <span id="closeModalBtn" class="close">&times;</span>
            <h2>اضافة مقال جديد</h2>
      
   <form action="" method="post" enctype="multipart/form-data" dir="rtl">
      <div class="col">
            <p> عنوان المقال  <span>*</span></p>
            <input type="text" name="title" maxlength="100" required placeholder="مثال : المنتجات الزراعيه في الوطن العربي  ..." class="box">
            <p>  المقال <span>*</span></p>
            <input type="text" name="article" maxlength="3000" required placeholder=" اكتب المقال هنا ... " class="box">
            <p> صوره المقال <span>*</span></p>
            <input type="file" name="image" accept="image/*" required class="box">
      </div>   

      <input type="submit" value="نشر" name="cr_article" class="btn">
   </form>
      </div>
</div>
<!-- // addCourseModal -->

<!-- ====================== -->
<!-- addContentModal -->
<div id="addContentModal" class="modal">
      <div class="modal-content">
            <span id="closeContentModalBtn" class="close">&times;</span>
            <h2>اضافة منتج</h2>

      <form action="" method="POST" enctype="multipart/form-data"  dir="rtl">
      <div class="col">
            <p>  اسم المنتج  <span>*</span></p>
            <input type="text" name="product_name" maxlength="100" required placeholder="مثال : منتج سمادي قوي   ..." class="box">
            <p>  الوصف <span>*</span></p>
            <input type="text" name="description" maxlength="3000" required placeholder=" اكتب وصف المنتج  هنا ... " class="box">
            <p>  رقم لطلب المنتج <span>*</span></p>
            <input type="text" name="phone" maxlength="3000" required placeholder=" اكتب  هنا رقم واتساب لطلب المنتج  ... " class="box">
            <p> صوره المنج <span>*</span></p>
            <input type="file" name="image" accept="image/*" required class="box">
      </div>   
      <input type="submit" value="نشر المنتج" name="up_product" class="btn">
   </form>
   </div>   
</div>
<!-- // addContentModal -->

<!-- ====================== -->
<!-- addExamModal -->
<div id="addExamModal" class="modal">
      <div class="modal-content">
            <span id="closeExamModalBtn" class="close">&times;</span>
            <h2>اضافة الفاعليات </h2>
            <form action="" method="POST" enctype="multipart/form-data"  dir="rtl">
               <div class="col">
                  <p> عنوان الفاعليه  <span>*</span></p>
                  <input type="text" name="title" maxlength="100" required placeholder="مثال :  مؤتمر الرياض الزراعي  ..." class="box">
                  <p>  تفاصيل الفاعليه <span>*</span></p>
                  <input type="text" name="description" maxlength="3000" required placeholder=" اكتب التفاصيل هنا ... " class="box">
                  <p>  تاريخ الفاعليه <span>*</span></p>
                  <input type="date" name="date" required  class="box">
                  <p> صورة الفاعليه <span>*</span></p>
                  <input type="file" name="image" accept="image/*" required class="box">
               </div>  
            <input type="submit" value="نشر" name="cr_event" class="btn">
            </form>
      </div>   
</div>

<!-- // addExamModal -->
<!-- ====================== -->
<!-- addQuestionModal -->
<div id="addQuestionModal" class="modal">
      <div class="modal-content">
            <span id="closeQuestionModalBtn" class="close">&times;</span>
            <h2>اضافة خبر</h2>
            <form action="" method="POST" enctype="multipart/form-data"  dir="rtl">
            <div class="col">
               <p> عنوان الخبر  <span>*</span></p>
               <input type="text" name="title" maxlength="100" required placeholder="مثال : المنتجات الزراعيه في الوطن العربي  ..." class="box">
               <p>  الخبر <span>*</span></p>
               <input type="text" name="news" maxlength="3000" required placeholder=" اكتب الخبر هنا ... " class="box">
               <p> صوره الخبر <span>*</span></p>
               <input type="file" name="image" accept="image/*" required class="box">
            </div>  
      <input type="submit" value="نشر" name="cr_news" class="btn">

   </form>
      </div>   
</div>
<!-- // addQuestionModal -->
<!-- ====================== -->
 
<script src="js/popup.js"></script>