<?php
include "bejelentkezes_ell.php";
session_start();

session_destroy();

header("Location: ../index.php");
?>