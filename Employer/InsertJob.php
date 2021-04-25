<?php
if (!isset($_SESSION)) 
{
  session_start();
  
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

	$txtTitle=$_POST['txtTitle'];
	$txtTotal=$_POST['txtTotal'];
	$cmbQual=$_POST['cmbQual'];
	$txtDesc=$_POST['txtDesc'];
	$Name=$_SESSION['Name'];
	if($cmbQual=="Other")
	{
	$cmbQual=$_POST['txtOther'];
	}
	// Establish Connection with MYSQL
	$con = mysqli_connect ("localhost","root","","job");

	// Specify the query to Insert Record
	$sql = "INSERT into job_master (CompanyName,JobTitle,Vacancy,MinQualification,Description) values('".$Name."','".$txtTitle."','".$txtTotal."','".$cmbQual."','".$txtDesc."')";
	// execute query
	mysqli_query ($con,$sql);
	$sql1 = "SELECT * from JobSeeker_Reg where Status='verified'";
    $result = mysqli_query($con,$sql1);
	$sql2 = "SELECT * from job_master";
	$result1 = mysqli_query($con,$sql2);
	$records1 = mysqli_num_rows($result1);
    $i=0;
	$records1+=1;
    while($records = mysqli_num_rows($result)){
        $sql3="SELECT * from job_master,jobseeker_reg where job_master.MinQualification=jobseeker_reg.Qualification";
        if(mysqli_query($con,$sql3)){
            $query1="SELECT JobSeekerName from jobseeker_reg where JobSeekId='$i'";
            $query2="SELECT JobTitle from job_master where JobId='$records1'";
            $query3="SELECT CompanyName from job_master where JobId='$records1'";
            $query4="SELECT Vacancy from job_master where JobId='$records1'";
            $query5="SELECT MinQualification from job_master where JobId='$records1'";
            $query6="SELECT Email from jobseeker_reg where JobSeekId='$records1'";
            $res1=mysqli_query($con,$query1);
			$jobseeker_name = mysqli_fetch_assoc($res1);
            $res2=mysqli_query($con,$query2);
			$job_name=mysqli_fetch_assoc($res2);
            $res3=mysqli_query($con,$query3);
			$company_name=mysqli_fetch_assoc($res3);
            $res4=mysqli_query($con,$query4);
			$vacancy=mysqli_fetch_assoc($res4);
            $res5=mysqli_query($con,$query5);
			$minqual=mysqli_fetch_assoc($res5);
            $res6=mysqli_query($con,$query6);
			$email=mysqli_fetch_assoc($res6);
			$Email="{$email['Email']}";
			print "hi";
            $subject = "Hey Long away you haven't visited our Website!!";
			//$message ="Hello";
            $message = "Hello ".$jobseeker_name." !!You have been away for long. New job has been posted ".$job_name." by ".$company_name." with ".$vacancy." vacancies.Minimum Qualification required is ".$minqual.".";
            $sender = "From: miniprojectmha@gmail.com";
            if(mail($Email, $subject, $message, $sender)){
                echo '<script type="text/javascript">alert("Job Inserted Succesfully");window.location=\'ManageJob.php\';</script>';
                exit();
        }
		$i+=1;
        }
	}
	// Close The Connection
	mysqli_close ($con);
	echo '<script type="text/javascript">alert("Job Inserted Succesfully");window.location=\'ManageJob.php\';</script>';

?>
</body>
</html>
