<?php
//index.php
include("data.php");


?>
<?php
include("headerad.php");
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Cấp phát quyền</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   

   <br />
   <h3 style="margin-left:35%; margin-bottom:15px; font-family:times; color:green;"> QUẢN LÝ QUYỀN NHÂN VIÊN</h3>
   
   <div class="panel panel-default">
   
    <div class="panel-body">
     <span id="message"></span>
     <div class="table-responsive" id="user_data">
      
     </div>
     <script>
     $(document).ready(function(){
      
      load_user_data();
      
      function load_user_data()
      {
       var action = 'fetch';
       $.ajax({
        url:'action.php',
        method:'POST',
        data:{action:action},
        success:function(data)
        {
         $('#user_data').html(data);
        }
       });
      }
      
      $(document).on('click', '.action', function(){
       var manv = $(this).data('manv');
       var user_status = $(this).data('user_status');
       var action = 'change_status';
       $('#message').html('');
       if(confirm("Bạn có chắc thay đổi trạng thái người dùng?"))
       {
        $.ajax({
         url:'action.php',
         method:'POST',
         data:{manv:manv, user_status:user_status, action:action},
         success:function(data)
         {
          if(data != '')
          {
           load_user_data();
           $('#message').html(data);
          }
         }
        });
       }
       else
       {
        return false;
       }
      });
      
     });
     </script>
    </div>
   </div>
   <?php
   
   ?>
  </div>
 </body>
</html>
