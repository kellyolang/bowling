<!DOCTYPE html>
<html>
<head>
	<title>MySQL Query</title>
	<link rel ="stylesheet" type="text/css" href="sample.css">
</head>

<body>
<?php

include('config.php');

$connect=mysqli_connect(SERVER, USER, PW, DB);

if( !$connect) 
{
	die("ERROR: Cannot connect to database 'DB' on server 'SERVER' 
	using user name 'USER' (".mysqli_connect_errno().
	", ".mysqli_connect_error().")");
}

$userQuery = "SELECT first_name, last_name FROM bowlers ORDER BY last_name ASC"; 

$result = mysqli_query($connect, $userQuery);

if (!$result) 
{
	die("Could not successfully run query ($userQuery) from 'DB': " .	
		mysqli_error($connect) );
}

if (mysqli_num_rows($result) == 0) 
{
	print("No records found with query $userQuery");
}
else 
{ 
	print("<h1>BOWLER NAMES</h1>");
	print("<table border = \"1\">");
	print("<tr><th>FIRST NAME</th><th>LAST NAME</th></tr>");
    while ($row = mysqli_fetch_assoc($result))
    {
       print ("<tr><td>".$row['first_name']."</td><td>".$row['last_name']."</td></tr>"); 
    }

	print("</table");
}

mysqli_close($connect);   // close the connection
 
?>

</body>
</html>