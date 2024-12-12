<?php
// Kết nối tới cơ sở dữ liệu
require_once('connect.php');

// Kiểm tra xem form có được submit hay không
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $id = intval($_POST['id']);
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $gender = intval($_POST['gender']);
    $hometown = mysqli_real_escape_string($conn, $_POST['hometown']);
    $group = mysqli_real_escape_string($conn, $_POST['group']);
    $level = mysqli_real_escape_string($conn, $_POST['level']);

    // Tạo câu truy vấn UPDATE
    $sql = "UPDATE table_students 
            SET fullname = '$fullname', 
                dob = '$dob', 
                gender = $gender, 
                hometown = '$hometown', 
                group_ = '$group', 
                level_ = '$level' 
            WHERE id = $id";

    // Thực thi truy vấn
    if (mysqli_query($conn, $sql)) {
        // Cập nhật thành công, chuyển hướng về trang danh sách
        header('Location: ../giua_ky_utt.php?message=success');
    } else {
        // Cập nhật thất bại, hiển thị lỗi
        echo "Lỗi khi cập nhật: " . mysqli_error($conn);
    }

    // Đóng kết nối
    mysqli_close($conn);
} else {
    // Nếu truy cập trực tiếp, chuyển hướng về trang danh sách
    header('Location: ../giua_ky_utt.php');
    exit();
}
?>
