<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// class PHPMailerHelper
// {
//     private $_mail;

//     public function __construct()
//     {
//         $this->_mail = $this->_init();
//     }

//     private function _init()
//     {
//         $mail = new PHPMailer(true);
//         $mail->Debugoutput = function($str, $level) { syslog(LOG_ERR, "PHP Mailer:" . $str);};
//         $mail->SMTPDebug = 3;

//         $mail->isSMTP();
//         $mail->setFrom('from@example.com', mb_encode_mimeheader('From Name'));
//         $mail->CharSet = 'UTF-8';
//         $mail->Wordwrap = 76;

//         $mail->Host = 'email-smtp.ap-northeast-1.amazonaws.com'; //ASW SESの場合
//         $mail->Port = 465;
//         $mail->Username = 'SMTP_USER_NAME_HERE';
//         $mail->SMTPSecure = 'ssl'; //tls or ssl

//         return $mail;
//     }
//     /**
//      * Override mailer from address and name if you need
//      */

//     public function test()
//     {
//         $this->_mail->addAddress('myname@example.com');
//         $this->_mail->Subject = '[Sample]これはサンプルメールです';
//         $this->mail->isHTML(false);
//         $this->_mail->Body = "サンプルメール\nサンプルメール";

//         $isSent = $this->_mail->Send();

//         return $isSent;
//     }

//     public function send($toAddresses, $subject ="", $message = "", $attachement = [])
//     {
//         $name = ' ';

//         if(is_array($toAddresses)){
//             foreach($toAddresses as $email){
//                 $this->_mail->addAddress($email, $name);
//             }
//         }
//         else{
//             $email = $toAddresses;
//             $this->_mail->addAddress($email, $name);
//         }

//         $this->_mail->Subject = $subject;

//         $this->_mail->isHTML(false);
//         $this->_mail->Body = $message;

//         if(isset($attachement) && is_array($attachement)){
//             $this->_mail->addStringAttachment($attachement['value'], $attachement['name'], 'base64',$attachement['type']);
//         }

//         $isSent = $this->_mail->Send();

//         return $isSent;
//     }


// }

function phpmailer_send($recipient, $from_name,$from_addr,$subject,$message)
{
    require_once("phpmailer/PHPMailerAutoload.php");

    $smtp_host='example.com';
    $smtp_post='587';
    $smtp_user='yoshiki.formula.627@gmail.com';
    $smtp_password ='password';

    $mail = new PHPMailer();
    $mail->CharSet = "UTF-8";
    $mail->Encoding = "8bit";

    $mail->IsSMTP();
    $mail->Host = $smtp_host. ":". $smtp_post;
    $smail->SMTPAuth = TRUE;
    $mail->USername = $smtp_user;
    $mail->Password = $smtp_password;

    $mail->FromName = $from_name;
    $mail->From = $from_addr;
    $mail ->Subject = mb_encode_mimeheader($subject);
    $mail->Body = strip_tags($message);
    $mail->AddAddress($recipient);
    $result = $mail->Send();
    if($result){
        return TRUE;
    }else{
        return $mail->ErrorInfo;
    }
}
    foreach($recipient as $to)
    {
        $mail->clearAddresses();
        $mail->AddAddress($to);
        $result = $mail->Send();
        if($result === FALSE){
            break;
        }
    }

?>