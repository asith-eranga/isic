<?php
@header('Content-type: text/javascript');
$protocol_url = explode("/",$_SERVER["SERVER_PROTOCOL"]);
$ori_uri = explode("/",$_SERVER["REQUEST_URI"]);
$http_path = strtolower($protocol_url[0])."://".$_SERVER["SERVER_NAME"]."/";
echo "var http_path = 'http://localhost/isic/'; ";
?>