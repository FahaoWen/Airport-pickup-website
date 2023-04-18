<?php
session_start();

?>
<?php
if(!isset($_SESSION['id'])){
    die(header("Location: error.php"));
}
?>
<?php

$id = $fname = $lname= $ename = $phone =$major = $wechat ="";
$id = $_GET['id'];
// echo $id;
include("project3connection.php");

// query base on id
// query base on id
$qs = "SELECT * FROM student WHERE s_id = '$id'";
$query = mysqli_query($dbc,$qs);
$num = mysqli_num_rows($query);

    if($num!=0){
        while($row = mysqli_fetch_array($query)){
            // $id = $row['id'];
            $fname = $row['firstName'];
            $lname = $row['lastName'];
            $ename = $row['englishName'];
            $phone = $row['phone'];
     
            $wechat = $row['wechat'];
        }
    }

 if($_SERVER["REQUEST_METHOD"]== "POST"){
    $id = $_POST['id'];
    $fname = mysqli_real_escape_string($dbc, $_POST['firstName']);
    $lname = mysqli_real_escape_string($dbc, $_POST['lastName']);
    $ename = mysqli_real_escape_string($dbc, $_POST['englishname']);
    $phone = mysqli_real_escape_string($dbc, $_POST['phone']);
    $wechat = mysqli_real_escape_string($dbc, $_POST['wechat']);
    echo "This is user id ".$id;
    $qs = "DELETE FROM student WHERE s_id ='$id' ";
mysqli_query($dbc,$qs);
$num1 = mysqli_affected_rows($dbc); // should be 1

$qs2 = "DELETE FROM users WHERE id ='$id' ";
mysqli_query($dbc,$qs2);
$num2 = mysqli_affected_rows($dbc); // should be 1

if($num1 ==1 && $num1==1){
    echo"This user profile is deleted successful!";
}
else{
    echo "Something went wrong";
}
 }   

?>

<html>
<head>
<title>Delete Student Profile</title>
<style>
.error{color: #FF0000;}
</style>

</head>

<body>
<?php   
include "adminnav.php";
?>


<h3 style = "text-align: center"> Update Student Profile </h3>


<form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"method ="post">
<input type = "hidden" name = "id" size="20" maxlength="50" value ="<?php echo$id;   ?>">

First Name <input type = "text" name = "firstName" size="20" maxlength="50" value ="<?php echo$fname;   ?>">
<br><br>
Last Name <input type = "text" name = "lastName" size="20" maxlength="50" value ="<?php echo$lname;   ?>">
<br><br>
English name <input type = "text" name = "englishname" size="20" maxlength="50" value ="<?php echo$ename;   ?>">
<br><br>
phone <input type = "text" name = "phone" size="20" maxlength="50" value ="<?php echo$phone;   ?>">
<br><br>
wechat <input type = "text" name = "wechat" size="20" maxlength="50" value ="<?php echo$wechat;   ?>">

<br><br>


<input type="submit" value ="Confiem Delete">
</form>

</body>

</html>