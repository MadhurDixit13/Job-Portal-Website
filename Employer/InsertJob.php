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
	$records = mysqli_num_rows($result);
	//$sql2 = "SELECT * from job_master";
	//$result1 = mysqli_query($con,$sql2);
	//$records1 = mysqli_num_rows($result1);
	$res2="SELECT JobId FROM job_master ORDER BY JobId DESC LIMIT 1;";
	$result2=mysqli_query($con,$res2);
	$j=mysqli_fetch_assoc($result2);
	//echo "<h2>".$j['JobId']."</h2>";
    while($row = $result->fetch_assoc()){
        $sql3="SELECT JobSeekId from job_master,jobseeker_reg where (job_master.MinQualification=jobseeker_reg.Qualification) and (job_master.JobId={$j['JobId']});";
        $res7=mysqli_query($con,$sql3);
		if($res7){
		$res8=mysqli_fetch_assoc($res7);
		if($res8['JobSeekId']==$row['JobSeekId']){
            $query1="SELECT JobSeekerName from jobseeker_reg where JobSeekId='{$row['JobSeekId']}'";
            $query2="SELECT JobTitle from job_master where JobId={$j['JobId']}";
            $query3="SELECT CompanyName from job_master where JobId={$j['JobId']}";
            $query4="SELECT Vacancy from job_master where JobId={$j['JobId']}";
            $query5="SELECT MinQualification from job_master where JobId={$j['JobId']}";
            $query6="SELECT Email from jobseeker_reg where JobSeekId='{$row['JobSeekId']}'";
            $res1=mysqli_query($con,$query1);
			$Jobseeker_name = mysqli_fetch_assoc($res1);
			$jobseeker_name= "{$Jobseeker_name['JobSeekerName']}";
            $res2=mysqli_query($con,$query2);
			$Job_name=mysqli_fetch_assoc($res2);
			$job_name= "{$Job_name['JobTitle']}";
            $res3=mysqli_query($con,$query3);
			$Company_name=mysqli_fetch_assoc($res3);
			$company_name="{$Company_name['CompanyName']}";
            $res4=mysqli_query($con,$query4);
			$Vacancy=mysqli_fetch_assoc($res4);
			$vacancy="{$Vacancy['Vacancy']}";
            $res5=mysqli_query($con,$query5);
			$Minqual=mysqli_fetch_assoc($res5);
			$minqual="{$Minqual['MinQualification']}";
            $res6=mysqli_query($con,$query6);
			$email=mysqli_fetch_assoc($res6);
			$Email="{$email['Email']}";
			//echo "<h2>".$Email."</h2>";
			//echo "<h2>".$jobseeker_name."</h2>";
            $subject = "Hey Long away you haven't visited our Website!!";
			//$message ="Hello";
            $message = "Hello ".$jobseeker_name." !!You have been away for long. New job has been posted $job_name by $company_name with $vacancy vacancies.Minimum Qualification required is $minqual.";
            $sender = "From: miniprojectmha@gmail.com";
            if(mail($Email, $subject, $message, $sender)){
                echo '<script type="text/javascript">alert("Job Inserted Succesfully");window.location=\'ManageJob.php\';</script>';
                exit();
        }
        }
	}else{
		echo "Failed";
	}
	}
	// Close The Connection
	mysqli_close ($con);
	//echo '<script type="text/javascript">alert("Job Inserted Succesfully");window.location=\'ManageJob.php\';</script>';

?>
</body>
</html>
