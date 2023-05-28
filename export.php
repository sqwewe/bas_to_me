<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "artur");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM bus INNER join trail ON bus.id_traili = trail.id";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Идентификатор</th>  
                         <th>Марка</th>  
                         <th>Модель</th>
                         <th>Расписание</th>
                         <th>Маршрут</th>  
                         <th>Номер</th>  
                         <th>Описание</th>  
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["id"].'</td>  
                         <td>'.$row["marka"].'</td>  
                         <td>'.$row["model"].'</td>
                         <td>'.$row["halt"].'</td>
                         <td>'.$row["schedue"].'</td>  
                         <td>'.$row["number"].'</td>  
                         <td>'.$row["description"].'</td>  
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/.xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
