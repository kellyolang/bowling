<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>MySQL Query</title>
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

                    include('config.php');
                    include('functions/queries.php');

                    $connect=mysqli_connect(SERVER, USER, PW, DB);

                    testConnection($connect);

                    $userQuery = "SELECT first_name, last_name FROM bowlers ORDER BY last_name ASC"; 

                    $result = mysqli_query($connect, $userQuery);

                    runQuery($result);

                    if (mysqli_num_rows($result) == 0) 
                    {
                        print("No records found with query $userQuery");
                    }
                    else 
                    { 
                        print("<h1>Bowler Names</h1>");
                        print("<table class = \"table\">");
                        print("<tr><th>First Name</th><th>Last Name</th></tr>");
                        while ($row = mysqli_fetch_assoc($result))
                        {
                           print ("<tr><td>".$row['first_name']."</td><td>".$row['last_name']."</td></tr>"); 
                        }

                        print("</table>");

                        echo '<p><a href="logout.php">Logout</a>' . " " . $_SESSION['email'] . '</p>';
                    }

                    mysqli_close($connect);

                    ?>
                </div>
            </div>
        </div>
    </body>
</html>