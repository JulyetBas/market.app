<?php

// Stemp 1. Get database connection
require ('../config/database.php');

// star or create session 
session_start();
if(!isset($_SESSION('session_user_id'))){
	header('refresh:0;url=main.php');
}




// Stemp 2. Get form-data
$e_mail =trim($_POST['email']);
$p_wd =trim($_POST['passwd']);
//Stemp 3. Query to validate data
//$enc_pass = password_hash($p_wd,PASSWORD_DEFAULT);
$end_pass=md5($p_wd);
$sql_check_user ="
select 
    u.id,
	u.firstname || '' || u.lastname as fullname,
	u.email, u.password
	from 
	users u
	where 
	u.email ='$e_mail' and 
	u.password ='$end_pass'
	limit 1
";
//Stemp 4.  Execute query
$res_check= pg_query($conn_local, $sql_check_user);
$row=pg_fetch_assoc($res_check);
$_SESSION('session_user_id')=$row ('id');
$_SESSION('session_user_fullname')=$row ('fullname');
if(pg_num_rows($res_check)>0){
    //echo"User exists. Go to main page!!!";
header('refresh:0;url=main.php');
}else{
    echo"Verify data";
}
    