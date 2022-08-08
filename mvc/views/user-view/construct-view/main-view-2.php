<!DOCTYPE html>
<html lang="en">
<base href="http://localhost/MocHoaVien/">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Document</title>

    <!-- Favicon -->

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="./mvc/public/user/style-new.css">

</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Navbar Area -->
        <div class="nikki-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container-fluid">
                    <!-- Menu -->
                   <!-- header2 năm ở đây -->
                   <?php require_once "./mvc/views/user-view/construct-view/header-2.php" ?>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Hero Area Start ##### -->


    <!-- phàn chính nằm ở đây -->
    <?php require_once "./mvc/views/user-view/enities-view/".$data['control'].".php" ?>

    <!-- ##### Blog Content Area End ##### -->
    <!-- ##### Instagram Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
   <!-- footer nằm ở đây -->
   <?php require_once "./mvc/views/user-view/construct-view/footer-2.php" ?>


    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="./mvc/public/user/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="./mvc/public/user/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="./mvc/public/user/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="./mvc/public/user/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="./mvc/public/user/js/active.js"></script>
</body>

</html>