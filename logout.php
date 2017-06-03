<?php 
session_start();
session_destroy();
include 'main.php';
include 'header.php';
header('Location: /haf/login.php');?>
