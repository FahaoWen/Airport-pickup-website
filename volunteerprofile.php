<?php
session_start();

?>
<html>
<head>
<title>Volunteer Profile </title>
<style>
.error{
    color: red;
}
</style>
</head>
<body>

<?php 

    $id =$_SESSION['id'];
    $lnameErr = $fnameErr = $genderErr = $phoneErr = "";
 

    $lname = $fname = $ename = $gender =$phone=$wechat= $vacine = $anycomment="";
    $flag =0;




    include("project3connection.php");
    $id=$_SESSION['id'];
   
   $qs = "SELECT * FROM volunteer WHERE v_id = '$id'";
   $query = mysqli_query($dbc,$qs);
   $num = mysqli_num_rows($query);
   
       if($num!=0){
           while($row = mysqli_fetch_array($query)){
               // $id = $row['id'];
               $lname = $row['first_name'];
               $fname = $row['last_name'];
               $ename = $row['ename'];
               $gender = $row['gender'];
               $phone = $row['phone'];
               $wechat = $row['wechat']; 
               $vacine = $row['vaccine'];
               $anycomment = $row['v_comment'];
            
            
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

// english name

$ename = test_input($_POST["ename"]);

// gender filed

if(empty($_POST["gender"])){ // if empty
    $genderErr = "Gender is required"; 
    $flag=1;
}
else{
    $gender = test_input($_POST["gender"]);

}




// any comment and admin comment
$anycomment = test_input($_POST["anycomment"]);

$phone = test_input($_POST["phone"]);
$vacine = test_input($_POST["vacine"]);
$wechat = test_input($_POST["wc"]);

if($flag==0){
    
    // if there is not red flag, we are ready to make connect to the database
    include("project3connection.php");

    $qs = "SELECT * FROM volunteer WHERE v_id = '$id'";
    $query = mysqli_query($dbc,$qs);
    $num = mysqli_num_rows($query);
    
        if($num!=0){
            $qs1 = "UPDATE volunteer SET 
            first_name = '$fname',
            last_name = '$lname',
            phone = '$phone',
            gender = '$gender',
            ename = '$ename',
            wechat = '$wechat',
            vaccine = '$vacine',
            v_comment = '$anycomment'
        WHERE v_id = '$id' ";
        }
        else{
            $qs1 = "INSERT INTO volunteer(v_id,first_name, last_name,phone, gender,ename,wechat,vaccine,v_comment) 
            VALUES( '$id','$fname', '$lname',  '$phone','$gender', '$ename',   
                    '$wechat', '$vacine' ,   '$anycomment')";
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
    include("volnav.php");
?>

<h2 style= "color: blue"> Student Profile Information</h2>



<div style ="border :solid;padding:1.1em">
<form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"method ="post" >
Last Name: <span class = "error">*</span><input type ="text" name= "lname" value = "<?php echo$lname;?>">
<span class = "error">
    <?php  echo $lnameErr;  ?>
</span><br>

First Name: <span class = "error">*</span><input type ="text" name= "fname" value = "<?php echo$fname;?>">
<span class = "error">
    <?php  echo $fnameErr;  ?>
</span>
<br>
English Name(if you have one): <input type = "text" name = "ename" value = "<?php echo$ename; ?>">
<br>
Gender:<span class = "error">*</span>
<input type="radio" name="gender" <?php if (isset($gender)&& $gender =="female") echo"checked";?> value="female" > Female
<input type="radio" name="gender" <?php if (isset($gender)&& $gender =="male") echo"checked";?> value="male" > Male
<input type="radio" name="gender" <?php if (isset($gender)&& $gender =="other") echo"checked";?> value="other" > Other
<span class = "error">
    <?php  echo $genderErr;  ?>
</span>
<br>


Phone : <input type ="text" name= "phone" value = "<?php echo$phone;?>"><br>

WeChat ID: <input type ="text" name= "wc" value = "<?php echo$wechat;?>"><br>
Did you already get COVID Vaccination: <input type ="text" name= "vacine" value = "<?php echo$vacine;?>"><br>



</div>
Volunteer Comment:<br> <textarea name ="anycomment" rows ="5" cols="40"> <?php echo $anycomment;?></textarea> <br><br>

<input type = "submit" name = "submit" value="submit"> <input type = "submit" name = "cancel" value="cancel"> 
<br><br>
<p style ="text-align: center"> Created by Nick Wen </p>

</form>
</body>
</html>