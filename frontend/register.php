<?php
include "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["user_name"];
    $password = password_hash($_POST["user_password"], PASSWORD_DEFAULT);

    // pobranie IP użytkownika
    $ip = $_SERVER['REMOTE_ADDR'];

    // przygotowane zapytanie
    $stmt = $conn->prepare("INSERT INTO Users (username, password, ip_address) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $ip);

    if($stmt->execute()){
        header("Location: index.php");
        exit();
    } else {
        echo "Błąd: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>eDzielnicowy - Rejestracja</title>
</head>
<body>

<h2>Rejestracja</h2>

<form method="post">
    <input type="text" name="user_name" placeholder="Login" required><br><br>
    <input type="password" name="user_password" placeholder="Hasło" required><br><br>
    <button type="submit">Zarejestruj</button>
</form>

<a href="login.php">Masz konto? Zaloguj się</a>

</body>
</html>