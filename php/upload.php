<?php
  $title = $_POST["title"];
  $description = $_POST["description"];
  $file = $_FILES["submission"];

  $filename = $file["tmp_name"];

  //Make sure below works on every platform first
  if (file_exists("./UPLOADED/archive/" . $_POST["username"])) {
       echo "I see it already exists; you've uploaded before.</p>";
  } else {
       // bug in mkdir() requires you to chmod()
       mkdir("./UPLOADED/archive/". $_POST["username"], 0777);
       chmod("./UPLOADED/archive/". $_POST["username"], 0777);
       echo "done.</p>";
  }

?>
