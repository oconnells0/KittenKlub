<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
   <title>The Uploaded File</title>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
   <meta name="Author" content="Darren Provine" />
      <meta name="generator" content="GNU Emacs" />

 </head>
 <body>

<?php
  include_once("connect.php");

  $title = $_POST["title"];
  $description = $_POST["description"];
  $file = $_FILES["submission"];
  $filename = $file["tmp_name"];

  //$username = $_POST["username"];
  $username = "temp";
  $dirname = "../Pics/UPLOADED/archive" . $username;

  //Create a directory for the user
  if(file_exists("" . $dirname)){
    echo "Folder exists";
  }else{
    mkdir("$dirname", 0777);
    chmod("$dirname", 0777);
  }

  //Make sure file was uploaded
  if(!is_uploaded_file($_FILES["submission"]["tmp_name"])){
    echo "File upload was not successful";
  }


  $filename = $_FILES['submission']['name'];
  $targetname = "$dirname/$filename";

  //Move file into proper directory
  if(file_exists($targetname)){
    echo "<p>The file already exists on the server</p>";
  }else{
    if(copy($_FILES["submission"]["tmp_name"], $targetname)){
      chmod($targetname, 0444);
    }else{
      die("Error copying " . $_FILES["submission"]["name"]);
    }
  }

  //Will eventually need to be changed to add actual userID
  //File is saved in a folder called ../Pics/UPLOADED
  //This folder must exist relative to wherever you're calling
  //the php file from, or else your photo will not be uploaded
  //Don't change it, it works fine, I've tested it many times
  $query = "INSERT into `catabase`.`posts`
            (`userID`,`title`,`description`,`photo-url`)
            values('0', :title, :desc, :url)";
  $stmt = $dbh->prepare($query);
  $stmt->bindParam('title', $title, PDO::PARAM_STR, 45);
  $stmt->bindParam('desc', $description, PDO::PARAM_STR, 160);
  $stmt->bindParam('url', $targetname, PDO::PARAM_STR, 45);
  $stmt->execute() or die("Failed");
  $stmt = null;



  echo "<p>$targetname</p>";

  echo "<img src=\"$targetname\"></img>"
 ?>
 </body>
