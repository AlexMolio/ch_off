<?php
class Contact
{
	public static function sendMail($amount, $risk, $liquidity, $period_month, $period_years, $name, $email, $telephone, $comment, $currency) {
        
		
		require_once('./template/lib/php_mailer/PHPMailerAutoload.php');
		//require_once('./config/mail_info.php');

		$mail_info = include('./config/mail_info.php');

		$mail = new PHPMailer;
		$mail->CharSet = 'UTF-8';

		// Настройки SMTP
		$mail->isSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPDebug = 0;

		$mail->Host = $mail_info['smtp_host'];
		$mail->Port = $mail_info['smtp_port'];
		$mail->Username = $mail_info['mail_username'];
		$mail->Password = $mail_info['mail_password'];

		// От кого
		$mail->setFrom($mail_info['mail_username'], $mail_info['from']);        

		// Кому
		$mail->addAddress($mail_info['target_mail'], '');

		// Тема письма
		$mail->Subject = $mail_info['subject'];

		// Тело письма


		foreach ($amount as  $key => $am) {

				if($am == false)
					$am = '0';

			$amount_currency = $amount_currency.$am.' '.$currency[$key].'<br />  ';
		
		}
		
		if(preg_match('/low/', $risk)) $risk = 'low';
		if(preg_match('/high/', $risk)) $risk = 'high';
		if(preg_match('/low/', $liquidity)) $liquidity = 'low';
		if(preg_match('/high/', $liquidity)) $liquidity = 'high';

		// $amount_string = implode(",", $amount);
		// $currency_string = implode(",", $currency);

		$body = file_get_contents('./views/mail_body.html');

		$body = str_replace('$amount_currency', $amount_currency, $body);
		$body = str_replace('$risk', $risk, $body);
		$body = str_replace('$liquidity', $liquidity, $body);
		$body = str_replace('$period_month', $period_month, $body);
		$body = str_replace('$period_years', $period_years, $body);
		$body = str_replace('$name', $name, $body);
		$body = str_replace('$email', $email, $body);
		$body = str_replace('$telephone', $telephone, $body);
		$body = str_replace('$comment', $comment, $body);
	
		

		$mail->msgHTML($body);

	
		//return true;
		return $mail->send();
		
		
	}
}