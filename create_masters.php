<?php
if (isset($_POST["halt"]) && isset($_POST["schedue"])) {

    $conn = new mysqli("localhost", "root", "", "artur");
    if ($conn->connect_error) {
        die("Ошибка: " . $conn->connect_error);
    }
    $halt = $conn->real_escape_string($_POST["halt"]);
    $schedue = $conn->real_escape_string($_POST["schedue"]);
    $sql = "INSERT INTO trail (halt, schedue) VALUES ('$halt', '$schedue')";
    if ($conn->query($sql)) {
        header('Location: admin.php');
    } else {
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();
}
