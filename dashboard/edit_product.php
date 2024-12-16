<?php

include '../connect.php';

if(isset($_COOKIE['tutor_id'])){
   $tutor_id = $_COOKIE['tutor_id'];
}else{
   $tutor_id = '';
   header('location:login.php');
}

if(isset($_GET['edit_id'])){
    $get_id = $_GET['edit_id']; 
 }else{
    $get_id = ""; 

}
   include 'header.php';

if(isset($_POST['update_product'])){

    $product_name = $_POST['product_name'];
    $product_name = filter_var($product_name, FILTER_SANITIZE_STRING);

    $description = $_POST['description'];
    $description = filter_var($description, FILTER_SANITIZE_STRING);

    $phone = $_POST['phone'];
    $phone = filter_var($phone, FILTER_SANITIZE_STRING);

    $add_courses = $conn->prepare("UPDATE `products` SET product_name = ?, description = ? , phone = ? WHERE id = ?");
    $add_courses->execute([ $product_name, $description , $phone ,  $get_id]);
}   
?>
    <style>
        body
        {
            color: #40A578;
        }
        .cards{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            align-items: center;
            margin: 20px;
        }
        .card {
            border: 1px solid #ccc;
            border-radius: 8px;
            width: 300px;
            padding-bottom: 16px;
            text-align: center;
            margin: 20px;
            box-shadow:0px 0px 9px #40a5788a;
        }
        .card img {
            width: 100%;
            border-radius: 8px 8px 0 0;
        }
        .card h3 {
            margin: 16px 0;
        }
        .card p {
            color: #555;
        }
        .card .price {
            font-weight: bold;
            color: #007bff;
        }
        .deletebtn
        {
            background-color: #f44336;
            color: white;
            padding: 5px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .editbtn
        {
            background-color: #4CAF50;
            color: white;
            padding: 5px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 10px;
        }
        .Videobtn
        {
            background-color: #2994B2;
            color: white;
            padding: 5px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 10px;
        }
        .action
        {
            display: flex;
            justify-content: space-around;
        }
        
    </style>

<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/register.css">
<!-- <link rel="stylesheet" href="css/popup.css"> -->

<?php
if(isset($_POST['delete'])){
   $delete_id = $_GET['delete_id'];

   $delete_playlist = $conn->prepare("DELETE FROM `products` WHERE id = ?");
   $delete_playlist->execute([$delete_id]);
}

?>
</head>
<body>
<div id="editCourseModal" class="modal">
<center>

<div class="modal-content">
        <?php
    $select_courses = $conn->prepare("SELECT * FROM `products` WHERE id = ? ");
    $select_courses->execute([$get_id]);
    if($select_courses->rowCount() > 0){
        while($fetch_course = $select_courses->fetch(PDO::FETCH_ASSOC)){
            ?>
            <br><br>
            <h2> تعديل المقال </h2>
      
<form action="" method="post" enctype="multipart/form-data" dir="rtl">
<div class="col">
      <p> عنوان المقال  <span>*</span></p>
      <input type="text" name="product_name" maxlength="100" value="<?= $fetch_course['product_name']; ?>" class="box">
      <p>   المقال  <span>*</span></p>
      <input type="text" name="description" maxlength="100" value="<?= $fetch_course['description']; ?>"  class="box">
      <p>  رقم طلب المنتج  <span>*</span></p>
      <input type="text" name="phone" maxlength="100" value="<?= $fetch_course['phone']; ?>" class="box">
      
 </div>

      <input type="submit" value="تعديل" name="update_product" class="btn">
</form>
      </div>
    </div>
    
    <?php
}}
?>
</center>