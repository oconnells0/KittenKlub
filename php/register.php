<?php

$username1 = $_POST["username1"];
$username2 = $_POST["username2"];
$password1 = $_POST["password1"];
$password2 = $_POST["password2"];

if($username1=="") { die("empty username"); }
if($username2=="") { die("empty confirm username"); }
if($username1 !== $username2) { die("Usernames do not match"); }
if($password1=="") { die("empty password"); }
if($password2=="") { die("empty confirm password"); }
if($password1 !== $password2) { die("Passwords do not match"); }
die("all filled , ready to submit");

?>