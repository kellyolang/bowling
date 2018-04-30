<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Register</title>
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
                        <h2>Please enter your information.</h2>
                        <form action="registration.php" method="post">
                            <div class="form-group">
                                <label>First Name:</label>
                                <input class="form-control" type="text" name="firstName">
                                <label>Last Name:</label>
                                <input class="form-control" type="text" name="lastName">
                                <label>Email:</label>
                                <input class="form-control" type="text" name="email">
                                <label>Password:</label>
                                <input class="form-control" type="password" name="password">
                            </div>
                            <input type="submit" value="Register">
                            <a href="index.php">Go Back</a>
                        </form>
                    </main>
                </div>
            </div>
        </div>
    </body>
</html>