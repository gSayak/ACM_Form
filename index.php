<?php
$insert= false;
if(isset($_POST['name'])){

    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to the database failed due to".mysqli_connect_error());

    }

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $others = $_POST['desc'];
    // echo "Success connecting to the db"
    $sql = "INSERT INTO `acm_students`.`students` (`name`, `gender`, `email`, `phone`, `others`, `dt`) VALUES ( '$name', '$gender', '$email', '$phone', '$others', current_timestamp());";
    // echo $sql;

    if($con->query($sql) == true){
        // echo "Succesfully inserted";
        $insert=true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h3>Welcome To TINT ACM Student Chapter</h3>
        <p>Enter your details and submit this form if you're interested in joining the ACM Student Chapter</p>
        <?php
          if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see your interest for the ACM student chapter</p>";
        }
    ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="age" placeholder="Enter your name">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button> 
        </form>
    </div>
    <script src ="index.js"></script>
    
</body>
</html>