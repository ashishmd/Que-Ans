<?php
session_start();
if(session_destroy())
{
echo '<META http-equiv="refresh" content="0;URL=http://forum.tryitbuddy.com/index.php">';
}
?>