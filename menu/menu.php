<?php
	session_start();
	$admin = $_SESSION['admin'];
	$en = $_COOKIE['en'];
	$lang = $en ? 'polski' : 'english';
?>
<html>
	<head>
		<title>takk bar & lounge | menu</title>
		<link rel="stylesheet" href="/common.css"/>
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
					<div><a href="/about">o takk</a></div>
					<div><a href="/booking">rezerwacja</a></div>
					<div><a href="/map">mapa</a></div>
					<?php if($admin): ?>
					<div class="controls">
						<a class="manual" href="update.php">
							manual
						</a><br><div class="floppy">
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
				<table class="menu">
					<?php $f = @fopen(".menu", "r"); while($tokens = @fgetcsv($f, 0, ";")): $caption = !$admin && !strpos($tokens[1], 'zł');?>
					<tr>
						<td<?php if($caption):?> class="caption"<?php endif;?>>
							<div class="name"<?php if($admin):?> contenteditable="true"<?php endif;?>><?php echo $tokens[0]; ?></div>
							<div class="description"<?php if($admin):?> contenteditable="true"<?php endif;?>><?php echo $tokens[2]; ?></div>
						</td>
						<td class="price"<?php if($admin):?> contenteditable="true"<?php endif;?>><?php echo $tokens[1]; ?></td>
					</tr>
					<?php if($admin): ?>
					<tr>
						<td class="actions" colspan="2">
							<table>
								<tr>
									<td><div class="move-down"><div class="arrow down"></div></div></td>
									<td><div class="move-up"><div class="arrow up"></div></div></td>
									<td><div class="add-below">
										<div class="row"></div><br/>
										<div class="row"></div><br/>
										<div class="row flag"></div><div class="plus"><div></div><div></div></div></div>
									</div></td>
									<td><div class="add-above">
										<div class="row flag"></div><div class="plus"><div></div><div></div></div><br/>
										<div class="row"></div><br/>
										<div class="row"></div>
									</div></td>
									<td><div class="cross"><div></div><div></div></div></td>
								</tr>
							</table>
						</td>
					</tr>
					<?php endif; ?>
					<?php endwhile; @fclose($f); ?>
				</table>
				<?php if($admin): ?>
				<form style="display: none" method="post" action="save.php">
					<input name="names"/>
					<input name="descriptions"/>
					<input name="prices"/>
				</form>
				<script>
					var names, descriptions, prices, menu = document.querySelector('.menu > tbody'), supportingEdit = document.createElement('textarea');
					var decodeHTML = function(html) {
						supportingEdit.innerHTML = html;
						return supportingEdit.value;
					};
					var swap = function(collection, idx0, idx1) {
						var tmp = collection[idx0].innerHTML;
						collection[idx0].innerHTML = collection[idx1].innerHTML;
						collection[idx1].innerHTML = tmp;
					};
					var bindClick = function(collection, handler) {
						for(var i = 0; i < collection.length; ++i)
							collection[i].onclick = handler.bind(collection[i], i);
					};
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
					var bindAll = function() {
						names = document.querySelectorAll('.menu .name');
						descriptions = document.querySelectorAll('.menu .description');
						prices = document.querySelectorAll('.menu .price');
						fixPaste(names);
						fixPaste(descriptions);
						fixPaste(prices);
						bindClick(document.querySelectorAll('.move-down'), function(idx) {
							swap(names, idx, idx + 1);
							swap(descriptions, idx, idx + 1);
							swap(prices, idx, idx + 1);
						});
						bindClick(document.querySelectorAll('.move-up'), function(idx) {
							swap(names, idx, idx - 1);
							swap(descriptions, idx, idx - 1);
							swap(prices, idx, idx - 1);
						});
						bindClick(document.querySelectorAll('.add-below'), function(idx) {
							var nextElem = idx + 1 < prices.length ? prices[idx + 1].parentNode : null;
							createEntry(nextElem);
							bindAll();
						});
						bindClick(document.querySelectorAll('.add-above'), function(idx) {
							var nextElem = idx < prices.length ? prices[idx].parentNode : null;
							createEntry(nextElem);
							bindAll();
						});
						bindClick(document.querySelectorAll('.cross'), function(idx) {
							var entry = prices[idx].parentNode, actions = entry.nextElementSibling;
							entry.parentNode.removeChild(entry);
							actions.parentNode.removeChild(actions);
							bindAll();
						});
					};
					var createEntry = function(nextElem) {
						var entry = document.createElement('tr');
						var actions = document.createElement('tr');
						entry.innerHTML = '<td><div class="name" contenteditable="true">name</div><div class="description" contenteditable="true">description</div></td><td class="price" contenteditable="true">0 zł</td>';
						actions.innerHTML = '<td class="actions" colspan="2"><table><tr><td><div class="move-down"><div class="arrow down"></div></div></td><td><div class="move-up"><div class="arrow up"></div></div></td><td><div class="add-below"><div class="row"></div><br/><div class="row"></div><br/><div class="row flag"></div><div class="plus"><div></div><div></div></div></div></div></td><td><div class="add-above"><div class="row flag"></div><div class="plus"><div></div><div></div></div><br/><div class="row"></div><br/><div class="row"></div></div></td><td><div class="cross"><div></div><div></div></div></td></tr></table></td>';
						if(nextElem) {
							menu.insertBefore(entry, nextElem);
							menu.insertBefore(actions, nextElem);
						} else {
							menu.appendChild(entry);
							menu.appendChild(actions);
						}
					};
					bindAll();
					
					document.querySelector('.controls > .floppy').onclick = function() {
						var n = '', d = '', p = '';
						for(var i = 0; i < names.length; ++i) {
							n += decodeHTML(names[i].innerHTML) + ';';
							d += decodeHTML(descriptions[i].innerHTML) + ';';
							p += decodeHTML(prices[i].innerHTML) + ';';
						}
						var form = document.forms[0];
						form.elements['names'].value = n.slice(0, -1);
						form.elements['descriptions'].value = d.slice(0, -1);
						form.elements['prices'].value = p.slice(0, -1);
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