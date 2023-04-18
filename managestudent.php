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

<title>Manage Student</title>

<style>


</style>
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
 $query = "SELECT *, DATE_FORMAT(aDate, '%m/%d/%Y')as aDate FROM student";
 $q = mysqli_query($dbc,$query);
 
echo"<table border ='3' align = 'center' cellspacing='3' width='75%' height ='60%' background-color:grey>";

    echo"<tr style='font-weight:bold; font-size:1.1em; text-align: center; background-color:pink'> <td> S_Id </td> <td> Delete </td> <td> Last Name </td> <td> First Name </td>
     <td> F/M </td> <td> Arr Date </td><td> Arr Time </td>   <td> FN </td> <td> BigLug </td>  </tr>";

    while($row = mysqli_fetch_array($q)){
        echo"<tr style = 'text-align: center; background-color:#90FFF0'>";
        // echo"<td><a href='admin_edit.php'>".$row['id']."</a></td>";
                          
        echo"<td><a class = 'testSize' href='editstudent.php?id=".$row['s_id']."'>".$row['s_id']."</a></td>";
        echo"<td><a href ='deletedstudent.php?id=".$row['s_id']."'> Delete</a></td>"; 
        echo"<td>".$row['lastName']."</td>";
        echo"<td>".$row['firstName']."</td>";
        echo"<td>".$row['gender']."</td>";
        echo"<td>".$row['aDate']."</td>";
        echo"<td>".$row['aTime']."</td>";
        echo"<td>".$row['aflightnum']."</td>";
        echo"<td>".$row['biglug']."</td>";
        echo"</tr>";
    
    }


echo"</table>";




?>