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
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
	$errors = array();
	if(isset($_POST['employersignup'])){
	$CompanyName = $_POST['txtName'];
	//$CompnayName=$_POST['txtName'];
	$ContactPerson = $_POST['txtPerson'];
	//$ContactPerson=$_POST['txtPerson'];
	$Address=$_POST['txtAddress'];
	$City=test_input($_POST['txtCity']);
	$Email=test_input($_POST['txtEmail']);
	//$Email=$_POST['txtEmail'];
	$Mobile=$_POST['txtMobile'];
	$Area=$_POST['txtAreaWork'];
	$Status="notverified";
	$UserName=test_input($_POST['txtUserName']);
	//$UserName=$_POST['txtUserName'];
	$Password=$_POST['txtPassword'];
	//$Password=$_POST['txtPassword'];
	$cpassword =$_POST['txtcPassword'];
	if($Password != $cpassword){
        //$errors['txtPassword'] = "Confirm password not matched!";
        echo '<script type="text/javascript">alert("Confirm Password not matched!");window.location=\'EmployerReg.php\';</script>';
    }
	$UserType="Employer";
	$Question=$_POST['cmbQue'];
	$Answer=$_POST['txtAnswer'];
	//$email_check = "SELECT * FROM employer_reg WHERE Email = '$Email'";
    $sql_u = "SELECT * FROM employer_reg WHERE (UserName='$UserName' or Email='$Email');";
  	$res_u = mysqli_query($con, $sql_u);
  	if (mysqli_num_rows($res_u)>0) {
        $row = mysqli_fetch_assoc($res_u);
  	  if($Email==isset($row['Email'])){
        echo '<script type="text/javascript">alert("Email already exists");window.location=\'EmployerReg.php\';</script>';
        }
        if($UserName==isset($row['UserName']))
		{
            echo '<script type="text/javascript">alert("UserName  already exists");window.location=\'EmployerReg.php\';</script>';
		}

  	}else{
        $encpass = password_hash($Password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $Status = "notverified";
        $insert_data = "insert into employer_reg(CompanyName,ContactPerson,Address,City,Email,Mobile,Area_Work,Status,UserName,Password,Question,Answer,code) values('".$CompanyName."','".$ContactPerson."','".$Address."','".$City."','".$Email."',".$Mobile.",'".$Area."','".$Status."','".$UserName."','".$Password."','".$Question."','".$Answer."','".$code."')";
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
                header('location: employer-otp.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }
    // $res = mysqli_query($con, $email_check);
	// if(mysqli_num_rows($res) > 0){
    //     $errors['txtEmail'] = "Email that you have entered is already exist!";
    // }
	// if
}
	//if Employer click verification code submit button
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM Employer_Reg WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $Email = $fetch_data['Email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE Employer_Reg SET code = $code, Status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);
            if($update_res){
                $_SESSION['CompanyName'] = $CompanyName;
                $_SESSION['Email'] = $Email;
                $info = "Your are registered successfully. Now you can login with your credentials.";
                $_SESSION['info'] = $info;
                $subject = "User Registered Successfully";
                $message = "Hi ".$CompanyName." !! Your are successfully registered with us ";
                $sender = "From: miniprojectmha@gmail.com";
                if(mail($Email, $subject, $message, $sender)){
                    $_SESSION['Email'] = $Email;
                    $_SESSION['Password'] = $Password;
                    header('location: password-changed.php');
                    exit();
            }else{
                $errors['mail-error'] = "Failed while sending registration email!";
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
		$UserName=test_input($_POST['txtUserName']);
		$Question=$_POST['cmbQue'];
		$Answer=$_POST['txtAnswer'];
		$UserType=$_POST['rdUser'];
		if($UserType=="Employer")
		{
//mysqli_select_db("job", $con);
		$sql = "select * from employer_reg  where UserName='".$UserName."' and Question='".$Question."' and Answer='".$Answer."'";

		$result = mysqli_query($con,$sql);
		$records = mysqli_num_rows($result);
		$row = mysqli_fetch_array($result);
		//echo $records;
		$Email = mysqli_real_escape_string($con, $_POST['txtEmail']);
        $check_email = "SELECT * FROM Employer_Reg WHERE Email='$Email'";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE Employer_Reg SET code = $code WHERE Email = '$Email'";
            $run_query =  mysqli_query($con, $insert_code);
            if($run_query){
                $subject = "Password Reset Code";
                $message = "Your password reset code is $code";
                $sender = "From: miniprojectmha@gmail.com";
                if(mail($Email, $subject, $message, $sender)){
                    $info = "We've sent a passwrod reset otp to your email - $Email";
                    $_SESSION['info'] = $info;
                    $_SESSION['Email'] = $Email;
                    header('location: reset-code.php');
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
		/*else
		{
//mysqli_select_db("job", $con);
		$sql = "select * from jobseeker_reg  where UserName='".$UserName."' and Question='".$Question."' and Answer='".$Answer."'";
		$result = mysqli_query($con,$sql);
		$records = mysqli_num_rows($result);
		$row = mysqli_fetch_array($result);
		if ($records==0)
		{
		echo '<script type="text/javascript">alert("Wrong Information Provided");window.location=\'Forget.php\';</script>';
		}
		else
		{
		$_SESSION['ID']=$row['JobSeekId'];
		$_SESSION['Name']=$row['JobSeekerName'];
		header('location:JobSeeker/index.php');
		} 
	}*/
    }
	if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM Employer_Reg WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['txtEmail'];
            $_SESSION['txtEmail'] = $Email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
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
            echo '<script type="text/javascript">alert("Confirm Password not matched!");window.location=\'new-password.php\';</script>';
        }else{
            $code = 0;
            $Email = $_SESSION['Email'];//getting this email using session 
			$encpass = password_hash($Password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE Employer_Reg SET code = $code, Password =$Password  WHERE Email = '$Email'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
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

	// Specify the query to Insert Record
	//$sql = "insert into Employer_Reg(CompanyName,ContactPerson,Address,City,Email,Mobile,Area_Work,Status,UserName,Password,Question,Answer) values('".$CompnayName."','".$ContactPerson."','".$Address."','".$City."','".$Email."',".$Mobile.",'".$Area."','".$Status."','".$UserName."','".$Password."','".$Question."','".$Answer."')";
	// execute query
      
	//mysqli_query ($con,$sql);
	// Close The Connection
	mysqli_close ($con);
	
	//echo '<script type="text/javascript">alert("Registration Completed Succesfully");window.location=\'index.php\';</script>';

?>
</body>
</html>
