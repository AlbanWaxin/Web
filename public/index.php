<?php

require_once("../bootstrap.php");
require_once(APPROOT . "/controller/Doctors.php");

$doctorcontroller = new Doctors();
$doctorcontroller->login();
echo "login";
?>