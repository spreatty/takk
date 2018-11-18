<?php
	session_start();
	$allow = $_SESSION['allowChangePassword'];
	if($allow && isset($_POST['password']) && isset($_POST['password-copy'])) {
		if($_POST['password'] == $_POST['password-copy']) {
			$success = @file_put_contents('.passwd', password_hash($_POST['password'], PASSWORD_DEFAULT));
			if($success) {
				$_SESSION['allowChangePassword'] = false;
				$msg = 'Password has been successfully changed.';
			} else {
				$msg = 'An error occurred while saving new password. Please try again or contact responsible person.';
			}
		} else {
			$error = "passwords don't match";
		}
	}
?>
<html>
	<head>
		<title>New password | takk bar & lounge</title>
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
				<?php if($allow && !$msg): ?>
					<form class="auth-form" method="post">
						<input type="password" autofocus="true" name="password" placeholder="password"<?php if($error):?> class="error"<?php endif;?>/>
						<br/>
						<input type="password" name="password-copy" placeholder="repeat password"<?php if($error):?> class="error"<?php endif;?>/>
						<br/>
						<input type="submit" value="submit"/>
					</form>
					<div class="msg error"><?php echo $error; ?></div>
				<?php elseif($allow): ?>
					<div class="msg"><?php echo $msg; ?></div>
				<?php else: ?>
					<div class="msg">Please, use token to proove you are authorized for changing password.</div>
				<?php endif; ?>
			</td></tr>
		</table>
	</body>
</html>