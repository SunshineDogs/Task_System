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

<link href="style.css" rel="stylesheet" type="text/css" media="all"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">  
</head>
<body>

<h2> Доброго времени суток,здесь вы можете добавить заявку</h2>
<form action="?ti" method="post" enctype="multipart/form-data" style="margin-top:3%;
margin-left:40%;
margin-right:40%;">
      
    <table>

<tr>
<td><input type="hidden" name="id"></td>
</tr>

<tr>
<td>ФИО клиента:</td>
<td><input type="text" name="FIO"></td>
</tr>

<tr>
<td>Адрес:</td>
<td><input type="text" name="address"></td>
</tr>

<tr>
<td>Почта клиента:</td>
<td><input type="text" name="email"></td>
</tr>

<tr>
<td>Телефон клиента:</td>
<td><input type="text" name="phone"></td>
</tr>

<tr>
<td>Описание заявки:</td>
<td><input type="text" name="opis"></td>
</tr>

</table>
<button>Изменить</button>

      </form>


<?php
if (isset($_GET['ti'])) 
{ 
    $new_FIO = $_POST['FIO']; 
    $new_email = $_POST['email']; 
    $new_address = $_POST['address']; 
    $new_phone = $_POST['phone']; 
    $new_opis = $_POST['opis']; 

$mysqli = @new mysqli('localhost', 'mysql', 'mysql', 'test_rab'); 
$result_set = $mysqli->query("INSERT INTO `zayava` VALUES (NULL,'$new_FIO','$new_email','$new_address','$new_phone','$new_opis')");

 }
?>


   

<div><a href="index.php"><h2>Выход</h2></a></div>

</body>
</html>