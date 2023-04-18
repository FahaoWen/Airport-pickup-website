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
    $lnameErr = $fnameErr = $genderErr = $fmailyErr=$returnErr= $levelErr= $majorErr= $phoneErr = 
    $attentionErr="";

    $lname = $fname = $ename = $gender = $bringfamily = $firtTime= $level=$school=$major=$phone=$wechat= $faset = $attention
    = $vacine = $anycomment=$admincomment="";
    $flag =0;

  

    include("project3connection.php");
    $id=$_SESSION['id'];
   
   $qs = "SELECT * FROM student WHERE s_id = '$id'";
   $query = mysqli_query($dbc,$qs);
   $num = mysqli_num_rows($query);
   
       if($num!=0){
           while($row = mysqli_fetch_array($query)){
               // $id = $row['id'];
               $lname = $row['lastName'];
               $fname = $row['firstName'];
               $ename = $row['englishName'];
               $gender = $row['gender'];
               $bringfamily = $row['bringFamily'];
               $firtTime = $row['retu'];
               $level = $row['purpose'];
               $school = $row['school'];
               $major = $row['major'];
               $phone = $row['phone'];
               $wechat = $row['wechat'];
               $faset = $row['faset6'];
               $attention = $row['attention'];
               $vacine = $row['vaccine'];
               $anycomment = $row['scomment'];
               $admincomment = $row['acomment'];
            
           }
       }
   
   
   

?>






<?php
    
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


// family field
if(empty($_POST["bringfamily"])){ // if empty
    $fmailyErr = "This field is required"; 
    $flag=1;
}
else{
    $bringfamily = test_input($_POST["bringfamily"]);

}

//return field

if(empty($_POST["firtTime"])){ // if empty
    $returnErr = "This field is required"; 
    $flag=1;
}
else{
    $firtTime= test_input($_POST["firtTime"]);

}

// level field

if($_POST["level"]=="blank"){
    $levelErr ="Please select a academic level";
    $flag=1;
}

else{
    $level = test_input($_POST["level"]);

    $flag=0;
    }   


// faset field

$faset = test_input($_POST["faset"]);



// major field

if(empty($_POST["major"])){ // if empty
    $majorErr = "Major  is required"; 
    $flag=1;
}
else{
    $major = test_input($_POST["major"]);

}






// special attention

if(empty($_POST["attention"])){ // if empty
    $attentionErr = "This field is required"; 
    $flag=1;
}
else{
    $attention = test_input($_POST["attention"]);

}

// any comment and admin comment
$anycomment = test_input($_POST["anycomment"]);
$admincomment = test_input($_POST["admincomment"]);
$phone = test_input($_POST["phone"]);
$vacine = test_input($_POST["vacine"]);
$wechat = test_input($_POST["wc"]);
$school = test_input($_POST["school"]);

