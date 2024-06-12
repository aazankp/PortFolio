<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'autoload.php';

    function SendMail ($FromName, $FromEmail, $FromSub, $FromMsg, $iUserId, $sAction2)
    {
        global $objDatabase;

        $fetchPortFolio = $objDatabase->fetchUser ($iUserId);
        $aProfFolioData = mysqli_fetch_assoc($fetchPortFolio);

        $ToName = $aProfFolioData["fullName"];
        $ToEmail = $aProfFolioData["email"];

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'aazanportfolio@gmail.com';                     //SMTP username
            $mail->Password   = 'itmd ykng espr onov';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('aazanportfolio@gmail.com', 'Aazan PortFolio');
            $mail->addAddress($ToEmail, $ToName);     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('aazank517@gmail.com', 'Aazan PortFolio'); // 04-06-2024
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            if ($sAction2 == "verifyEmail") 
            {
                $otp = rand(000000,999999);
                $insOtp = $objDatabase->insOTP($otp, $iUserId);

                $mail->Subject = "Account verification via E-mail";
                $mail->Body    = "Your account verification OTP is: ".$otp;
            } else {
                $mail->Subject = $FromSub;
                $mail->Body    = $FromName.' want\'s to contact you through your Portfolio. <br>
                Mail comes form this email address: '.$FromEmail.'. <br>
                If you want to reply this email then please send your reply on '.$FromEmail.'<br><br>
                Message From '.$FromName.' is: <br>'.$FromMsg;
            }
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            if ($sAction2 == "verifyEmail") return 1;
            echo '1';
        } catch (Exception $e) {
            echo "0";
        }
    }

?>