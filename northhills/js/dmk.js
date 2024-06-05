function doimk(){
    var mkm=document.getElementById("mkm");
    var mkmnl=document.getElementById("mkmnl");
    
    if(mkm.value==''){
        alert('Vui lòng nhập mật khẩu mới');
        return false;
    }
    else if(mkmnl.value==''){
        alert('Vui lòng nhập lại mật khẩu');
         return false;
    }
    else if(mkm.value != mkmnl.value){
        alert('Vui lòng nhập lại đúng mật khẩu');
        return false;
    }
    else if(mkm.value.length < 6){
        alert('Mật khẩu phải nhiều hơn 6 kí tự');
        return false;
    }
    else if(mkm.value.length > 10){
        alert('Mật khẩu phải ít hơn 10 kí tự');
        return false;
    }
};