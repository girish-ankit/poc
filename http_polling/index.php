<!DOCTYPE html>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
	<title>HTTP Polling</title>

	<script src="jquery.min.js"></script>
	<script>

            function getMessageBoard() {
                $.ajax({
                    type: "GET",
                    url: "http://dbi-poc.com/http_polling/ajax_polling.php",
                    success: function (data) {
                        $('#message_board').append(data);
                        // $('#message_board').html(data);
                    }
                });

            }

            setInterval(getMessageBoard, 5000);
            // getMessageBoard();
	</script>

    </head>
    <body>
	<h1> Welcome to HTTP Polling</h1>
	<div id="message_board">Your message is here. Current Time: <?php echo date("d/m/Y h:i:s A", time()) ?></div>


    </body>
</html>
