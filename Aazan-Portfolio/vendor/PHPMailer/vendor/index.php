<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'autoload.php';

    function SendMail ($FromName, $FromEmail, $FromSub, $FromMsg, $iUserId)
    {
        global $objDatabase;

        $fetchPortFolio = $objDatabase->fetchPortFolio ($iUserId);
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
            $mail->Username   = 'aazank517@gmail.com';                     //SMTP username
            $mail->Password   = 'bhcc ixdn rfat arfk';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('aazank517@gmail.com', 'Aazan PortFolio');
            $mail->addAddress($ToEmail, $ToName);     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            $mail->addReplyTo('aazank517@gmail.com', 'Aazan PortFolio');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $FromSub;
            $mail->Body    = $FromName.' want\'s to contact you through your Portfolio. <br>
            Email comes form this email address: '.$FromEmail.'. <br>
            If you want to reply this email then please send your reply on '.$FromEmail.'<br><br>
            Message From '.$FromName.' is: <br>'.$FromMsg;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo '1';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

?>