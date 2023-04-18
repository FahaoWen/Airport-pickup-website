<?php
session_start();

?>
<html>
<head>
<title>Student Profile </title>
<style>
.error{
    color: red;
}
</style>
</head>
<body>

<?php 

    $id =$_SESSION['id'];


    $lname = $fname  = $gender = $phone= $recommend="";
    $flag =0;



    include("project3connection.php");
    $id=$_SESSION['id'];
   
   $qs = "SELECT * FROM admin WHERE a_id = '$id'";
   $query = mysqli_query($dbc,$qs);
   $num = mysqli_num_rows($query);
   
       if($num!=0){
           while($row = mysqli_fetch_array($query)){
               // $id = $row['id'];
               $lname = $row['lastName'];
               $fname = $row['firstName'];
               $gender = $row['gender'];
               $recommend = $row['recommend'];
               $phone = $row['phone']; 
               
            
            
           }
       }



if($_SERVER["REQUEST_METHOD"] == "POST"){

 // lname field
 if(empty($_POST["lname"])){ // if empty
    $lnameErr = "Last name is required"; 
    $flag=1;
}
else{
    $lname = test_input($_POST["lname"]);

    if(!preg_match("/^[a-zA-Z-' ]*$/",$lname)){
        $lnameErr = "Only letters and white space allowed";
        $flag =1;
        // make sure only letter and white space allow
    }
}

// fname field
if(empty($_POST["fname"])){ // if empty
    $fnameErr = "First name is required"; 
    $flag=1;
}
else{
    $fname = test_input($_POST["fname"]);

    if(!preg_match("/^[a-zA-Z-' ]*$/",$fname)){
        $lnameErr = "Only letters and white space allowed";
        $flag =1;
        // make sure only letter and white space allow
    }
}



$gender = test_input($_POST["gender"]);
$recommend = test_input($_POST["recommend"]);
$phone = test_input($_POST["phone"]);

if($flag==0){
    
    // if there is not red flag, we are ready to make connect to the database
    include("project3connection.php");


    $qs = "SELECT * FROM admin WHERE a_id = '$id'";
        $query = mysqli_query($dbc,$qs);
        $num = mysqli_num_rows($query);
        
            if($num!=0){
                $qs1 = "UPDATE admin SET firstName='$fname', lastName='$lname', gender='$gender', phone='$phone', recommend='$recommend' WHERE a_id='$id'";

            }
            else {
                    $qs1 = "INSERT INTO admin(a_id,firstName, lastName,gender, phone, recommend) 
                    VALUES( '$id','$fname', '$lname',  '$gender', '$phone', '$recommend')"; 
            }
 
        mysqli_query($dbc,$qs1);
        $registered = mysqli_affected_rows($dbc);
        echo $registered." row has/have been affected.<br>";

       
       


}


}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

?>



<?php
    include("adminnav.php");
?>

<h2 style= "color: blue"> Student Profile Information</h2>



<div style ="border :solid;padding:1.1em">
<form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"method ="post" >
Last Name: <input type ="text" name= "lname" value = "<?php echo$lname;?>">
<br>

First Name: <input type ="text" name= "fname" value = "<?php echo$fname;?>">

<br>

Gender:
<input type="radio" name="gender" <?php if (isset($gender)&& $gender =="female") echo"checked";?> value="female" > Female
<input type="radio" name="gender" <?php if (isset($gender)&& $gender =="male") echo"checked";?> value="male" > Male
<input type="radio" name="gender" <?php if (isset($gender)&& $gender =="other") echo"checked";?> value="other" > Other

<br>


Affiliation/Recommended by: <input type ="text" name= "recommend" value = "<?php echo$recommend;?>"><br>




Cell phone number: <input type ="text" name= "phone" value = "<?php echo$phone;?>"><br>




<input type = "submit" name = "submit" value="submit"> <input type = "submit" name = "cancel" value="cancel"> 
<br>

</form>
</div>
<p style ="text-align: center"> Created by Nick Wen </p>
</body>
</html>