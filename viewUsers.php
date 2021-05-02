<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$con = mysqli_connect("mysql.eecs.ku.edu", "kaiwidman", "xeeves9e",
"kaiwidman");
if (!$con){
    die("ERROR: Could not connect. ".mysqli_connect_error());
}


$userQuery = mysqli_query($con, "SELECT user_id FROM USER");

echo "<ul>";
while($user = mysqli_fetch_array($userQuery))
{
    
        echo "<li>";
        echo "$user[user_id]";
        echo "</li>";
    
}
echo "</ul>";

?>