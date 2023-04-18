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
        .bold{
    font-size:1.2em;
    font-weight:bold;
    
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
$current_page = basename($_SERVER['PHP_SELF']);
echo '
<nav style="text-align: center; color: green; font-size: 1.5em;">
  <a href="volunteerhome.php" class="' . ($current_page == "volunteerhome.php" ? "bold" : "") . '">Home</a>
  <a href="volunteerprofile.php" class="' . ($current_page == "volunteerprofile.php" ? "bold" : "") . '">Personal Profile</a>
  <a href="volunteercar.php" class="' . ($current_page == "volunteercar.php" ? "bold" : "") . '">Car Info</a>
  <a href="checkpickupneed.php" class="' . ($current_page == "checkpickupneed.php" ? "bold" : "") . '">Check Pickup Need</a>
  <a href="pickupassignment.php" class="' . ($current_page == "pickupassignment.php" ? "bold" : "") . '">Pickup Assignment</a>
  <a href="logout.php" class="' . ($current_page == "logout.php" ? "bold" : "") . '">Logout</a>
</nav>
';
?>


</body>

</html>