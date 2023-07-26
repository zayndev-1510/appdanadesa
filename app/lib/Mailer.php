<?php
namespace App\lib;
use PHPMailer\PHPMailer\PHPMailer;
class Mailer{
    public static  function send($datamail){
        $mail = new PHPMailer(true);
        // Server settings
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Debugoutput = 'html';
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->Username = 'kensinoode15k@gmail.com';
        $mail->Password = 'hguswpuyklzndxsd';
        // Sender &amp; Recipient
        $mail->From = getenv("MAIL_FROM_ADDRESS");
        $mail->FromName =getenv("MAIL_FROM_NAME");
        $mail->addAddress($datamail["to"]);
        // Content
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';
        $mail->Subject = $datamail["subjek"];
        $mail->Body =view("emails.sendkonfirmation",["nim"=>$datamail["nim"],"angkatan"=>$datamail["angkatan"],"tahun_akademik"=>$datamail["tahun_akademik"]])->render();

        if ($mail->send()) {
            return true;
        } else {

           return false;
        }
    }
}
