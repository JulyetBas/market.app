<?php

    // database connection supabase
    $supa_host ="aws-1-us-east-1.pooler.supabase.com";
    $supa_user = "postgres.crhwyntediawikcshtcw";
    $supa_password = "UNICESMAG@@";
    $supa_dbname ="postgres";
    $supa_port = "6543";

    //database connection to local server
    $local_host ="localhost";//127.0.0.1
    $local_user = "postgres";
    $local_password = "unicesmag";
    $local_dbname ="marketapp";
    $local_port = "5432";

    $supa_data_connection ="
    host=$supa_host
    user=$supa_user
    password=$supa_password
    dbname=$supa_dbname
    port=$supa_port";

    $conn_supa = pg_connect($supa_data_connection);
    if(!$conn_supa){
        echo "Error",preg_last_error();
        
    }else{
        echo "Connection sucessfully :::";
    }

?>