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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>10Pin</title>
</head>
<body>
  <h1>10Pin</h1>
  
  <p><a href="registration-form.php">Registration</a></p>
  
  <p>Enter the first and last name to login</p>
    <form action="login.php" method="post">
      email&nbsp;<input type="text" name="email" /><br>
      password&nbsp;<input type="password" name="password" /><br>
      <input type="submit" value="login"/>
    </form>

    <?php echo '<p>Test to see the session email: '. @$_SESSION['email'] . '</p>'; ?>


</body>
</html>