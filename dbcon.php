<?php
// http://blog.chapagain.com.np/php-mysql-simple-crud-add-edit-delete-view-using-pdo/ staat uitleg
// declareren van variables, username, paswoord etc. die we terug gebruiken in de mysqli connect
// om een connectie te maken.

// DEFINE('DB_USER', 'root');
// DEFINE('DB_PSWD', 'jaime123');
// DEFINE('DB_HOST', 'localhost');
// DEFINE('DB_NAME', 'weatherapp');

//Maken van een connectie met de database.
//Steken deze in een variable en gebruiken var's van hierboven en 
//Kunnen we heel het project door gebruiken.

try {

    $dbcon = new PDO('mysql:host=localhost;dbname=weatherapp;charset=utf8','root', 'jaime&é"');

    echo '*** The connection is OK' . '<br>';

    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}

catch (PDOException $e) {
   die('error connecting to database'. $e-> getMessage());
         
}   

?>