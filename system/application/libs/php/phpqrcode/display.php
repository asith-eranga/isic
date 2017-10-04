<?php
session_start();
//print_r($_SESSION['cart_products']); die();
include("qrlib.php");
//QRcode::png(serialize($_SESSION['cart_products']));
QRcode::png(serialize($_SESSION['cart_products']));
?>