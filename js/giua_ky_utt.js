// Hiển thị form chỉnh sửa
function editStudent(id) {
    // Lấy hàng tương ứng với ID
    const row = document.querySelector(`tr[data-id='${id}']`);
    
    // Lấy giá trị từ các cột
    const fullname = row.querySelector('.col-fullname').innerText;
    const dob = row.querySelector('.col-dob').innerText;
    switch(row.querySelector('.col-gender').innerText){
        case 'Nam': gender = 0; break;
        case 'Nữ': gender = 1; break;
    }
    const hometown = row.querySelector('.col-hometown').innerText;
    const group = row.querySelector('.col-group').innerText;
    switch(row.querySelector('.col-level').innerText){
        case 'Tiến sĩ':
            level = 0; 
            break;
        case 'Thạc sĩ':
            level = 1; 
            break;
        case 'Kỹ sư':
            level = 2; 
            break;
        case 'Khác':
            level = 3;
            break;
    }

    // Điền dữ liệu vào form
    document.getElementById('edit-id').value = id;
    document.getElementById('edit-fullname').value = fullname;
    document.getElementById('edit-dob').value = dob;
    document.getElementById('edit-gender').value = gender;
    document.getElementById('edit-hometown').value = hometown;
    document.getElementById('edit-group').value = group;
    document.getElementById('edit-level').value = level;
    const form = document.getElementById('edit-form');
    form.style.display = 'flex';
    form.style.opacity = '1';
}

// Đóng form chỉnh sửa
function closeEditForm() {
    const form = document.getElementById('edit-form');
    form.style.opacity = '0';
    form.style.display = 'none';
}

// Hiển thị form thêm sinh viên
document.addEventListener('DOMContentLoaded', function () {
    const userIcon = document.querySelector(' .button-modify');
    const addForm = document.getElementById('add-sv-form');
    const closeAddForm = document.getElementById('close-add-sv-form');
    userIcon.addEventListener('click', function () {
        addForm.style.display = 'flex';
    });
    closeAddForm.addEventListener('click', function () {
        addForm.style.display = 'none';
    });
});


function showConfirm(id) {
    document.getElementById('delete-id').value = id; // Gán ID vào form ẩn
    document.getElementById('confirm-delete').style.display = 'flex'; // Hiển thị popup
}

function closeConfirm() {
    document.getElementById('confirm-delete').style.display = 'none'; // Đóng popup
}



document.getElementById('search-button').addEventListener('click', function () {
    const searchValue = document.getElementById('search-input').value.trim();
    if (searchValue) {
        window.location.href = `search_results.php?search=${encodeURIComponent(searchValue)}`;
    } else {
        alert('Vui lòng nhập từ khóa tìm kiếm!');
    }
});
var modal = document.getElementById('id01');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
// Cập nhật STT
function updateStudentIds() {
    // Sắp xếp mảng dữ liệu theo id
    students.sort((a, b) => a.id - b.id);

    // Cập nhật lại id (số thứ tự) cho các sinh viên
    for (let i = 0; i < students.length; i++) {
        students[i].id = i + 1;
    }
}