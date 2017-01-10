<?php

header('Access-Control-Allow-Origin: *');
echo'<p><b>' . date("d/m/Y h:i:s A", time()) . ':=></b> <em>' . (file_get_contents('message_board.txt')) . '</em></p>';
