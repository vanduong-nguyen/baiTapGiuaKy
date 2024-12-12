<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QLSV</title>
  <link rel="stylesheet" href="../css/giua_ky_utt.css">
</head>
<body>


  

<!-- add-sv form -->
  <div id="add-sv-form" style="display: none;">
    <div class="add-sv-container">
        <h2>Thêm sinh viên</h2>
        <form action="php/main.php" method="post">
            <div class="form-group">
                <label for="fullname">Họ và tên</label>
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Họ và tên" required>
            </div>

            <div class="form-group">
                <label for="dob">Ngày sinh</label>
                <input type="date" class="form-control" id="dob" name="dob" required>
            </div>

            <div class="form-group">
              <label for="gender">Giới tính</label>
              <select class="form-control" id="gender" name="gender" required>
                  <option value="">-- Chọn giới tính --</option>
                  <option value="0">Nam</option>
                  <option value="1">Nữ</option>
              </select>
            </div>


            <div class="form-group">
              <label for="fullname">Quê Quán</label>
              <input type="text" class="form-control" id="hometown" name="hometown" placeholder="Quê Quán" required>
            </div>

            <div class="form-group">
              <label for="group">Nhóm</label>
              <select class="form-control" id="group" name="group" required>
                  <option value="">-- Chọn nhóm --</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
              </select>
          </div>

          <div class="form-group">
            <label for="level">Trình độ học vấn</label>
            <select class="form-control" id="level" name="level" required>
                <option value="">-- Trình độ học vấn --</option>
                <option value="0">Tiến sĩ</option>
                <option value="1">Thạc sĩ</option>
                <option value="2">Kỹ sư</option>
                <option value="3">Khác</option>
            </select>
        </div>


            <button type="submit">Thêm sinh viên</button>
        </form>
        <button id="close-add-sv-form">Đóng</button>
    </div>
  </div>

<!-- --------------- -->

<!-- edit-form -->

<div id="edit-form" class="edit-form" style="display: none;">
    <div class="edit-form-container">
        <h2>Chỉnh sửa thông tin sinh viên</h2>
        <form action="php/edit_db.php" method="POST">
            <input type="hidden" name="id" id="edit-id">
            <label for="edit-fullname">Họ và tên:</label>
            <input type="text" id="edit-fullname" name="fullname" required>

            <br><label for="edit-dob">Ngày sinh:</label>
            <input type="date" id="edit-dob" name="dob" required>

            <br><label for="edit-gender">Giới tính:</label>
            <select id="edit-gender" name="gender" required>
                <option value="0">Nam</option>
                <option value="1">Nữ</option>
            </select>

            <br><label for="edit-hometown">Quê quán:</label>
            <input type="text" id="edit-hometown" name="hometown" required>

            <br>
            <label for="edit-group">Nhóm:</label>
            <select id="edit-group" name="group" required>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <!-- Thêm các giá trị khác -->
            </select>

            <br>
            <label for="edit-level">Trình độ học vấn:</label>
            <select id="edit-level" name="level" required>
                <option value="">-- Trình độ học vấn --</option>
                <option value="0">Tiến sĩ</option>
                <option value="1">Thạc sĩ</option>
                <option value="2">Kỹ sư</option>
                <option value="3">Khác</option>
            </select>


            <button type="submit" class="btn btn-success">Lưu thay đổi</button>
            <button type="button" class="btn btn-secondary" onclick="closeEditForm()">Hủy</button>
        </form>
    </div>
</div>


<!-- --------------- -->

<!-- confirm-delete -->
<div id="confirm-delete" class="modal" style="display: none;">
    <div class="modal-content">
        <h4>Xác nhận xóa</h4>
        <p>Bạn có chắc chắn muốn xóa sinh viên này không?</p>
        <form id="delete-form" action="php/delete.php" method="POST">
            <input type="hidden" name="id" id="delete-id">
            <button type="submit" class="btn btn-danger">Xóa</button>
            <button type="button" class="btn btn-secondary" onclick="closeConfirm()">Hủy</button>
        </form>
    </div>
