<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Text</title>

    <link rel="shortcut icon" href="assets/img/icon/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/mobile.css">
</head>

<body>

    <?php
    include('./partials/_menu.php');
    ?>

    <?php
    $baglanti = mysqli_connect("localhost", "root", "", "blogDb");
    $id = $_GET['id'];
    $sorgu = "SELECT * FROM yazilar WHERE id=$id";
    $gonder = mysqli_query($baglanti, $sorgu);
    $satir = mysqli_fetch_array($gonder)
    ?>
    <div class="blog-wrapper">
        <div class="container mt-4">
            <div class="blog-container">
                <div class="blog-top-title">
                    Blog
                </div>
                <img src="assets/img/<?php echo $satir["resim"]; ?>" alt="" srcset="" width="840" height="580">
                <br>
                <br>
                <div class="blog-container-text">
                    <div class="blog-text-meta-info">
                        <ul>
                            <li>
                                <div class="blog-text-date">
                                    <?php echo $satir["tarih"] ?>
                                </div>
                                <div class="blog-text-meta-dot">
                                    ·
                                </div>
                                <div class="blog-text-reading-time">

                                </div>
                                <div class="blog-text-meta-dot">
                                    ·
                                </div>
                                <div class="blog-text-author">
                                    <?php echo $satir["yazar"] ?>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="blog-text-title">
                        <?php echo $satir["baslik"] ?>
                    </div>
                    <div class="blog-text">
                        <?php echo $satir["yazi"] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    $baglanti->close();
    ?>

    <footer>
        <div class="container-fluid mt-5"></div>
        <hr>
        </div>
        <div class="container text-center mt-5 mb-5">
            <div class="copyright">
                © 2021 All rights reserved.
            </div>
        </div>

    </footer>

</body>

</html>