
<base href="http://localhost/MocHoaVien/">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./mvc/public/user/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./mvc/public/user/swiper-bundle.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js">
    </script>
</head>

<body>
    <!-- navigation -->
    <?php require_once "./mvc/views/user-view/construct-view/header.php" ?>

    <?php require_once "./mvc/views/user-view/enities-view/".$data['control'].".php"?>

    <!-- footer start -->
    <?php require_once "./mvc/views/user-view/construct-view/footer.php" ?>

    <!-- footer end -->
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 4,
            spaceBetween: 10,
            slidesPerGroup: 1,
            loop: true,
            centerSlide: 'true',
            fade: 'true',
            grabCursor: 'true',
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                dynamicBullets: true
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                520: {
                    slidesPerView: 3,
                },
                950: {
                    slidesPerView: 4,
                }

            }
        });
    </script>
</body>

</html>