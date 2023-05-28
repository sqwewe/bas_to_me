<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Маршруты автобусов Клиент</title>
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

            <h4>Расписание автобусов</h4>
            <h5>
                |БАСтуМИ|
            </h5>
            <form class="d-flex">
              
                <button class="btn btn-outline-success" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Оставить заявку</button>

            </form>

            <!-- Это окно заявки -->
            <!-- Modal blank -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <form action="create.php" method="post">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Заявка</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Ваш Телефон:
                                    <input type="text" name="phone" />
                                </p>
                                <p>Дата и время заявки:
                                    <input type="text" name="date" readonly value="<?php echo date("d.m.y H:i"); ?>">

                                </p>

                            </div>
                            <p>После, вам позвонят для уточнения</p>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                <input type="submit" class="btn btn-primary" value="Добавить">
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <!-- Это три окна таблиц  -->





        </div>
    </nav>


     <!-- Это карусель фотографий -->
            <div class="col">
                <div class="container my-3 ">
                    <div id="carouselExampleInterval" class="carousel slide " data-bs-ride="carousel">
                        <div class="carousel-inner rounded-5">
                            <div class="carousel-item active" data-bs-interval="10000">
                                <img src="1.jpg" class="d-block w-100">
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="2.jpg" class="d-block w-100">
                            </div>
                            <div class="carousel-item">
                                <img src="3.jpg" class="d-block w-100"  >
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Назад</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Далее</span>
                        </button>
                    </div>
                </div>
            </div> 
    <!-- Это кароче мясо -->
    <div class="container text-left my-3">
        <div class="row">
            <div class="col">
                <h3>Автобусы ходят не по расписанию или не останавливаются на остановках? Вы можете оставить заявку на сайте, написать на эл. почту или позвонить на горячую линию в поддержку</h3>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Номер 1
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">+79326549878</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Номер 2
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">+79623567898</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Электронная почта
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">bustu@mi.ru</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="mx-2">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalMaster">
                        мастера
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalServices">
                        услуги
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalBlanks">
                        заказы
                    </button>
                </div> -->




            <h3 class="my-3">Расписание автобусов</h3>
            <?php
            $sqlm = "SELECT * FROM bus INNER join trail ON bus.id_traili = trail.id;";
            if ($result = $link->query($sqlm)) {
                $rowsCount = $result->num_rows; // количество полученных строк
                // echo "<p>Получено объектов: $rowsCount</p>";
            ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Марка</th>
                            <th scope="col">Модель</th>
                            <th scope="col">Расписание</th>
                            <th scope="col">Маршрут</th>
                            <th scope="col">Номер</th>
                            <th scope="col">Описание автобуса</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($result as $row) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["marka"] . "</td>";
                        echo "<td>" . $row["model"] . "</td>";
                        echo "<td>" . $row["halt"] . "</td>";
                        echo "<td>" . $row["schedue"] . "</td>";
                        echo "<td>" . $row["number"] . "</td>";
                        echo "<td>" . $row["description"] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    $result->free();
                } else {
                    echo "Ошибка: " . $link->error;
                }
                    ?>
                    </tbody>
                </table>
                <!-- Ну это кнопки отчётов -->
                <div class="gap-2 my-5" my-5>
                    <h3 class="text-start">Вы можете скачать отчёт по нашим автобусам</h3>



                    <form method="post" action="export.php">
                        <input type="submit" name="export" class="btn btn-danger" value="Скачать" />
                    </form>
                    <!-- <form method="post" action="export_master.php">
                    <input type="submit" name="export" class="btn btn-danger" value="Наши Мастера" />
                </form>
                <form method="post" action="export_services.php">
                    <input type="submit" name="export" class="btn btn-danger" value="Наши Услуги" />
                </form> -->

                </div>
        </div>
    </div>

    <!-- Нижней булки нет -->


   













</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>