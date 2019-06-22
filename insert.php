<?php 
	include 'config.php';
	include 'database.php';
?>

<?php 
	$db = new database();
	
	if(isset($_POST['submit'])){
		$name  = mysqli_real_escape_string($db->conn, $_POST['name']);
		$email = mysqli_real_escape_string($db->conn, $_POST['email']);
		$skill = mysqli_real_escape_string($db->conn, $_POST['skill']);

		if($name==""||$email==""||$skill==""){
			$error = "field must not be empty";
		}else{
			$creatquery = "INSERT INTO mycrud (name, email, skill) VALUES ('$name', '$email', '$skill')";
			$insert = $db->creat($creatquery);
		}
	}
?>

<?php 
if(isset($error)){
	echo "<span style='color:red'>".$error."</span>";
}
?>

<form action="" method="POST">
	<table>
		<tr>
			<td>Name</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="email" name="email"></td>
		</tr>
		<tr>
			<td>skill</td>
			<td><input type="text" name="skill"></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="submit" name="submit" value="Creat">
				<input type="reset" value="Clear">
				<a href="index.php">Show</a>
			</td>
		</tr>
	</table>
</form>