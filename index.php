<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
 <style>


.dance24{
  float:left;
  margin-top:2%;
 margin-left:2%;
  margin-right:2%;
  margin-bottom:8px;
  position:relative;
}


table, tr, td, th
{
    border: 1px solid black;
    border-collapse:collapse;
}
tr.header
{
    cursor:pointer;
}
td.header
{
    cursor:pointer;
}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<link href="style.css" rel="stylesheet" type="text/css" media="all"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">  
</head>
<body>


<?php

// 
  $mysqli = @new mysqli('localhost', 'mysql', 'mysql', 'test_rab');
  if (mysqli_connect_errno()) {
    echo "Подключение невозможно: ".mysqli_connect_error();
  }

if (isset($_GET['logout'])) {
    unset($_SESSION['index']);
}
 
if(!isset($_SESSION['index'])){

  if(!isset($_POST['login'])) {
   ?>
<div class="we1"> 

	<form method="post" action="zay" style="margin-top:3%;
margin-left:30%;
margin-right:40%;">
 <h3 style="margin-bottom: -1%;">Если вы клиент и хотите подать заявку: </h3>
  <div><button type="submit" name=""><a href="index4.php">Подать заявку</a></button> </div>
  </form>

  <form method="post" action="" style="margin-top:3%;
margin-left:30%;
margin-right:40%;">
<h3 style="margin-bottom: 1%;">Если вы менеджер - то авторизуйтесь: </h3>
  <div>Ваша фамилия: <input type="text" name="login" style="width: 170%;" /></div>
  <div>Ваш пароль: <input type="password" name="pass" style="width: 170%;"/></div>
  <div><button type="submit" name="loginbtn">Вход</button></div>
  </form>

   <?php
   
  } else {

    $login = $_POST['login'];
    $pass = $_POST['pass'];

        $result_set = $mysqli->query('SELECT * FROM managers WHERE surname="'.$login.'"');
        $row = mysqli_fetch_array($result_set);

   
      
       if($login==$row['surname'] and $pass==$row['password'] and $login !== '')
       {
        $is_admin = true;
       }
      
    // проверки тут

       if ($is_admin) {
      echo ("Вы залогинены ");
      $_SESSION['index'] = true;  
      $_SESSION['id']=$row['id'];
      $_SESSION['manager_name']=$row['name'];
      $_SESSION['manager_surname']=$row['surname'];
      echo ( $_SESSION['manager_name']);

      ?>

    <script>document.location.href="index.php"</script>
<?php
    }
if (isset($_GET['zay'])) 
{ 
}

     else {

      echo ("Вы ввели неверные данные");?>
  <script>document.location.href="index.php"</script> 

  <?php

    }

  }

exit;
} 
?></div>

<div class="we2">
<h1 align="center">Список заявок</h1>


<div class="dance3">

<div class="dance24">

<?php

  if ($_SESSION['manager_yes']==true) {

$result_set = $mysqli->query('SELECT id_zay, FIO, Address, email, phone, opis FROM zayava');  
?>
<h2> Доброго времени суток, <?php print_r($_SESSION['manager_name'].' '.$_SESSION['manager_surname']); ?></h2>
<input id="myInput" type="text" placeholder="Фильтр..">
<br><br>
<table border="0">
<tr> 
<td> <?php
?> ФИО клиента</td>
<td> Адрес клиента </td>
<td> Почта </td>
<td>Телефон </td>
<td>Описание заявки </td>
<td>Выбрать для редактирования заявку</td>
</tr>


<?php

while($row = mysqli_fetch_array($result_set)){

?>
<tbody id="myTable">  
<tr> <td> <?php print_r($row[FIO]);  ?> 
      </td> 
  <td> <option> <?php print_r($row[Address]); ?> </option>  
      </td>

      <td> <?php
             print_r(" ".$row[email]); 
 ?> 
     </td> 

 <td> <?php
             print_r($row[phone]);
 ?> 
      </td>
 <td> <?php
             print_r($row[opis]);
 ?> 
      </td>

      
      <td><a href="index3.php?id=<?php echo $row[id_zay]?>">Редактировать</a></td> 
       </tr> <?php
           
        $i++; } ?>   </tbody></table> <?php
        }

       ?>

   

<div><a href="index.php?logout"><h2>Выход</h2></a></div>
</div>
</div>
</div>
</body>
</html>