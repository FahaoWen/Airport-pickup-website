<html>

<head>
<title> </title>
<style> 
a{
    padding: 1.3em;
    text-decoration: none;
    color: #284c54; 
    text-align : center;
}

*{
background-color:#e8e4e4;
    }

h1{
    text-align: center;
}

a:hover{
           color: yellow;
        }
        .active{
    font-size:1.2em;
    font-weight:bold;
}   
hr{
         border-width: 0.2em;
        }
</style>
</head>
<body>


<h1>Alpha </h1>
<hr>

<br><br><br>

<?php
$current_file = basename($_SERVER['PHP_SELF']);
echo '
<nav style="text-align: center; color: green; font-size: 1.5em;">
  <a href="studenthome.php" class="' . ($current_file == "studenthome.php" ? "active" : "") . '">Home</a>
  <a href="studentprofile.php" class="' . ($current_file == "studentprofile.php" ? "active" : "") . '">Personal Profile</a>
  <a href="studentflight.php" class="' . ($current_file == "studentflight.php" ? "active" : "") . '">Flight Info</a>
  <a href="pickupinfo.php" class="' . ($current_file == "pickupinfo.php" ? "active" : "") . '">Pickup Information</a>
  <a href="logout.php" class="' . ($current_file == "logout.php" ? "active" : "") . '">Logout</a>
</nav>
';
?>



</body>  



</html>