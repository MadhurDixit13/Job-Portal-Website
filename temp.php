<?php
	session_start();
	$con = mysqli_connect('localhost', 'root', '', 'job');
    $sql = "select * from JobSeeker_Reg where Status='verified'";
    $result = mysqli_query($con,$sql);
    $records = mysqli_num_rows($result);
    $i=0;
    $j=4;
    while($i!=$records){
        $sql1="Select * from job_master where job_master.MinQualification==jobseeker_reg.Qualification";
        if(mysqli_query($con,$sql1)){
            $query1="Select JobSeekerName from jobseeker_reg where JobSeekId==$i";
            $query2="Select JobTitle from job_master where JobId==$j";
            $query3="Select CompanyName from job_master where JobId==$j";
            $query4="Select Vacancy from job_master where JobId==$j";
            $query5="Select MinQualification from job_master where JobId==$j";
            $query6="Select Email from jobseeker_reg where JobSeekId==$i";
            $jobseeker_name=mysqli_query($con,$query1);
            $job_name=mysqli_query($con,$query2);
            $company_name=mysqli_query($con,$query3);
            $vacancy=mysqli_query($con,$query4);
            $minqual=mysqli_query($con,$query5);
            $Email=mysqli_query($con,$query6);
            $subject = "User Registered Successfully";
            $message = "Hello $jobseeker_name !!You have been away for long. New job has been posted $job_name by $company_name with $vacancy vacancies.Minimum Qualification required is $minqual.";
            $sender = "From: miniprojectmha@gmail.com";
            if(mail($Email, $subject, $message, $sender)){
                
                exit();
        }
        }
    }
    ?>