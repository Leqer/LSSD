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

// Przechwycenie ID z formularza
$id = $_POST['id'];

// Usunięcie danych z bazy
$sql = "DELETE FROM submissions WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Formularz został usunięty!";
} else {
    echo "Błąd: " . $conn->error;
}

$conn->close();

// Przekierowanie z powrotem do widoku formularzy
header("Location: view.php");
exit();
?>

