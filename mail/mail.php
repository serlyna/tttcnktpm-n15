<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Send Mail </title>
    <link rel="stylesheet" href="dinhdang.css">
    <!-- bootstrap cdn link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

    
<body>
<div style="height:300px;"><a href="../sachorder.php"><img style="width:100px" src="./d.gif"><img></a>
    </div>
  <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 mail-form">
                <h2 class="text-center">Send Message</h2>
                <p class="text-center">Gửi mail trả lời câu hỏi.</p>
                <!-- starting php code -->
                <?php
                    //first we leave this input field blank
                    $recipient = "";
                    //if user click the send button
                    if(isset($_POST['send'])){
                        //access user entered data
                       $recipient = $_POST['email'];
                       $subject = $_POST['subject'];
                       $message = $_POST['message'];
                       $sender = "From:chachanh2011@gmail.com";
                       //if user leave empty field among one of them
                       if(empty($recipient) || empty($subject) || empty($message)){
                           ?>
                           <!-- display an alert message if one of them field is empty -->
                            <div class="alert alert-danger text-center">
                                <?php echo "All inputs are required!" ?>
                            </div>
                           <?php
                        }else{
                            // PHP function to send mail
                           if(mail($recipient, $subject, $message, $sender)){
                            ?>
                            <!-- display a success message if once mail sent sucessfully -->
                            <div class="alert alert-success text-center">
                                <?php echo "Thành công $recipient"?>
                            </div>
                           <?php
                           $recipient = "";
                           }else{
                            ?>
                            <!-- display an alert message if somehow mail can't be sent -->
                            <div class="alert alert-danger text-center">
                                <?php echo "Failed while sending your mail!" ?>
                            </div>
                           <?php
                           }
                       }
                    }
                ?> <!-- end of php code -->
                <form action="mail.php" method="POST">
                    <div class="form-group">
                        <input class="form-control" name="email" type="email" placeholder="Email người nhận" value="<?php echo $recipient ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="subject" type="text" placeholder="Chủ đề">
                    </div>
                    <div class="form-group">
                        <textarea cols="30" rows="5" class="form-control textarea" name="message" placeholder="Nội dung mail..."></textarea>
                    </div>
                    <div class="form-group">
                        <input class="form-control button btn-primary" type="submit" name="send" value="Gửi" placeholder="Subject">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>
