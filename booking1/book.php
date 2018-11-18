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
				<table class="widetable persons-select">
					<tr>
						<td>
							<div class="person-select">
								<div>1</div>
								<div class="person"><div></div><div></div><div></div><div></div></div>
							</div>
						</td>
						<td>
							<div class="person-select">
								<div>2</div>
								<div class="person"><div></div><div></div><div></div><div></div></div>
								<div class="person"><div></div><div></div><div></div><div></div></div>
							</div>
						</td>
						<td>
							<div class="person-select">
								<div>3</div>
								<div class="person"><div></div><div></div><div></div><div></div></div>
								<div class="person"><div></div><div></div><div></div><div></div></div>
								<div class="person"><div></div><div></div><div></div><div></div></div>
							</div>
						</td>
						<td>
							<div class="person-select">
								<div>4</div>
								<div class="person"><div></div><div></div><div></div><div></div></div>
								<div class="person"><div></div><div></div><div></div><div></div></div>
								<br/>
								<div class="person"><div></div><div></div><div></div><div></div></div>
								<div class="person"><div></div><div></div><div></div><div></div></div>
							</div>
						</td>
						<td>
							<div class="person-select">
								<div>5</div>
								<div class="person"><div></div><div></div><div></div><div></div></div>
								<div class="person"><div></div><div></div><div></div><div></div></div>
								<div class="person"><div></div><div></div><div></div><div></div></div>
								<br/>
								<div class="person"><div></div><div></div><div></div><div></div></div>
								<div class="person"><div></div><div></div><div></div><div></div></div>
							</div>
						</td>
						<td>
							<div class="person-select">
								<div>6</div>
								<div class="person"><div></div><div></div><div></div><div></div></div>
								<div class="person"><div></div><div></div><div></div><div></div></div>
								<div class="person"><div></div><div></div><div></div><div></div></div>
								<br/>
								<div class="person"><div></div><div></div><div></div><div></div></div>
								<div class="person"><div></div><div></div><div></div><div></div></div>
								<div class="person"><div></div><div></div><div></div><div></div></div>
							</div>
						</td>
					</tr>
				</table>
				<div class="subtitle">Więcej? Wtedy prosimy o kontakt telefoniczny <a class="link" href="tel:+48799983069" target="_blank">799983069</a>.</div>
				<div class="bigtitle">19:45</div>
				<table class="widetable">
					<tr>
						<td>
							<div class="time-select">
								<div class="disabled">24</div>
								<div class="placeholder"></div>
								<div class="placeholder"></div>
								<div class="disabled">15</div>
								<div class="disabled">16</div>
								<div class="disabled">17</div>
								<div>18</div>
								<div class="selected">19</div>
								<div>20</div>
								<div>21</div>
								<div>22</div>
								<div>23</div>
							</div>
						</td>
						<td>
							<div class="time-select">
								<div class="disabled">0</div>
								<div class="placeholder"></div>
								<div class="placeholder"></div>
								<div>15</div>
								<div class="placeholder"></div>
								<div class="placeholder"></div>
								<div>30</div>
								<div class="placeholder"></div>
								<div class="placeholder"></div>
								<div class="selected">45</div>
								<div class="placeholder"></div>
								<div class="placeholder"></div>
							</div>
						</td>
					</tr>
				</table>
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