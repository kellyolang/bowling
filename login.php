<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Bowling Login</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="column">
                    <header>
                        <h1>10Pin<img src="images/bowling-ball.gif" alt="bowling ball" width="100px" height="100px"></h1>
                    </header>
                    <main>
                    <?php 

                    if(empty($_POST['email']) || empty($_POST['password']) )
                    {
                        echo '<p>Please enter a first and last name to login</p>';
                        echo '<p><a href="index.php">Return to login</a></p>';
                    }

                    else
                    {
                        $email = $_POST['email'];
                        $pass = $_POST['password'];

                        include('config.php');
                        include('functions/queries.php');

                        $connect = mysqli_connect(SERVER, USER, PW, DB);

                        testConnection($connect);

                        $query = "SELECT * from bowlers WHERE email = '$email'"; 
                        $result = mysqli_query($connect, $query);

                        $row = mysqli_fetch_assoc($result);

                        if(count($row['email']) == 0)
                            echo "<p>No record found with the email $email.</p>";

                        else
                        {
                            $hash = $row['pass'];

                            if(password_verify($pass, $hash))
                            {
                                $_SESSION['email'] = $row['email'];
                                $_SESSION['pass'] = $row['pass'];

                                echo '<p><a href="logout.php">Logout</a>' . " " . $_SESSION['email'] . '</p>';
                                echo '<p><a href="Show-Bowlers.php">Show Bowlers</a></p>';

                            }

                            else
                                echo "<p>Passwords do not match.</p>";
                        }
                    }
                    ?>
                    </main>
                </div>
            </div>
        </div>
    </body>
</html>