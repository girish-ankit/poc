<!DOCTYPE html>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
	<title>HTTP Long Polling Admin</title>

    </head>

    <body>

	<?php
	$filename = "message_board.txt";
	$message = file_get_contents($filename);
	if (isset($_REQUEST['message'])) {

	    $message = $_REQUEST['message'];
	    if (($message == "")) {
		$message = '';
		echo "<b>Your message field is required.</b>";
	    } else {

		$file = fopen($filename, "w");
		fwrite($file, $message);
		fclose($file);

		echo "<b> Message has been update</b>";
		$message = file_get_contents($filename);
	    }
	}
	?>
	<h1>Admin Panel to test http polling</h1>

	<form method="post" action="">
	    Your message:<br>
	    <textarea name="message" rows="7" cols="30"><?php echo $message; ?></textarea><br>
	    <input type="submit" value="Send message"/>
	</form>



    </body>
</html>
