
<?php 
    include "config.php";

    if(!isset($_SESSION["user_id"])) {
        echo "Musisz być zalogowany!";
        exit();
    }

    $user_id = $_SESSION["user_id"];
    $sql = $conn->prepare("SELECT * FROM reports WHERE user_id = ?");
    $sql->bind_param("i", $user_id);
    $sql->execute();
    $result = $sql->get_result();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moje zgłoszenia</title>
</head>
<body>
    <h2>Moje zgłoszenia</h2>

    (if $result-> num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h3>"
        }
    }
</body>
</html>
