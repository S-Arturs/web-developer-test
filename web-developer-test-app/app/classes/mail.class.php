<?php
include '../autoloader.inc.php';
$checked = false;
echo $_POST["name"];
if (isset($_POST['vehicle3'])) {
    $checked = true;
}
// $converted_checked = $checked ? 'true' : 'false';
// echo $converted_checked;
$testObj = new EmailController();
$testObj->addUsers($_POST["name"], $checked);
if (isset($_SESSION["error_code"])) {
    header("Location: ../../public");
    exit;
} else {
    header("Location: ../../public/subscribed");
    exit;
}
