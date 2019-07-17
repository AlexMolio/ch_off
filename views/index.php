<!DOCTYPE html>
<html><!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<title>Chirkoff</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="viewport" content="width=device-width">
		<meta property="og:title" content="Chirkoff Investments Inc. Ready to invest? Welcome!">
		<meta property="og:site_name" content="Chirkoff">
		<meta property="og:image" content="https://chirkoff.money/social4.jpg">
		<meta property="og:image" content="https://chirkoff.money/social1.png">
		<meta property="og:image" content="https://chirkoff.money/social3.jpg">
		<meta property="og:image" content="https://chirkoff.money/social4.jpg">
		<meta property="og:type" content="profile">
		<meta property="og:url" content="https://chirkoff.money/index.html">
		<link rel="stylesheet" href="./template/css/style.css">
		<link rel="icon" href="./template/img/favicon.ico" type="image/x-icon" />
		<link rel="shortcut icon" href="./template/img/favicon.ico" type="image/x-icon" />
		<script src="https://www.google.com/recaptcha/api.js"></script>
	</head>
	<body>
		<div class="wrapper">
			<!--header-->
			<header>
				<div class="header">
					<div class="container">


						<div class="accept_lang" style="display: none"><?php echo $accept_lang; ?></div>

						<a class="header__logo" href="/"></a>
						<!-- <a class="header__change" href="#"></a> -->

						<form method="post" action="/">

							<input class="lang_area" type="text" style="display: none" name="lang" value=""> <!-- поле ввода для изменения языка -->

							<input class="header__change" style = "border: 0" type="submit" name = "submit_l"  value=""> <!-- кнопка отправки формы для изменения языка -->

						</form>

						<div class="header__title"><?php echo $lang_arr['firm_name']; ?></div>
						<div class="header__language" id="language"></div>
					</div>
				</div>


			</header>
			<div class="maincontent">
				<form class="form jsForm jsValid">
					<div class="form__invest">
						<div class="container">
							<div class="invest__title"><?php echo $lang_arr['title']; ?></div>
							<ul class="invest__amount-list">
								<li class="invest__amount">
									<div class="invest__amount-title"><?php echo $lang_arr['amount']; ?><span class="invest__amount-index"></span></div>
									<input class="invest__amount-input" type="text" maxlength="9" placeholder="0 000 000" name="Am1">
									<input class="invest__amount-currency-input" style="display: none;" type="text" maxlength="9" value="USD" name="Cu1">
									<div class="invest__amount-currency">USD</div>
									<div class="invest__amount-delete js-count"></div>
									<div class="invest__amount-add active js-count"></div>
								</li>
							</ul>
							<div class="invest__additional">
								<div class="invest__additional-field invest__additional-field-risk">
									<div class="invest__additional-title"><?php echo $lang_arr['risk']; ?></div>
									<div class="invest__additional-check">
										<input id="risk_low" type="radio" name="risk" value="risk_low">
										<label for="risk_low"><?php echo $lang_arr['low']; ?></label>
									</div>
									<div class="invest__additional-check">
										<input id="risk_hight" type="radio" name="risk" value="risk_high">
										<label for="risk_hight"><?php echo $lang_arr['high']; ?></label>
									</div>
								</div>
								<div class="invest__additional-field invest__additional-field-liquidity">
									<div class="invest__additional-title"><?php echo $lang_arr['liquidity']; ?></div>
									<div class="invest__additional-check">
										<input id="liquidity_low" type="radio" name="liquidity" value="liquidity_low">
										<label for="liquidity_low"><?php echo $lang_arr['l_low']; ?></label>
									</div>
									<div class="invest__additional-check">
										<input id="liquidity_hight" type="radio" name="liquidity" value="liquidity_high">
										<label for="liquidity_hight"><?php echo $lang_arr['l_high']; ?></label>
									</div>
								</div>
								<div class="invest__additional-field invest__additional-field-date">
									<div class="invest__additional-title"><?php echo $lang_arr['period']; ?></div>
									<label class="invest__additional-label">
										<input class="invest__additional-date" type="text" name="date-year" placeholder="<?php echo $lang_arr['year']; ?>"><span class="label-year"><?php echo $lang_arr['year']; ?></span>
									</label>
									<label class="invest__additional-label">
										<input class="invest__additional-date" type="text" name="date-month" placeholder="<?php echo $lang_arr['month']; ?>)"><span class="label-month"><?php echo $lang_arr['month']; ?></span>
									</label>
								</div>
							</div>
						</div>
						<div class="form__invest-footer">
							<div class="footer__info"><?php echo $lang_arr['copyright']; ?></div>
							<div class="footer__info footer__info-mail">profit@chirkoff.money</div>
						</div>
					</div>
					<div class="invest__currencies-choose">
						<div class="invest__currencies-choose_container">
							<div class="invest__currencies-title_wrap">
								<div class="invest__currencies-title"><?php echo $lang_arr['currencies']; ?></div>
								<input class="invest__currencies-search" id="search" type="text" name="search-input" maxlength="30" placeholder="<?php echo $lang_arr['name_code']; ?>">
							</div>
							<div class="invest__currencies-list" id="currency"></div>
							<div class="invest__currencies-btns"><a class="back" href="#"><?php echo $lang_arr['back']; ?><</a><a class="ok" href="#"><?php echo $lang_arr['add']; ?></a></div>
						</div>
					</div>
					<div class="form__info">
						<div class="form__info-wrap">
							<div class="container">
								<div class="info__title"><?php echo $lang_arr['terms_conditions']; ?></div>
								<div class="info__rates">
									<div class="info__rates-title"><?php echo $lang_arr['phrase']; ?></div>
									<table class="info__rates-table">
										<tr>
											<th class="border-r"><?php echo $lang_arr['invested']; ?><span class="dollar">&#8194;$</span></th>
											<th><?php echo $lang_arr['rate']; ?></th>
										</tr>
										<tr class="first-tr">
											<td class="border-r"><span class="first-num">0</span>&nbsp;-<span class="second-num">&nbsp;999</span></td>
											<td class="percents">20%</td>
										</tr>
										<tr>
											<td class="border-r"><span class="first-num">1 000</span>&nbsp;-<span class="second-num">&nbsp;9 999</span></td>
											<td class="percents">19%</td>
										</tr>
										<tr>
											<td class="border-r"><span class="first-num">10 000</span>&nbsp;-&nbsp;99 999</td>
											<td class="percents">18%</td>
										</tr>
										<tr class="last-tr">
											<td class="border-r"><span class="first-num">100 000</span>&nbsp;-&nbsp;&#8734;</td>
											<td class="percents">17%</td>
										</tr>
									</table>
								</div>
								<div class="info__personal">
									<input class="info__personal-field info__personal-field_name" type="text" name="info-name" placeholder="<?php echo $lang_arr['name']; ?>">
									<input class="info__personal-field info__personal-field_phone" type="text" name="info-phone" placeholder="<?php echo $lang_arr['phone']; ?>">
									<input class="info__personal-field info__personal-field_mail" type="email" name="info-mail" placeholder="<?php echo $lang_arr['e_mail']; ?>">
									<textarea class="info__personal-field info__personal-field_comment" name="info-comment" placeholder="<?php echo $lang_arr['comment']; ?>"></textarea>
								</div>
								<div class="form__submit">
									<input class="form__submit-btn" type="submit" value="<?php echo $lang_arr['submit']; ?>">
									<div class="form__submit-success"><?php echo $lang_arr['success']; ?></div>
									<div class="form__submit-error"><?php echo $lang_arr['fail']; ?></div>
									<div class="g-recaptcha" data-callback="go_submit" data-sitekey="6LfV-HYUAAAAAAix-uIl-KYB47-4cMhiJ1eDqTlA"></div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<!--footer-->
			<footer>
				<div class="footer">
					<div class="footer__info footer__info-mail">profit@chirkoff.money</div>
					<div class="footer__info"><?php echo $lang_arr['copyright']; ?></div>
				</div>
			</footer>
		</div>
		<!-- scripts-->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="./template/js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
		<script src="./template/js/vendor/libraries.js"></script>
		<script src="./template/js/main.js"></script>

		<!-- Yandex.Metrika counter -->
		<script type="text/javascript" >
		    (function (d, w, c) {
		        (w[c] = w[c] || []).push(function() {
		            try {
		                w.yaCounter51071744 = new Ya.Metrika2({
		                    id:51071744,
		                    clickmap:true,
		                    trackLinks:true,
		                    accurateTrackBounce:true
		                });
		            } catch(e) { }
		        });

		        var n = d.getElementsByTagName("script")[0],
		            s = d.createElement("script"),
		            f = function () { n.parentNode.insertBefore(s, n); };
		        s.type = "text/javascript";
		        s.async = true;
		        s.src = "https://mc.yandex.ru/metrika/tag.js";

		        if (w.opera == "[object Opera]") {
		            d.addEventListener("DOMContentLoaded", f, false);
		        } else { f(); }
		    })(document, window, "yandex_metrika_callbacks2");
		</script>
		<noscript><div><img src="https://mc.yandex.ru/watch/51071744" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
		<!-- /Yandex.Metrika counter -->

	</body>
</html>