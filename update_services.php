<?php
$conn = new mysqli("localhost", "root", "", "artur");
if ($conn->connect_error) {
    die("Ошибка: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Изменение</title>
    <meta charset="utf-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>
    <?php
    // если запрос GET
    if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
        $id = $conn->real_escape_string($_GET["id"]);
        $sql = "SELECT * FROM bus WHERE id = '$id'";
        if ($result = $conn->query($sql)) {
            if ($result->num_rows > 0) {
                foreach ($result as $row) {
                    $marka = $row["marka"];
                    $model = $row["model"];
                    $id_traili = $row["id_traili"];
                    $number = $row["number"];
                    $description = $row["description"];
                }
                echo "<div class='cintainer my-2 mx-2'><h3>Обновление пользователя</h3>
                <form method='post'>
                    <input type='hidden' name='id' value='$id' />
                    <p>Марка:
                    <input type='text' class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-default' name='marka' value='$marka' /></p>
                    <p>Модель:
                    <input type='text' class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-default' name='model' value='$model' /></p>
                    <p>id расписания
                    <input type='text' class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-default' name='id_traili' value='$id_traili' /></p>
                    <p>ГОС. Номер
                    <input type='text' class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-default' name='number' value='$number' /></p>
                    <p>Описание:
                    <input type='text' class='form-control' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-default' name='description' value='$description' /></p>
                    <input type='submit' class='btn btn-success' value='Сохранить'>
            </form></div>";
            } else {
                echo "<div>Услуга не найдена</div>";
            }
            $result->free();
        } else {
            echo "Ошибка: " . $conn->error;
        }
    } elseif (isset($_POST["id"]) && isset($_POST["marka"]) && isset($_POST["model"]) && isset($_POST["id_traili"]) && isset($_POST["number"]) && isset($_POST["description"])) {

        $id = $conn->real_escape_string($_POST["id"]);
        $marka = $conn->real_escape_string($_POST["marka"]);
        $model = $conn->real_escape_string($_POST["model"]);
        $id_traili = $conn->real_escape_string($_POST["id_traili"]);
        $number = $conn->real_escape_string($_POST["number"]);
        $description = $conn->real_escape_string($_POST["description"]);
        $sqls = "UPDATE bus SET marka = '$marka', model = '$model', id_traili = '$id_traili', number = '$number', description = '$description' WHERE id = '$id'";
        if ($result = $conn->query($sqls)) {

            header("Location: admin.php");
        } else {
            echo "Ошибка: " . $conn->error;
        }
    } else {
        echo "Некорректные данные";
    }
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>