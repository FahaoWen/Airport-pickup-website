<?php
session_start();

?>
<?php
if(!isset($_SESSION['id'])){
    die(header("Location: error.php"));
}
?>

<html>
<head>

<title>Check Pick Up need</title>

<style>


</style>
</head>
<body>


</body>



</html>
<?php
include("volnav.php");
?>
<br><br><br>
<?php



include("project3connection.php");


 $query = "SELECT s_id,  DATE_FORMAT(aDate, '%M %d') as aDate, aTime, major FROM student WHERE pickup = 'yes' ORDER BY aDate ASC";
 $q = mysqli_query($dbc,$query);
 
echo"<table border ='3' align = 'center' cellspacing='3' width='75%' height ='60%' background-color:grey>";

    echo"<tr style='font-weight:bold; font-size:1.1em; text-align: center; background-color:pink'> <td> Pickup </td> <td> Arriving Date </td> <td> Arriving Time </td> <td> Major </td></tr>";

    while($row = mysqli_fetch_array($q)){
        echo"<tr style = 'text-align: center; background-color:#90FFF0'>";
        // echo"<td><a href='admin_edit.php'>".$row['id']."</a></td>";
                          
        echo"<td><a class = 'testSize' href='confirmpickup.php?id=".$row['s_id']."'>"."Pickup"."</a></td>";
        echo"<td>".$row['aDate']."</td>";
        echo"<td>".$row['aTime']."</td>";
        echo"<td>".$row['major']."</td>";
        echo"</tr>";
        
    }


echo"</table>";




?>