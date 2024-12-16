<div class="loading" id="loading">
    <l-helix
    class="load"
    size="100"
    speed="2.5"
    color="#40A578" 
    ></l-helix>
</div>
<?php
    include 'header.php';
    include 'connect.php';

?>

<div class="landing">
    <div class="land">
        <img src="img/logo.png" width="200" height="200" alt="بلانت لايف">
        <h1>موقع بلانت لايف للإستثمار الزراعي الأول في مصر</h1>
        <p>سجل دلوقتي في موقع الاستثمار الزراعي رقم 1 في مصر  </p>
        <br>
        <a href="./register.php" class="button">تسجيل حساب جديد </a>
        <br><br>
    </div>
</div>

<div class="about-us" id="aboutus">
    <div class="right">
        <img src="./img/logo.png" alt="">
    </div>
    <div class="left">
        <h2>من نحن</h2>
        <p>
            بلانت لايف للإستثمار الزراعي الأول في مصر هو موقع إعلامي وبيئي للمواطنين الذين يحتاجون إلى التواصل مع عملائنا في البيئة الزراعية والتنمية المستقلة.
        </p>
    </div>
</div>

<div class="articles" id="article">
    <h1 class="heading" >المقالات</h1>
    <!-- swiper --> 
    <div class="swiper">
    <div class="swiper-wrapper">
    <?php
    $select_subscriptions = $conn->prepare("SELECT * FROM `articles`");
    $select_subscriptions->execute([]);
    if($select_subscriptions->rowCount() > 0){
        while($fetch_subscriptions = $select_subscriptions->fetch(PDO::FETCH_ASSOC)){
    ?>
        <!-- start slide -->
        <div class="swiper-slide">
        <div class="article">
            <!-- start article -->
            <div class="article-card">
            <img src="./uploaded_files/<?= $fetch_subscriptions['img']; ?> " alt="">
            <br>
                <span><?= $fetch_subscriptions['cr_at']; ?>  </span>
                <i class="fa-regular fa-clock"></i>
                <br>
                <h3><?= $fetch_subscriptions['title']; ?> </h3>
                <p> <?= $fetch_subscriptions['article']; ?> </p>
                <a dir="rtl" href="article.php?id=<?= $fetch_subscriptions['id']; ?>">قراءة المزيد ...</a>
            </div>
            <!-- end card -->
        </div>
        </div>
        <!-- end slide -->
    <?php }} ?>


    </div>

    <div class="swiper-pagination"></div>

    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>

    </div>
    <!-- swiper end  -->
</div>

<div class="news" id="news">
    <h1 class="heading" >أخر الأخبار</h1>
    <div class="news-cards">
    <?php
    $select_subscriptions = $conn->prepare("SELECT * FROM `news`");
    $select_subscriptions->execute([]);
    if($select_subscriptions->rowCount() > 0){
        while($fetch_subscriptions = $select_subscriptions->fetch(PDO::FETCH_ASSOC)){
    ?>
        <div class="news-card">
            <a href="#">
                <img src="./uploaded_files/<?= $fetch_subscriptions['img']; ?> " alt="">
            </a>
                <br>
            <span class="date"><?= $fetch_subscriptions['cr_at']; ?> </span>
                <br>
            <h3><?= $fetch_subscriptions['title']; ?> </h3>
            <p><?= $fetch_subscriptions['news']; ?>  </p>
            <a dir="rtl" class="more" href="news.php?id=<?= $fetch_subscriptions['id']; ?>">قراءة المزيد...</a>
        </div>
        <?php }} ?>
    </div>
</div>

<div class="products" id="product">
    <h1 class="heading" > منتجاتنا </h1>
    <div class="product-cards">
    <?php
    $select_subscriptions = $conn->prepare("SELECT * FROM `products` ");
    $select_subscriptions->execute([]);
    if($select_subscriptions->rowCount() > 0){
        while($fetch_subscriptions = $select_subscriptions->fetch(PDO::FETCH_ASSOC)){
    ?>
        <div class="product-card">
        <img src="./uploaded_files/<?= $fetch_subscriptions['img']; ?> " alt="">
        <h3><?= $fetch_subscriptions['product_name']; ?></h3>
            <p><?= $fetch_subscriptions['description']; ?></p>
            <a href="https://wa.me/+20<?= $fetch_subscriptions['phone']; ?>">طلب الأن</a>
        </div>
    <?php }} ?>


    </div>
</div>

<div class="events" id="news">
    <h1 class="heading" > الفاعليات </h1>
    <div class="event-cards">
    <?php
    $select_events = $conn->prepare("SELECT * FROM `events`");
    $select_events->execute([]);
    if($select_events->rowCount() > 0){
        while($fetch_events = $select_events->fetch(PDO::FETCH_ASSOC)){
    ?>
        <div class="event-card">
            <a href="#">
                <img src="./uploaded_files/<?= $fetch_events['img']; ?> " alt="">
            </a>
                <br>
            <span class="date"><?= $fetch_events['date']; ?> </span>
                <br>
            <div class="det">
                <h3><?= $fetch_events['title']; ?> </h3>
                <p><?= $fetch_events['event']; ?>  </p>
            </div>
            <a dir="rtl" class="more" href="event.php?id=<?= $fetch_events['id']; ?>">قراءة المزيد...</a>
        </div>
        
        <?php }} ?>
    </div>
</div>




<script type="module" src="https://cdn.jsdelivr.net/npm/ldrs/dist/auto/helix.js"></script>
<script>
        const swiper = new Swiper('.swiper', {
        loop: true,

        pagination: {
            el: '.swiper-pagination',
        },

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        // Default parameters
        slidesPerView: 1,
        spaceBetween: 10,
        // Responsive breakpoints
        breakpoints: {
        // when window width is >= 320px
        420: {
        slidesPerView: 1,
        spaceBetween: 20
        },
        // when window width is >= 480px
        680: {
        slidesPerView: 2,
        spaceBetween: 30
        },
        // when window width is >= 640px
        940: {
        slidesPerView: 3,
        spaceBetween: 40
        }
    }

        });

</script>

<script>
window.onload = function () {
     document.getElementById("loading").style.display = "none";
};
</script>
<?php include 'footer.php'; ?>