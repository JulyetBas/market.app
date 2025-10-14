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
sql_users="
// ";
?>


<tr>
<td> Jesus</td>
<td>ksdlksd@gmail.com</td>
<td>12345567</td>
<td>32879382938</td>
<td> Active</td>

<td>
<a href="#"><img src= "image/serach.png"  width="20"></a>
<a href="#"> update</a>
<a href="#"> delete </a>

</td>

</tr>

</table>
</body>
</html>