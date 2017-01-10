<?php

header('Access-Control-Allow-Origin: *');
$filename = "message_board.txt";
$currentmodif = filemtime($filename);
$lastmodif = isset($_GET['timestamp']) ? $_GET['timestamp'] : 0;

while ($currentmodif <= $lastmodif) {
    usleep(10000);
    clearstatcache();
    $currentmodif = filemtime($filename);
}

$content = '<p><b>' . date("d/m/Y h:i:s A", time()) . ' :=></b> <em> ' . (file_get_contents('message_board.txt')) . '</em></p>';
$response = array();
$response['msg'] = $content;
$response['timestamp'] = $currentmodif;
echo json_encode($response);


