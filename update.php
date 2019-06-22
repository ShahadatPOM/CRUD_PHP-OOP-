<?php 
	include 'config.php';
	include 'database.php';
 ?>
<?php 
	$id = $_GET['id'];
	$db = new database();
	$getquery = "SELECT * FROM mycrud WHERE id=$id";
	$getdata = $db->getdata($getquery)->fetch_assoc();;
	
	if(isset($_POST['update'])){
		$name  = mysqli_real_escape_string($db->conn, $_POST['name']);
		$email = mysqli_real_escape_string($db->conn, $_POST['email']);
		$skill = mysqli_real_escape_string($db->conn, $_POST['skill']);

		if($name==""||$email==""||$skill==""){
			$error = "field must not be empty";
		}else{
			$updatequery = "UPDATE mycrud SET name='$name', email='$email', skill='$skill' WHERE id =$id";
			
			$update= $db->update($updatequery);
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
			<td><input type="text" name="name" value="<?php echo $getdata['name']; ?>"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="email" name="email" value="<?php echo $getdata['email']; ?>"></td>
		</tr>
		<tr>
			<td>skill</td>
			<td><input type="text" name="skill" value="<?php echo $getdata['skill']; ?>"></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="submit" name="update" value="Update">
				<a href="index.php">Show</a>
			</td>
		</tr>
	</table>
</form>