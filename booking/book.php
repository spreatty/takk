<?php
	session_start();
	$admin = $_SESSION['admin'];
	$en = $_COOKIE['en'];
	$lang = $en ? 'polski' : 'english';
?>
<html>
	<head>
		<title>takk bar & lounge | rezerwacja</title>
		<link rel="stylesheet" href="/common.css"/>
		<meta name="theme-color" content="#000"/>
	</head>
	<body>
		<div id="content">
			<div class="navigation-bar disappearing">
				<a class="logo top" href="/">
					<img src="/dark.png"/>
					<br/>
					<div>bar & lounge</div>
				</a>
				<div class="navigation">
					<div><a href="/menu">menu</a></div>
					<div><a href="/about">o takk</a></div>
					<div><a href="/map">mapa</a></div>
				</div>
				<div class="logo top space-balance">
					<img src="/dark.png"/>
				</div>
			</div>
			<div class="content">
				<div>
					Aby zarezerwować u nas stolik lub loże napisz do nas na Facebook Messenger, wyślij sms lub zadzwoń <a class="link" href="tel:+48799983069" target="_blank">799983069</a>.
					<br/><br/>
					Takk lounge to również świetne miejsce na organizacje imprezy (urodzin itp.). Nasze ‘tyły’ pomieszczą do ok. 20 osób, a nawet do 40-50 przy rezerwacji całej części loungowej. Jesteśmy elastyczni i dopasujemy ofetrę do Państwa potrzeb. Prosimy o rezerwacje telefoniczne lub osobiste.
					<br/><br/>
					Rezerwacje w Takk bar & lounge są bezpłatne i nie wymagamy depozytu.
				</div>
				<br/><br/>
				<div>
					To reserve the table please message us on Facebook or call <a class="link" href="tel:+48799983069" target="_blank">799983069</a>.
					<br/><br/>
					Takk lounge is also a great place to organize a party (birthdays etc.). Our ‘back’ comfortably fits up to about 20 people, and up to 40-50 if you book the whole lounge part. We are flexible and fit our offer around your needs! Please call us or drop by to make a request.
					<br/><br/>
					Our reservations are free and we do not require a deposit.</div>
				<br/>
			</div>
			<div class="copyright">
				<form method="post" action="/lang-switch.php">
					<input type="submit" value="<?php echo $lang; ?>"/>
				</form>
				<br/>© takk 2018
			</div>
		</div>
	</body>
</html>