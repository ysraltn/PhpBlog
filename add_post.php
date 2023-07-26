<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["yazi"])) { //isset post submit olmasi lazim buraya tekrar bak

    $baslik = $_POST["baslik"];
    $aciklama = $_POST["aciklama"];
    $yazi = $_POST["yazi"];
    $resim = $_POST["resim"];
    $username = $_SESSION["username"];

    $baglanti = new mysqli("localhost", "root", "", "blogDb");
    if ($baglanti->connect_error) {
        die("Connection failed: " . $baglanti->connect_error);
    }

    $sql = "INSERT INTO yazilar (baslik, aciklama, yazi, yazar, resim, tarih) 
        VALUES ('$baslik', '$aciklama', '$yazi', '$username', '$resim', CURRENT_DATE())";
    if ($baglanti->query($sql) === TRUE) {
        echo "gonderi kaydedildi, panele yonlendiriliyorsunuz...";
    } else {
        echo "Hata! panele yonlendiriliyorsunuz...";
    }
    header("Refresh: 3; url=http://localhost/phpblog/panel.php");
}
?>



