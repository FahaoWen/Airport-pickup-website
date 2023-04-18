<?php
session_start();

?>
<?php
$id =$_SESSION['id'];
$manufacture = $model = $year=$seat=$fit ="";
   

include("project3connection.php");
$id=$_SESSION['id'];

$qs = "SELECT * FROM volunteer WHERE v_id = '$id'";
$query = mysqli_query($dbc,$qs);
$num = mysqli_num_rows($query);

   if($num!=0){
       while($row = mysqli_fetch_array($query)){
           // $id = $row['id'];
           $manufacture = $row['manufacture'];
           $model = $row['car_model'];
           $year = $row['car_year'];
           $seat = $row['seat'];
           $fit = $row['handle_big_luggage'];
       
        
        
       }
   }


?>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

$manufacture =test_input($_POST["manufacture"]);
$model = test_input($_POST["model"]);
$year=test_input($_POST["year"]);
$seat=test_input($_POST["seat"]);
$fit = test_input($_POST["fit"]);


        // if there is not red flag, we are ready to make connect to the database
        include("project3connection.php");

        $qs = "SELECT * FROM volunteer WHERE v_id = '$id'";
        $query = mysqli_query($dbc,$qs);
        $num = mysqli_num_rows($query);
        
            if($num!=0){    
                $qs1 = "UPDATE volunteer SET 
                manufacture = '$manufacture',
                car_year = '$year',
                seat = '$seat',
                car_model = '$model',
                handle_big_luggage = '$fit'
              WHERE v_id = '$id'";
            }
            else{
                $qs1 = "INSERT INTO volunteer(v_id, manufacture, car_year, seat, car_model, handle_big_luggage)
                VALUES ('$id', '$manufacture', '$year', '$seat', '$model', '$fit')";
            }
     

      mysqli_query($dbc,$qs1);
            $registered = mysqli_affected_rows($dbc);
            echo $registered." row has/have been affected.<br>";

            
      
        
    


}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }



?>




<html>
<head>
<title>Flight Information</title>

<style>
.error{
    color: red;
}
</style>    
</head>


<body>

<?php
    include("volnav.php");
?>

<h2 style= "color: blue"> Volunteer Car Information</h2>



<div style ="border :solid;padding:1.1em">
<form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"method ="post" >


What is the manufacture of your car:
<input type ="text" name= "manufacture" value = "<?php echo$manufacture;?>">
<br>

What is the model of your car:
<input type ="text" name= "model" value = "<?php echo$model;?>">
<br>

What is the year  of your car:
<input type ="text" name= "year" value = "<?php echo$year;?>">
<br>



How many seats your car has(use a number from 0 - 9):
<input type ="text" name= "seat" value = "<?php echo$seat;?>">
<br>

How many piece of big luggage your vehicle could handle (use a number from 0 - 9):
<input type ="text" name= "fit" value = "<?php echo$fit;?>">
<br>



<input type = "submit" name = "submit" value="submit">
<br>
</form>
</body>

</html>