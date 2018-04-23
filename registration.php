<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Registeration</title>
</head>
<body>

<?php

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

    if(!$connect)
    {
        exit("Error could not connect to the database.");
    }
    
    else
    {
        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        $query = "INSERT INTO bowlers (email, pass, first_name, last_name) VALUES ('$email', '$pass', '$first', '$last')";
        $result = mysqli_query($connect, $query);
        
        echo "You have successfully registered";
        echo '<p><a href="index.php">Return to Login</a></p>';
    }
}

?>

</body>
</html>