<?php
require('../config/database.php');

$country_name = trim($_POST['name']);
$abbrer_c = trim($_POST['Abbrer']);
$code_c = trim($_POST['code']);

// Step 2. Check if country already exists
$sql_check = "
    SELECT country_name 
    FROM countries 
    WHERE country_name = '$country_name'
    LIMIT 1
";
$res_check = pg_query($conn, $sql_check);

if (pg_num_rows($res_check) > 0) {
    echo "<script>alert('Country already exists!');</script>";
    header('refresh:0;url=countries.php');
    exit;
} else {
    // Step 3. Insert new country
    $query = "
        INSERT INTO countries (
            country_name,
            abbrer,
            code
        ) VALUES (
            '$country_name',
            '$abbrer_c',
            '$code_c'
        )
    ";

    // Step 4. Execute and validate
    $res = pg_query($conn, $query);

    if ($res) {
        echo "<script>alert('Country created successfully!');</script>";
        header('refresh:0;url=countries.html');
    } else {
        echo "<script>alert('Something went wrong!');</script>";
    }
}
?>
