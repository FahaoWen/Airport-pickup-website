<html>
<title> </title>
<head>
<style> 
a{
    padding: 1.3em;
    text-decoration: none;
    color: #284c54; 

}

a:hover{
           color: yellow;
        }

.bold{
    font-size:1.2em;
    font-weight:bold;
}        

</style>
</head>
<body>
</body>  


<?php
$current_page = basename($_SERVER['PHP_SELF']);

echo '<nav style="text-align: center; color: green; font-size: 1.5em;">';
echo '<a href="home.php" class="' . ($current_page == 'home.php' ? 'bold' : '') . '">Home</a>';
echo '<a href="about.php" class="' . ($current_page == '' ? 'bold' : '') . '">About</a>';
echo '<a href="login.php" class="' . ($current_page == 'login.php' ? 'bold' : '') . '">Login</a>';
echo '<a href="signup.php" class="' . ($current_page == 'signup.php' ? 'bold' : '') . '">Sign Up</a>';
echo '<a href="#" class="' . ($current_page == '#' ? 'bold' : '') . '">Forum</a>';
echo '<a href="contact.php" class="' . ($current_page == 'contact.php' ? 'bold' : '') . '">Contact</a>';
echo '</nav>';
?>


</html>