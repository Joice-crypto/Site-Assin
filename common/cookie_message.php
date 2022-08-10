<?php
	if (!isset($_COOKIE["cookie_message"]))
		setcookie("cookie_message", "true", time() + (10 * 365 * 24 * 60 * 60), "/");

	if (isset($_GET["set_cookie_message"]))
		if ($_GET["set_cookie_message"] === "false")
			setcookie("cookie_message", "false", time() + (10 * 365 * 24 * 60 * 60), "/");
?>
