<?php
require_once 'PHPMailer.php';
function send_mail($Host,$Port,$Secure,$Auth,$TitleMail,$Username,$Password,$ToName,$ToEmail,$Charset,$Subject,$Body)
{
	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->SMTPDebug = 0;
	$mail->Debugoutput = 'html';
	$mail->Host = $Host;
	$mail->Port = $Port;
	$mail->SMTPSecure = $Secure;
	$mail->SMTPAuth = $Auth;
	$mail->Username = $Username;
	$mail->Password = $Password;
	$mail->setFrom($Username, $TitleMail);
	$mail->addReplyTo($Username,$TitleMail);
	$mail->addAddress($ToEmail,$ToName);
	$mail->CharSet = $Charset;
	$mail->Subject = $Subject;
	$body = mb_convert_encoding($Body, mb_detect_encoding($Body), 'UTF-8');
	$mail->msgHTML($body);
	$mail->AltBody = 'This is a plain-text message body';
	if (!$mail->send())
	$result = "Mailer Error: " . $mail->ErrorInfo.' '.$mymail;
	else $result = true;
	return $result;

}

if(isset($_POST))
{
	if(!empty($_POST['name'])) $name = htmlspecialchars($_POST['name'],ENT_QUOTES);
	if(!empty($_POST['message'])) $message = htmlspecialchars($_POST['message'],ENT_QUOTES);
	if(!empty($_POST['phone'])) $phone = htmlspecialchars($_POST['phone'],ENT_QUOTES);
	if(!empty($_POST['subject'])) $subject = htmlspecialchars($_POST['subject'],ENT_QUOTES);
	if(!empty($_POST['email'])) $email = htmlspecialchars($_POST['email'],ENT_QUOTES);
	
	
	if(mb_strlen($name,'UTF-8')>3&&mb_strlen($message,'UTF-8')>1&&strlen($email)>10&&strlen($phone)>5)
	{
		$body = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body style="width:100%;text-align:center;padding:0px;margin:0px;">
	<div style="background:none;width:60%;margin-left:20%;">
	
	<div style="margin-top:15px;color:white;padding:10px;border:1px solid #ccc;padding-top:30px;padding-bottom:30px;background-color:#F62E24;font-size:18px;text-align:center;">'.$subject.'</div>
	<div style="color:#999;font-size:15px;border:1px solid #ccc;padding:10px;padding-top:30px;padding-bottom:30px;text-align:left;">
	
	<b style="font-size:15px;color:#000">Данные:</b>
	<p><font style="display:inline-block;width:120px;color:#333">Email:</font> '.$email.'</p>
	<p><font style="display:inline-block;width:120px;color:#333">Имя:</font> '.$name.'</p>';
	if(!empty($phone)) $body.='<p><font style="display:inline-block;width:120px;color:#333">Телефон:</font> '.$phone.'</p>';
$body.='<div style="margin-top:15px;padding:10px;padding-top:30px;padding-bottom:30px;font-size:16px;text-align:center;"><i>'.$message.'</i></div>
	<p align=Center style="color:#000;margin-top:25px;">При возникновении вопросов пишите jeniabuianov@gmail.com</p></div>
	</div>
</body>

</html>';
		$send = send_mail('s1.magicnet.md',465,'ssl',true,'Moldovatruck оповещения','notifications@moldovatruck.md','S(N=w)&-[lXl','Moldova Truck','moversauto@gmail.com','UTF-8','Свяжитесь с нами: '.$subject,$body);
		if($send) echo 'Сообщение отправленно'; else echo $send;
	}
	else echo 'Не все заполненно'; 
	
	
}
else
{
	echo 'Не отправленно';
}

?>