<?php
session_start();

?>
<?php
if(!isset($_SESSION['id'])){
    die(header("Location: error.php"));
}
?>

<?php
include("adminnav.php");
include("project3connection.php");
?>
<br><br><br>

<?php
$student = $volunteer = '';



if($_SERVER["REQUEST_METHOD"] == "POST"){
    $student = $_POST['student'];            
    $volunteer = $_POST['volunteer'];    

    $q1 = "SELECT * FROM pickup WHERE s_id = '$student'";
    $q1 = mysqli_query($dbc, $q1);
    $num = mysqli_num_rows($q1);

    if($num=0){
        $query = "INSERT INTO  pickup(s_id, v_id, approved) VALUES('$student','$volunteer','1')";

    }
    else{
        echo" <script>";
         
        echo 'alert("Student already has been assigned");';
        echo" </script>";
    }

  
        
}

?>


<html>
<head>

<title>Student need Pickup</title>

<style>


</style>
</head>
<body>
<form action ='<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>'method ='post' style = "text-align: center">
You want to assign student: (Enter student id)<input type ="text" name= "student" value = "<?php echo$student;?>">
to Volunteer(Enter volunteer id)<input type ="text" name= "volunteer" value = "<?php echo$volunteer;?>"><br><br>
<input type ="submit" name= "submit" value= "Click Here to Confirm">



</body>



</html>

<?php






include("project3connection.php");

$q1 = "SELECT s_id FROM pickup";
$result = mysqli_query($dbc,$q1);
$data = array();

while($row = mysqli_fetch_array($result)){
   $data[] = $row[0];
}



 $query = " SELECT *FROM student

 WHERE pickup ='yes' AND  s_id NOT IN ('" . implode("', '", $data) . "') ";


 $q = mysqli_query($dbc,$query);
 echo"<h1>Students who have not been assign to pickup: </h1>";
echo"<table border ='3' align = 'center' cellspacing='3' width='75%' height ='10%' background-color:grey>";

    echo"<tr style='font-weight:bold; font-size:1.1em; text-align: center; background-color:pink'> <td> S_Id </td> < <td> Last Name </td> <td> First Name </td>
     <td> F/M </td> <td> Arr Date </td><td> Arr Time </td>   <td> FN </td> <td> BigLug </td>  </tr>";

    while($row = mysqli_fetch_array($q)){
        echo"<tr style = 'text-align: center; background-color:#90FFF0'>";

        echo"<td>".$row['s_id']."</td>";
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