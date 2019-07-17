<?php


function SiteVerify($url)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 15);
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36");
    $curlData = curl_exec($curl);
    curl_close($curl);
    return $curlData;
}
 
 
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $recaptcha=$_POST['g-recaptcha-response'];
    if(!empty($recaptcha))
    {
 
        $google_url="https://www.google.com/recaptcha/api/siteverify";
        $secret='6LfV-HYUAAAAAL4VFENQ2ieXfHiVBd2hL1BKtFfH';
        $ip=$_SERVER['REMOTE_ADDR'];
        $url=$google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;
        $res=SiteVerify($url);
        $res= json_decode($res, true);
 
    //var_dump($res);
        if($res['success'])
        {
            // Проверка каптчи пройдена успешно, продолжаем дальше выполнение проверки формы и т.д.
            require_once('./models/Contact.php');

			if(isset($_POST['info-name'])) {

						
						$amount = array();
						$currency = array();

						
						for($i = 1; $i <= 140 ; $i++){
							if(isset($_POST['Am'.$i])){
								$amount[$i] = $_POST['Am'.$i];
								$currency[$i] = $_POST['Cu'.$i];
							}
						}


			        	$risk = $_POST['risk'];
			        	$liquidity = $_POST['liquidity'];
			        	$period_month = $_POST['date-month'];
			        	$period_years = $_POST['date-year'];

						$name = $_POST['info-name'];
						$email = $_POST['info-mail'];
						$telephone = $_POST['info-phone'];
						$comment = $_POST['info-comment'];

						
						$result = Contact::sendMail($amount, $risk, $liquidity, $period_month, $period_years, $name, $email, $telephone, $comment, $currency);

						if($result == true)

							exit($response = 'true');

			 }
        }
        else
        {
          // Проверка не пройдена
        }
 
    }
    else
    {
          // Проверка не пройдена
    }
 
}


