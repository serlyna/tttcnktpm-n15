function login()
{
    // Bước 1: Lấy giá trị của username và password
    var username = document.getElementById('usn');
    var password = document.getElementById('ps');
 
    // Bước 2: Kiểm tra dữ liệu hợp lệ hay không
    if (username.value == ''){
        alert('Bạn chưa nhập usename');
    }
    else if (password.value == '')
    {
        alert('Bạn chưa nhập mật khẩu');
    }
    else{
        return true;
    }
 
    return false;
}
