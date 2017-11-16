  
  <?php
		include('db.php');
	
	 
	
	
	if(isset($_POST['name']))
	{
		$uname=mysqli_real_escape_string($db,$_POST['name']);
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
				mysqli_query($db,"INSERT INTO login(username,pass,email) VALUES('$uname','$pass','$email')") or die("ERROR");
				echo "<script>alert('Registration Complete ')</script>";
				
			}
			else
			{
				echo "<script>alert('Oops !!  Wrong admin password ')</script>";
				
			}
		}
		
			
	}
	
?>