<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$con = mysqli_connect("mysql.eecs.ku.edu", "kaiwidman", "xeeves9e",
"kaiwidman");
if (!$con){
    die("ERROR: Could not connect. ".mysqli_connect_error());
}

$username = $_POST["username"];
$status = "";

if(empty($username))
{
    $status = "You must fill out the username field. Try again.";
}
else
{
    $user = mysqli_query($con, "SELECT * FROM USER WHERE user_id ='$username'");
    
    if(mysqli_num_rows($user)>0)
    {
        $status = "Username already taken. Try again.";
    }
    else
    {
        mysqli_query($con, "INSERT INTO USER (user_id) VALUES ('$username')");
        $status = "User account created successfully!";
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