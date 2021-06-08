<?php
$insert = false;
if(isset($_POST['name'])){
// set connection variable
    $server = "localhost";
    $username = "root";
    $password = "";
    // create connection
    $con = mysqli_connect($server, $username, $password);
    // Check for connection
    if(!$con){
        die("connectn failed due to" . mysqli_connect_error());
    }
    // echo "Success Connetion to DB";

    // collect the info , post variables 
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    
    $sql = "INSERT INTO `travel`.`trip` ( `name`, `age`, `gender`, `email`, `mobile`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    
    // echo "$sql";
    // execute query
    if($con->query($sql) == true){
        // echo "Successfully Inserted";
        // when inserted
        $insert = true;
    }
    else{
        echo "ERROR:  $sql <br> $con->error";
    }
    // close db connection
    $con -> close();


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Traveling</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
</head>
<body>
  
        <img class="bg_img" src="mybg.jpg" alt="" srcset="">
    
    <div class="container">
        <h1>Welcome To Satara TRIP</h1>
        <p>Enter Your details Of TRIP and submit</p>
        <?php
        if($insert == true){
        echo "<p class='submit_msg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
    ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter name">
            <input type="text" name="age" id="age" placeholder="Enter age">
            <input type="text" name="gender" id="gender" placeholder="Enter gender">
            <input type="email" name="email" id="email" placeholder="Enter email">
            <input type="phone" name="phone" id="phone" placeholder="Enter Mobile">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter other info here">
                
            </textarea>
            <button class="btn">submit</button>
            <!-- <button class="btn">reset</button> -->
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>

