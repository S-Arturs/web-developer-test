<?php 
    include '../autoloader.inc.php';

    $_POST["session"];

    $usersObj2 = new EmailController();
    $usersObj2->removeUsers($_POST["session"]);
    header("Location: ../../public/emails-table.php");
    exit;
?>