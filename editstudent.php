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
$qs = "SELECT student.*, users.email as email, users.pw as pw  FROM student JOIN users ON student.s_id = users.id WHERE s_id = '$id'";
$query = mysqli_query($dbc,$qs);
$num = mysqli_num_rows($query);

    if($num!=0){
        while($row = mysqli_fetch_array($query)){
            // $id = $row['id'];
           
            $fname = $row['firstName'];
            $lname = $row['lastName'];
            $ename = $row['englishName'];
            $gender = $row['gender'];
            $email = $row['email'];
            $password = $row['pw'];
            $phone = $row['phone'];
            $wechat = $row['wechat'];
            $bringfamily = $row['bringFamily'];
            $firtTime = $row['retu'];
            $level = $row['purpose'];
            $faset = $row['faset6'];
            $school = $row['school'];
            $major = $row['major'];
            $vacine = $row['vaccine'];
            $attention = $row['attention'];
            $anycomment = $row['scomment'];
            $admincomment =$row['acomment'];
            $pickup = $row['pickup'];
               $info = $row['flightInfo'];
               $afnum = $row['aflightnum'];
               $name = $row['aairline'];
               $date = $row['aDate'];
               $time = $row['aTime'];
               $fnum = $row['lflightnum'];
               $laname = $row['lairline'];
               $ldate = $row['lDate'];
               $ltime = $row['lTime'];
               $sluggage = $row['smalllug'];
               $bluggage = $row['biglug'];
               $flightcomment = $row['flightComment'];
        }
    }

 if($_SERVER["REQUEST_METHOD"]== "POST"){
    $id = $_POST['id'];
    $fname = mysqli_real_escape_string($dbc, $_POST['firstName']);
    $lname = mysqli_real_escape_string($dbc, $_POST['lastName']);
    $ename = mysqli_real_escape_string($dbc, $_POST['englishname']);
    $gender = mysqli_real_escape_string($dbc, $_POST['gender']);
    $email = mysqli_real_escape_string($dbc, $_POST['email']);
    $password = mysqli_real_escape_string($dbc, $_POST['pw']);
    $phone = mysqli_real_escape_string($dbc, $_POST['phone']);
    $wechat = mysqli_real_escape_string($dbc, $_POST['wechat']);
    $bringfamily = mysqli_real_escape_string($dbc, $_POST['bringfamily']);
    $firtTime = mysqli_real_escape_string($dbc, $_POST['firtTime']);
    $level = mysqli_real_escape_string($dbc, $_POST['level']);
    $faset = mysqli_real_escape_string($dbc, $_POST['faset']);
    $school = mysqli_real_escape_string($dbc, $_POST['school']);
    $major = mysqli_real_escape_string($dbc, $_POST['major']);
    $vacine = mysqli_real_escape_string($dbc, $_POST['vacine']);
    $attention = mysqli_real_escape_string($dbc, $_POST['attention']);
    $anycomment = mysqli_real_escape_string($dbc, $_POST['anycomment']);
    $admincomment = mysqli_real_escape_string($dbc, $_POST['admincomment']);
    $pickup = mysqli_real_escape_string($dbc, $_POST['pickup']);
    $info = mysqli_real_escape_string($dbc, $_POST['info']);
    $afnum = mysqli_real_escape_string($dbc, $_POST['afnum']);
    $name = mysqli_real_escape_string($dbc, $_POST['name']);
    $date = mysqli_real_escape_string($dbc, $_POST['date']);
    $time = mysqli_real_escape_string($dbc, $_POST['time']);
    $fnum = mysqli_real_escape_string($dbc, $_POST['fnum']);
    $laname = mysqli_real_escape_string($dbc, $_POST['laname']);
    $ldate = mysqli_real_escape_string($dbc, $_POST['ldate']);
    $ltime = mysqli_real_escape_string($dbc, $_POST['ltime']);
    $sluggage = mysqli_real_escape_string($dbc, $_POST['sluggage']);
    $bluggage = mysqli_real_escape_string($dbc, $_POST['bluggage']);
    $flightcomment = mysqli_real_escape_string($dbc, $_POST['flightcomment']);
    

    echo "This is user id ".$id;

    $qs = "UPDATE student SET 
    firstName='$fname', 
    lastName='$lname', 
    englishName='$ename', 
    gender='$gender', 
    phone='$phone', 
    wechat='$wechat', 
    bringFamily='$bringfamily', 
    retu='$firtTime', 
    purpose='$level', 
    faset6='$faset', 
    school='$school', 
    major='$major', 
    vaccine='$vacine', 
    attention='$attention', 
    scomment='$anycomment', 
    acomment='$admincomment', 
    pickup='$pickup', 
    flightInfo='$info', 
    aflightnum='$afnum', 
    aairline='$name', 
    aDate='$date', 
    aTime='$time', 
    lflightnum='$fnum', 
    lairline='$laname', 
    lDate='$ldate', 
    lTime='$ltime', 
    smalllug='$sluggage', 
    biglug='$bluggage', 
    flightComment='$flightcomment' 
  WHERE s_id='$id'";

    //$qs = "UPDATE student SET firstname = '$fname', lastName = '$lname', englishname = '$ename', phone = '$phone', wechat = '$wechat' WHERE s_id = '$id'";
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
<title>Update Student Profile</title>
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
<br>
Last Name <input type = "text" name = "lastName" size="20" maxlength="50" value ="<?php echo$lname;   ?>">
<br>
English name <input type = "text" name = "englishname" size="20" maxlength="50" value ="<?php echo$ename;   ?>">
<br>
Email <input type = "text" name = "email" size="20" maxlength="50" value ="<?php echo$email;   ?>">
<br>
pw <input type = "text" name = "pw" size="20" maxlength="50" value ="<?php echo$password;   ?>">
<br>

phone <input type = "text" name = "phone" size="20" maxlength="50" value ="<?php echo$phone;   ?>">
<br>
wechat <input type = "text" name = "wechat" size="20" maxlength="50" value ="<?php echo$wechat;   ?>">
<br>
Gender:
<input type="radio" name="gender" <?php if (isset($gender)&& $gender =="female") echo"checked";?> value="female" > Female
<input type="radio" name="gender" <?php if (isset($gender)&& $gender =="male") echo"checked";?> value="male" > Male
<input type="radio" name="gender" <?php if (isset($gender)&& $gender =="other") echo"checked";?> value="other" > Other

<br>

Brining family/relatives or not:
<input type="radio" name="bringfamily" <?php if (isset($bringfamily)&& $bringfamily =="yes") echo"checked";?> value="yes" > Yes
<input type="radio" name="bringfamily" <?php if (isset($bringfamily)&& $bringfamily =="no") echo"checked";?> value="no" > No

<br>

Are you a returnings student or first-time student?
<input type="radio" name="firtTime" <?php if (isset($firtTime)&& $firtTime =="Returning") echo"checked";?> value="Returning" > Returning
<input type="radio" name="firtTime" <?php if (isset($firtTime)&& $firtTime =="FirstTime") echo"checked";?> value="FirstTime" > FirstTime

<br>


I am comming to the US to be a 
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

<br>

School you are graduated from: <input type ="text" name= "school" value = "<?php echo$school;?>"><br><br>

Major:<input type ="text" name= "major" value = "<?php echo$major;?>">

<br>


Did you already get COVID Vaccination: <input type ="text" name= "vacine" value = "<?php echo$vacine;?>"><br><br>


Special Attention:
<input type="radio" name="attention" <?php if (isset($attention)&& $attention =="Yes") echo"checked";?> value="Yes" > Yes
<input type="radio" name="attention" <?php if (isset($attention)&& $attention =="No") echo"checked";?> value="No" > No

<br>

Any Comment:<br> <textarea name ="anycomment" rows ="5" cols="40"> <?php echo $anycomment;?></textarea> <br><br>

Admin Comment: <br><textarea name ="admincomment" rows ="5" cols="40"> <?php echo $admincomment;?></textarea> <br><br>



Do you need airport pickup?
<input type="radio" name="pickup" <?php if (isset($pickup)&& $pickup =="yes") echo"checked";?> value="yes" > Yes
<input type="radio" name="pickup" <?php if (isset($pickup)&& $pickup =="no") echo"checked";?> value="no" > No

<br>

Do you have the flight information?
<input type="radio" name="info" <?php if (isset($info)&& $info =="yes") echo"checked";?> value="yes" > Yes
<input type="radio" name="info" <?php if (isset($info)&& $info =="no") echo"checked";?> value="no" > No

<br>

if yes, arriving Atlanta - Flight Number
<input type ="text" name= "afnum" value = "<?php echo$afnum;?>">

<br>

Arriving Atlanta - Airline Name 
<input type ="text" name= "name" value = "<?php echo$name;?>">

<br>

Arriving Atlanta - Date  
<input type ="text" name= "date" value = "<?php echo$date;?>">
(Use mm/dd/yyyy formate)

<br>

Arriving Atlanta - Time  
<span class = "error">*</span><input type ="text" name= "time" value = "<?php echo$time;?>">
(Please use format hh:mm such as 17:20 or 08:15)

<br>

Leaving - Flight Number:  
<input type ="text" name= "fnum" value = "<?php echo$fnum;?>">
<br>

Leaving - Airline Name:  
<input type ="text" name= "laname" value = "<?php echo$laname;?>">

<br>
Leaving - Date  
<input type ="text" name= "ldate" value = "<?php echo$ldate;?>">
(Use mm/dd/yyy formate)

<br>

Leaving - Time   
<input type ="text" name= "ltime" value = "<?php echo$ltime;?>">
(Please use format hh:mm such as 17:20 or 08:15)

<br>

How many piece of big luggage
<input type ="text" name= "bluggage" value = "<?php echo$bluggage;?>">

<br>
How many piece of small luggage
<input type ="text" name= "sluggage" value = "<?php echo$sluggage;?>">

<br>
</div>

<br>
Flight Comment:<br> 
<textarea name ="flightcomment" rows ="5" cols="40"> <?php echo $flightcomment;?></textarea> <br><br>



<br><br>


<input type="submit" value ="Update User">
</form>

</body>

</html>