<?php
  session_start();
  if (isset($_SESSION['email']))
  {
  
    session_unset(); 

    session_destroy(); 

    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'index.php';
    header("Location: http://$host$uri/$extra");
    exit;

  } 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>10Pin</title>
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
                        <h2>Enter your email and password to login.</h2>
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <label>Email:</label>
                                <input class="form-control" type="text" name="email">
                                <label>Password:</label>
                                <input class="form-control" type="password" name="password">
                            </div>
                            <input type="submit" value="Login">
                            <a href="registration-form.php">Register</a>
                        </form>
                    </main>
                </div>
            </div>
        </div>
    </body>
</html>