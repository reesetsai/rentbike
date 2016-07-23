<?php
session_start();
session_unset();
session_destroy();
header('Location: http://www.reese-tsai.byethost7.com/');
exit;

?>
 