if($flag==0){
    
    // if there is not red flag, we are ready to make connect to the database
    include("project3connection.php");

   
        $qs = "SELECT * FROM student WHERE s_id = '$id'";
        $query = mysqli_query($dbc,$qs);
        $num = mysqli_num_rows($query);
        
            if($num!=0){
                $qs1= "UPDATE student 
                SET firstName = '$fname', lastName = '$lname', englishName = '$ename', gender = '$gender', bringFamily = '$bringfamily', retu = '$firtTime', purpose = '$level', 
                faset6 = '$faset', school = '$school', major = '$major', phone = '$phone', wechat = '$wechat', vaccine = '$vacine', attention = '$attention', 
                scomment = '$anycomment', acomment = '$admincomment'
                WHERE s_id = '$id'";
            }
            else{
                $qs1 ="INSERT INTO student(s_id,firstName, lastName,englishName, gender,bringFamily,retu,purpose,faset6,school,major,phone,wechat,vaccine,attention,scomment,acomment) 
                VALUES( '$id','$fname', '$lname', '$ename', '$gender', '$bringfamily', '$firtTime', '$level','$faset','$school', '$major', '$phone', '$wechat', 
                        '$vacine', '$attention' ,  '$anycomment', '$admincomment')";
            }

        
        mysqli_query($dbc,$qs1);
        $registered = mysqli_affected_rows($dbc);
        echo $registered." row has/have been affected.<br>";

       
       
        header("Location:studentflight.php");
        exit();
    

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
    include("studntnav.php");
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

Brining family/relatives or not:<span class = "error">*</span>
<input type="radio" name="bringfamily" <?php if (isset($bringfamily)&& $bringfamily =="yes") echo"checked";?> value="yes" > Yes
<input type="radio" name="bringfamily" <?php if (isset($bringfamily)&& $bringfamily =="no") echo"checked";?> value="no" > No
<span class = "error">
    <?php  echo $fmailyErr;  ?>
</span>
<br>

Are you a returnings student or first-time student?<span class = "error">*</span>
<input type="radio" name="firtTime" <?php if (isset($firtTime)&& $firtTime =="Returning") echo"checked";?> value="Returning" > Returning
<input type="radio" name="firtTime" <?php if (isset($firtTime)&& $firtTime =="FirstTime") echo"checked";?> value="FirstTime" > FirstTime
<span class = "error">
    <?php  echo $returnErr;  ?>
</span>
<br>


I am comming to the US to be a <span class = "error">*</span>
<select name = "level">
<option <?php if(isset($level)&&$level =="blank") echo "selected = 'selected'";?> value = "blank"> -- Select --</option>
<option <?php if(isset($level)&&$level =="ud") echo "selected = 'selected'";?> value = "ud"> undergraduate student</option>
<option <?php if(isset($level)&&$level =="gd") echo "selected = 'selected'";?> value = "gd"> graduate student</option>
<option <?php if(isset($level)&&$level =="vs") echo "selected = 'selected'";?> value = "vs"> visiting scholar</option>
<option <?php if(isset($level)&&$level =="ot") echo "selected = 'selected'";?> value = "ot"> other</option>
</select>


Are you attending FASET? If you will attend on 08/16, please choose FASET6
<select name = "faset">
<option <?php if(isset($faset)&&$faset =="na") echo "selected = 'selected'";?> value = "na">Not attending </option>
<option <?php if(isset($faset)&&$faset =="f6") echo "selected = 'selected'";?> value = "f6">FASET 6</option>
</select>
<span class ="error">*
    <?php echo $levelErr?>
</span> 
<br>

School you are graduated from: <input type ="text" name= "school" value = "<?php echo$school;?>"><br>
Major: <span class = "error">*</span><input type ="text" name= "major" value = "<?php echo$major;?>">
<span class ="error">*
    <?php echo $majorErr?>
</span> 
<br>

Phone in case of emergency: <input type ="text" name= "phone" value = "<?php echo$phone;?>"><br>

WeChat ID: <input type ="text" name= "wc" value = "<?php echo$wechat;?>"><br>
Did you already get COVID Vaccination: <input type ="text" name= "vacine" value = "<?php echo$vacine;?>"><br>


Special Attention:<span class = "error">*</span>
<input type="radio" name="attention" <?php if (isset($attention)&& $attention =="Yes") echo"checked";?> value="Yes" > Yes
<input type="radio" name="attention" <?php if (isset($attention)&& $attention =="No") echo"checked";?> value="No" > No
<span class ="error">*
    <?php echo $attentionErr?>
</span> 
<br>
</div>
Any Comment:<br> <textarea name ="anycomment" rows ="5" cols="40"> <?php echo $anycomment;?></textarea> <br><br>

Admin Comment: <br><textarea name ="admincomment" rows ="5" cols="40"> <?php echo $admincomment;?></textarea> <br><br>
<input type = "submit" name = "submit" value="submit"> <input type = "submit" name = "cancel" value="cancel"> 
<br><br>
<p style ="text-align: center"> Created by Nick Wen </p>
</form>
</body>
</html>