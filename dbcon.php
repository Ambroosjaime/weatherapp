<?php
// http://blog.chapagain.com.np/php-mysql-simple-crud-add-edit-delete-view-using-pdo/ staat uitleg
// declareren van variables, username, paswoord etc. die we terug gebruiken in de mysqli connect
// om een connectie te maken.

DEFINE('DB_USER', 'root');
DEFINE('DB_PSWD', 'jaime&é"');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'weatherapp');

//Maken van een connectie met de database.
//Steken deze in een variable en gebruiken var's van hierboven en 
//Kunnen we heel het project door gebruiken.

 $dbcon = new mysqli(DB_HOST, DB_USER, DB_PSWD, DB_NAME);



if (!$dbcon) {
             die('error connecting to database');

             }
 else{
    echo 'connected succesfully';


 }   

?>