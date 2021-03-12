<?php
include_once("user_session.php");

$userSession = new UserSession();
$userSession ->close();

header("Location: ../index.php");

?>