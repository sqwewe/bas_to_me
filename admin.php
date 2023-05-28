<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>БАСтуМИ Администратор</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<?php
$host = 'localhost';  // Хост, у нас все локально
$user = 'root';    // Имя созданного вами пользователя
$pass = ''; // Установленный вами пароль пользователю
$db_name = 'artur';   // Имя базы данных
$link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой

// Ругаемся, если соединение установить не удалось
if (!$link) {
    echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
    exit;
}
?>

<body>
    <!-- Это кароче верхняя булка -->
    <nav class="navbar bg-light">
        <div class="container-fluid">

            <h4>Администратор</h4>
            <h5>
                |БАСтуМИ|
            </h5>
        </div>
    </nav>


    <div class="container my-2">
        <h3 class="my-2">Заявка</h3>
        <?php
        $sql = "SELECT * FROM blank";
        if ($result = $link->query($sql)) {
            echo "<table class='table table-striped'>
            <thead>
                <tr>
                    <th scope='col'>#</th>
                    <th scope='col'>Телефон клиента</th>
                    <th scope='col'>Дата</th>
                    <th scope='col'>Управление</th>
                </tr>
            </thead>
            <tbody>";
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["number"] . "</td>";
                echo "<td>" . $row["date_time_blank"] . "</td>";
                echo "<td scope='col'>
                <form action='delete_blank.php' method='post'>
                    <input type='hidden' name='id' value='" . $row["id"] . "' />
                    <input type='submit' class='btn btn-success mx-2 my-1' value='Отзвонились'>
                </form>
            </td>";
                echo "</tr>";
            }
            echo "
        </table>";
            $result->free();
        } else {
            echo "Ошибка: " . $conn->error;
        }
        ?>

        </tbody>
        </table>
    </div>

    <div class="container my-5">
        <h3 class="my-2">Автобус</h3>
        <?php
        $sql = "SELECT * FROM bus";
        if ($result = $link->query($sql)) {
            echo "<table class='table table-striped'>
        <thead>
            <tr>
                <th scope='col'>#</th>
                <th scope='col'>Марка</th>
                <th scope='col'>Модель</th>
                <th scope='col'>id расписания</th>
                <th scope='col'>Гос. номер</th>
                <th scope='col'>Описание</th>
            </tr>
        </thead>
        <tbody>";
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["marka"] . "</td>";
                echo "<td>" . $row["model"] . "</td>";
                echo "<td>" . $row["id_traili"] . "</td>";
                echo "<td>" . $row["number"] . "</td>";
                echo "<td>" . $row["description"] . "</td>";
                echo "<td scope='col'>
                <a class='btn btn-primary' href='update_services.php?id=" . $row["id"] . "'>Изменить</a>
                <form action='delete_services.php' method='post'>
                    <input type='hidden' name='id' value='" . $row["id"] . "' />
                    <input type='submit' class='btn btn-danger mx-2 my-1' value='Удалить'>
                </form>
            </td>";
                echo "</tr>";
            }
            echo "
        </table>";
            $result->free();
        } else {
            echo "Ошибка: " . $conn->error;
        }
        ?>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalAddServices">
            Добавить
        </button>
    </div>

    <!-- Modal добаавления автобуса -->
    <div class="modal fade" id="exampleModalAddServices" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelAddS" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabelAddS">Добавление автобуса</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="create_services.php" method="post">

                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">марка</span>
                            <input type="text" class="form-control" aria-label="marka" aria-describedby="basic-addon1" name="marka">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon2">модель</span>
                            <input type="text" class="form-control" aria-label="model" aria-describedby="basic-addon2" name="model">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">id расписания</span>
                            <input type="text" class="form-control" aria-label="id_traili" aria-describedby="basic-addon3" name="id_traili">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon4">Гос. номер</span>
                            <input type="text" class="form-control" aria-label="number" aria-describedby="basic-addon4" name="number">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon4">Описание</span>
                            <input type="text" class="form-control" aria-label="description" aria-describedby="basic-addon4" name="description">
                        </div>




                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>





    <!-- таблица мастеров -->
    <div class="container my-5">
    <h3 class="my-2">Расписание и маршруты</h3>

        <?php
        $sql = "SELECT * FROM trail";
        if ($result = $link->query($sql)) {
            echo "<table class='table table-striped'>
    <thead>
        <tr>
            <th scope='col'>#</th>
            <th scope='col'>Маршрут</th>
            <th scope='col'>Расписание</th>
        </tr>
    </thead>
    <tbody>";
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["halt"] . "</td>";
                echo "<td>" . $row["schedue"] . "</td>";
                echo "<td>
                <form action='delete_masters.php' method='post'>
                    <input type='hidden' name='id' value='" . $row["id"] . "' />
                    <input type='submit' class='btn btn-danger' value='Удалить'>
                </form>
            </td>";
                echo "</tr>";
            }
            echo "
    </table>";
            $result->free();
        } else {
            echo "Ошибка: " . $conn->error;
        }

        ?>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalAddMasters">
            Добавить
        </button>
    </div>



    <!-- Modal добаавления местеров -->
    <div class="modal fade" id="exampleModalAddMasters" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelAddM" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabelAddM">Добавление мастера</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="create_masters.php" method="post">

                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Маршрут</span>
                            <textarea type="text" class="form-control" aria-label="halt" aria-describedby="basic-addon1" name="halt"></textarea>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon2">Расписание</span>
                            <textarea type="text" class="form-control" aria-label="schedue" aria-describedby="basic-addon2" name="schedue"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>