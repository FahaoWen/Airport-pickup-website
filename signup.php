<?php
session_start();

?>
<html>
<head>
<title>Project 2</title>
<style>
    *{
background-color:#e8e4e4;
    }

    .error{
        color:red;
    }
p{
    text-align: center;
}

h1{
    text-align: center;
}
form {
    
    text-align:center;
    margin: auto;
  display: block;
}

.square-radio {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  border: 1px solid  #284c54;
  width: 12px;
  height: 12px;
  border-radius: 3px;
  outline: none;
  background-color: #fff;
  cursor: pointer;
  background-color:  #284c54;
}

.square-radio:checked {
  background-color:  red;
}

input[type="text"], textarea {
    text-align: center;
    color:white;
}
input[type="text"], textarea {
text-align: center;
background-color : #284c54; 
border-radius: 5%;
width: 200px;
border: none;
height:35px
}

input[type="submit"], textarea {
text-align: center;
border: none;
background-color : #24dc7c; 
border-radius: 5%;
width: 200px;
height:35px
}

hr{
         border-width: 0.2em;
        }

</style>

</head>

<body>
<h1> APATH </h1>
<hr>
<br><br>

<?php 
include("loginnav.php");

?>

<?php
$email = $password = $confirmpassword = $type= $typeint="";
$emailErr = $pw1Err = $pw2Err = $typeErr ="";
$flag =0;



// when user click login
if($_SERVER["REQUEST_METHOD"] == "POST"){

        //emial field
        if(empty($_POST["email"])){
            $emailErr = "Email is required";
            $flag=1;
        }
        else{
            $email = test_input($_POST["email"]);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $emailErr = "Not a valid email address ";   
                $flag=1;
            }
    }


    //password field


    if(empty($_POST["password"])){
        $pw1Err ="password is required";
        $flag=1;
    }

    else{
        $password= $_POST["password"];
        $confirmpassword= $_POST["confirmpassword"];
        if($password!=$confirmpassword){
        $pw2Err="Password does not match!";    
        $flag=1;
        } 
        else{
           
        $flag=0;    
        }  
    }


    // type field 

    if(empty($_POST["whatareyou"])){ // if empty
        $typeErr = "You have to choose if you are student or volunteer"; 
        $flag=1;
    }
    else{
    $type = test_input($_POST["whatareyou"]);
        if($type == "volunteer"){
            $typeint = 1;
        }
        else{
            $typeint =2;
        }
    }
    
    if($flag==0){
    include("project3connection.php");

    $qy = "SELECT * FROM users WHERE email = '$email'";
    $query = mysqli_query($dbc, $qy);
    $num = mysqli_num_rows($query);

    if($num!= 0){
        echo"The email was used, please use another email!";
    }

    else{
       
        //NSERT INTO table_name (column1, column2, column3,etc) VALUES (value1, value2, value3, etc)
        $qy = "INSERT INTO users(email, pw, type) VALUES ('$email','$confirmpassword','$typeint')";
              
        mysqli_query($dbc,$qy);

        header("location: login.php");
    }
    
    }


}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
?>

<br>
<p>We are going to communicate with you using email often.</p>
<p>Please create your new account with your most frequently used email.</p>
<form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"method ="post">


<br>
<input type ="text" name= "email"  placeholder = "Email">
<span class = "error"> <?php echo $emailErr  ?></span>
<br><br>


<input type ="text" name= "password"  placeholder = "Password">
<span class = "error"> <?php echo $pw1Err  ?></span>
<br><br>


<input type ="text" name= "confirmpassword" placeholder = "Confirm Password">
<span class = "error"> <?php echo $pw2Err  ?></span>
<br><br>

<br>
<input type="radio"  name="whatareyou" value="volunteer" class="square-radio"> I am signing up as volunteer
<br><br>
<input type="radio"  name="whatareyou" value="student" class="square-radio">  I am traveling to GTECH and signing up for help
<span class = "error"> <?php echo $typeErr  ?></span>

<br><br>
<input type="submit" name ="submit" value= "Create Account"><br><br>
</form>
<br>

<p>Already have an account? <a href = "login.php"> Login </a> </p>

<br>
<?php
    include("covidInfo.php");
?>
<br>
<p style ="text-align: center"> Created by Nick Wen </p>
</body>

</html>