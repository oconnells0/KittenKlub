<?php

$username = $_POST["username"];
$password = $_POST["password"];

if($username=="") { die("empty username"); }
if($password=="") { die("empty password"); }
die("all filled , ready to submit");

?>