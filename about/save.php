<?php
	session_start();
	if($_SESSION['admin'] && isset($_POST['story']))
		@file_put_contents('.story', $_POST['story']);
	if($_SESSION['admin'] && isset($_POST['schedule']))
		@file_put_contents('.schedule', $_POST['schedule']);
	header('Location: /about/');
?>