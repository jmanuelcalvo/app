<?php
$dir = "/var/www/html/files/";
$images = array_diff(scandir($dir), array('..', '.'));

header('Content-Type: application/json');
echo json_encode(['images' => $images]);
?>