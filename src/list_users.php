<?php

    // Stemp 1. Get database connection
    require ('../config/database.php');
    
   // session_start();
//if(!isset($_SESSION('session_user_id'))){
//	header('refresh:0;url=error_403.html');
//}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketapp - List users</title>
 
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
     <div class="container">
    <table class="table">
   
        <tr>
<th> Fullname  </th>
<th>Email</th>
<th>Ide.number</th>
<th>Phone number</th>
<th> Status</th>
<th> foto</th>
<th> Options</th>

</tr>

<?php
$sql_users="
select u.id as user_id, 
u.firstname || ' ' || u.lastname as fullname, 
u.email, 
u.ide_number, 
u.mobile_number, 
case
 when u.status=true then 'Active'
else 'inactive' end as status, 
u.url_foto
from 
users u";
$result=pg_query($conn_local, $sql_users);
if(!$result){
    die("ERROR:". pg_last_error());
}
while ($row=pg_fetch_assoc($result)){
echo "<tr class='success'>
<td> " . $row['fullname'] . "</td>
<td>" . $row['email'] . "</td>
<td>" . $row['ide_number'] . "</td>
<td>" . $row['mobile_number'] . "</td>
<td>" . $row['status'] . "</td>
<td align='center'><img src=" . $row['url_foto'] . " width='30' ></td>

<td>
<a href='#'><img src= 'image/serach.png'  width='20'></a>
<a href='edit_user_form.php'><img src='image/checked.png' width='20'></a>

<a href='delete_users.php?userId=". $row['user_id']."'><img src='image/delete.png' width='20'></a>

</td>

</tr> ";

}
?>

</table>
</div>
</body>
</html>