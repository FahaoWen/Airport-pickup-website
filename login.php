<?php
session_start();

?>
<html>
<head>
<title>Log in</title>
<style>
    *{
background-color:#e8e4e4;
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
  background-color: white;
}

.square-radio:checked {
  background-color:  #284c54;
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
$email="Email";
$password="password";
$rememberme = '';
$expire = time()+3*24*60*60; /// three days after current time

// when user click login
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include("project3connection.php");

    // get email and password from form
    $email = $_POST["email"];
    $password = $_POST["password"];

    if(isset($_POST["rememberme"])){
    setcookie("email",$email,$expire,"/");
    setcookie("password", $password,$expire,'/');    
    }else {
        // unset the cookies if remember me is not selected
        setcookie("email", "", time() - 3600, "/");
        setcookie("password", "", time() - 3600, "/");
    }


    // check if email is already in the database
    $query = mysqli_query($dbc,"SELECT * FROM users WHERE email ='$email'");
    $num_email = mysqli_num_rows($query);

    //indicate email exists in the database
    if($num_email !=0){
        while($row = mysqli_fetch_array($query)){
            $dbemail = $row['email'];
           
            $dbpassword = $row['pw'];
          
            $dbtype = $row['type'];    
            $db_id = $row['id'];
        }

        if($email == $dbemail){
            if($dbpassword==$password){
                $_SESSION['id'] = $db_id;
                // check user type
               if($dbtype==1){
                header("location: volunteerhome.php");
               }
               if($dbtype == 0){
                header("location: adminhome.php");
               }
               if($dbtype == 2){
                header("location: studenthome.php");
               }

                exit();
                
            }
            else{
                echo"Sorry your password is not correct! ";
            }
        }

    }
    else{
        echo"Sorry, we don't have your information. Please register first!";// email does not exist in the database
    }
        
    

}


?>

<br>
<p> Sign in wilth your email you used during registration</p>
<form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"method ="post">


<br>
<input type="text" name="email" placeholder="email" value="<?php if(isset($_COOKIE['email'])){ echo $_COOKIE['email'];} ?>"><br><br>
<input type="text" name="password" placeholder="password" value="<?php if(isset($_COOKIE['password'])){ echo $_COOKIE['password'];} ?>"><br><br>



<input type="submit" name ="submit" value= "login"><br><br>
<br>
<input type="checkbox" name="rememberme" value="rememberme" class="square-radio" <?php if(isset($_COOKIE['email']) && isset($_COOKIE['password'])) { echo 'checked'; } ?>> Remember me
<a href="#"> Forgot password?</a>
</form>
<br>
<p>No Account? <a href="signup.php">Create One</a> </p>
<br>
<?php
    include("covidInfo.php");
?>
<br>
<p style ="text-align: center"> Created by Nick Wen </p>
</body>

</html>