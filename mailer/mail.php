<?php
// ini_set('display_errors', 1); 
// ini_set('display_startup_errors', 1); 
// error_reporting(E_ALL);

$body = "<table border=1 style='border: 2px grey solid; border-collapse: collapse;'><tr><td colspan='2' style='font-size: 19px;font-weight: 700;text-align: center;padding:12px;'>Customer Details </td></tr><tbody>";
foreach($_POST as $key => $value){
    
$body .= '<tr>';
$body .= '<td style="padding: 5px;text-align: center;font-size:18px;width:120px">'.ucfirst($key).'</td>';
$body .= '<td style="padding: 5px;text-align: center;font-size:18px;width:500px;">'.$value.'</td>';
$body .= '</tr>';

}
$body .="</tbody></table>";
// echo $body;

require('class.phpmailer.php');
require('class.smtp.php');
require('class.pop3.php');

$mail = new PHPMailer();
$mail->SMTPDebug = 2;
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Port     = 587;  
$mail->Username = "donot-reply@goldenglobalhealthcare.com";
$mail->Password = "!Wl8mzTG99$t";
$mail->Host     = "smtp.gmail.com";
$mail->SetFrom("donot-reply@goldenglobalhealthcare.com","goldenglobalhealthcare");
$mail->AddAddress("sathish7196@gmail.com");
$mail->Subject = "Contact us Form Details";
$mail->WordWrap   = 80;
// $content = "<b>This is a test email using PHP mailer class.</b>";
$mail->MsgHTML($body);
$mail->IsHTML(true);
if(!$mail->Send()) 
// echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
echo "<script>
alert('something went wrong , please try again later');
window.location.href='/contact.html';
</script>";
else 
echo "<script>
alert('Submitted Successfully, Our team will be contact you');
window.location.href='/contact.html';
</script>";


?>
