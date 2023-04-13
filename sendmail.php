<?php
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: Content-Type, X-Auth-Token, Origin, Authorization");
	header("Access-Control-Allow-Methods: 'GET, POST, OPTIONS, PUT, PATCH, DELETE'");
	

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// if(isset($_POST['submit'])){

    require './PHPMailer/PHPMailer/src/Exception.php';
    require './PHPMailer/PHPMailer/src/PHPMailer.php';
    require './PHPMailer/PHPMailer/src/SMTP.php';


    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $msg = $_POST['message'];

    $mail = new PHPMailer;
    //Enable SMTP debugging.
    $mail->SMTPDebug = 3;                           
    //Set PHPMailer to use SMTP.
    $mail->isSMTP();        
    //Set SMTP host name                      
    $mail->Host = "smtp.gmail.com";
    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;                       
    //Provide username and password
    $mail->Username = "mayurkld@gmail.com";             
    $mail->Password = "nfwiclmrgmcivfsm";                       
    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = "tls";                       
    //Set TCP port to connect to
    $mail->Port = 587;                    
    $mail->From = "mayurkld@gmail.com";
    $mail->FromName = "Koladiya Mayur";
    $mail->addAddress("koladiyamonika2811@gmail.com", "Koladiya Monika");
    $mail->isHTML(true);
    $mail->Subject = "New lead";
    $mail->Body = $name . " " . $phone . " wrote the following:" . "\n\n" . $msg;


    $mail->AltBody = "This is the plain text version of the email content";
    if(!$mail->send())
    {
    echo "Mailer Error: " . $mail->ErrorInfo;
    }
    else
    {
    echo "Message has been sent successfully";
    }
// }