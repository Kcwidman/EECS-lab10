<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$con = mysqli_connect("mysql.eecs.ku.edu", "kaiwidman", "xeeves9e",
"kaiwidman");
if (!$con){
    die("ERROR: Could not connect. ".mysqli_connect_error());
}

$content = $_POST["content"];
$username = $_POST["username"];
$status = "";

if(empty($username))
{
    $status = "You must fill out the username field. Try again.";
}
else if(empty($content))
{
    $status = "You forgot to write your post. Try again.";
}
else
{
    $user = mysqli_query($con, "SELECT * FROM USER WHERE user_id ='$username'");
    
    if(mysqli_num_rows($user)>0)
    {
        mysqli_query($con, "INSERT INTO POSTS (content, author_id) VALUES ('$content', '$username')");
        $status = "Post submitted successfully!";
    }
    else
    {
        $status = "Username could not be found! Please try again.";
    }
}		
?>

<html>
<head>
<body>
    <p>
        <?php echo "$status";?>
    </p>
</body>
</head>
</html>