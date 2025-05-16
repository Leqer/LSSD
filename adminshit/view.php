<?php
session_start();

// Sprawdzenie, czy użytkownik jest zalogowany
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LSPD - Przegląd Pochwał</title>
    <meta name="description" content="LSPD - Przegląd Pochwał">
    <link rel="icon" type="image/x-icon" href="\LSPD_files/LSPD.webp">
    <link rel="stylesheet" href="\LSPD_files/global.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="\LSPD_files/style.css" type="text/css">
    <link rel="stylesheet" href="\LSPD_files/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/f83e61cd6c.js" crossorigin="anonymous"></script>
</head>
<body>
    <header id="header" style="border-bottom: 0;color:#fff;transition: all 0.3s;">
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
            <div style="color: rgb(255, 255, 255); cursor: pointer;" id="logInHref">
                <a href="logout.php" style="color: rgb(255, 255, 255);"><i class="fa-solid fa-user"></i></a>
            </div>
        </div>
    </header>
    
    <style>
        body {
            margin-top: 15vh;
        }
    </style>

    <h1>Przegląd Pochwał LSPD</h1>
    <table>
        <tr>
            <th>Imię i Nazwisko</th>
            <th>Data Urodzenia</th>
            <th>Funkcjonariusz</th>
            <th>Opis Pochwały</th>
            <th>Data Przesłania</th>
            <th>Akcja</th>
        </tr>
        <?php
        $servername = "localhost";
        $username = "Kderinger";
        $password = "Cosinus123123";
        $dbname = "missio321";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT id, name, birthdate, officer, description, submission_date FROM submissions";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['name']}</td>
                        <td>{$row['birthdate']}</td>
                        <td>{$row['officer']}</td>
                        <td>{$row['description']}</td>
                        <td>{$row['submission_date']}</td>
                        <td>
                            <form action='delete.php' method='POST' style='display:inline;'>
                                <input type='hidden' name='id' value='{$row['id']}'>
                                <button type='submit'>Usuń</button>
                            </form>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Brak danych do wyświetlenia.</td></tr>";
        }

        $conn->close();
        ?>
    </table>


    <h1>Przegląd Skarg LSPD</h1>
    <table>
        <tr>
            <th>Imię i Nazwisko</th>
            <th>Data Urodzenia</th>
            <th>Funkcjonariusz</th>
            <th>Opis Pochwały</th>
            <th>Data Przesłania</th>
            <th>Akcja</th>
        </tr>
        <?php
        $servername = "localhost";
        $username = "Kderinger";
        $password = "Cosinus123123";
        $dbname = "missio321";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT id, name, birthdate, officer, description, submission_date FROM submissions";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['name']}</td>
                        <td>{$row['birthdate']}</td>
                        <td>{$row['officer']}</td>
                        <td>{$row['description']}</td>
                        <td>{$row['submission_date']}</td>
                        <td>
                            <form action='delete.php' method='POST' style='display:inline;'>
                                <input type='hidden' name='id' value='{$row['id']}'>
                                <button type='submit'>Usuń</button>
                            </form>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Brak danych do wyświetlenia.</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
