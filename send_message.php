<!DOCTYPE html>
<html lang="tr">

<?php
include("partials/_head.php");
?>


<body>
    <?php
    include('./partials/_menu.php');
    ?>

    <?php
    $baglanti = new mysqli("localhost", "root", "", "blogDb");
    if ($baglanti->connect_error) {
        die("Connection failed: " . $baglanti->connect_error);
    }
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) { //isset post submit olmasi lazim buraya tekrar bak

        $fullname = $_POST["fullname-surname"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];

        $sql = "INSERT INTO mesajlar (fullname, email, subject, message, tarih) 
            VALUES ('$fullname', '$email', '$subject', '$message', CURRENT_DATE())";
    }
    ?>

    <div class="about-wrapper">
        <div class="container mt-4">
            <div class="about-container">
                <div class="about-top-title">

                </div>
                <div class="about-container-text">
                    <div class="about-text-title">
                        <small>
                            <?php
                            if ($baglanti->query($sql) === TRUE) {
                                echo "Mesaj gönderildi";
                            } else {
                                echo "Hata!";
                            }
                            ?>
                        </small>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>