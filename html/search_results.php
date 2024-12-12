<?php
require_once('php/connect.php');

$searchValue = isset($_GET['search']) ? strtolower(trim($_GET['search'])) : '';

// Kiểm tra giá trị tìm kiếm
if ($searchValue !== '') {
    $query = "SELECT * FROM table_students WHERE 
              LOWER(fullname) LIKE '%$searchValue%' 
              OR LOWER(hometown) LIKE '%$searchValue%'";
    $result = mysqli_query($conn, $query);
} else {
    $result = false;
}

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả tìm kiếm</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    <h1 class="text-center">Kết quả tìm kiếm</h1>
    <div class="container mt-5">
        <?php if ($result && mysqli_num_rows($result) > 0): ?>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Họ và tên</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Quê quán</th>
                        <th>Nhóm</th>
                        <th>Trình độ học vấn</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['fullname']; ?></td>
                            <td><?php echo $row['dob']; ?></td>
                            <td><?php echo ($row['gender'] == 0) ? 'Nam' : (($row['gender'] == 1) ? 'Nữ' : 'Gay'); ?></td>
                            <td><?php echo $row['hometown']; ?></td>
                            <td><?php echo $row['group_']; ?></td>
                            <td>
                                <?php switch ($row['level_']) {
                                    case 0: echo 'Tiến sĩ'; break;
                                    case 1: echo 'Thạc sĩ'; break;
                                    case 2: echo 'Kỹ sư'; break;
                                    case 3: echo 'Khác'; break;
                                }; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p style="text-align: center; color: red;">Không tìm thấy kết quả nào cho từ khóa: "<?php echo htmlspecialchars($searchValue); ?>"</p>
        <?php endif; ?>
    </div>
    <a href="giua_ky_utt.php" class="btn btn-primary" style="">Quay lại</a>
</body>
</html>