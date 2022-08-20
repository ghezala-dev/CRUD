<!DOCTYPE html>
<html>
<head>
	<title>php crud</title>
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"  ></script>
</head>
<body>
	<?php require_once 'process.php'; ?>

	<?php
	if(isset($_SESSIONS['message'])):?>
		<div class="alert alert-<?=$_SESSIONS['msg_type']?>">

			<?php
			echo $_SESSIONS['message'];
			unset($_SESSIONS['message']);
			?>
		</div>
	<?php endif ?>
	<div class="container">
		
	<?php
	$mysqli = new mysqli('localhost','root','mypass123','crud') or die(mysqli_error($mysqli));
	$result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
	//pre_r($result);
	?>
	<div class="row justify-content-center">
		<table class="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>location</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		<?php
		while ($row = $result->fetch_assoc()):?
		 <tr>
		 <td><?php echo $row['name']; ?></td>
		 <td><?php echo $row['location']; ?></td>
		 <td> 
		 	<a href="index.php?edit=<?php echo $row['id]; ?>"
		 	class="btn btn-info">Edit</a>
		 	<a href="process.php?delete=<?php echo $row['id'];?>"
		 	class="btn btn-danger">Delete</a>
		 </td>
		 </tr>
		<?php endwhile; ?>
		</table>
	</div>
	<?php


	function pre_r($array ){
		echo '<pre>';
		print_r($array);
		echo '</pre>';
	}
	?>
	<div class="row justify-content-center">
	<form action="process.php" method="POST">
	<input type="hidden" name="id" value="<?php echo $id;?>">
		<div class="form-group">
		<label>name</label>
		<input type="text" name="name" class="form-control" value="<?php echo $name;?>" placeholder="Enter your name">
	</div>
	<div class="form-group">
		<label>location</label>
		<input type="text" name="location"  value="<?php  echo $location;?>"  class="form-control" placeholder="Enter your location">
	</div>
	<div class="form-group">
	<?php

	if ($update ==true);
	?>
	<button type="submit" class="btn btn-info" name="update">update</button>
	<?php  else: ?>

		<button type="submit" class="btn btn-primary" name="save">save</button>
		<?php endif; ?>
	</div>
		
	</form>
</div>
</div>

</body>
</html>