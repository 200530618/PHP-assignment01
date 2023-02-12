<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <!-- normalize to remove browser default styles -->
    <link rel="stylesheet" href="css/normalize.css" />
    <!-- our custom css -->
    <link rel="stylesheet" href="css/registration-details.css" />
</head>
<body>
    <header>
        <h1>
            <a href="#">
                Gc College
            </a>
        </h1>
    </header>
    <main>
        <h2>Student Registration For Programming Course</h2>
        <form action="save-registration.php" method="post">
            <fieldset>
                <label for="name">Name:</label>
                <textarea name="name" id="name" required maxlength="40"></textarea>
                <label for="age">AGE:</label>
                <textarea name="age" id="age" required maxlength="3"></textarea>
            </fieldset>
            <fieldset>
                <label for="mail">Mail:</label>
                <textarea name="mail" id="mail" required maxlength="50"></textarea>

            <select name="course">
                <option value="">Select Course</option>
                <option value="JAVA">JAVA</option>
                <option value="PYTHON">PYTHON</option>
                <option value="C#">C#</option>
                <option value="C++">C++</option>
                <option value="HTML">HTML</option>
                <option value="PHP">PHP</option>
                <option value="JAVASCRIPT">JAVASCRIPT</option>
                <option value="CSS">CSS</option>
                
            </select>
                    <?php
                    // connect
                    $db = new PDO('mysql:host=172.31.22.43;dbname=Sourabh200530618', 'Sourabh200530618', 'g63Y7ckiXQ');

                    // use SELECT to fetch the users
                    $sql = "SELECT * FROM mails";

                    // run the query
                    $cmd = $db->prepare($sql);
                    $cmd->execute();
                    $mails = $cmd->fetchAll();

                    // loop through the user data to create a list item for each
                    foreach ($mails as $mail) {
                        echo '<option>' . $mail['email'] . '</option>';
                    }

                    // disconnect
                    $db = null;
                    ?>
                </select>
            </fieldset>
            <button class="btnOffset">Register</button>
        </form>
    </main>
</body>
</html>