<?php
session_start();
if(!isset($_SESSION['session_user_id'])){
	header('refresh:0;url=error_403.html');
}

?>


<?php
echo "Welcome to main!!!";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketapp- home </title>
</head>
<body>
    <table border =0 align ="center">
    <tr>
    <td><b > User: </b>
    <?php echo $_SESSION['session_user_fullname']; ?>
</td>
    <td>
     <?php echo "<img src='"
     .$_SESSION['session_user_url_foto']."'width=30>";?>
   </td>
</tr>
</table>
    <a href ="list_users.php"> List all users </a>|
    <a href ="logout.php"> Logout </a>
</body>
</html>