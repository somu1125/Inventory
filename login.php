<html>
<head><title>User Login</title>
<link rel="stylesheet" type="text/css" href="log.css">

</head>
<body>



<div class="login-page">
  <div class="form">
    <form class="register-form" method="post" action="login.php">
      <input type="text" placeholder="name" name="name1" required />
      <input type="password" placeholder="password" name="pass" required/>
	  <input type="password" placeholder="admin password" name="adpass" required />
      <input type="email" placeholder="example@xyz.com" name="mail" required />
	   <button>create</button>
	   <p class="message">Already registered? <a href="#">Sign In</a></p>
	</form>
        <?php
		include('db.php');
	
	 
	
	
	if(isset($_POST['name1']))
	{
		$uname=mysqli_real_escape_string($db,$_POST['name1']);
		$pass=mysqli_real_escape_string($db,$_POST['pass']);
		$email=$_POST['mail'];
		$apass=mysqli_real_escape_string($db,$_POST['adpass']);
		$result=mysqli_query($db,"SELECT username FROM login WHERE username='$uname'");
		$chk=mysqli_num_rows($result);
		$admnchk=mysqli_query($db,"SELECT username FROM login WHERE pass='$apass'");
		$chkit=mysqli_num_rows($admnchk);
		if($chk>0)
		{
			echo "<script>alert('Oops !! User Exists')</script>";
		}
		else
		{
			if($chkit>0)
			{
				mysqli_query($db,"INSERT INTO login(username,pass,email) VALUES('$uname','$pass','$email')");
				echo "<script>alert('Registration Complete ')</script>";
				
			}
			else
			{
				echo "<script>alert('Oops !!  Wrong admin password ')</script>";
				
			}
		}
		
			
	}
	
?>
   
    <form class="login-form" method="post" action="login.php" >
      <input type="text" placeholder="username" name="name" required/>
      <input type="password" placeholder="password" name="pass" required/>
	  <button>login</button>
      <?php
		include('db.php');
	/**$uname=$_POST['name'];
	$pass=$_POST['pass'];**/
	 
	
	
	if(isset($_POST['name']))
	{
		$uname=mysqli_real_escape_string($db,$_POST['name']);
		$pass=mysqli_real_escape_string($db,$_POST['pass']);
		$result=mysqli_query($db,"SELECT username FROM login WHERE username='$uname' AND pass='$pass'");
		$chk=mysqli_num_rows($result);
		if($chk>0)
		{
			
			$_SESSION['user']=$uname;
			header("Location: index1.php");
			
		}
		else
		{
			echo "<script>alert('not registered user or check password`')</script>";
		}
		
			
	}
	
	
	?>
	  
      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
	
	
  </div>
  
	
  <script src="jquery-1.7.1.min.js"></script>
<script src="anm.js"></script>
</div>
</body>
</html>