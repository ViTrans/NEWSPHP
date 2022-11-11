
<?php




$con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($con->connect_errno) {
    exit();
}
$con->set_charset('utf8mb4')
?>


