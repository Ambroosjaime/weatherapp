<?php
// including the database connection file
include_once("dbcon.php");
 
if (isset($_POST['update'])) {
    
    
    $city=$_POST['city'];
    $high=$_POST['high'];
    $low=$_POST['low'];

    // checking empty fields
    if (empty($city) || empty($high) || empty($low)) {
        if (empty($city)) {
            echo "<font color='red'>city field is empty.</font><br/>";
        }
        
        if (empty($high)) {
            echo "<font color='red'>high field is empty.</font><br/>";
        }
        
        if (empty($low)) {
            echo "<font color='red'>low field is empty.</font><br/>";
        }
    } else {
        //updating the table
        $sql = "UPDATE Weather SET city=:city, high=:high, low=:low WHERE city=:city";
        $query = $dbcon->prepare($sql);
                        
        $query->bindparam(':city', $city);
        $query->bindparam(':high', $high);
        $query->bindparam(':low', $low);
        $query->execute();
        // Alternative to above bindparam and execute
        // $query->execute(array(':id' => $id, ':city' => $city, ':low' => $low, ':high' => $high));
                
        //redirectig to the display phigh. In our case, it is index.php
        header("Location: index.php");
    }
}
  
    //getting id from url
$city = $_GET['city'];
 
//selecting data associated with this particular city
$sql = "SELECT * FROM Weather WHERE city=:city";
$query = $dbcon->prepare($sql);
$query->execute(array(':city' => $city));
 
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $city = $row['city'];
    $high = $row['high'];
    $low = $row['low'];
}
?>
<html>
<head>    
    <title>Edit Weather Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form city="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>city</td>
                <td><input type="text" city="city" value="<?php echo $city;?>"></td>
            </tr>
            <tr> 
                <td>high</td>
                <td><input type="number" city="high" value="<?php echo $high;?>"></td>
            </tr>
            <tr> 
                <td>low</td>
                <td><input type="number" city="low" value="<?php echo $low;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" city="city" value=<?php echo $_GET['city'];?>></td>
                <td><input type="submit" city="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>