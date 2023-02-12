<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registers</title>
    <link rel="stylesheet" href="css/registers.css">
    <link rel="stylesheet" href="css/normalize.css">
</head>
<body>
    <h1>Register Students</h1>
    <?php
    //connect to database
    $db = new PDO('mysql:host=172.31.22.43;dbname=Sourabh200530618', 'Sourabh200530618', 'g63Y7ckiXQ');

    //set up the SQL SELECT command
    $sql = "SELECT * FROM students";

    //execute the select query
    $cmd = $db->prepare($sql);
    $cmd->execute();

    //store the query results in an array. Use fetchall for multiple records, fetch for 1.
    $students = $cmd->fetchAll();

    echo '<table>';
    echo '<thead><th>Name</th><th>Mail</th><th>Age</th><th>Course</th></thead>';

    //display the post data in a loop. $students = all data, $student = the current item in the loop
    foreach($students as $student){
        echo '<tr>'; //create a new row

        echo '<td>' . $student['name'] . '</td>';  //create a new column w/data inside
        echo '<td>' . $student['mail'] . '</td>';
        echo '<td>' . $student['age'] . '</td>';
        echo '<td>' . $student['course'] . '</td>';
        echo '</tr>';
    }

    //close table
      echo '</table>';


    //disconnect
    $db = null;

    ?>

    <h2>Congrats!! Your classes will be start from next month. Enjoy your holidays.</h2>
    <p>You can also apply for multiple courses for that register again</p>

    <h4><a href="./registration-details.php">Regsiter Here</a></h4>


</body>
</html>