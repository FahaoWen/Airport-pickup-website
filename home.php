<html >
<head>

    <title>Home Page</title>
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
        
     </style>   
</head>

<body>
<h1> APATH </h1>
<hr>
<br><br>
<?php

include('loginnav.php');

?>
<h2 style = 'text-align: center'>Welcome to Atlanta, GA</h2><br>
<div class = 'image'><img src = "atl.jpg" style ="wdith : 100%; height: 100%"> </div>
<h3 style = 'text-align: center'>Thank you for using our Airport Pickup</h3><br><br>
<h3 style = 'text-align: center'><a href = '#'>Covid information and guildlines </a><h3>
<br><br><br><br>

</body>
</html>
