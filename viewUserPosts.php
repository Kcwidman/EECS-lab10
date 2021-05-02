<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$con = mysqli_connect("mysql.eecs.ku.edu", "kaiwidman", "xeeves9e",
"kaiwidman");
if (!$con){
    die("ERROR: Could not connect. ".mysqli_connect_error());
}

$username = $_POST["user"];

$posts = mysqli_query($con, "SELECT content FROM POSTS WHERE author_id ='$username'");

echo "<ul>";
while($post = mysqli_fetch_array($posts))
{
    echo "<li>";
    echo "$post[content]";
    echo "</li>";
}
echo "</ul>";
	
?>