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

<title>Pickup Assignment</title>

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


$id = $_SESSION['id'];
include("project3connection.php");
$query = "SELECT student.*, users.email,DATE_FORMAT(student.aDate, '%m/%d/%Y') as aDate,DATE_FORMAT(student.lDate, '%m/%d/%Y')  as lDate
FROM users 
JOIN student 
ON users.id = student.s_id 
JOIN pickup 
ON student.s_id = pickup.s_id 
WHERE pickup.approved = '1' AND pickup.v_id = $id;
";
 //$query = "SELECT *, DATE_FORMAT(aDate, '%m/%d/%Y')as aDate FROM student";
 $q = mysqli_query($dbc,$query);

echo"<h2 style = 'text-align: center'> You are assigned to pickup the student below:<br><br>";

echo"<table border ='3' align = 'center' cellspacing='3' width='100%' height ='20%' background-color:grey>";

    echo"<tr style='font-weight:bold; font-size:1.1em; text-align: center; background-color:pink'>
     <td> Last Name </td> <td> First Name </td> <td> Gender </td> <td> Major </td>
     <td> Email </td> <td> Phone </td><td> Arrival Airline </td> <td> AFlight Number </td> <td> Arrivial Date </td> 
     <td> Arrivial Time </td><td> Living Airline</td><td> LFlight Number </td><td> Leaving Date </td><td> Leaving Time </td>
     <td> Small Luggage </td><td> Big Luggage </td>
     </tr>";

    while($row = mysqli_fetch_array($q)){
        echo"<tr style = 'text-align: center; background-color:#90FFF0'>";
        // echo"<td><a href='admin_edit.php'>".$row['id']."</a></td>";
                          
        echo"<td>".$row['lastName']."</td>";
        echo"<td>".$row['firstName']."</td>";
        echo"<td>".$row['gender']."</td>";
        echo"<td>".$row['major']."</td>";
        echo"<td>".$row['email']."</td>";
        echo"<td>".$row['phone']."</td>";
        echo"<td>".$row['aairline']."</td>";
        echo"<td>".$row['aflightnum']."</td>";
        echo"<td>".$row['aDate']."</td>";
        echo"<td>".$row['aTime']."</td>";
        echo"<td>".$row['lairline']."</td>";
        echo"<td>".$row['lflightnum']."</td>";
        echo"<td>".$row['lDate']."</td>";
        echo"<td>".$row['lTime']."</td>";
        echo"<td>".$row['smalllug']."</td>";
        echo"<td>".$row['biglug']."</td>";
        echo"</tr>";
    
    }


echo"</table>";




?>