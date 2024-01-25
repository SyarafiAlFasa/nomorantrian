<?php

session_start();
session_unset();
session_destroy();

header("Location: /aplikasi-antrian-berbasis-web-master/aplikasi-antrian-berbasis-web-master/index.php");
exit;
?>