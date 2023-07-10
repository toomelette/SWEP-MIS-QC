<?php


namespace App\Http\Controllers\Test;


use PHPMailer\PHPMailer\PHPMailer;

class MailController
{
    public function index(){
        $mail = new PHPMailer(true);
        try {

            // Email server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.googlemail.com';             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = 'swep.afd@gmail.com';   //  sender username
            $mail->Password = 'yvksqzghcakrkahz';       // sender password
            $mail->SMTPSecure = 'ssl';                  // encryption - ssl/tls
            $mail->Port = 465;                          // port - 587/465

            $mail->setFrom('sraweb@sra.gov.ph', 'GERALD SASDDD');
            $mail->addAddress('geraldjesterguance03@gmail.com');
//            $mail->addCC($request->emailCc);
//            $mail->addBCC($request->emailBcc);

            $mail->addReplyTo('sys.srawebportal@gmail.com', 'SWEP AFD');

//            if(isset($_FILES['emailAttachments'])) {
//                for ($i=0; $i < count($_FILES['emailAttachments']['tmp_name']); $i++) {
//                    $mail->addAttachment($_FILES['emailAttachments']['tmp_name'][$i], $_FILES['emailAttachments']['name'][$i]);
//                }
//            }


            $mail->isHTML(true);                // Set email content format to HTML

            $mail->Subject = 'Please see the attached file.';
            $mail->Body    = 'This is the body of the subject. Please refer to the most';

            // $mail->AltBody = plain text version of email body;

            if( !$mail->send() ) {
                return 'Mail not sent. : '.$mail->ErrorInfo;
            }

            else {
                return 'Email has been sent.';
            }

        } catch (\Exception $e) {
            return 'Message could not be sent.';
        }
    }
}