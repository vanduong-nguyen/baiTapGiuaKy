<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'qlsv_nguyenvanduong';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
    $conn = mysqli_connect($host, $user, $pass, $db);
    $conn->set_charset('utf8mb4');


    $sql = "SET @newid = 0; UPDATE table_students SET id = (@newid := @newid + 1) ORDER BY id ASC;";
    if ($conn->multi_query($sql)) {
        // Xử lý tất cả truy vấn (kể cả khi không có kết quả)
        do {
            // Nếu có kết quả trả về, giải phóng bộ nhớ
            if ($result = $conn->store_result()) {
                $result->free();
            }
        } while ($conn->more_results() && $conn->next_result());

//        echo "Cập nhật ID thành công!";
    } else {
        echo "Lỗi: " . $conn->error;
    }

} catch (Exception $e) {
    error_log($e->getMessage());
    die('Không thể kết nối đến cơ sở dữ liệu');
}
?>