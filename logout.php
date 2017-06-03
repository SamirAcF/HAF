<?php 
session_start();
session_destroy();
include 'main.php';
include "success.php";
header("refresh:5;url=/haf/");
