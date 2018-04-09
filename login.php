<?php
	session_start();
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>bowling02</title>
</head>
<body>
<?php

if(empty($_POST['firstName']) OR empty($_POST['lastName']))
{
    echo '<p>Enter first and last name to login</p>';
    echo '<p><a href="index.php">Return to login</a></p>';
}

else
{
    $first = $_POST['firstName'];
    $last = $_POST['lastName'];

    include('config.php');
    $connect = mysqli_connect(SERVER, USER, PW, DB);

    if(!$connect)
    {
        exit("Error could not connect to database.");
    }

    else
    {
        $query = "SELECT first_name, last_name from bowlers WHERE first_name = '$first' AND last_name = '$last'";
        $result = mysqli_query($connect, $query);
    }

    if(!$result)
    {
        exit("<p>Could not successfully run the query, $query</p>");
    }

    else
    {
        $row = mysqli_fetch_assoc($result);
        echo "<p>Hello, {$row['first_name']} {$row['last_name']}</p>";
        $_SESSION['first_name'] = $row['first_name'];
        
        echo "<p><a href='index.php'>Logout, {$row['first_name']}</a></p>";
        session_destroy();
    }
}
?>
</body>
</html>