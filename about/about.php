<?php
	session_start();
	$admin = $_SESSION['admin'];
	$en = $_COOKIE['en'];
	$lang = $en ? 'polski' : 'english';
	
	$story = @file_get_contents(".story");
	$schedule = explode(";", @file_get_contents(".schedule"));
	if(!$admin)
		for($i = 0; $i < count($schedule); ++$i)
			if(preg_match("/^\s*\d?\d:\d\d\s*-\s*\d?\d:\d\d\s*$/", $schedule[$i])){
				$schedule[$i] = explode("-", $schedule[$i]);
				$schedule[$i][0] = trim($schedule[$i][0]);
				$schedule[$i][1] = trim($schedule[$i][1]);
			}
?>
<html>
	<head>
		<title>takk bar & lounge | o takk</title>
		<link rel="stylesheet" href="/common.css?v1"/>
		<?php if($admin): ?><link rel="stylesheet" href="/controls.css"/><?php endif; ?>
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
					<div><a href="/booking">rezerwacja</a></div>
					<div><a href="/map">mapa</a></div>
					<?php if($admin): ?>
					<div class="control">
						<div class="floppy">
							<div class="line">
							</div><br/><div class="line">
							</div><br/><div class="line">
							</div><br/><div class="cover">
								<div></div>
							</div>
						</div>
					</div>
					<?php endif; ?>
				</div>
				<div class="logo top space-balance">
					<img src="/dark.png"/>
				</div>
			</div>
			<div class="content">
				<div>
					<div class="timetable">
						Godziny otwarcia:
						<table>
							<tr>
								<td>poniedziałek</td>
								<?php if($admin):?>
									<td contenteditable="true"><?php echo $schedule[0];?></td>
								<?php else:?>
									<?php if(count($schedule[0]) == 2):?>
										<td><?php echo $schedule[0][0];?></td><td>-</td><td><?php echo $schedule[0][1];?></td>
									<?php else:?>
										<td colspan="3"><?php echo $schedule[0];?></td>
									<?php endif;?>
								<?php endif;?>
							</tr>
							<tr>
								<td>wtorek</td>
								<?php if($admin):?>
									<td contenteditable="true"><?php echo $schedule[1];?></td>
								<?php else:?>
									<?php if(count($schedule[1]) == 2):?>
										<td><?php echo $schedule[1][0];?></td><td>-</td><td><?php echo $schedule[1][1];?></td>
									<?php else:?>
										<td colspan="3"><?php echo $schedule[1];?></td>
									<?php endif;?>
								<?php endif;?>
							</tr>
							<tr>
								<td>środa</td>
								<?php if($admin):?>
									<td contenteditable="true"><?php echo $schedule[2];?></td>
								<?php else:?>
									<?php if(count($schedule[2]) == 2):?>
										<td><?php echo $schedule[2][0];?></td><td>-</td><td><?php echo $schedule[2][1];?></td>
									<?php else:?>
										<td colspan="3"><?php echo $schedule[2];?></td>
									<?php endif;?>
								<?php endif;?>
							</tr>
							<tr>
								<td>czwartek</td>
								<?php if($admin):?>
									<td contenteditable="true"><?php echo $schedule[3];?></td>
								<?php else:?>
									<?php if(count($schedule[3]) == 2):?>
										<td><?php echo $schedule[3][0];?></td><td>-</td><td><?php echo $schedule[3][1];?></td>
									<?php else:?>
										<td colspan="3"><?php echo $schedule[3];?></td>
									<?php endif;?>
								<?php endif;?>
							</tr>
							<tr>
								<td>piątek</td>
								<?php if($admin):?>
									<td contenteditable="true"><?php echo $schedule[4];?></td>
								<?php else:?>
									<?php if(count($schedule[4]) == 2):?>
										<td><?php echo $schedule[4][0];?></td><td>-</td><td><?php echo $schedule[4][1];?></td>
									<?php else:?>
										<td colspan="3"><?php echo $schedule[4];?></td>
									<?php endif;?>
								<?php endif;?>
							</tr>
							<tr>
								<td>sobota</td>
								<?php if($admin):?>
									<td contenteditable="true"><?php echo $schedule[5];?></td>
								<?php else:?>
									<?php if(count($schedule[5]) == 2):?>
										<td><?php echo $schedule[5][0];?></td><td>-</td><td><?php echo $schedule[5][1];?></td>
									<?php else:?>
										<td colspan="3"><?php echo $schedule[5];?></td>
									<?php endif;?>
								<?php endif;?>
							</tr>
							<tr>
								<td>niedziela</td>
								<?php if($admin):?>
									<td contenteditable="true"><?php echo $schedule[6];?></td>
								<?php else:?>
									<?php if(count($schedule[6]) == 2):?>
										<td><?php echo $schedule[6][0];?></td><td>-</td><td><?php echo $schedule[6][1];?></td>
									<?php else:?>
										<td colspan="3"><?php echo $schedule[6];?></td>
									<?php endif;?>
								<?php endif;?>
							</tr>
						</table>
					</div><div class="facebook">
						<iframe id="facebook" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FTakkGliwice&tabs&width=340&height=214&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" scrolling="no" allowTransparency="true"></iframe>
					</div>
				</div>
				<div>
					<div class="address">
						Nasz adres:
						<div>takk bar & lounge</div>
						<div>ul. Plebańska 14</div>
						<div>44-100 Gliwice</div>
					</div><div class="contacts">
						<table>
							<tr><td>Obserwuj nas:</td><td><a class="link" href="https://www.instagram.com/takk__gliwice_/" target="_blank">@takk__gliwice_</a></td></tr>
							<tr><td>Napisz do nas:</td><td><a class="link" href="mailto:takkgliwice@gmail.com" target="_blank">takkgliwice@gmail.com</a></td></tr>
							<tr><td>Zadzwoń do nas:</td><td><a class="link" href="tel:+48799983069" target="_blank">+48799983069</a></td></tr>
						</table>
					</div>
				</div>
				<div id="story"<?php if($admin):?> contenteditable="true"<?php endif;?>><?php echo $story; ?></div>
				<p>Czekamy na Ciebie...</p>
				<script>
					(function() {
						var facebook = document.getElementById('facebook'), t0, t1, t2;
						var landscapeStyle = document.createElement('style'), portraitStyle = document.createElement('style');
						document.head.appendChild(landscapeStyle);
						document.head.appendChild(portraitStyle);
						function scaleFacebook() {
							landscapeStyle.innerHTML = '.facebook iframe {transform: scale(' + document.body.clientHeight * 0.4 / 214 + ');}';
							portraitStyle.innerHTML = '@media only screen and (orientation: portrait) {.facebook iframe {transform: scale(' + document.body.clientWidth * 0.9 / 340 + ');}}';
						};
						addEventListener('resize', function() {
							scaleFacebook();
							// Just in case...
							clearTimeout(t0);
							clearTimeout(t1);
							clearTimeout(t2);
							t0 = setTimeout(scaleFacebook, 250);
							t1 = setTimeout(scaleFacebook, 500);
							t2 = setTimeout(scaleFacebook, 1000);
						});
						scaleFacebook();
					})();
				</script>
				<?php if($admin): ?>
				<form style="display: none" method="post" action="save.php">
					<input name="story"/>
					<input name="schedule"/>
				</form>
				<script>
					var fixPaste = function(collection) {
						for(var i = 0; i < collection.length; ++i)
							collection[i].onpaste = function(e) {
								e.preventDefault();
								var text;
								if (e.clipboardData && e.clipboardData.getData)
									text = e.clipboardData.getData("text/plain");
								else if (window.clipboardData && window.clipboardData.getData)
									text = window.clipboardData.getData("Text");
								text = text.replace('\n', ' ');
								document.execCommand("insertHTML", false, text);
							};
					};
					fixPaste(document.querySelectorAll('[contenteditable="true"]'));
				
					document.querySelector('.control > .floppy').onclick = function() {
						var form = document.forms[0];
						form.elements['story'].value = document.querySelector('#story').innerHTML;
						var schedule = '', timeSlots = document.querySelectorAll('.timetable td:last-of-type');
						for(var i = 0; i < timeSlots.length; ++i)
							schedule += timeSlots[i].innerHTML + ';';
						form.elements['schedule'].value = schedule.slice(0, -1);
						form.submit();
					};
				</script>
				<?php endif; ?>
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