<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Delete Job</title>
</head>

<body>
<?php

	$Id=$_GET['JobId'];
	// Establish Connection with MYSQL
$con = mysqli_connect("localhost","root","","job");

	// Specify the query to Insert Record
	$sql = "delete from jobseeker_reg where JobSeekId='".$Id."'";
    $sql1 = "delete from jobseeker_education where JobSeekId='".$Id."'";
	// execute query
	mysqli_query ($con,$sql1);
    mysqli_query ($con,$sql);
	// Close The Connection
	mysqli_close ($con);
	echo '<script type="text/javascript">alert("JobSeeker Deleted Succesfully");window.location=\'ManageJob.php\';</script>';

?>
</body>
</html>