</div>

<!-- ---------------------------- -->
<h1 align="center" >DANH SÁCH SINH VIÊN</h1>



<div class="QLSV-table-container container mt-5">
    <!-- search-container -->
<div class="search-container ">
    <input type="text" id="search-input" class="form-control" placeholder="Nhập sinh viên cần tìm kiếm">
    <button class="btn btn-primary" id="search-button"><i class="bi bi-search"></i></button>
</div>
<!-- ----------------- -->
    <table class="table table-hover table-bordered table-md" >
        <thead >
<!--            <tr style="border: none;">-->
<!--                <th colspan="8" >-->
<!--                    <div class="search-container ">-->
<!--                        <input type="text" id="search-input" class="form-control" placeholder="Nhập sinh viên cần tìm kiếm">-->
<!--                        <button class="btn btn-primary" id="search-button"><i class="bi bi-search"></i></button>-->
<!--                    </div>-->
<!--                </th>-->
<!--            </tr>-->
            <tr class="table-primary">
                <th>ID</th>
                <th>Họ và tên</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Quê quán</th>
                <th>Nhóm</th>
                <th>Trình độ học vấn</th>
                <th>Tuỳ chỉnh</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once('php/connect.php');
            $result = mysqli_query($conn, "SELECT * FROM table_students");

            // Hiển thị danh sách sinh viên nếu có
            if (mysqli_num_rows($result) > 0): 
                while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr data-id="<?php echo $row['id']; ?>">
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['fullname']; ?></td>
                        <td><?php echo $row['dob']; ?></td>
                        <td>
                            <?php
                                switch ($row['gender']) { 
                                    case 0: 
                                        echo 'Nam'; 
                                        break; 
                                    case 1: 
                                        echo 'Nữ'; 
                                        break;

                            }
                            ?>
                        </td>

                        <td class="col-hometown"><?php echo $row['hometown']; ?></td>
                        <td class="col-group"><?php echo $row['group_']; ?></td>
                        <td class="col-level"><?php switch ($row['level_']) {
                            case 0: echo 'Tiến sĩ'; break;
                            case 1: echo 'Thạc sĩ'; break;
                            case 2: echo 'Kỹ sư'; break;
                            case 3: echo 'Khác'; break;
                        }; ?></td>
                        <td>
                            <button class="btn btn-warning btn-sm" onclick="editStudent(<?php echo $row['id']; ?>)">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm" onclick="showConfirm(<?php echo $row['id']; ?>)">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>

                    </tr>
                <?php endwhile; 
            else: ?>
                <tr>
                    <td colspan="8" style="text-align: center; color: red; font-weight: bold;">
                        CHƯA CÓ SINH VIÊN NÀO ĐƯỢC THÊM<br>
                        BẤM VÀO NÚT DƯỚI ĐỂ THÊM THÔNG TIN SINH VIÊN
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>

    </table>
            <!-- Hàng nút thêm sinh viên -->
            <tr>
                <td colspan="8" style="text-align: center;">
                    <button onclick="document.getElementById('id01').style.display='block'" type="button" class="button-modify">
                        <i class="bi"></i> Thêm sinh viên
                    </button>
                </td>
            </tr>

            <?php mysqli_close($conn); ?>

</div>


  <script src="../js/giua_ky_utt.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
<footer>
        <!-- Phần thông báo  -->
<?php //if (isset($_GET['status'])): ?>
<!--    --><?php //if ($_GET['status'] == 'success'): ?>
<!--        <div style="color: green; text-align: center;">Thêm sinh viên thành công!</div>-->
<!--    --><?php //elseif ($_GET['status'] == 'delete_success'): ?>
<!--        <div style="color: green; text-align: center;">Xóa sinh viên thành công!</div>-->
<!--    --><?php //elseif ($_GET['status'] == 'delete_error'): ?>
<!--        <div style="color: red; text-align: center;">Lỗi khi xóa sinh viên!</div>-->
<!--    --><?php //endif; ?>
<?php //endif; ?>
<!-- ------------------ -->
</footer>
</html>
