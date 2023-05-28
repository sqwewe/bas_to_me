<?php
if (isset($_POST["marka"]) && isset($_POST["model"]) && isset($_POST["id_traili"]) && isset($_POST["number"]) && isset($_POST["description"])) {

    $conn = new mysqli("localhost", "root", "", "artur");
    if ($conn->connect_error) {
        die("Ошибка: " . $conn->connect_error);
    }
    $marka = $conn->real_escape_string($_POST["marka"]);
    $model = $conn->real_escape_string($_POST["model"]);
    $id_traili = $conn->real_escape_string($_POST["id_traili"]);
    $number = $conn->real_escape_string($_POST["number"]);
    $description = $conn->real_escape_string($_POST["description"]);
    $sql = "INSERT INTO bus (marka, model, id_traili, number, description) VALUES ('$marka', '$model', '$id_traili', '$number', '$description')";
    if ($conn->query($sql)) {
        header('Location: admin.php');
    } else {
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();
}
