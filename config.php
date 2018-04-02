<?php
if($_SERVER['HTTP_HOST'] == "kellyocoeelang.com")
{
    define('SERVER', 'localhost');
    define('USER', 'kellyoco_bowling');
    define('PW', 'bowling');
    define('DB', 'kellyoco_bowling');
}

else
{
    define('SERVER', 'localhost' );
    define('USER', 'bowling');
    define('PW', 'bowling');
    define('DB', 'bowling');
}