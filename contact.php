<html >
<head>

    <title>Contact Page</title>
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
        a:hover{
           color: yellow;
        }

.image{
   text-align: center;
}

hr{
         border-width: 0.2em;
        }


        @keyframes slide-in {
        0% {
          transform: translateX(-100%);
        }
        100% {
          transform: translateX(0);
        }
      }
      
      /* Style the animated title */
      h2 {
        font-size: 3em;
        color: #333;
        text-align: center;
        animation: slide-in 1s ease-out;
      }
      .boxx{
        text-align: center;
        border: solid;
       padding: auto;
       margin:auto;
       width:50%;
      }
        
      h3{
        padding-left:0.2em;
      }
     </style>   
</head>

<body>
<h1> APATH </h1>
<hr>
<br><br>
<?php

include('loginnav.php');

?>
    <h2>Contact Us</h2>

   <nav class="boxx">
      <h3> Name: Admin<br><br>
       Phone: 444-555-6666 <br><br>
       Available Time: Everyday 9:00am to 5:00pm<br><br>
       Email: Admin@test.com
    </h3>
      
    </nav>


</body>
</html>
