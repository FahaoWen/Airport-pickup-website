<html >
<head>

    <title>About Page</title>
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

        .container {
  display: flex;
  justify-content: space-between;
}

.card {
  flex-basis: calc(33.33% - 20px);
  margin: 0 10px;
  padding: 20px;
  background-color: #f1f1f1;
  text-align: center;
}

.card img {
  width: 100%;
  height: 200px;
  object-fit: cover;
}      
 /* Set the animation keyframes */
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

      h3{
        margin-left:20%;
        margin-right:20%;
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
<br><br>
<h2>
    About US
</h2>
<h3>Welcome to our website, where we provide a platform for both volunteers and students to sign up for airport pickup services.
     Students can also ask for assistance, while volunteers can sign up to provide help. 
     We believe that this service promotes a sense of community and fosters an environment of mutual support,
      making the transition to a new place easier for everyone involved.</h3>


      <h2>
    About Atlanta
</h2>

<div class="container">


  <div class="card">
    <img src="Aquarium.jpg" alt="Image 1">
    <h3>Aquarium</h3>
    <p>The Atlanta Aquarium is a world-renowned marine park located in downtown Atlanta, Georgia. It is home to over 120,000 animals from around the world, including whale sharks, beluga whales, and manta rays.</p>
  </div>
  <div class="card">
    <img src="zoo.jpg" alt="Image 2">
    <h3>Atlanta Zoo</h3>
    <p>The Atlanta Zoo is a popular destination for animal lovers, featuring over 1,500 animals from around the world, including giant pandas, African elephants, and Sumatran tigers. Visitors can enjoy a variety of exhibits and attractions, as well as educational programs and events for all ages.</p>
  </div>
  <div class="card">
    <img src="coca.jpg" alt="Image 3">
    <h3>Coca-Cola Factory</h3>
    <p>The Coca-Cola Factory in Atlanta is a fascinating experience for anyone interested in the history and culture of this iconic brand. Visitors can learn about the company's history, see how Coke is made, and sample over 100 different beverages from around the world. The factory also features interactive exhibits, a 4D theater, and a gift shop with unique Coca-Cola merchandise..</p>
  </div>
</div>


</body>
</html>
