<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'qlsv_nguyenvanduong';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
    $conn = mysqli_connect($host, $user, $pass, $db);
    $conn->set_charset('utf8mb4');
} catch (Exception $e) {
    error_log($e->getMessage());
    die('Không thể kết nối đến cơ sở dữ liệu');
}
?>