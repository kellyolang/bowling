<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Registration</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="column">
                    <header>
                        <h1>10Pin<img src="images/bowling-ball.gif" alt="bowling ball" width="100px" height="100px"></h1>
                    </header>
                    <?php

                    include ('functions/queries.php');

                    if(empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['email']) || empty($_POST['password']))
                    {
                        echo "Please enter all information to register";
                        echo '<p><a href="registration-form.php">Return to registration</a></p>';
                    }

                    else
                    {
                        $first = $_POST['firstName'];
                        $last = $_POST['lastName'];
                        $email = $_POST['email'];
                        $pass = $_POST['password'];

                        include('config.php');
                        $connect = mysqli_connect(SERVER, USER, PW, DB);

                        testConnection($connect);

                        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

                        $query = "INSERT INTO bowlers (email, pass, first_name, last_name) VALUES ('$email', '$pass', '$first', '$last')";
                        $result = mysqli_query($connect, $query);

                        echo "You have successfully registered";
                        echo '<p><a href="index.php">Return to Login</a></p>';

                    }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>