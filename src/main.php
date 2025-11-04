<?php
session_start();
if(!isset($_SESSION('session_user_id'))){
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
    <center><h6><b>User: </b>Here print your name </h6></center>
    <a href ="list_users.php"> List all users </a>|
    <a href ="logout.php"> Logout </a>



</body>
</html>