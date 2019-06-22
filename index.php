<?php 
include 'config.php';
include 'database.php';
?>

<?php 
 $db = new database();
 $readquery = "SELECT * FROM mycrud";
 $read = $db->read($readquery)
?>

<?php 
if(isset($_GET['msg'])){
	echo $_GET['msg'];
}
?>

<table class="tblone">
	<tr>
		<th>Serial</th>
		<th>Name</th>
		<th>Email</th>
		<th>Skill</th>
		<th>Action</th>
	</tr>
	<?php if($read){ ?>
		<?php 
		$i=1;
		while($row = $read->fetch_assoc()){ ?>
	<tr>
		<td><?php echo $i++; ?></td>
		<td><?php echo $row['name']; ?></td>
		<td><?php echo $row['email']; ?></td>
		<td><?php echo $row['skill']; ?></td>
		<td>
			<a href="update.php?id=<?php echo $row['id'];?>">Edit</a>
			<a href="delete.php?id=<?php echo $row['id'];?>">Delete</a>
		</td>
	</tr>
<?php } ?>
<?php }else{ ?>
	<p>data not found</p>
<?php } ?>
</table>

<a href="insert.php">Add</a>

<style>
	body{
		background: #ddd;
		margin: 0 auto;
		width: 70%;
	}
	.tblone{
		width: 100%;
		border: 1px solid #fff;
		margin: 20px 0;
	}
	.tblone td{
		padding: 5px 10px;
		text-align: center;
	}
	.tblone tr:nth-child(2n+1){
		background: #fff;
		height: 30px;
	}
	.tblone tr:nth-child(2n){
		background: #f1f1f1;
		height: 30px;
	}
</style>
