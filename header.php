<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/popup.css">
    <link rel="stylesheet" href="css/land.css">
    <link rel="stylesheet" href="css/about-us.css">
    <link rel="stylesheet" href="css/article.css">
    <link rel="stylesheet" href="css/news.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/events.css">
    <link rel="stylesheet" href="css/comments.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <title>استثمار زراعي</title>
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <style>
        .swiper {
        width: 100%;
        height: 500px;
        }
    </style>
</head>
<body>
    <header>
            <div class="right">
                <a href="./index.php"><img src="img/logo.png" width="50" height="50" alt=""></a>
            </div>
            <div class="center" dir="rtl" >
                <a href="./index.php"><i class="fa-solid fa-house"></i> <span>الرئيسية</span>  </a>
                <a href="#article"> <i class="fa-solid fa-book"></i><span>المقالات</span></a>
                <a href="#product"> <i class="fa-solid fa-tree"></i><span>منتجاتنا</span></a>
                <a href="#news"> <i class="fa-regular fa-newspaper"></i><span>آخر الأخبار</span></a>
                <a href="#events"> <i class="fa-solid fa-calendar-days"></i><span>الفاعليات</span></a>
                <a href="#aboutus"> <i class="fa-regular fa-address-card"></i><span>عن الشركة</span></a>
                <a href="./contactus.php"> <i class="fa-solid fa-headset"></i><span>اتصل بنا</span></a>
            </div>
            <div class="left">
                <a href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
                <span> | </span>
                <a href="#"> <i class="fa-brands fa-facebook"></i> </a>
                <a href="#"> <i class="fa-brands fa-whatsapp"></i> </a>
                <a href="#"> <i class="fa-solid fa-phone-flip"></i> </a>
                <a href="#"> <i class="fa-solid fa-location-dot"></i> </a>
            </div>
            <button class="menu" id="addNotificationModalBtn" >
                <i  class="fa-solid fa-bars"></i>
            </button>

        </header>

        <div class="modal" id="addNotificationModal">
           <!-- <div class="top-header"></div>
           <div class="center-header"></div>
           <div class="bottom-header"></div> -->
            <div class="modal-content">

                <span id="closeNotificationModalBtn" class="close">&times;</span>

                <div class="header-links">
                <div class="popup-top" dir="rtl" >
                    <a href="./index.php"><i class="fa-solid fa-house"></i> <span>الرئيسية</span>  </a>
                    <a href="#article"> <i class="fa-solid fa-book"></i><span>المقالات</span></a>
                    <a href="#product"> <i class="fa-solid fa-tree"></i><span>منتجاتنا</span></a>
                    <a href="#news"> <i class="fa-regular fa-newspaper"></i><span>آخر الأخبار</span></a>
                    <a href="#events"> <i class="fa-solid fa-calendar-days"></i><span>الفاعليات</span></a>
                    <a href="#aboutus"> <i class="fa-regular fa-address-card"></i><span>عن الشركة</span></a>
                    <a href="./contactus.php"> <i class="fa-solid fa-headset"></i><span>اتصل بنا</span></a>
                </div>
                <div class="popup-bottom">
                    <a href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
                    <span> | </span>
                    <a href="#"> <i class="fa-brands fa-facebook"></i> </a>
                    <a href="#"> <i class="fa-brands fa-whatsapp"></i> </a>
                    <a href="#"> <i class="fa-solid fa-phone-flip"></i> </a>
                    <a href="#"> <i class="fa-solid fa-location-dot"></i> </a>
                </div>
                </div>
            </div>   

        </div>


<script>
    // addNotificationModal
    const addNotificationModal = document.getElementById("addNotificationModal");
    const addNotificationModalBtn = document.getElementById("addNotificationModalBtn");
    const closeNotificationModalBtn = document.getElementById("closeNotificationModalBtn");

    addNotificationModalBtn.onclick = function() {
        addNotificationModal.style.display = "block";
    }

    closeNotificationModalBtn.onclick = function() {
        addNotificationModal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target === addNotificationModal) {
            addNotificationModal.style.display = "none";
        }
    }
</script>
