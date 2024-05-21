<?php
include "PHPMailer/src/PHPMailer.php";
include "PHPMailer/src/Exception.php";
include "PHPMailer/src/OAuth.php";
include "PHPMailer/src/POP3.php";
include "PHPMailer/src/SMTP.php";
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class sendmailphp
{
    public function sendmail($email,$file,$img)
    {
        

$mail= new PHPMailer(true);
try
        {

            //Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'hothiphuong8272@gmail.com';                 // SMTP username
            $mail->Password = 'ysonpneewphqeroy';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
        
            //Recipients
            $mail->setFrom('hothiphuong8272@gmail.com', 'PHONGKHAM PT');
            $mail ->addAddress($email);
            //$mail->addAddress($email);     // Add a recipient
            //$mail->addAddress('hohongsk16cht@gmail.com');               // Name is optional
            //$mail ->addAddress('thuongthu305@gmail.com');
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');
        
            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = "BOOK North Hills ANNOUNCEMENT: YOU ARE QRCODE!!";
            $mail->Body    = " Xin chào!
            <br>Cảm ơn bạn đã đăng ký tài khoản trên website của Book North Hills. 
            <br>Để biết thêm chi tiết về nhà sách bạn có thể truy cập vào http://localhost:8080/doan.";
            
        $mail->Body .= "<img src='./$file'/><br>";
        $mail->Body .= "<a href='$img'>Can't see the image? Click Here.</a>";

// (B) MAIL MESSAGE
// DIRECTLY EMBED IMAGE INTO EMAIL WITH BASE64 ENCODE
        $img = file_get_contents($file);
        $imgdata = base64_encode($img);
        $mail->Body .= "<img src='data:image/x-icon;base64,$imgdata'/>";
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
                
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
            echo 'Cảm ơn bạn đã đăng ký tài khoản trên website của Nhà sách North Hills';
        }
         catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}

?>

                                   