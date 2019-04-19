<html>
<head>
    <title>Add Data</title>
</head>
 
<body>

<?php
//including the database connection file
include_once("dbcon.php");

if (isset($_post["city"])) {
    $city = $_Post["city"];
    $high = $_post["high"];
    $low = $_post["low"];

    // checking emty fields
   if (empty($city) || empty($high) || empty($low)) {
        if(empty($city)) {
            echo "<font color='red'>city field is empty.</font><br/>";
        }
        
        if(empty($high)) {
            echo "<font color='red'> high field is empty.</font><br/>";
        }
        
        if(empty($low)) {
            echo "<font color='red'>low field is empty.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";

    }
    
    else {
        //if all the fields are filled (not empty)
        
        //insert data to database
        $sql = "INSERT INTO users(city, high, low) VALUES(:city, :high, :low)";
        $query = $dbcon->prepare($sql);
        $query->bindparam("city", $city);
        $query->bindparam("high", $high);
        $query->bindparam("low", $low);
        $query->execute();

        //display success message
        echo "<font color='green'>Data added succesfully.";
        echo "<br/><a href='index.php'>view Result</a>";
    }
}
?>
</body>
</html>