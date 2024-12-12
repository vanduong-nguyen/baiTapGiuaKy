<?php
require_once('connect.php');

// Kiểm tra kết nối cơ sở dữ liệu
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Lấy dữ liệu từ form
$fullname = isset($_POST['fullname']) ? trim($_POST['fullname']) : '';
$dob = isset($_POST['dob']) ? trim($_POST['dob']) : '';
$gender = isset($_POST['gender']) ? intval($_POST['gender']) : null;
$hometown = isset($_POST['hometown']) ? trim($_POST['hometown']) : '';
$group = isset($_POST['group']) ? intval($_POST['group']) : null;
$level = isset($_POST['level']) ? intval($_POST['level']) : null;

// Thực hiện thêm sinh viên
if (!empty($fullname) && !empty($dob) && $gender !== null && !empty($hometown) && $group !== null && $level !== null) {
    $sql = "INSERT INTO table_students (fullname, dob, gender, hometown, group_, level_) 
            VALUES ('$fullname', '$dob', $gender, '$hometown', $group, $level)";
    if (mysqli_query($conn, $sql)) {
        // Chuyển hướng về HTML với thông báo thành công
        header("Location: ../giua_ky_utt.php?status=success");
        exit;
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
} else {
    // Chuyển hướng về HTML với thông báo lỗi
    header("Location: ../giua_ky_utt.php?status=error");
    exit;
}
$sql_reset_ids = "SET @newid = 0; 
                      UPDATE table_students SET id = (@newid := @newid + 1) ORDER BY id ASC;";
// Đóng kết nối
mysqli_close($conn);
?>
