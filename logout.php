<?php
include_once "includers/loginCheck.php";
session_start();

session_destroy();

header("Location: index.php");
?>