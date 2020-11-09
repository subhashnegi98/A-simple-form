<?php
$insert=false;
if(isset($_POST['name'])){
   $server = "localhost";
   $username = "root";
   $password = "";

   $conn = mysqli_connect($server, $username, $password);

   if(!$conn){
       die("connection failed due to". mysqli_connect_error());
   }

   $name = $_POST['name'];
   $age = $_POST['age'];
   $email = $_POST['email'];
   $gender = $_POST['gender'];
   $phone = $_POST['phone'];
   $description = $_POST['description'];
   $sql = "INSERT INTO `trip`.`students` (`name`, `age`, `email`, `gender`, `phone`, `description`, `dt`) VALUES ('$name', '$age', '$email', '$gender', '$phone', '$description', current_timestamp());";


   if($conn->query($sql)==true)
     $insert=true;
    else
    {
        echo "ERROR: $sql <br> $conn->error";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WELCOME</title>
    <link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="IIT Delhi">
     <div class="container">
         <h1> welcome to IIT Delhi US trip form</h1>
         <p>Enter your details</p>
         <?php
         if($insert==true){
         echo "<p class='submitmsg'>Thanks for submitting your form</p>";
         }
         ?>
         <form action="index.php" method="post">
             <input type="text" name="name" id="name" placeholder="Enter your name">
             <input type="text" name="age" id="age" placeholder="Enter your age">
             <input type="email" name="email" id="email" placeholder="Enter your email">
             <input type="text" name="gender" id="gender" placeholder="Enter your gender">
             <input type="phone" name="phone" id="phone" placeholder="Enter your Phone No">
             <textarea name="description" id="description" cols="30" rows="10" placeholder="Enter any suggestion"></textarea>
             <button class="btn">Submit</button>
         </form>
     </div> 
     <script src="index.js"></script>
</body>
</html>
