<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bowling Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
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
    $connect = mysqli_connect(SERVER, USER, PW, DB);

    if(!$connect)
    {
        exit("Error could not connect to the database.");
    }

    else
    {
        $query = "SELECT email, pass from bowlers WHERE email = '$email' AND pass = '$pass';";
        $result = mysqli_query($connect, $query); 
        
        $row = mysqli_fetch_assoc($result);

    }
    
    if(!$result)
    {
        exit("<p>Could not successfully run the query, $query</p>");
    }

    elseif(count($row['email']) == 0)
    {
        echo 'No result returned for the query ' . $query;
    }

    else
    {
        $_SESSION['email'] = $row['email'];

        echo '<p><a href="logout.php">Logout</a>' . " " . $_SESSION['email'] . '</p>';
        echo '<p><a href="Show-Bowlers.php">Show Bowlers</a></p>';

        echo'<p>Test to see the session firstName: '. $_SESSION['email'] . '</p>';

    }

}

?>
</body>
</html>