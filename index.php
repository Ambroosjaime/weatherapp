<?php
//including the database connection file
include_once("dbcon.php");

//fetching data in descending order (latest entry first)

$result = $dbcon->query("SELECT * from Weather ORDER BY city ASC")

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
        <td>Update<td>
        
    </tr>
    <?php
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>".$row['city']."</td>";
        echo "<td>".$row['high']."</td>";
        echo "<td>".$row['low']."</td>";
        echo "<td><a href=\"edit.php?city=$row[city]\">Edit</a> | <a href=\"delete.php?city=$row[city]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
    }
    ?>
    </table>
</body>
</html>
