<?php

/*** mysql server info ***/
$hostname = 'catabase.czgy5iqmw2jk.us-east-2.rds.amazonaws.com';
$username = 'catabase';
$password = 'catabase';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=catabase",
                   $username, $password);
    /*** echo a message saying we have connected ***/
    //echo 'Connected to database';
}
catch(PDOException $e)
{
    die ('PDO error: cannot connect: ' . $e->getMessage() );
}

// $pdh is now ready for connections

?>
