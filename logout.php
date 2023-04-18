<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log out</title>
    <style>
       *{
background-color:#e8e4e4;
    }
        a:hover{
           color: yellow;
        }
        h1, h2, p{
         text-align: center
        }
        hr{
         border-width: 0.2em;
        }
     </style>   
</head>
<body>
    
</body>
</html>
<?php
session_start();
session_unset();
session_destroy();

echo"<h1> Alpha </h1><hr><br><br><br><br><br>";

echo"<h1 s>Logged Out</h1><br>
<p>Thank you for Using the Alpha Airport pick up<br>";

echo"<h2 >Please Cliek <a href ='login.php' class ='here'> Here </a> to log in</h2>";
?>