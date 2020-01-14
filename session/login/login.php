<?php require("config.php") ?>

<!DOCTYPE HTML>
	<html>
	<head>
		<title> Form </title>
	</head>
	<body>
		<form name="frm1" method="post">
			<table cellpadding ="10" cellspacing="5">
				<tr>
					<td><p>Email</p></td>
					<td><input type="email" name="email" placeholder="Eg.abc@gmail.com"></td>
				</tr>
				<tr>
					<td><p> PASSWORD </p>></td>
					<td><input type="password" name="password" placeholder="Enter the password"></td>
				</tr>
				<td>&nbsp</td>
				<td><input type="submit" name="ok" value="Login"></td>
			</table>
		</form>
        <?php
 
    if(isset($_POST['ok']))
    {
        $email=$_POST['email'];
        $password=$_POST['password'];
        $sql= "SELECT * FROM student WHERE email='$email' and password='$password'";
        $rs=mysqli_query($con,$sql) or die(mysqli_error($con));
        if(mysqli_num_rows($rs)>0){
            $rec=mysqli_fetch_assoc($rs);
            $_SESSION['u_info']=$rec;
            header('location:index.php');
            }
            else
            {
                echo "Invalid email or password";
            }
        }
        ?>
	</body>
	</html>

      
         







        
    
    

\
