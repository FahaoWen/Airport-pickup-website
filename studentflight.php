<?php
session_start();

?>
<?php
$id =$_SESSION['id'];
 $pickup = $info = $name =$flightcomment = $date = $time = $fnum = $laname = $ldate = $ltime = $bluggage =$sluggage  = $afnum="";

 $pickupErr = $infoErr = $nameErr = $dateErr = $timeErr = $fnumErr = $lanameErr = $ldateErr = $ltimeErr = $bluggageErr =$sluggageErr =$flightcommentErr =$afnumErr="";
   
 $flag=0;

 include("project3connection.php");
    $id=$_SESSION['id'];
   
   $qs = "SELECT *, DATE_FORMAT(aDate, '%m/%d/%Y')as aDate, DATE_FORMAT(lDate, '%m/%d/%Y')as lDate FROM student WHERE s_id = '$id'";
   $query = mysqli_query($dbc,$qs);
   $num = mysqli_num_rows($query);
   
       if($num!=0){
           while($row = mysqli_fetch_array($query)){
               // $id = $row['id'];
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
   

?>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
// pickup filed

if(empty($_POST["pickup"])){ // if empty
    $pickupErr = "Pickup is required"; 
    $flag=1;
}
else{
    $pickup = test_input($_POST["pickup"]);

}

// info filed

if(empty($_POST["info"])){ // if empty
    $infoErr = "Info is required"; 
    $flag=1;
}
else{
    $info = test_input($_POST["info"]);

}


// arrival flight

if(empty($_POST["afnum"])){ // if empty
    $afnumErr = "arriaval flight is required"; 
    $flag=1;
}
else{
    $afnum = test_input($_POST["afnum"]);

}

// Airline name

if(empty($_POST["name"])){ // if empty
    $nameErr = "name is required"; 
    $flag=1;
}
else{
    $name = test_input($_POST["name"]);

}

// Airline date

if(empty($_POST["date"])){ // if empty
    $dateErr = "array date is required"; 
    $flag=1;
}
else{
    $date = test_input($_POST["date"]);
    if(!preg_match("/^(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])\/\d{4}$/",$date)){
        $dateErr ="Wrong formate, please enter again!";
        $flag =1;
    }
}

// arrival time

if(empty($_POST["time"])){ // if empty
    $timeErr = "arrival time is required"; 
    $flag=1;
}
else{
    $time = test_input($_POST["time"]);
    if(!preg_match("/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/",$time)){
        $timeErr ="Wrong formate, please enter again!";
        $flag =1;
    }
}

// leave flight number

if(empty($_POST["fnum"])){ // if empty
    $fnumErr = "Leaving flight is required"; 
    $flag=1;
}
else{
    $fnum = test_input($_POST["fnum"]);

}

// Leaving name

if(empty($_POST["laname"])){ // if empty
    $lanameErr = "Leaving flight name is required"; 
    $flag=1;
}
else{
    $laname = test_input($_POST["laname"]);

}

// Leave date

if(empty($_POST["ldate"])){ // if empty
    $ldateErr = "leave date is required"; 
    $flag=1;
}
else{
    $ldate = test_input($_POST["ldate"]);
    if(!preg_match("/^(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])\/\d{4}$/",$ldate)){
        $ldateErr ="Wrong formate, please enter again!";
        $flag =1;
    }
}

// leave time

if(empty($_POST["ltime"])){ // if empty
    $ltimeErr = "leave time is required"; 
    $flag=1;
}
else{
    $ltime = test_input($_POST["ltime"]);
    if(!preg_match("/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/",$ltime)){
        $ltimeErr ="Wrong formate, please enter again!";
        $flag =1;
    }
}

// big luggage

if(empty($_POST["bluggage"])){ // if empty
    $bluggageErr = "Big luggage is required"; 
    $flag=1;
}
else{
    $bluggage = test_input($_POST["bluggage"]);

}

// Small luggage

if(empty($_POST["sluggage"])){ // if empty
    $sluggageErr = "Small luggage is required"; 
    $flag=1;
}
else{
    $sluggage = test_input($_POST["sluggage"]);

}

$flightcomment = test_input($_POST["flightcomment"]);





if($flag==0){
    
        // if there is not red flag, we are ready to make connect to the database
        include("project3connection.php");
    
        $qs = "SELECT * FROM student WHERE s_id = '$id'";
        $query = mysqli_query($dbc,$qs);
        $num = mysqli_num_rows($query);
       
        if($num!=0){
            $sq1 = "UPDATE student SET 
            pickup = '$pickup',
            flightInfo = '$info',
            aairline = '$name',
            aflightnum = '$fnum',
            aDate = STR_TO_DATE('$date', '%m/%d/%Y'),
            aTime = '$time',
            lflightnum = '$afnum',
            lairline = '$laname',
            lDate = STR_TO_DATE('$ldate', '%m/%d/%Y'),
            lTime = '$ltime',
            smalllug = '$sluggage ',
            biglug = '$bluggage',
            flightComment = '$flightcomment '
          WHERE s_id = '$id'";
        }
        else{
            $sq1 = "INSERT INTO student(s_id, pickup, flightInfo, aairline, aflightnum, aDate, aTime, lflightnum, lairline, lDate, lTime, smalllug, biglug, flightComment)
            VALUES ('$id', '$pickup', '$info', '$name', '$fnum', STR_TO_DATE('$date', '%m/%d/%Y'), '$time', '$afnum', '$laname', STR_TO_DATE('$ldate', '%m/%d/%Y'), '$ltime', '$sluggage', '$bluggage', '$flightcomment')";

        }

        mysqli_query($dbc,$sq1);
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
    include("studntnav.php");
?>

<h2 style= "color: blue"> Student Flight Inforation</h2>



<div style ="border :solid;padding:1.1em">
<form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"method ="post" >

Do you need airport pickup?<span class = "error">*</span>
<input type="radio" name="pickup" <?php if (isset($pickup)&& $pickup =="yes") echo"checked";?> value="yes" > Yes
<input type="radio" name="pickup" <?php if (isset($pickup)&& $pickup =="no") echo"checked";?> value="no" > No
<span class = "error">
    <?php  echo $pickupErr;  ?>
</span>
<br>

Do you have the flight information?<span class = "error">*</span>
<input type="radio" name="info" <?php if (isset($info)&& $info =="yes") echo"checked";?> value="yes" > Yes
<input type="radio" name="info" <?php if (isset($info)&& $info =="no") echo"checked";?> value="no" > No
<span class = "error">
    <?php  echo $infoErr;  ?>
</span>
<br>

if yes, arriving Atlanta - Flight Number
<span class = "error">*</span><input type ="text" name= "afnum" value = "<?php echo$afnum;?>">
<span class = "error">
    <?php  echo $afnumErr;  ?>
</span>
<br>

Arriving Atlanta - Airline Name 
<span class = "error">*</span><input type ="text" name= "name" value = "<?php echo$name;?>">
<span class = "error">
    <?php  echo $nameErr;  ?>
</span>
<br>

Arriving Atlanta - Date  
<span class = "error">*</span><input type ="text" name= "date" value = "<?php echo$date;?>">
(Use mm/dd/yyyy formate)
<span class = "error">
    <?php  echo $dateErr;  ?>
</span>
<br>

Arriving Atlanta - Time  
<span class = "error">*</span><input type ="text" name= "time" value = "<?php echo$time;?>">
(Please use format hh:mm such as 17:20 or 08:15)
<span class = "error">
    <?php  echo $timeErr;  ?>
</span>
<br>

Leaving - Flight Number:  
<span class = "error">*</span><input type ="text" name= "fnum" value = "<?php echo$fnum;?>">
<span class = "error">
    <?php  echo $fnumErr;  ?>
</span>
<br>

Leaving - Airline Name:  
<span class = "error">*</span><input type ="text" name= "laname" value = "<?php echo$laname;?>">
<span class = "error">
    <?php  echo $lanameErr;  ?>
</span>
<br>
Leaving - Date  
<span class = "error">*</span><input type ="text" name= "ldate" value = "<?php echo$ldate;?>">
(Use mm/dd/yyy formate)
<span class = "error">
    <?php  echo $ldateErr;  ?>
</span>
<br>

Leaving - Time  
<span class = "error">*</span><input type ="text" name= "ltime" value = "<?php echo$ltime;?>">
(Please use format hh:mm such as 17:20 or 08:15)
<span class = "error">
    <?php  echo $ltimeErr;  ?>
</span>
<br>

How many piece of big luggage
<span class = "error">*</span><input type ="text" name= "bluggage" value = "<?php echo$bluggage;?>">
<span class = "error">
    <?php  echo $bluggageErr;  ?>
</span>
<br>
How many piece of small luggage
<span class = "error">*</span><input type ="text" name= "sluggage" value = "<?php echo$sluggage;?>">
<span class = "error">
    <?php  echo $sluggageErr;  ?>
</span>
<br>
</div>


Any Comment:<br> 
<textarea name ="flightcomment" rows ="5" cols="40"> <?php echo $flightcomment;?></textarea> <br><br>

<input type = "submit" name = "submit" value="submit">
<br>
</form>
</body>

</html>