<?php

    // Stemp 1. Get database connection
    require ('../config/database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketapp - List users</title>
</head>
<body>
    <table border="1" align="center">
        <tr>
<th> Fullname  </th>
<th>Email</th>
<th>Ide.number</th>
<th>Phone number</th>
<th> Status</th>
<th> Options</th>

</tr>

<?php
$sql_users="
select u.firstname || ' ' || u.lastname as fullname, u.email, u.ide_number, u.mobile_number, case when u.status=true then 'Active'
else 'inactive' end as status
from 
users u";
$result=pg_query($conn_local, $sql_users);
if(!$result){
    die("ERROR:". pg_last_error());
}
while ($row=pg_fetch_assoc($result)){
echo "<tr>
<td> " . $row['fullname'] . "</td>
<td>" . $row['email'] . "</td>
<td>" . $row['ide_number'] . "</td>
<td>" . $row['mobile_number'] . "</td>
<td>" . $row['status'] . "</td>

<td>
<a href='#'><img src= 'image/serach.png'  width='20'></a>
<a href='#'> update</a>
<a href='#'> delete </a>

</td>

</tr> ";

}
?>

</table>
</body>
</html>