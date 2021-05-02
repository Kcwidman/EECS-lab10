<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$con = mysqli_connect("mysql.eecs.ku.edu", "kaiwidman", "xeeves9e",
"kaiwidman");
if (!$con){
    die("ERROR: Could not connect. ".mysqli_connect_error());
}

$records = $_POST["post"];
echo "The following post ID's have been deleted:<br>";

foreach($records as $post_id)
{
    mysqli_query($con, "DELETE FROM POSTS WHERE post_id = '$post_id'");
    echo "$post_id<br>";
}
	
?>