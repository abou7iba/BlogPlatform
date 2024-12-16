<?php
    include 'header.php';
    include '../connect.php';

    $id = $_GET['id'];

    if(!isset($_COOKIE['user_id'])){
        $user_id = "";
    }else{
        $user_id = $_COOKIE['user_id'];
    }

    
    $select_subscriptions = $conn->prepare("SELECT * FROM `users` WHERE id =? ");
    $select_subscriptions->execute([$user_id]);
    if($select_subscriptions->rowCount() > 0){
        $fetch_subscriptions = $select_subscriptions->fetch(PDO::FETCH_ASSOC);

        $name = $fetch_subscriptions['name'];
        $phone = $fetch_subscriptions['phone'];
    }

    $select_subscriptions = $conn->prepare("SELECT * FROM `events` WHERE id =? ");
    $select_subscriptions->execute([$id]);
    if($select_subscriptions->rowCount() > 0){
        $fetch_subscriptions = $select_subscriptions->fetch(PDO::FETCH_ASSOC);

        $title = $fetch_subscriptions['title'];
        $article = $fetch_subscriptions['event'];
        $img = $fetch_subscriptions['img'];
        $cr_at = $fetch_subscriptions['cr_at'];    
    }

?>

<div class="container">

    <div class="article-header">
        <h1><?= $title ?></h1>
        <span class="article-date" >تاريخ النشر : <?= $cr_at?> </span>
    </div>

    <div class="article-body">
        <img src="../uploaded_files/<?= $img?>" alt="">
        <p> <?= $article?> </p>
    </div>
</div>
