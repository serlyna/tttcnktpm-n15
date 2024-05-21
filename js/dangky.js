function saveInfo(){
    var usename=document.getElementById("usn");
    var pass=document.getElementById("pw");
    var passa=document.getElementById("pwa");
    var ten=document.getElementById("tnd");
    var sdt=document.getElementById("sdt");
    var diachi=document.getElementById("dc");
    var email=document.getElementById("em");
    var ngaysinh=document.getElementById("ns");
    var gioitinh=document.getElementById("gt");
    var errorMessage = document.getElementById("errorMessage");
    
    if(usename.value==''){
        alert('Vui lòng nhập usename');
        return false;
    }
    else if(pass.value==''){
        alert('Vui lòng nhập mật khẩu');
         return false;
    }
    else if(passa.value==''){
        alert('Vui lòng nhập lại mật khẩu');
         return false;
    }
    else if(ten.value==''){
        alert('Vui lòng nhập tên người dùng');
         return false;
    }
    else if(sdt.value==''){
        alert('Vui lòng nhập số điện thoại');
         return false;
    }
    else if(diachi.value==''){
        alert('Vui lòng nhập địa chỉ');
         return false;
    }
    else if(email.value==''){
        alert('Vui lòng nhập email');
         return false;
    }
    else if(ngaysinh.value==''){
        alert('Vui lòng nhập ngày sinh');
         return false;
    }
    else if(gioitinh.value==''){
        alert('Vui lòng nhập giới tính');
         return false;
    }
    else if(pass.value != passa.value){
        alert('Vui lòng nhập lại đúng mật khẩu');
    }
    else if(pass.value.length < 6){
        alert('Mật khẩu phải nhiều hơn 6 kí tự');
    }
};