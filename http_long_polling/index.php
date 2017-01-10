<!DOCTYPE html>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
	<title>HTTP Long Polling</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script>
            var timestamp = null;

            function waitForMsg() {
                $.ajax({
                    type: "GET",
                    url: "http://dbi-poc.com/http_long_polling/ajax_polling_long.php?timestamp=" + timestamp,
                    async: true,
                    cache: false,
                    timeout: 50000,
                    success: function (data) {
                        var json = eval('(' + data + ')');
                        $('#message_board').append(json.msg);
                        // $('#message_board').html(json.msg);
                        timestamp = json.timestamp;
                        setTimeout(waitForMsg, 1000);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus); // this will be "timeout"
                        if (textStatus == 'timeout') {
                            setTimeout(waitForMsg, 1000);
                        }
                    }
                });

            }

	</script>

    </head>
    <body onload="javascript:waitForMsg()">
	<h1> Welcome to HTTP Long Polling</h1>
	<div id="message_board">Your message is here. Current Time: <?php echo date("d/m/Y h:i:s A", time()) ?></div>


    </body>
</html>
