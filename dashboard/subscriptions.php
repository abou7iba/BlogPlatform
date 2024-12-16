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

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
 
    $delete_playlist = $conn->prepare("DELETE FROM `users` WHERE id = ?");
    $delete_playlist->execute([$delete_id]);
    header('location:  subscriptions.php');
 
 }

?>
<style>
    table {
        width: 90%;
        border-collapse: collapse;
        text-align: right;
        color: #40A578;
        padding: 10px 20px;
        margin: 40px auto;
    }
    table th {
        text-align: center;
        font-weight: 600;
        font-size: 20px;
        background-color: #40a57830;
        border: 1px solid #40a57875;
    }
    table tr td {
        border: 1px solid #40a57875;
        padding: 5px 10px;
        font-weight: 600;
    }
    .action 
    {
        text-align: center;
        width: 150px;
    }
    .action a
    {
        padding : 0 20px ; 
    }
    .deletebtn
    {
        color: red ; 
    }
    .acceptbtn
    {
        color: green ;
        background: none;
        border: none;
    }
</style>

<div class="swiper">
  <div class="swiper-wrapper">


<table dir="rtl">
        <tr>
            <th colspan="6" >الاعضاء</th>
         </tr>
         <tr>
            <th>الاسم</th>
            <th>موبايل</th>
            <th>الانشاء</th>
            <th>الخيارات</th>
         </tr>
         <tbody>
         <?php
    $select_subscriptions = $conn->prepare("SELECT * FROM `users` ");
    $select_subscriptions->execute([]);
    if($select_subscriptions->rowCount() > 0){
        while($fetch_subscriptions = $select_subscriptions->fetch(PDO::FETCH_ASSOC)){
?>
<tr>
    <td><?= $fetch_subscriptions['name']; ?></td>
    <td><?= $fetch_subscriptions['phone']; ?></td>
    <td><?= $fetch_subscriptions['created_at']; ?></td>
    <td class="action">
    <form action="subscriptions.php?accept=<?= $fetch_subscriptions['id']; ?>" method="post">
        <a href="https://wa.me/+20<?= $fetch_subscriptions['phone']; ?>"  class="acceptbtn"><i class="fa-brands fa-whatsapp"></i></a>
        <a href="subscriptions.php?delete=<?= $fetch_subscriptions['id']; ?>"  class="deletebtn"><i class="fa-solid fa-xmark"></i></a>
    </form>
    </td>
</tr>
<?php }}?> 
</tbody>
</table>
