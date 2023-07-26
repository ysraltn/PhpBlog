<!DOCTYPE html>
<html lang="tr">


<?php
    include('./partials/_head.php');
?>


<body>
    <?php
        include('./partials/_menu.php');
    ?>



    <?php
        $baglanti = mysqli_connect("localhost", "root", "", "blogDb");
        $sorgu = "SELECT * FROM yazilar";
        $gonder = mysqli_query($baglanti, $sorgu);
    ?>

    <div class="blog-post-wrapper">
        <div class="container mt-4">
            <div class="blog-post-container">
                <div class="blog-post-top-title">
                    Blog
                </div>
                <div class="blog-post-row">
                    <div class="row">

                        <?php
                        while ($satir = mysqli_fetch_array($gonder)) {
                            $id = $satir["id"];
                        ?>


                            <div class="blog-post col-md-6">
                                <a href="blog-text.php?id=<?php echo $id; ?>">
                                    <div class="blog-post-thumbnail">
                                        <img src="assets/img/<?php echo $satir["resim"]; ?>" alt="" srcset="">
                                    </div>
                                    <div class="blog-post-text">
                                        <div class="blog-post-title">
                                            <?php echo $satir["baslik"]; ?>
                                        </div>
                                        <div class="blog-post-description">
                                            <?php echo $satir["aciklama"]; ?>
                                        </div>
                                        <div class="blog-post-meta-info">
                                            <ul>
                                                <li>
                                                    <div class="blog-post-date">
                                                    <?php echo $satir["tarih"]; ?>
                                                    </div>
                                                    <div class="blog-post-meta-dot">
                                                        ·
                                                    </div>
                                                    <div class="blog-post-reading-time">
                                                        
                                                    </div>
                                                    <div class="blog-post-meta-dot">
                                                        ·
                                                    </div>
                                                    <div class="blog-post-author">
                                                    <?php echo $satir["yazar"]; ?>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </a>



                            </div>

                        <?php
                        }
                        $baglanti->close();
                        ?>







                    </div>
                </div>
            </div>
        </div>
    </div>

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