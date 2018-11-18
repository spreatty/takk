<?php
	session_start();
	$pass = @file_get_contents('.passwd');
	$valid = ($pass && password_verify($_POST['password'], $pass)) || (!$pass && isset($_POST['password']) && !$_POST['password']);
	if($valid) {
		$_SESSION['admin'] = true;
		header('Location: /');
	}
	$error = !$valid && $_SERVER['REQUEST_METHOD'] == 'POST';
?>
<html>
	<head>
		<title>Admin | takk bar & lounge</title>
		<link rel="stylesheet" href="/common.css"/>
		<link rel="stylesheet" href="admin.css"/>
		<meta name="theme-color" content="#000"/>
	</head>
	<body>
		<table class="center fullscreen">
			<tr><td>
				<a class="logo" href="/">
					<img src="/dark.png"/>
					<br/>
					<div>bar & lounge</div>
				</a>
				<form class="auth-form" method="post">
					<input type="password" autofocus="true" name="password" placeholder="password"<?php if($error):?> class="error"<?php endif;?>/>
					<br/>
					<input type="submit" value="submit"/>
				</form>
				<form class="reset-form" method="post" action="reset.php">
					<input type="submit" value="reset password"/>
				</form>
			</td></tr>
		</table>
	</body>
</html>