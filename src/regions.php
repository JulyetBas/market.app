<?php
require('../config/database.php');

// Step 1. Get form data
$region_name = trim($_POST['name']);
$abbrer_r = trim($_POST['Abbrer']);
$code_r = trim($_POST['code']);
$country_id = intval($_POST['country']);

// Step 2. Check if region already exists
$sql_check = "
    SELECT region_name 
    FROM regions 
    WHERE region_name = '$region_name'
    LIMIT 1
";
$res_check = pg_query($conn, $sql_check);

if (pg_num_rows($res_check) > 0) {
    echo "<script>alert('Region already exists!');</script>";
    header('refresh:0;url=regions.php');
    exit;
} else {
    // Step 3. Insert new region
    $query = "
        INSERT INTO regions (
            region_name,
            abbrer,
            code,
            id_country
        ) VALUES (
            '$region_name',
            '$abbrer_r',
            '$code_r',
            '$country_id'
        )
    ";

    // Step 4. Execute and validate
    $res = pg_query($conn, $query);

    if ($res) {
        echo "<script>alert('Region created successfully!');</script>";
        header('refresh:0;url=regions.html');
    } else {
        echo "<script>alert('Something went wrong!');</script>";
    }
}
?>
