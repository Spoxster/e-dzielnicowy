<?php
include "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casino - login</title>
    <link rel="stylesheet" href="login_style.css">
</head>
<body>
    <div id="container">
        <form method="POST">
            <input type="text" name="login" id="login" placeholder="Login:">
            <input type="password" name="password" id="password" placeholder="Haslo:">
            <input type="submit" id="loginBtn" value="Zaloguj sie">
        </form>

        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $login = $_POST["login"];
            $password = $_POST["password"];

            $sql = "SELECT * FROM users WHERE username = '$login'";
            $result = $conn->query($sql);

            if($result->num_rows > 0) {
                $user = $result->fetch_assoc();

                if(password_verify($password, $user["password"])) {
                    $_SESSION["user_id"] = $user["id"];
                    header("Location: index.php");
                    exit();
                } else {
                    $error = "Nieprawidłowe hasło";
                }
            } else {
                $error = "Użytkownik nie istnieje";aaa
            }
        }

        if (isset($error)) {
            echo "<p>$error</p>";
        }
        ?>
    </div>
</body>
</html>