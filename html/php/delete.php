<?php
// Kết nối tới cơ sở dữ liệu
require_once('connect.php');

// Kiểm tra xem form có được submit không
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy ID từ form
    $id = intval($_POST['id']);

    // Kiểm tra ID hợp lệ
    if ($id > 0) {
        // Tạo câu truy vấn DELETE
        $sql = "DELETE FROM table_students WHERE id = $id";
        $new = "SET @newid = 0;";
        $sql_reset_ids = "UPDATE table_students SET id = (@newid := @newid + 1) ORDER BY id ASC;";
        // Thực thi truy vấn
        if (mysqli_query($conn, $sql)) {
            // Xóa thành công, chuyển hướng về trang chính
            header('Location: ../giua_ky_utt.php?status=delete_success');
        } else {
            // Lỗi khi xóa
            header('Location: ../giua_ky_utt.php?status=delete_error');
        }
    } else {
        // ID không hợp lệ
        header('Location: ../giua_ky_utt.php?status=invalid_id');
    }

    // Đóng kết nối
    mysqli_close($conn);
} else {
    // Truy cập trực tiếp, chuyển hướng về trang chính
    header('Location: ../giua_ky_utt.php');
    exit();
}
?>
