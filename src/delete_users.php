<?php
    // Step 1. Get database connection
    require ('../config/database.php');

    // Step 2. get data o params
    $user_id = $_GET['userId'];
    
    // step 3. prepare query
    //$sql_delete_user = "delete from users where id = $user_id";

    $sql_delete_user = "delete from users where id = $user_id";
    
    // step 4. execute query
    $result=pg_query($conn_local, $sql_delete_user);
    
    if(!$result){
        die("ERROR:". pg_last_error());
    }else {
        echo "<script>alert('user has been deleted')</script>";
        header('refresh:0;url=list_users.php');
    }
?>