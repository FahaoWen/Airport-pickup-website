<?php
session_start();

?>

<?php

include('project3connection.php');
$id = $_GET['id'];

$s_id = $_GET['second_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the user submitted the form
    $id = test_input($_POST["id"]);
    if (isset($_POST['submit'])) {
      $qq = "SELECT * FROM pickup WHERE s_id = '$s_id' AND approved = '1'";
        

        $result = mysqli_query($dbc, $qq);
        $num = mysqli_num_rows($result);

        
        if ($num == 0){
       echo "s_id = ".$id;
       $qs = "UPDATE pickup SET approved = '1' WHERE p_id = $id";
       mysqli_query($dbc, $qs);
        echo" <script>";
         
       echo 'alert("Thank you for  volunteering. You will see the detail information about this pickup task under Pickup Assignment once our team has reviewed and approved it.\n You will be bring back to Check Pickup Page in 2 second.");';
       echo 'setTimeout(function() { window.location.href = "assignpickup.php"; }, 0);'; 
       echo" </script>";
        }

        else{
            echo" <script>";
         
            echo 'alert("Sorry you have already assign pickup to this student before. \nYou will be bring back to Check Pickup Page.");';
            echo 'setTimeout(function() { window.location.href = "assignpickup.php"; }, 0);'; 
            echo" </script>";
      
        }
       
   // header("Location: checkpickupneed.php");
        
    } elseif (isset($_POST['cancel'])) {
       echo" <script>";
         
       echo 'alert("You have canceled the submission.\n You will be bring back to Check Pickup Page.");';
       echo 'setTimeout(function() { window.location.href = "assignpickup.php"; }, 0);'; 
       echo" </script>";
      
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
   
    <title>Confirm Pickup</title>

    <style>
        .box{
          text-align: center;
           
            
        }
    
      input{
        padding: 15px, 32px;
        border-radius:12px;
        font-size: 2em;
       
      }

      input:hover{
        background-color: #4CAF50; 
      }
      h3{
        font-size: 2em;
      }
      span{
        color:red;
      }
    </style>
</head>
<body>
    <?php
    include('project3connection.php');
   
    $qs ="SELECT volunteer.first_name, volunteer.last_name,pickup.p_id, student.firstName, student.lastName, DATE_FORMAT(student.aDate, '%M %d') as aDate, student.aTime    
    FROM student
    RIGHT JOIN pickup ON pickup.s_id = student.s_id
    Join volunteer ON pickup.v_id = volunteer.v_id
    ORDER BY student.aDate";

    $query = mysqli_query($dbc,$qs);
    $num = mysqli_num_rows($query);

    if($num !=0){
        while($row = mysqli_fetch_array($query)){
       $v_first = $row['first_name'];
       $v_last = $row['last_name'];
       $s_first = $row['firstName'];
       $s_last = $row['lastName'];
       $date = $row['aDate'];
       $time = $row['aTime'];
        }
    }

    ?>
    <br><br><br><br>

<div class = "box">    

<h3>Please confirm that you want to approve <br> Volunteer: <?php echo $v_first." ".$v_last ?> <br>to pickup<br>
Student: <?php echo $s_first." ".$s_last ?><br>on
<span><?php echo $date.", ".$time."</span>." ?></h3>

<form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"method ="post">
<input type = "hidden" name = "id" size="20" maxlength="50" value ="<?php echo $id;   ?>">
<input type = 'hidden' name = "date" value = "<?php $date  ?>">
<input type = 'hidden' name = "time" value = "<?php $time  ?>">

<input type = 'submit' name = "submit" value = "Confirm">
<input type = 'submit' name = "cancel" value = "Cancel">

</form>

</div>

<h1>  <?php $message ?></h1>


</body>


</html>