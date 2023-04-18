
<html>

<head>
<title> </title>
<style> 
a{
    padding: 1.1em;
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

</style>
</head>
<body>


<h1>Alpha </h1>

<br><br>

<?php
// Get the current page filename
$current_page = basename($_SERVER['PHP_SELF']);

echo '<nav style="text-align: center; color: green; font-size: 1.5em;">';

// Echo the "Personal Profile" link
if ($current_page === 'adminhome.php') {
    echo '<a href="adminhome.php" class="bold">Personal Profile</a> ';
} else {
    echo '<a href="adminhome.php">Personal Profile</a> ';
}

// Echo the "Create Announcement" link
echo '<a href="#">Create Announcement</a> ';

// Echo the "Manage Student" link
if ($current_page === 'managestudent.php') {
    echo '<a href="managestudent.php" class="bold">Manage Student</a> ';
} else {
    echo '<a href="managestudent.php">Manage Student</a> ';
}

// Echo the "Manage Volunteers" link
if ($current_page === 'managevolunteer.php') {
    echo '<a href="managevolunteer.php" class="bold">Manage Volunteers</a> ';
} else {
    echo '<a href="managevolunteer.php">Manage Volunteers</a> ';
}

// Echo the "Logout" link
if ($current_page === 'logout.php') {
    echo '<a href="logout.php" class="bold">Logout</a> ';
} else {
    echo '<a href="logout.php">Logout</a> ';
}

echo '<br><br><br>';

// Echo the "Students Need Pickup" link
if ($current_page === 'studentneedpickup.php') {
    echo '<a href="studentneedpickup.php class="bold">Students Need Pickup</a> '; 
} else {
    echo '<a href="studentneedpickup.php">Students Need Pickup</a> ';
}


// Echo the "Assign Pickup Volunteer" link
if ($current_page === 'assignpickup.php') {
    echo '<a href="assignpickup.php" class="bold">Assign Pickup Volunteer</a> ';
} else {
    echo '<a href="assignpickup.php">Assign Pickup Volunteer</a> ';
}

echo '</nav>';
?>


</body>  



</html>