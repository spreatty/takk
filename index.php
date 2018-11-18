<?php
	session_start();
	if($_SERVER['REQUEST_METHOD'] == 'POST')
		$_SESSION['admin'] = false;
	$admin = $_SESSION['admin'];
	$en = $_COOKIE['en'];
	$lang = $en ? 'polski' : 'english';
?>
<html>
	<head>
		<title>takk bar & lounge</title>
		<link rel="stylesheet" href="/common.css"/>
		<?php if($admin): ?><link rel="stylesheet" href="/controls.css"/><?php endif; ?>
		<meta name="theme-color" content="#000"/>
	</head>
	<body style="background-image: url(/bg.jpg);">
		<div id="content">
			<div class="navigation">
				<div><a href="/menu">menu</a></div>
				<div><a href="/about">o takk</a></div>
				<div><a href="/booking">rezerwacja</a></div>
				<div><a href="/map">mapa</a></div>
				<?php if($admin): ?>
				<div class="logout">
					<form method="post" action="/">
						<input type="submit" name="action" value="logout"/>
					</form>
				</div>
				<?php endif; ?>
			</div>
			<table class="center fullscreen">
				<tr><td>
					<div class="logo big">
						<img src="/dark.png"/>
						<br/>
						<div>bar & lounge</div>
					</div>
				</td></tr>
			</table>
			<div class="copyright stick-to-bottom">
				<form method="post" action="/lang-switch.php">
					<input type="submit" value="<?php echo $lang; ?>"/>
				</form>
				<br/>© takk 2018
			</div>
		</div>
	</body>
</html>