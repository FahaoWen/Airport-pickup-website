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

<title>assignpickup</title>

<style>
 
 .asnpk {
  font-weight: bold;
}


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
 $query ="SELECT student.s_id, pickup.p_id, student.firstName, student.lastName, student.gender, DATE_FORMAT(student.aDate, '%M %d') as aDate, student.aTime, pickup.v_id,  pickup.approved    
 FROM student
 RIGHT JOIN pickup ON pickup.s_id = student.s_id
 ORDER BY student.aDate";
 

 $q = mysqli_query($dbc,$query);
 
echo"<table border ='3' align = 'center' cellspacing='3' width='75%' height ='60%' background-color:grey>";

    echo"<tr style='font-weight:bold; font-size:1.1em; text-align: center; background-color:pink'> <td> To confirm/approve </td> <td> First name </td> <td> Last Name </td> <td> Gender </td>
     <td> arr_date </td> <td> arr_time </td><td> v_id </td>   <td> already approved? </td></tr>";

    while($row = mysqli_fetch_array($q)){
        echo"<tr style = 'text-align: center; background-color:#90FFF0'>";
        // echo"<td><a href='admin_edit.php'>".$row['id']."</a></td>";
        echo "<td><a class='testSize' href='approvepickup.php?id=".$row['p_id']."&second_id=".$row['s_id']."'>"."Approve"."</a></td>";
        echo"<td>".$row['firstName']."</td>";
        echo"<td>".$row['lastName']."</td>";
        echo"<td>".$row['gender']."</td>";
        echo"<td>".$row['aDate']."</td>";
        echo"<td>".$row['aTime']."</td>";
        echo"<td>".$row['v_id']."</td>";
        $app = ($row['approved'] == 0) ? "No" : "Yes";

        echo"<td>".$app."</td>";
        echo"</tr>";
    
    }


echo"</table>";




?>