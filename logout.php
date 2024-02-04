<?php
require 'core.inc.php';
session_destroy();
echo $ref;
header('Location: login.html');
exit; // Ensure that no further code is executed after the redirect
?>
