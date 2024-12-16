<?php
    include 'header.php';
    include 'connect.php';

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
        $phone = $fetch_subscriptions['name'];
    }

    $select_subscriptions = $conn->prepare("SELECT * FROM `articles` WHERE id =? ");
    $select_subscriptions->execute([$id]);
    if($select_subscriptions->rowCount() > 0){
        $fetch_subscriptions = $select_subscriptions->fetch(PDO::FETCH_ASSOC);

        $title = $fetch_subscriptions['title'];
        $article = $fetch_subscriptions['article'];
        $img = $fetch_subscriptions['img'];
        $cr_at = $fetch_subscriptions['cr_at'];    
    }


if(isset($_POST['add_comment'])){

    $comment = $_POST['comment'];
    $comment = filter_var($comment, FILTER_SANITIZE_STRING);
    
    $add_comment = $conn->prepare("INSERT INTO `comments_articles` (comment, user_id , articles_id) VALUES (?,?,?)");
    $add_comment->execute([$comment , $user_id , $id]);

    header('location: article.php?id='.$id.'');
}
?>

<div class="container">

    <div class="article-header">
        <h1><?= $title ?></h1>
        <span class="article-date" >تاريخ النشر : <?= $cr_at?> </span>
    </div>

    <div class="article-body">
        <img src="uploaded_files/<?= $img?>" alt="">
        <p> <?= $article?> </p>
    </div>

    <div class="article-footer">
        <h2>التعليقات</h2>
        <?php 
        if($user_id == ""){
            echo '<p>يجب عليك تسجيل الدخول أولا لتتمكن من التعليقات</p>';
            echo '<a href="login.php" class="button">تسجيل الدخول </a>';
            exit();
        }else{
            echo '
            <form action="" method="post" >
            <textarea name="comment" id="" class="add-comment" placeholder="اكتب تعليقك هنا.."></textarea>
            <br>
            <button type="submit" name="add_comment" class="btn" >ارسل</button>
        </form>
            ';
        };

        ?>
    </div>

    <div class="comments">
    <?php
    $select_subscriptions = $conn->prepare("SELECT * FROM `comments_articles` WHERE articles_id = ? ");
    $select_subscriptions->execute([$id]);
    if($select_subscriptions->rowCount() > 0){
        while($fetch_subscriptions = $select_subscriptions->fetch(PDO::FETCH_ASSOC)){
    ?>
        <div class="comment">
            <div class="comment-header">
                <h4>
                <?php $user = $fetch_subscriptions['user_id']; ?>
                <?php
                    $select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ? ");
                    $select_user->execute([$user]);
                    if($select_user->rowCount() > 0){
                        $fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);
                        $name = $fetch_user['name'];
                    }
                ?>
                    <?= $name ?>
                </h4>
                <span><?= $fetch_subscriptions['created_at']; ?></span>
            </div>
            <div class="comment-body">
                <p><?= $fetch_subscriptions['comment']; ?></p>
            </div>
        </div>
    <?php }} ?>
    </div>

</div>
