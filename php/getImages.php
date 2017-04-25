<?php
include_once("connect.php");

$userID = $_GET['userID'];

$query = "SELECT `photo-url` FROM `catabase`.`posts`
          WHERE `userID`=:userID";
$stmt = $dbh->prepare($query);
$stmt->bindParam('userID', $userID);
$stmt->execute() or die("Failed");
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$index = 0;
$innerTable = "";
foreach($result as $obj){
  if($index === 0){
    $innerTable = $innerTable . "<tr>";
  }

  $url = $obj['photo-url'];

  //Format each image as a table cell
  $innerTable = $innerTable . "<td><img src=\"$url\"/></td>";


  if($index === 2){
    $innerTable =$innerTable . "</tr>";
    $index = 0;
  }else{
    $index = $index + 1;
  }
}

echo $_GET['callback'] . '('.json_encode($innerTable).')';

$stmt = null;
?>
