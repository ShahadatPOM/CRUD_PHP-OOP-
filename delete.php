<?php 
	include 'config.php';
	include 'database.php';
?>
<?php 
	$id = $_GET['id'];
	$db = new database();
	$getquery = "DELETE FROM mycrud WHERE id=$id";
	$delete = $db->delete($getquery);
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
				<input type="reset" value="Clear">
				<a href="index.php">Show</a>
			</td>
		</tr>
	</table>
</form>