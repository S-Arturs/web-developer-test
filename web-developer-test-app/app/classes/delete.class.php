<?php
//delete button functionality
include '../autoloader.inc.php';
$_POST["session"];
$deletedEmail = new EmailController();
$deletedEmail->removeUsers($_POST["session"]);
header("Location: ../../public/emails-table.php");
exit;
