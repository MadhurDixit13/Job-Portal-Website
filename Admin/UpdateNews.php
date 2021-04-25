
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$Id = $_POST['txtNewsId'];
$News=$_POST['txtNews'];
$date1=$_POST['txtDate'];    
$Date = date("Y-m-d", strtotime($date1)); 
// Establish Connection with MYSQL
$con = mysqli_connect("localhost","root","","job");
// Select Database
//mysql_select_db("job", $con);
// Specify the query to Update Record
$sql = "UPDATE news_master set News='".$News."',NewsDate='".$Date."' where NewsId=".$Id."";
// Execute query
mysqli_query($con,$sql);
// Close The Connection
mysqli_close($con);
echo '<script type="text/javascript">alert("News Updated Succesfully");window.location=\'News.php\';</script>';
?>
</body>
</html>
