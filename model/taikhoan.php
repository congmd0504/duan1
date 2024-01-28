<?php
    // session_start();
    
    //dang ky
    function insert_taikhoan($email,$user,$pass){
        $sql="INSERT INTO `taikhoan` ( `email`, `user`, `pass`) VALUES ( '$email', '$user','$pass'); ";
        pdo_execute($sql);
    }

    function dangnhap($user, $pass) {
        $sql = "SELECT * FROM taikhoan WHERE user='$user' and pass='$pass'";
        
        $taikhoan = pdo_query_one($sql);
    
        if ($taikhoan != false) {
            // Lưu ID người dùng vào session sau khi đăng nhập thành công
            $_SESSION['user'] = $user;
            $_SESSION['user_id'] = $taikhoan['id'];
            $_SESSION['role'] = $taikhoan['role'];
            return "Đăng nhập thành công";
        } else {
            return "Thông tin tài khoản sai";
        }
    }
    

    function get_user($user){
        $sql="SELECT * FROM `taikhoan` WHERE `id` = $user";
        $data =  pdo_query_one($sql);
        return $data;
    }

    function uppdate_user($userId,$user, $email, $pass, $address, $tel){
        $sql = "UPDATE `taikhoan` SET `user`= '$user', `email`= '$email', `pass`= '$pass', `address` = '$address', `tel` = '$tel' WHERE `id` = '$userId'";
        pdo_execute($sql);
    }

    function dangxuat() {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            unset($_SESSION['user_id']);
            unset($_SESSION['role']);
        }
    }

    function sendMail($email) {
        $sql="SELECT * FROM taikhoan WHERE email='$email'";
        $taikhoan = pdo_query_one($sql);

        if ($taikhoan != false) {
            sendMailPass($email, $taikhoan['user'], $taikhoan['pass']);
            
            return "gui email thanh cong";
        } else {
            return "Email bạn nhập ko có trong hệ thống";
        }
    }

    function sendMailPass($email, $username, $pass) {
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        $mail = new PHPMailer\PHPMailer\PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = '9de9c15e7f0fb7';                     //SMTP username
            $mail->Password   = '98205b8cc2424d';                               //SMTP password
            $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('duanmau@example.com', 'DuAnMau');
            $mail->addAddress($email, $username);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Nguoi dung quen mat khau';
            $mail->Body    = 'Mau khau cua ban la' .$pass;

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
?>
