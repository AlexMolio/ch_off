<?php
class SiteController
{
    public function actionIndex()
    {


    	if(isset($_POST['submit_l'])){

			$accept_lang = $_POST['lang'];

			switch ($accept_lang){

				    case "ru": case 'be': case 'uk': case 'ky': case 'ab': case 'mo': case 'et': case 'lv': $accept_lang="ru";break; // если русский
				    case "en": case "uk": case "us": $accept_lang = "en";break; // если английский
				    

				    default: $accept_lang="en";break; // если нет совпадений, то по умолчанию, английский
				}


		$lang_arr = include(ROOT."/template/lang/$accept_lang.php");

		}else{

			preg_match('/^\w{2}/',$_SERVER['HTTP_ACCEPT_LANGUAGE'], $matches);

			if(isset($matches[0])) {

				switch (strtolower($matches[0])){

				    case "ru": $accept_lang="ru";break; // если русский
				    case "en": case "uk": case "us": $accept_lang = "en";break; // если английский
				    

				    default: $accept_lang =" en";break; // если нет совпадений, то по умолчанию, например, английский
				}


				if(file_exists(ROOT."/template/lang/$accept_lang.php")){

					$lang_arr = include(ROOT."/template/lang/$accept_lang.php");

					
					
				} else {
					$lang_arr = include(ROOT.'/template/lang/en.php');
				}

			} else {
				$lang_arr = include(ROOT.'/template/lang/en.php');
			}
			
	}

	

        
         if(isset($_POST['info-name'])){

					exit($response = 'true');
				}

			require_once (ROOT . '/views/index.php');

        return true;
    }
    
}

?>