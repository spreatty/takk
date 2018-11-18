<?php
	session_start();
	$admin = $_SESSION['admin'];
?>
<html>
	<head>
		<title>Menu update | takk bar & lounge</title>
		<link rel="stylesheet" href="/common.css"/>
		<link rel="stylesheet" href="/admin/admin.css"/>
		<meta name="theme-color" content="#000"/>
	</head>
	<body>
		<table class="center fullscreen">
			<tr><td>
				<a class="logo small" href="/">
					<img src="/dark.png"/>
					<br/>
					<div>bar & lounge</div>
				</a>
				<?php if($admin): ?>
					<br/>
					<textarea class="menu-edit"><?php echo @file_get_contents('.menu'); ?></textarea>
					<form style="display: none" method="post" action="save.php">
						<input name="names"/>
						<input name="descriptions"/>
						<input name="prices"/>
					</form>
					<br/>
					<div id="save-btn" class="btn">save</div>
					<script>
						document.querySelector('#save-btn').onclick = function() {
							var lines = document.querySelector('.menu-edit').value.split("\n"), names = '', descriptions = '', prices = '';
							for(var i = 0; i < lines.length; ++i) {
								var parts = lines[i].split(';');
								names += parts[0] + ';';
								prices += (parts[1] || '') + ';';
								descriptions += (parts[2] || '') + ';';
							}
							var form = document.forms[0];
							form.elements['names'].value = names.slice(0, -1);
							form.elements['descriptions'].value = descriptions.slice(0, -1);
							form.elements['prices'].value = prices.slice(0, -1);
							form.submit();
						};
					</script>
				<?php else: ?>
					<div class="msg">Please, authenthicate.</div>
				<?php endif; ?>
			</td></tr>
		</table>
	</body>
</html>