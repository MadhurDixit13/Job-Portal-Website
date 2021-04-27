<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	session_start();
	$con = mysqli_connect('localhost', 'root', '', 'job');
	$errors = array();
	if(isset($_POST['jobseekersignup'])){
	$Name=mysqli_real_escape_string($con, $_POST['txtName']);
	$Address=mysqli_real_escape_string($con, $_POST['txtAddress']);
	$City=mysqli_real_escape_string($con, $_POST['txtCity']);
	$Email=$_POST['txtEmail'];
	$Mobile=$_POST['txtMobile'];
	$Qualification=mysqli_real_escape_string($con, $_POST['txtQualification']);
	$Gender=$_POST['cmbGender'];	
	//$BirthDate=$_POST['txtBirthDate'];
	$date1=$_POST['txtBirthDate'];    
	$BirthDate = date("Y-m-d", strtotime($date1)); 
	$path1 = $_FILES["txtFile"]["name"];
	$Status="Pending";
	$UserName=$_POST['txtUserName'];
	$Password=$_POST['txtPassword'];
	$cPassword=$_POST['txtcPassword'];
	if($Password != $cPassword){
        echo '<script type="text/javascript">alert("Confirm Password not matched!");window.location=\'JobSeekerReg.php\';</script>';
    }
	$Question=$_POST['cmbQue'];
	$Answer=$_POST['txtAnswer'];
	$UserType="JobSeeker";
	if ($Qualification=="Other")
	{
		$Qualification=$_POST['txtOther'];
	}
	$email_check = "SELECT * FROM jobseeker_reg WHERE (UserName='$UserName' or Email='$Email');";
	$res = mysqli_query($con, $email_check);
	if (mysqli_num_rows($res)>0) {
        $row = mysqli_fetch_assoc($res);
  	  if($Email==isset($row['Email'])){
        echo '<script type="text/javascript">alert("Email already exists");window.location=\'JobSeekerReg.php\';</script>';
        }
        if($UserName==isset($row['UserName']))
		{
            echo '<script type="text/javascript">alert("username  already exists");window.location=\'JobSeekerReg.php\';</script>';
		}
  	}
	else{
		move_uploaded_file($_FILES["txtFile"]["tmp_name"],"upload/"  .$_FILES["txtFile"]["name"]);
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $Status = "notverified";
        $insert_data = "insert into jobseeker_reg(JobSeekerName,Address,City,Email,Mobile,Qualification,Gender,BirthDate,Resume,Status,UserName,Password,Question,Answer,code) VALUES (
			'$Name','$Address','$City','$Email','$Mobile','$Qualification','$Gender','$BirthDate','$path1','$Status','$UserName','$Password','$Question','$Answer','".$code."')";
		$data_check = mysqli_query($con, $insert_data);
	if($data_check){
		$subject = "Email verification Code";
		$message = "Your verification code is $code";
		$sender = "From: miniprojectmha@gmail.com";
		if(mail($Email, $subject, $message, $sender)){
			$info = "We've sent a verification code to your email - $Email";
			$_SESSION['info'] = $info;
			$_SESSION['Email'] = $Email;
			$_SESSION['Password'] = $Password;
			header('location: jobseeker-otp.php');
			exit();
		}else{
			$errors['otp-error'] = "Failed while sending code!";
		}
	}else{
		$errors['db-error'] = "Failed while inserting data into database!";
		}
	}
}
	//if JobSeeker click verification code submit button
    if(isset($_POST['check'])){
		$con = mysqli_connect('localhost', 'root', '', 'job');
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM jobseeker_reg WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $Email = $fetch_data['Email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE jobseeker_reg SET code = $code, Status = $status WHERE code = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);
            if($update_res){
                $_SESSION['Name'] = $Name;
				echo "<h1>".$Name."</h1>";
                $_SESSION['Email'] = $Email;
				$info = "Your are registered successfully. Now you can login with your credentials.";
                $_SESSION['info'] = $info;
                $subject = "User Registered Successfully";
                $message = "Hi $Name !! Your are successfully registered with us ";
                $sender = "From: miniprojectmha@gmail.com";
                if(mail($Email, $subject, $message, $sender)){
                    $_SESSION['Email'] = $Email;
                    $_SESSION['Password'] = $Password;
                    header('location: passwordchanged.php');
                    exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
            }
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }
	if(isset($_POST['checkemail'])){
		$UserName=$_POST['txtUserName'];
		$Question=$_POST['cmbQue'];
		$Answer=$_POST['txtAnswer'];
		$UserType=$_POST['rdUser'];
		if($UserType=="JobSeeker")
		{
//mysqli_select_db("job", $con);
		$sql = "select * from jobseeker_reg  where UserName='".$UserName."' and Question='".$Question."' and Answer='".$Answer."'";
		$result = mysqli_query($con,$sql);
		$records = mysqli_num_rows($result);
		$row = mysqli_fetch_array($result);
		//echo $records;
		$Email =$_POST['txtEmail'];
        $check_email = "SELECT * FROM jobseeker_reg WHERE Email='$Email'";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE jobseeker_reg SET code = $code WHERE Email = '$Email'";
            $run_query =  mysqli_query($con, $insert_code);
            if($run_query){
                $subject = "Password Reset Code";
                $message = "Your password reset code is $code";
                $sender = "From: miniprojectmha@gmail.com";
                if(mail($Email, $subject, $message, $sender)){
                    $info = "We've sent a passwrod reset otp to your email - $Email";
                    $_SESSION['info'] = $info;
                    $_SESSION['Email'] = $Email;
                    header('location: resetcode.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Failed while sending code!";
                }
            }else{
                $errors['db-error'] = "Something went wrong!";
            }
        }else{
            $errors['email'] = "This email address does not exist!";
        }
			}
		}
		if(isset($_POST['check-reset-otp'])){
			$_SESSION['info'] = "";
			$otp_code = mysqli_real_escape_string($con, $_POST['otp']);
			$check_code = "SELECT * FROM jobseeker_reg WHERE code = $otp_code";
			$code_res = mysqli_query($con, $check_code);
			if(mysqli_num_rows($code_res) > 0){
				$fetch_data = mysqli_fetch_assoc($code_res);
				$Email = $fetch_data['txtEmail'];
				$_SESSION['txtEmail'] = $Email;
				$info = "Please create a new password that you don't use on any other site.";
				$_SESSION['info'] = $info;
				header('location: newpassword.php');
				exit();
			}else{
				$errors['otp-error'] = "You've entered incorrect code!";
			}
		}

		if(isset($_POST['change-password'])){
			$_SESSION['info'] = "";
			$Password = mysqli_real_escape_string($con, $_POST['Password']);
			$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
			if($Password !== $cpassword){
				$errors['Password'] = "Confirm password not matched!";
			}else{
				$code = 0;
				$Email = $_SESSION['Email'];//getting this email using session 
				$encpass = password_hash($Password, PASSWORD_BCRYPT);
				$update_pass = "UPDATE jobseeker_reg SET code = $code, Password =$Password  WHERE Email = '$Email'";
				$run_query = mysqli_query($con, $update_pass);
				if($run_query){
					$info = "Your password changed. Now you can login with your new password.";
					$_SESSION['info'] = $info;
					header('Location: passwordchanged.php');
				}else{
					$errors['db-error'] = "Failed to change your password!";
				}
			}
		}
		if(isset($_POST['login-now'])){
			header('Location: index.php');
		}
	// Establish Connection with MYSQL
	//$con = mysqli_connect ("localhost","root","","job");
	// Select Database	mysql_select_db("job", $con);
	// Specify the query to Insert Record
//	$sql = "insert into jobSeeker_reg(JobSeekerName,Address,City,Email,Mobile,Qualification,Gender,BirthDate,Resume,Status,UserName,Password,Question,Answer) values(
//'".$Name."','".$Address."','".$City."','".$Email."',".$Mobile.",'".$Qualification."','".$Gender."',
//'".$BirthDate."','".$path1."','".$Status."','".$UserName."','".$Password."','".$Question."','".$Answer."')";

/*$sql="insert into jobSeeker_reg(JobSeekerName,Address,City,Email,Mobile,Qualification,Gender,BirthDate,Resume,Status,UserName,Password,Question,Answer) VALUES (
'$Name','$Address','$City','$Email','$Mobile','$Qualification','$Gender','$BirthDate','$path1','$Status','$UserName','$Password','$Question','$Answer'

)";
	// execute query

var_dump($sql);
	if(mysqli_query ($con,$sql)){
        echo '<script type="text/javascript">alert("Registration Completed Succesfully");window.location=\'index.php\';</script>';
    }*/


mysqli_close ($con);

	// Close The Connection


?>
</body>
</html>
