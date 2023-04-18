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

<title>Manage Volunteer</title>
</head>
<body>


</body>



</html>
<?php
include("adminnav.php");
?>
<br><br><br>
<?php



include("project3connection.php");
 $query = "SELECT * FROM volunteer";
 $q = mysqli_query($dbc,$query);
 
echo"<table border ='3' align = 'center' cellspacing='3' width='75%' height ='60%'>";

    echo"<tr style='font-weight:bold; font-size:1.1em; text-align: center; background-color:pink'> <td> S_Id </td> <td> Delete </td> <td> Last Name </td> <td> First Name </td>
     <td> F/M </td> <td> Phone </td><td> Car Model </td>   <td> Car Year </td> <td> Car Seat </td>  </tr>";

    while($row = mysqli_fetch_array($q)){
        echo"<tr style = 'text-align: center; background-color:#90FFF0'>";
        // echo"<td><a href='admin_edit.php'>".$row['id']."</a></td>";
                          
        echo"<td><a href='editvolunteer.php?id=".$row['v_id']."'>".$row['v_id']."</a></td>";
        echo"<td><a href ='deletevolunteer.php?id=".$row['v_id']."'> Delete</a></td>"; 
        echo"<td>".$row['last_name']."</td>";
        echo"<td>".$row['first_name']."</td>";
        echo"<td>".$row['gender']."</td>";
        echo"<td>".$row['phone']."</td>";
        echo"<td>".$row['car_model']."</td>";
        echo"<td>".$row['car_year']."</td>";
        echo"<td>".$row['seat']."</td>";
        echo"</tr>";
    
    }


echo"</table>";




?>