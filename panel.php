<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<?php
$baglanti = mysqli_connect("localhost", "root", "", "blogDb");
$sorgu = "SELECT * FROM yazilar";
$mesaj_sorgu = "SELECT * FROM mesajlar";
$gonder = mysqli_query($baglanti, $sorgu);
$mesaj_sql_gonder = mysqli_query($baglanti, $mesaj_sorgu);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>

    <link rel="shortcut icon" href="assets/img/icon/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/mobile.css">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font: 14px sans-serif;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    include('./partials/_menu.php');
    ?>
    <h1 class="my-5">Logged in as <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h1>
    <p>
        <a href="logout.php" class="btn btn-danger ml-3">Logout</a>
    </p>
    <div class="container mt-4">



        <table class="table table-striped">
            <thead>
                <h5>Yazilar</h5>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Baslik</th>
                    <th scope="col">Aciklama</th>
                    <th scope="col">Yazar</th>
                    <th scope="col">Link</th>
                    <th scope="col">Tarih</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($satir = mysqli_fetch_array($gonder)) {
                    $id = $satir["id"];
                ?>
                    <tr>
                        <th scope="row"><?php echo $satir["id"]; ?></th>
                        <td><?php echo $satir["baslik"]; ?></td>
                        <td><?php echo $satir["aciklama"]; ?></td>
                        <td>@<?php echo $satir["yazar"]; ?></td>
                        <td><a href="blog-text.php?id=<?php echo $id; ?>">yazi</a></td>
                        <td><?php echo $satir["tarih"]; ?></td>
                        <!-- <td><button type="submit" name="submit">Sil</button></td> -->
                    </tr>
                <?php
                }
                //$baglanti->close();
                ?>

            </tbody>
        </table>

        <table class="table table-striped">
            <thead>
                <h5>Mesajlar</h5>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">fullname</th>
                    <th scope="col">email</th>
                    <th scope="col">subject</th>
                    <th scope="col">message</th>
                    <th scope="col">tarih</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($mesaj_satir = mysqli_fetch_array($mesaj_sql_gonder)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $mesaj_satir["id"]; ?></th>
                        <td><?php echo $mesaj_satir["fullname"]; ?></td>
                        <td><?php echo $mesaj_satir["email"]; ?></td>
                        <td><?php echo $mesaj_satir["subject"]; ?></td>
                        <td><?php echo $mesaj_satir["message"]; ?></td>
                        <td><?php echo $mesaj_satir["tarih"]; ?></td>
                        <!-- <td><button type="submit" name="submit">Sil</button></td> -->
                    </tr>
                <?php
                }
                $baglanti->close();
                ?>

            </tbody>
        </table>

        <div class="contact-form">
            <form action="add_post.php" method="post">
                <br>
                <h5>Gonderi Ekle</h5>
                <div class="fullname-input">
                    Baslik:
                    <input type="text" name="baslik" id="" placeholder="Baslik">
                </div>

                <div class="subject-input">
                    Aciklama:
                    <input type="text" name="aciklama" id="" placeholder="Aciklama">
                </div>
                <div class="subject-input">
                    Resim:
                    <input type="text" name="resim" id="" placeholder="Resim dosyasi ismi">
                </div>
                <div class="message-input">
                    Yazi:<br>
                    <textarea name="yazi" id="" cols="60" rows="5" placeholder="Yazi"></textarea>
                </div>
                <div class="button-input">
                    <button type="submit" name="submit">Ekle</button>
                </div>
            </form>
        </div>

    </div>
</body>

</html>