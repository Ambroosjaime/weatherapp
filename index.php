<?php
//including the database connection file
include_once("dbcon.php");

//fetching data in descending order (latest entry first)

$result = $dbcon->query("SELECT * from users ORDER BY id DESC")

?>

<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
<a href="insert-data.html">Add New Data</a><br/><br/>
 
    <table width='80%' border=0>
 
    <tr bgcolor='#CCCCCC'>
        <td>city</td>
        <td>high</td>
        <td>low</td>
        
    </tr>
    <?php
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>".$row['city']."</td>";
        echo "<td>".$row['high']."</td>";
        echo "<td>".$row['low']."</td>";
        echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
    }
    ?>
    </table>
</body>
</html>