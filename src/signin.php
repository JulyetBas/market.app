<?php

// Stemp 1. Get database connection
require ('../config/database.php');
// Stemp 2. Get form-data
$e_mail =$_POST['email'];
$p_wd =$_POST['passwd'];
//Stemp 3. Query to validate data
$sql_check_user ="
select 
	u.email, u.password
	from 
	users u
	where 
	u.email ='$e_mail' and 
	u.password ='$p_wd'
	limit 1
";
//Stemp 4.  Execute query
$res_check= pg_query($conn, $sql_check_user);
if(pg_num_rows($res_check)>0){
    echo"User exists. Go to main page!!!";
}else{
    echo"Verify data";
}
    