<?php
session_start();
$servername = "localhost";
$username = "Kderinger";
$password = "Cosinus123123";
$dbname = "missio321";

// Utwórz połączenie
$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdź połączenie
if ($conn->connect_error) {
    die("Połączenie nieudane: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputUsername = $conn->real_escape_string($_POST['username']);
    $inputPassword = $conn->real_escape_string($_POST['password']);

    // Pobierz dane admina z bazy
    $sql = "SELECT * FROM admin WHERE username='$inputUsername' AND password='$inputPassword'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Ustaw sesję i przekierowanie do view.php
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $inputUsername;
        header("Location: \adminshit/view.php");
        exit();
    } else {
        $error = "Nieprawidłowe dane logowania.";
    }
}
?>

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
</head>

<style>

/* Global styles */
body {
    margin: 0;
    font-family: 'Arial', sans-serif;
    background: linear-gradient(to right, #001F3F, #0074D9);
    color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-size: cover;
    background-position: center;

    position: relative;
}

.container {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
    max-width: 400px;
    text-align: center;
}

/* Header styles */
h2 {
    font-size: 2.5rem;
    color: #FFD700;
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
    margin-bottom: 20px;
}

/* Form styles */
form {
    background: rgba(0, 0, 0, 0.7);
    border-radius: 10px;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
    padding: 2rem;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

form:hover {
    transform: scale(1.02);
}

/* Input styles */
input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 15px;
    margin: 10px 0;
    border: 2px solid #FFD700;
    border-radius: 5px;
    font-size: 1rem;
    transition: border 0.3s ease;
    background-color: rgba(255, 255, 255, 0.2);
    color: #fff;
}

input[type="text"]:focus,
input[type="password"]:focus {
    border: 2px solid #FF4136;
    outline: none;
}

/* Button styles */
button {
    background: linear-gradient(to right, #001F3F, #0074D9);
    color: #FFD700;
    padding: 15px;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
    cursor: pointer;
    transition: background 0.3s ease, transform 0.2s;
}

button:hover {
    background: linear-gradient(to right, #0074D9, #001F3F);
    transform: translateY(-2px);
}

/* Error message styles */
p {
    font-size: 0.9rem;
    margin-top: 10px;
    text-align: center;
}

/* Responsive styles */
@media (max-width: 600px) {
    h2 {
        font-size: 2rem;
    }

    form {
        padding: 1.5rem;
    }

    button {
        width: 100%;
    }
}

/* Animation */
@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

body {
    animation: fadeIn 1s ease-in;
}

/* Miscellaneous */
a {
    color: #FFD700;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

/* Custom scrollbar */
::-webkit-scrollbar {
    width: 12px;
}

::-webkit-scrollbar-thumb {
    background: #0074D9;
    border-radius: 10px;
}

::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.3);
}

/* Additional styles for buttons and links */
.button {
    display: inline-block;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    background-color: #4CAF50;
    color: white;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.button:hover {
    background-color: #45a049;
}

.link {
    color: #007BFF;
    text-decoration: none;
}

.link:hover {
    text-decoration: underline;
}

/* Shadow effects */
.shadow {
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
}

.glow {
    text-shadow: 0 0 20px rgba(255, 255, 255, 0.7);
}

/* Media Queries for various devices */
@media (max-width: 768px) {
    h2 {
        font-size: 2.2rem;
    }
    
    form {
        padding: 1.5rem;
    }
}

@media (max-width: 480px) {
    h2 {
        font-size: 1.8rem;
    }
    
    form {
        width: 90%;
    }
    
    input[type="text"],
    input[type="password"] {
        padding: 12px;
    }

    button {
        padding: 12px;
    }
}

/* Styles for additional components */
.card {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

.card-header {
    font-size: 1.5rem;
    margin-bottom: 10px;
    color: #333;
}

.card-body {
    font-size: 1rem;
    color: #555;
}

/* Footer styles */
footer {
    background: rgba(0, 0, 0, 0.7);
    color: #fff;
    padding: 20px;
    text-align: center;
}

/* Additional decorative elements */
.star {
    color: #FFD700;
    font-size: 30px;
}

.blink {
    animation: blink 1s infinite;
}

@keyframes blink {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: 0.5;
    }
}

/* Enhanced button styles */
button:active {
    transform: scale(0.98);
}

/* Advanced form styles */
input::placeholder {
    color: rgba(255, 255, 255, 0.5);
}

/* Animation for form elements */
input {
    transition: background-color 0.3s ease, color 0.3s ease;
}

input:hover {
    background-color: rgba(255, 255, 255, 0.3);
}

/* Create a badge image effect */
.badge {
    width: 100px;
    margin: 20px auto;
    display: block;
}

/* Header styling */
.header {
    font-size: 2.5rem;
    color: #FFD700;
    text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.8);
    margin-bottom: 20px;
}

/* Card styles for additional information */
.info-card {
    background: rgba(0, 0, 0, 0.5);
    border-radius: 10px;
    padding: 15px;
    margin-top: 20px;
}

/* Transition for smoother effects */
* {
    box-sizing: border-box;
    transition: all 0.2s ease-in-out;
}

/* Responsive adjustments for smaller screens */
@media (max-width: 768px) {
    .info-card {
        padding: 10px;
    }

    .badge {
        width: 80px;
    }
}

/* Footer enhancements */
footer {
    position: relative;
    padding: 20px;
    text-align: center;
    font-size: 0.8rem;
}

/* Additional spacing and padding */
.padding-small {
    padding: 5px;
}

.padding-medium {
    padding: 10px;
}

.margin-small {
    margin: 5px;
}

.margin-medium {
    margin: 10px;
}

/* Tooltip styles for additional features */
.tooltip {
    position: relative;
    display: inline-block;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 5px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%; /* Position above the tooltip */
    left: 50%;
    margin-left: -60px; /* Center the tooltip */
    opacity: 0;
    transition: opacity 0.3s;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
}

/* Style for animated elements */
.animated {
    animation: bounce 2s infinite;
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
    }
    40% {
        transform: translateY(-15px);
    }
    60% {
        transform: translateY(-10px);
    }
}

/* Final touches for polished look */
.container {
    padding: 20px;
    border-radius: 10px;
    background: rgba(0, 0, 0, 0.6);
    box-shadow: 0 0 25px rgba(0, 0, 0, 0.5);
}



</style>

<body>
    <!-- <h2>Logowanie</h2> -->
    <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
    <form method="POST" action="">
        <div>
            <label for="username">Nazwa użytkownika:</label>
            <input type="text" name="username" required>
        </div>
        <div>
            <label for="password">Hasło:</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit">Zaloguj się</button>
    </form>
</body>
</html>
