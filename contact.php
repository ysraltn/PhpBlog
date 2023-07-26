<!DOCTYPE html>
<html lang="tr">


<?php
include('./partials/_head.php');
?>

<body>

    <?php
    include("partials/_menu.php");

    ?>

    <div class="contact-wrapper">
        <div class="container mt-4">
            <div class="contact-container">
                <div class="contact-top-title">

                    Contact Form
                </div>
                <div class="contact-form">
                    <form action="send_message.php" method="post">
                        <div class="fullname-input">
                            <input type="text" name="fullname-surname" id="" placeholder="Full Name">
                        </div>
                        <div class="email-input">
                            <input type="email" name="email" id="" placeholder="Email Address">
                        </div>
                        <div class="subject-input">
                            <input type="text" name="subject" id="" placeholder="Subject">
                        </div>
                        <div class="message-input">
                            <textarea name="message" id="" cols="60" rows="5" placeholder="Message"></textarea>
                        </div>
                        <div class="button-input">
                            <button type="submit" name="submit">Send Message</button>
                        </div>
                    </form>
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