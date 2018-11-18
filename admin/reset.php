<?php
	$RESET = '.reset';
	if($rData = @file_get_contents($RESET)) {
		$rData = explode(';', $rData);
		$token = $rData[0];
		$validTime = time() - $rData[1] < 6 * 60 * 60;
	}
	if(isset($_GET['token'])) {
		if($_GET['token'] == $token && $validTime) {
			@unlink($RESET);
			session_start();
			$_SESSION['allowChangePassword'] = true;
			header('Location: new-pass.php');
		} else {
			$msg = 'Given token is not valid.';
		}
	} elseif($_SERVER['REQUEST_METHOD'] == 'POST') {
		if($validTime) {
			$msg = 'An email has been already sent recently. Please check your inbox.';
		} else {
			$hash = base64_encode(openssl_random_pseudo_bytes(40));
			$success = @file_put_contents($RESET, $hash . ";" . time());
			if($success)
				$success = mail('trigtone@gmail.com', 'Reset your takk password',
						"Hello,\n\nA password reset was requested recently for takk admin panel. If you actually requested password reset, follow this link: https://" . $_SERVER['SERVER_NAME'] . "/admin/reset.php?token=" . urlencode($hash) . ". The link is valid for 6 hours.\n\ntakk admin panel",
						'From: takk admin panel <admin@' . $_SERVER['SERVER_NAME'] . '>');
			$msg = $success ? 'Resetting link was sent to your email.' : 'An error occurred while generating token and email. Please try again or contact responsible person.';
		}
	} else {
		$msg = 'Please use link from admin page.';
	}
?>
<html>
	<head>
		<title>Password reset | takk bar & lounge</title>
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
				<div class="msg"><?php echo $msg; ?></div>
			</td></tr>
		</table>
	</body>
</html>