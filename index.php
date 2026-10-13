<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./css/reset.css" /> -->
    <link rel="stylesheet" href="./css/reset.css">
    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.6.0/css/all.css" />
    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-thin.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="chung.css" />
    <link rel="stylesheet" href="scroll-head.css" />

    <!-- <link rel="stylesheet" href="style.css" /> -->

    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.6.0/css/all.css" />
    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-thin.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@200..1000&display=swap"
        rel="stylesheet" />
    <!-- <link rel="stylesheet" href="./css/main.css" /> -->
    <link
        href="https://unpkg.com/maplibre-gl@2.4.0/dist/maplibre-gl.css"
        rel="stylesheet" />
    <script src="https://unpkg.com/maplibre-gl@2.4.0/dist/maplibre-gl.js"></script>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/scroll-head.css" />
    <link rel="stylesheet" href="./css/chung.css" />
    <link rel="stylesheet" href="./css/reponsive.css">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_GET["id_news"])) {
        $id_newss = $_GET["id_news"];
    } else {
        $id_newss = null;
    }

    if (isset($_GET['danhmuc'])) {
        $content = $_GET['danhmuc']; // Lấy giá trị ID từ URL
        // echo "ID đã được lưu: " . $tempID;
    } else {
        $content = null;
    }
    session_start();

    include $_SERVER['DOCUMENT_ROOT'] . "/clock/sql/cn.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/clock/pages/main/function/function.php";


    ?>
    <div class="head">
        <?php

        include $_SERVER['DOCUMENT_ROOT'] . "/clock/pages/head.php";
        ?>

    </div>
    <div class="mains">
        <?php

        include $_SERVER['DOCUMENT_ROOT'] . "/clock/pages/main.php";


        ?>

    </div>
    <div class="maps">
        <?php
        if ($content == "clockDt") {
        } else {
            include $_SERVER['DOCUMENT_ROOT'] . "/clock/pages/map-store.php";
        }
        ?>

    </div>
    <div class="newss">
        <?php
        if ($content == "clockDt") {
        } else {
            include $_SERVER['DOCUMENT_ROOT'] . "/clock/pages/news.php";
        }

        ?>

    </div>

    <div class="ft">
        <?php
        // if (!isset($_GET["id"])) {
        include $_SERVER['DOCUMENT_ROOT'] . "/clock/pages/footer.php";
        // }
        ?>

    </div>
    <script>
        let lastScrollTop = 0;
        let scrollThreshold = 10;

        window.addEventListener("scroll", function() {
            let currentScroll =
                window.pageYOffset || document.documentElement.scrollTop;
            let box = document.querySelector(".head-nv");

            if (Math.abs(currentScroll - lastScrollTop) > scrollThreshold) {
                box.classList.add("head-nv-js");
            } else if (currentScroll == lastScrollTop) {
                box.classList.remove("head-nv-js");
            }

        });



        // document.addEventListener("DOMContentLoaded", function() {
        //     // Tạo một observer để kiểm tra khi phần tử nằm trong vùng nhìn thấy
        //     const observer = new IntersectionObserver(
        //         (entries, observer) => {
        //             entries.forEach((entry) => {
        //                 if (entry.isIntersecting) {
        //                     entry.target.classList.add("visible"); // Thêm class visible khi phần tử vào viewport
        //                     observer.unobserve(entry.target); // Ngừng theo dõi phần tử sau khi đã hiện
        //                 }
        //             });
        //         }, {
        //             threshold: 0.1, // Phần tử sẽ hiện khi ít nhất 10% của nó nằm trong viewport
        //         }
        //     );

        //     // Chọn tất cả các phần tử có class fade-in
        //     const fadeInElements = document.querySelectorAll(".fade-in");
        //     fadeInElements.forEach((element) => {
        //         observer.observe(element); // Theo dõi từng phần tử
        //     });
        // });
        document.addEventListener("DOMContentLoaded", function() {
            // Tạo một observer để kiểm tra khi phần tử nằm trong vùng nhìn thấy
            const observer = new IntersectionObserver(
                (entries, observer) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add("visible"); // Thêm class visible khi phần tử vào viewport
                            observer.unobserve(entry.target); // Ngừng theo dõi phần tử sau khi đã hiện
                        }
                    });
                }, {
                    threshold: 0.1, // Phần tử sẽ hiện khi ít nhất 10% của nó nằm trong viewport
                }
            );

            // Chọn tất cả các phần tử có class fade-in
            const fadeInElements = document.querySelectorAll(".fade-in");
            fadeInElements.forEach((element) => {
                observer.observe(element); // Theo dõi từng phần tử
            });
        });



        let currentIndex = 0;
        const images = document.querySelectorAll('.img-buffer');
        const totalImages = images.length;

        document.getElementById('prevBtn').addEventListener('click', function() {
            currentIndex = (currentIndex > 0) ? currentIndex - 1 : totalImages - 1;
            updateImagePosition();
        });

        document.getElementById('nextBtn').addEventListener('click', function() {
            currentIndex = (currentIndex < totalImages - 1) ? currentIndex + 1 : 0;
            updateImagePosition();
        });

        function updateImagePosition() {
            const offset = -currentIndex * 100; // 100% cho mỗi hình ảnh
            images.forEach((img) => {
                img.style.transform = `translateX(${offset}%)`;
            });
        }

        document.addEventListener("DOMContentLoaded", function() {
            const fadeInElements = document.querySelectorAll('.fade-in-element');

            const observerOptions = {
                root: null,
                threshold: 0.1
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    console.log('Intersecting:', entry.isIntersecting);
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        console.log('Added class "visible" to:', entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            fadeInElements.forEach(element => {
                observer.observe(element);
            });
        });
    </script>
</body>

</html>