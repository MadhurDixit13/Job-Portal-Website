<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
SESSION_START(); 
// include('header.php');
include ('Push.php');  
$push = new Push();
?>
<title></title>
<?php include('container.php');?>
<style>
.borderless tr td {
    border: none !important;
    padding: 2px !important;
}
</style>
<div class="container">		
	<h2>Example: Push Notification System with PHP & MySQL</h2>	
	<a href="index.php">Home</a> | <a href="logout.php">Logout</a>
	<hr>
	<div class="row">
		<div class="col-sm-6">
			<h3>Add New Notification:</h3>
			<form method="post"  action="<?php echo $_SERVER['PHP_SELF']; ?>">										
				<table class="table borderless">
					<tr>
						<td>Title</td>
						<td><input type="text" name="title" class="form-control" required></td>
					</tr>	
					<tr>
						<td>Message</td>
						<td><textarea name="msg" cols="50" rows="4" class="form-control" required></textarea></td>
					</tr>			
					<tr>
						<td>Broadcast time</td>
						<td><select name="time" class="form-control"><option>Now</option></select> </td>
					</tr>
					<tr>
						<td>Loop (time)</td>
						<td><select name="loops" class="form-control">
						<?php 
							for ($i=1; $i<=5 ; $i++) { ?>
								<option value="<?php echo $i ?>"><?php echo $i ?></option>
						<?php } ?>
						</select></td>
					</tr>
					<tr>
						<td>Loop Every (Minute)</td>
						<td><select name="loop_every" class="form-control">
						<?php 
						for ($i=1; $i<=60 ; $i++) { ?>
							<option value="<?php echo $i ?>"><?php echo $i ?></option>
						<?php } ?>
						</select> </td>
					</tr>
					<tr>
						<td>For</td>
						<td><select name="user" class="form-control">
						<?php 		
							$user = $push->listUsers(); 
							foreach ($user as $key) {
						?>
							<option value="<?php echo $key['username'] ?>"><?php echo $key['username'] ?></option>
						<?php } ?>
						</select></td>
					</tr>
					<tr>
						<td colspan=1></td>
						<td colspan=1></td>
					</tr>					
					<tr>
						<td colspan=1></td>
						<td><button name="submit" type="submit" class="btn btn-info">Add Message</button></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
	<?php 
	if (isset($_POST['submit'])) { 
		if(isset($_POST['msg']) and isset($_POST['time']) and isset($_POST['loops']) and isset($_POST['loop_every']) and isset($_POST['user'])) {
			$title = $_POST['title'];	
			$msg = $_POST['msg']; 
			$time = date('Y-m-d H:i:s'); 
			$loop= $_POST['loops']; 
			$loop_every=$_POST['loop_every']; 
			$user = $_POST['user']; 
			$isSaved = $push->saveNotification($title, $msg,$time,$loop,$loop_every,$user);
			if($isSaved) {
				echo '* save new notification success';
			} else {
				echo 'error save data';
			}
		} else {
			echo '* completed the parameter above';
		}
	} 
	?>
	<h3>Notifications List:</h3>
	<table class="table">
		<thead>
			<tr>
				<th>No</th>
				<th>Next Schedule</th>
				<th>Title</th>
				<th>Message</th>
				<th>Remains</th>
				<th>User</th>
			</tr>
		</thead>
		<tbody>
			<?php $a =1; 
			$notifList = $push->listNotification(); 
			foreach ($notifList as $key) {
			?>
			<tr>
				<td><?php echo $a ?></td>
				<td><?php echo $key['notif_time'] ?></td>
				<td><?php echo $key['title'] ?></td>
				<td><?php echo $key['notif_msg'] ?></td>
				<td><?php echo $key['notif_loop']; ?></td>
				<td><?php echo $key['username'] ?></td>
			</tr>
			<?php $a++; } ?>
		</tbody>
	</table>
</div>	
<?php include('footer.php');?>
</body>
</html>
