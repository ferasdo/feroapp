<!DOCTYPE html>
<html lang="en">
<head>
<title>
Fero.com
</title>
<meta name="copyright"content="all copy is protacted by fero inderustry">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta charset="UTF-8">
<meta name="theme-color" content="#000000">
<meta name="msapplication-navbutton-color" content="#000000">
<meta name="apple-mobile-web-app-status-bar-style" content="#000000">
<?php
session_start();

session_unset($_SESSION["firstname"]);
session_unset($_SESSION["lastname"]);
session_unset($_SESSION["password"]);
session_unset($_SESSION["user_id"]);
header("location: fero.com ");
?>
</head>
<body>
</body>
</html>
