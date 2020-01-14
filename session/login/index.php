<?php 
require("config.php");
require("check_session.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>profile</title>
</head>
<body>
<h3>Hi <?php echo $_SESSION['u_info']['name'] ?></h3>

<a href="logout.php">Logout</a>
</body>
</html>