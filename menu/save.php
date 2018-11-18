<?php
	session_start();
	if($_SESSION['admin'] && $_POST['names'] && $_POST['descriptions'] && $_POST['prices']) {
		$names = explode(';', $_POST['names']);
		$descriptions = explode(';', $_POST['descriptions']);
		$prices = explode(';', $_POST['prices']);
		if(count($names) == count($descriptions) && count($names) == count($prices)) {
			$f = @fopen(".menu", "w");
			for($i = 0, $c = count($names); $i < $c; ++$i) {
				@fwrite($f, trim($names[$i]));
				@fwrite($f, ';');
				@fwrite($f, trim($prices[$i]));
				@fwrite($f, ';');
				@fwrite($f, trim($descriptions[$i]));
				@fwrite($f, "\n");
			}
			@fclose($f);
		}
	}
	header('Location: /menu/');
?>