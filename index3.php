<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head> 
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
 <style>
table, tr, td, th
{
    border: 1px solid black;
    border-collapse:collapse;
}


</style>
  

<link href="style.css" rel="stylesheet" type="text/css" media="all"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">  
</head>
<body>
<?php
$mysqli = @new mysqli('localhost', 'mysql', 'mysql', 'test_rab'); 
$id = $_GET['id'];?>


<form action="?id=<?php echo $_GET['id']?>&ti" method="post" enctype="multipart/form-data" style="margin-top:3%;
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
if (isset($_GET['id']) && isset($_GET['ti'])) 
{ 

    $ty2=$_GET['id'];
    $new_FIO = $_POST['FIO']; 
    $new_email = $_POST['email']; 
    $new_phone = $_POST['phone']; 
    $new_opis = $_POST['opis']; 


$result_set = $mysqli->query("UPDATE `zayava` SET FIO='{$new_FIO}', email='{$new_email}', phone='{$new_phone}', opis='{$new_opis}' WHERE id_zay='{$ty2}'");

 }
?>

<div><a href="index.php"><h2>Вернуться к списку заявок</h2></a></div>
<div><a href="index.php?logout"><h2>Выход</h2></a></div>
</body>
</html>