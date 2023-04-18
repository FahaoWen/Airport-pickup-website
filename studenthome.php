<?php
session_start();

?>
<html>

<head>
<title> </title>
<style> 
a{
    text-align: center;
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





<?php
include("studntnav.php");
?>


<p>Welcome to Atlanta, GA<br><br>

Please complete your personal profile.<br><br>

If you need airport pickup, please provide your flight information.

</p>
<br><br>
<?php
    include("covidInfo.php");
?>
</body>  



</html>