<!DOCTYPE html>
<html lang="sk"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LSPD - Home</title>
    <meta name="description" content="LSPD - Domov">
    <link rel="icon" type="image/x-icon" href="\LSPD_files/LSPD.webp">
    <link rel="stylesheet" href="\LSPD_files/global.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="\LSPD_files/style.css" type="text/css">
    <link rel="stylesheet" href="\LSPD_files/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/f83e61cd6c.js" crossorigin="anonymous"></script>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-FQZJFYMSVF"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-FQZJFYMSVF');
</script>
<body data-aos-easing="ease" data-aos-duration="600" data-aos-delay="0" data-new-gr-c-s-check-loaded="14.1121.0" data-gr-ext-installed="">
<header id="header" style="border-bottom: 0;color:#fff;;transition: all 0.3s;">
<div class="nav">
    <a href="index.html" style="text-decoration:none" id="Logo">
        <img id="logoImg2" src="\LSPD_files/LSPD.webp" style="height: 55px;width: auto;" alt="LSPD">
        <h3 style="margin: 0;margin-left: 10px;color: #FFF;">Los Santos Police Department</h3>
    </a>
    <div id="bigMenu" style="color: rgb(255, 255, 255);">
        <a href="nabor.html" class="menuBtn menuBtnA" style="color: rgb(255, 255, 255);">Nabór</a>
        <a href="kontakt.html" class="menuBtn menuBtnA" style="color: rgb(255, 255, 255);">Kontakt</a>
        <a href="sad.html" class="menuBtn menuBtnA" style="color: rgb(255, 255, 255);">Skargi</a>
        <a href="pochwaly.html" class="menuBtn menuBtnA" style="color: rgb(255, 255, 255);">Pochwały</a>
    </div>
    <div id="Menu" style="cursor: pointer; color: rgb(255, 255, 255);"><i class="fa-solid fa-bars"></i></div>
    <a href="login.html" id="loginIcon" style="color: #FFF; text-decoration: none; margin-left: auto;">
        <i class="fa-solid fa-user" style="font-size: 24px;"></i>
    </a>
</div>

    </header>
    <script>
       
    $('#menuWrapperExpand').hide();
    $('.menuWrapperExp').hide();

    var farbaMenu = null;

    $("#Menu").css("cursor", "pointer");
    $("#logInHref").css("cursor", "pointer");

    $(document).ready(function(){
        $("#Menu").click(function () {
            if ($(window).width() >= 900) {
                $("#MenuWrapper").css("width", "400px");
                $("#MenuWrapper").css("right", "0");
            } else {
                $("#MenuWrapper").css("width", "100%");
                $("#MenuWrapper").css("right", "auto");
            }
            toggleMenu();
        });
        $('.bigMenuShowMore').click(function(){
            var idOfExapnd = $(this).attr('data');
            $('.menuWrapperExp').hide();
            $('#menuWrapperExpand').show();
            $('#'+idOfExapnd).fadeIn(200);
        });
        $('#menuWrapperExpandBack').click(function(){
            $('#menuWrapperExpand').hide();
            $('.menuWrapperExp').hide();
        });
    });
    function toggleMenu() {
        $("#MenuWrapper").toggleClass("open");
        if($("#MenuWrapper").hasClass("open")){
            $("#Menu")("<i class='fa-solid fa-x'></i>");
            farbaMenu = $("#Menu").css('color');
            $("#Menu").css('color','#000');
            $('#blurMenu').show();
        }
        else{
            $("#Menu")('<i class="fa-solid fa-bars"></i>');
            $("#Menu").css('color',farbaMenu);
            $('#blurMenu').hide();
        }
    }
    

        
    </script>
    <style>
        body{
            margin-top: 15vh;
      
        }
    </style>
<?php
$servername = "localhost";
$username = "Kderinger";
$password = "Cosinus123123";
$dbname = "missio321";

// Połączenie z bazą danych
$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Przechwycenie danych z formularza
$name = $_POST['name'];
$birthdate = $_POST['birthdate'];
$officer = $_POST['officer'];
$description = $_POST['description'];
$submission_date = date('Y-m-d H:i:s'); // Bieżąca data i czas

// Wstawienie danych do bazy
$sql = "INSERT INTO submissions (name, birthdate, officer, description, submission_date) VALUES ('$name', '$birthdate', '$officer', '$description', '$submission_date')";

if ($conn->query($sql) === TRUE) {
    echo "Formularz został wysłany pomyślnie!";
} else {
    echo "Błąd: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
</body>
</html>