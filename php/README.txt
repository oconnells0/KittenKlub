At the first line of each PHP file, add:

    include_once(connect.php);

This way you don't need to change code for when we end up putting the file on elvis.
Plus you won't have to worry about reconnecting to the database each time you write a file.

connect.php is in here already, and you can reuse the db variable in it once you include it.