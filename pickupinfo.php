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

<title>Pickup Info</title>
</head>
<body>


</body>



</html>
<?php
include("studntnav.php");
?>
<br><br><br>
<?php
$id = $_SESSION['id'];


include("project3connection.php");
 $query = "SELECT volunteer.*, users.email 
 FROM users 
 JOIN volunteer 
 ON users.id = volunteer.v_id 
 JOIN pickup 
 ON volunteer.v_id = pickup.v_id 
 WHERE pickup.approved = '1' AND pickup.s_id = $id;
 ";
 $q = mysqli_query($dbc,$query);
 $num = mysqli_num_rows($q);

 
echo"<br><h2 style = 'text-align: center'> These are the information of the volunteer that is going to pick you up:<br><br>";
echo"<table border ='3' align = 'center' cellspacing='3' width='75%' height ='20%'>";

    echo"<tr style='font-weight:bold; font-size:1.1em; text-align: center; background-color:pink'> <td> Last Name </td> <td> First Name </td> <td> Email </td> <td> Phone </td>
        <td> Gender </td> <td> Car Manufacture </td><td> Car Model </td>   <td> Car Year </td> <td> Car Seat </td><td> Big luggage spot </td>  </tr>";

    while($row = mysqli_fetch_array($q)){
        echo"<tr style = 'text-align: center; background-color:#90FFF0'>";
        // echo"<td><a href='admin_edit.php'>".$row['id']."</a></td>";
                          
       
        
        echo"<td>".$row['last_name']."</td>";
        echo"<td>".$row['first_name']."</td>";
        echo"<td>".$row['email']."</td>";
        echo"<td>".$row['phone']."</td>";
        echo"<td>".$row['gender']."</td>";
        echo"<td>".$row['manufacture']."</td>";
        echo"<td>".$row['car_model']."</td>";
        echo"<td>".$row['car_year']."</td>";
        echo"<td>".$row['seat']."</td>";
        echo"<td>".$row['handle_big_luggage']."</td>";
        echo"</tr>";
    
    }


echo"</table>";




?>