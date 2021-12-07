<?php
session_start();

if(!isset($_SESSION['email']))
{
    header('Location: http://zarodolgozat.test/index.php');
    exit;
}
?>
