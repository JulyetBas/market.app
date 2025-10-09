<?php

// Stemp 1. Get database connection
require ('../config/database.php');
// Stemp 2. Get form-data
$e_mail =trim($_POST['email']);
$p_wd =trim($_POST['passwd']);
//Stemp 3. Query to validate data
//$enc_pass = password_hash($p_wd,PASSWORD_DEFAULT);
$end_pass=md5($p_wd);
$sql_check_user ="
select 
	u.email, u.password
	from 
	users u
	where 
	u.email ='$e_mail' and 
	u.password ='$end_pass'
	limit 1
";
//Stemp 4.  Execute query
$res_check= pg_query($conn_sup, $sql_check_user);
if(pg_num_rows($res_check)>0){
    //echo"User exists. Go to main page!!!";
header('refresh:0;url=main.php');
}else{
    echo"Verify data";
}
    