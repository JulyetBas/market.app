<?php
require('../config/database.php');

$city_name = trim($_POST['name']);
$abbrer = trim($_POST['Abbrer']);
$code = trim($_POST['code']);
$region = intval($_POST['Region']);

// Step 2: Check if city already exists
$sql_check = "
    SELECT city_name 
    FROM cities 
    WHERE city_name = '$city_name'
    LIMIT 1
";
$res_check = pg_query($conn, $sql_check);

if (pg_num_rows($res_check) > 0) {
    echo "<script>alert('City already exists!');</script>";
    header('refresh:0;url=cities.html');
    exit;
} else {
    // Step 3: Insert new city
    $query = "
        INSERT INTO cities (
            city_name,
            abbrer,
            code,
            id_region
        ) VALUES (
            '$city_name',
            '$abbrer',
            '$code',
            '$region'
        )
    ";

    // Step 4: Execute insert
    $res = pg_query($conn, $query);

    // Step 5: Validate result
    if ($res) {
        echo "<script>alert('City registered successfully!');</script>";
        header('refresh:0;url=cities.html');
    } else {
        echo "<script>alert('Something went wrong!');</script>";
    }
}
?>