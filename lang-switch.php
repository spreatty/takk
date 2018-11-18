<?php
	if($_COOKIE['en'])
		setcookie('en', null, -1);
	else
		setcookie('en', 'true');
	header('Location: ' . $_SERVER['HTTP_REFERER']);
?>