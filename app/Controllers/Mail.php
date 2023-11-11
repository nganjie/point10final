<?php 
 namespace App\Controllers;
 use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

 class Mail{
    public $mailClass;
    public $mailSystem="nganjienzatsi@gmail.com";
    public function __construct($subjet)
    {
        $mail = new PHPMailer();
        $mail->SMTPDebug =SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host ="smtp.gmail.com";
        $mail->SMTPAuth=true;
        $mail->Username=$this->mailSystem;
        $mail->Password="ohwc uerm iukm kvie";
        $mail->SMTPSecure=PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port=465;
        //issahnfonsouen@point10recharge.cm
        $mail->setFrom($this->mailSystem,'gz-app');
        $mail->addReplyTo($this->mailSystem,'gz-app');
        
        //$mail->addCC('');
        //$mail->addBCC('');

        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subjet;
       // $mail->msgHTML($message,__DIR__);
       //$mail->Body =$message;
      // $mail->AltBody=" le html n'a pas pu être charger";
        $this->mailClass=$mail;
       // $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
       // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    }
    public function externalEmail($email)
    {
       
        $this->mailClass->addAddress($email,'');
        //$mail->addAddress('');
        
    }
    public function systemEmail()
    {
        $this->mailClass->addAddress($this->mailSystem,'');
    }
    public function simpleEmail($message)
    {
        $this->mailClass->msgHTML($message,__DIR__);
    }
    public function htmlEmail($content)
    {
        $this->mailClass->Body =$content;
        $this->mailClass->AltBody=" le html n'a pas pu être charger";
    }
    public function send()
    {
       $res= $this->mailClass->send();
       return $res;
    }
    public function sendCreerCompte()
    {

    }
 }

?>