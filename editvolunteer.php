<?php
session_start();

?>
<?php
if(!isset($_SESSION['id'])){
    die(header("Location: error.php"));
}
?>
<?php

$id =$fname = $lname= $ename = $phone =$major = $wechat ="";
$id = $_GET['id'];
// echo $id;
include("project3connection.php");

// query base on id
$qs = "SELECT volunteer.* , users.email AS email, users.pw AS pw FROM volunteer  JOIN users ON volunteer.v_id = users.id WHERE v_id = '$id'";
$query = mysqli_query($dbc,$qs);
$query = mysqli_query($dbc,$qs);
$num = mysqli_num_rows($query);

    if($num!=0){
        while($row = mysqli_fetch_array($query)){
            // $id = $row['id'];
            $fname = $row['first_name'];
            $lname = $row['last_name'];
            $ename = $row['ename'];
            $phone = $row['phone'];
            $wechat = $row['wechat'];
            $email = $row['email'];
            $password = $row['pw'];
            $gender = $row['gender'];
            $vacine = $row['vaccine'];
            $anycomment = $row['v_comment'];
            $manufacture = $row['manufacture'];
            $year = $row['car_year'];
            $model = $row['car_model'];
            $seat = $row['seat'];
            $fit = $row['handle_big_luggage'];


        }
    }

 if($_SERVER["REQUEST_METHOD"]== "POST"){
    $id = $_POST['id'];
    $fname = mysqli_real_escape_string($dbc, $_POST['firstName']);
    $lname = mysqli_real_escape_string($dbc, $_POST['lastName']);
    $ename = mysqli_real_escape_string($dbc, $_POST['englishname']);
    $phone = mysqli_real_escape_string($dbc, $_POST['phone']);
    $wechat = mysqli_real_escape_string($dbc, $_POST['wechat']);
    $email = mysqli_real_escape_string($dbc, $_POST['email']);
    $password = mysqli_real_escape_string($dbc, $_POST['pw']);
    $gender = mysqli_real_escape_string($dbc, $_POST['gender']);
    $vacine = mysqli_real_escape_string($dbc, $_POST['vacine']);
    $anycomment = mysqli_real_escape_string($dbc, $_POST['anycomment']);
    $manufacture = mysqli_real_escape_string($dbc, $_POST['manufacture']);
    $year = mysqli_real_escape_string($dbc, $_POST['year']);
    $model = mysqli_real_escape_string($dbc, $_POST['model']);
    $seat = mysqli_real_escape_string($dbc, $_POST['seat']);
    $fit = mysqli_real_escape_string($dbc, $_POST['fit']);
    
    echo "This is user id ".$id;

    $qs ="UPDATE volunteer 
    SET first_name = '$fname',
        last_name = '$lname',
        ename = '$ename',
        phone = '$phone',
        wechat = '$wechat',
        gender = '$gender',
        vaccine = '$vacine',
        v_comment = '$anycomment',
        manufacture = '$manufacture',
        car_year = '$year',
        car_model = '$model',
        seat = '$seat',
        handle_big_luggage = '$fit'
        WHERE v_id = '$id'
        ";
    

    //$qs = "UPDATE volunteer SET first_name = '$fname', last_name = '$lname', ename = '$ename', phone = '$phone', wechat = '$wechat' WHERE v_id = '$id'";
    mysqli_query($dbc,$qs);
    $num = mysqli_affected_rows($dbc); // should be 1

    $qs2 = "UPDATE  users 
            SET     email = '$email',
                    pw ='$password'
            WHERE id = '$id'";
    
    mysqli_query($dbc,$qs2);
    $num2= mysqli_affected_rows($dbc); // should be 1
    
    if($num ==1|| $num2 ==1){
        echo"Update successful!";
    }
    else{
        echo "Something went wrong";
    }
 }   

?>

<html>
<head>
<title>Edit Volunteer Profile</title>
<style>
.error{color: #FF0000;}
</style>

</head>

<body>
<?php   
include "adminnav.php";
?>




<form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"method ="post">
<input type = "hidden" name = "id" size="20" maxlength="50" value ="<?php echo$id;   ?>">

First Name <input type = "text" name = "firstName" size="20" maxlength="50" value ="<?php echo$fname;   ?>">
<br><br>
Last Name <input type = "text" name = "lastName" size="20" maxlength="50" value ="<?php echo$lname;   ?>">
<br><br>
English name <input type = "text" name = "englishname" size="20" maxlength="50" value ="<?php echo$ename;   ?>">
<br><br>
Email <input type = "text" name = "email" size="20" maxlength="50" value ="<?php echo$email;   ?>">
<br><br>
pw <input type = "text" name = "pw" size="20" maxlength="50" value ="<?php echo$password;   ?>">
<br><br>
Gender:
<input type="radio" name="gender" <?php if (isset($gender)&& $gender =="female") echo"checked";?> value="female" > Female
<input type="radio" name="gender" <?php if (isset($gender)&& $gender =="male") echo"checked";?> value="male" > Male
<input type="radio" name="gender" <?php if (isset($gender)&& $gender =="other") echo"checked";?> value="other" > Other

<br><br>
Phone <input type = "text" name = "phone" size="20" maxlength="50" value ="<?php echo$phone;   ?>">
<br><br>
Wechat <input type = "text" name = "wechat" size="20" maxlength="50" value ="<?php echo$wechat;   ?>">
<br><br>

Did you already get COVID Vaccination: <input type ="text" name= "vacine" value = "<?php echo$vacine;?>"><br>


<br>
What is the manufacture of your car:
<input type ="text" name= "manufacture" value = "<?php echo$manufacture;?>">
<br><br>

What is the model of your car:
<input type ="text" name= "model" value = "<?php echo$model;?>">
<br><br>

What is the year  of your car:
<input type ="text" name= "year" value = "<?php echo$year;?>">
<br><br>

How many seats your car has(use a number from 0 - 9):
<input type ="text" name= "seat" value = "<?php echo$seat;?>">
<br><br>

How many piece of big luggage your vehicle could handle (use a number from 0 - 9):
<input type ="text" name= "fit" value = "<?php echo$fit;?>">
<br><br>


Volunteer Comment:<br> <textarea name ="anycomment" rows ="5" cols="40"> <?php echo $anycomment;?></textarea> <br><br>


<input type="submit" value ="Update User">
</form>

</body>

</html>