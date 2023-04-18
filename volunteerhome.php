<?php
session_start();

?>
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


</style>
</head>
<body>




<br><br><br>

<?php
include("volnav.php");
?>


<p>Thank you for volunteering!<br><br>

Please complete your personal profile.<br><br>

If you would like to volunteer for airport pickup, please provide your car infor.

</p>
<br><br>
<?php
    include("covidInfo.php");
?>

</body>  



</html>