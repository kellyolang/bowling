<?php
function testConnection($connect)
{
    if( !$connect)
        {
            exit("Error could not connect to the database.");
        }
}

function runQuery($result)
{
    if (!$result) 
    {
        die("Could not successfully run query ($userQuery) from 'DB': " .	
            mysqli_error($connect) );
    }
}

?>