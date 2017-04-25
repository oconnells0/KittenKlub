<?php


$username1 = $_POST["username1"];
$username2 = $_POST["username2"];

if($username1=="") { die("empty username"); }
if($username2=="") { die("empty confirm username"); }
if($username1 !== $username2) { die("Usernames do not match"); }
die("all filled in");

?>