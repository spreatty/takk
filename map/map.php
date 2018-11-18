<?php
	session_start();
	$admin = $_SESSION['admin'];
	$en = $_COOKIE['en'];
	$lang = $en ? 'polski' : 'english';
?>
<html>
	<head>
		<title>takk bar & lounge | mapa</title>
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
					<div><a href="/booking">rezerwacja</a></div>
				</div>
				<div class="logo top space-balance">
					<img src="/dark.png"/>
				</div>
			</div>
			<div class="google-map">
				<iframe src="https://www.google.com/maps/embed/v1/place?q=Takk+Bar+%26+Lounge&zoom=17&key=AIzaSyCHcd5Jylo3Ma4JkzbsWG7yYaOJ73O97yk"></iframe>
			</div>
			<div class="copyright disappearing stick-to-bottom">
				<form method="post" action="/lang-switch.php">
					<input type="submit" value="<?php echo $lang; ?>"/>
				</form>
				<br/>© takk 2018
			</div>
		</div>
	</body>
</html>