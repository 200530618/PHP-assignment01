<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saving your INFO...</title>
</head>
<body>
    <?php
    // capture the form body input using the $_POST array & store in a var
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $age = $_POST['age'];
    $course = $_POST['course'];



     //  add validation before saving
     $ok = true;  // start with no validation errors

     if (empty($name)) {
         echo '<p class="error">Name is required.</p>';
         $ok = false; // error happened - bad data
     }

     if(empty($age)){
        echo '<p class="error">Age is required.</p>';
     }
 
     if (empty($mail)) {
         echo '<p class="error">Mail is required.</p>';
         $ok = false; // error happened - bad data
     }

     if (empty($course)) {
        echo '<p class="error">Course is required.</p>';
        $ok = false;
    }
 
     // only save to db if $ok has never been changed to false
    if ($ok == true) {

        // connect to the db using the PDO library
    
        $db = new PDO('mysql:host=172.31.22.43;dbname=Sourabh200530618', 'Sourabh200530618', 'g63Y7ckiXQ');

        

        // set up an SQL INSERT
        $sql = "INSERT INTO students (name, mail, age, course) VALUES (:name, :mail, :age, :course)";

        // map each input to the corresponding db column
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':name', $name, PDO::PARAM_STR, 50);
        $cmd->bindParam(':mail', $mail, PDO::PARAM_STR, 100);
        $cmd->bindParam(':age', $age, PDO::PARAM_STR,3);
        $cmd->bindParam(':course', $course, PDO::PARAM_STR, 50);
        

        // execute the insert
        $cmd->execute();

        // disconnect
        $db = null;

        // show the user a message
        echo 'Registration Successfull';

    }

    
    ?>

    <p>Hello everyone, Here's your mentor. I am eagerly waiting for you guys. Have a great day.</p>

<h1>To see your friends -  <a href="./registers.php"> Click </a></h1>
</body>
</html>