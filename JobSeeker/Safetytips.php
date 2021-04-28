<?php
session_start();
if(isset($_SESSION['$UserName_job'])){
}
	else{
		header('location:../index.php');
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="cs" />
    <meta name="robots" content="all,follow" />

    
<title>JOB PORTAL</title>
    <meta name="description" content="..." />
    <meta name="keywords" content="..." />
    
    <link rel="index" href="./" title="Home" />
    <link rel="stylesheet" media="screen,projection" type="text/css" href="./css/main.css" />
    <link rel="stylesheet" media="print" type="text/css" href="./css/print.css" />
    <link rel="stylesheet" media="aural" type="text/css" href="./css/aural.css" />
    <style type="text/css">
<!--
.style1 {
	color: #000066;
	font-weight: bold;
}
-->
    </style>
    <link href="../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
</head>

<body id="www-url-cz">
<!-- Main -->
<font size=3>
<div id="main" class="box">

<?php 
include "menu.php"
?>   
<!-- Page (2 columns) -->
    <div id="page" class="box">
    <div id="page-in" class="box">

       

        <!-- Content -->
        <div id="content">

           
            <!-- /article -->

            <hr class="noscreen" />

           
            <!-- /article -->

            <hr class="noscreen" />
            
            <!-- Article -->
           
            <!-- /article -->

            <hr class="noscreen" />

            <!-- Article -->
            <div class="article">
                <h2><span><U>Safety Tips</U></span></h2>
                <p>
1. Avoid job postings that sound too good to be true<br>
Beware of job announcements requiring no experience or skills, but offering large salaries. If it sounds too good to be true, it probably is.
<br><br>
2. Avoid unprofessional listings
<br>
Absence of a professional job title, lack of specific job tasks, frequent misspellings and grammatical errors may be signs of a fraudulent posting. Web addresses prompting you to enter your email address to be redirected to the company website and contact email addresses using free web mail services, such as Gmail or Yahoo may also be indicators of a less than reputable organization.
<br><br>
3. Beware of job postings that ask you to pay a fee
<br>
Legitimate recruiters are paid by employers, not by job seekers.  In such cases, there rarely exists a job opportunity, rather the organization is utilizing a job posting system to advertise vocational training.
<br><br>
4. Protect your identity
<br>
Never disclose your birth date, social security number or mother’s maiden name until you’ve received a job offer. These details may be required by a potential employer in order to conduct a background check, but they will not do so until they’re ready to hire, whereas, scammers will request this information immediately in an attempt to steal your identity.
<br><br>
5. Beware of money wiring scams
<br>
Scammers often disguise themselves as real businesses, utilizing a legitimate name in their posting or sending you an unsolicited email inviting you to apply for online work. At some point, the “employer” will ask you to deposit a check into your account and then wire them the money back. They may even ask for your bank account number or money up front. Do not provide bank or PayPal account numbers or credit card information. If you receive a check, do not cash it. A legitimate company will never have a reason for you to cash a check and then send them money.
<br><br>
6. Always do your research
<br>
Conduct a Google search, verify the company exists, look for blog entries reporting misconduct or associated scams. 
<br><br>
7. Beware of unsolicited contact from an employer
<br>
Be careful when posting your resume to an online job board which may inadvertently disclose your personal information .Fraudulent employers often utilize resume posting systems to identify their victims.
<br><br>
8. Protect your social networking presence
<br>
Consider information posted by or about you on Facebook, Twitter, YouTube, and Flickr, etc. Think about what you or others may be exposing and how this information may be viewed by perspective employers. Maintain a profile that presents positive and accurate content. You may want to periodically Google yourself to review what information has been made accessible about you. Likewise, protect your friends. Do not share contact information or post disparaging photos.
<br><br>
9. Do not provide employers with referrals
<br>
Do not provide employers or recruiters with referrals of friends that might be interested in an opportunity. Should you believe a friend would be interested in an opportunity, forward the recruiter’s name and information to the friend, allowing them to contact the employer if they choose.
<br><br>
11. Engage in professional demeanor
<br>
Employers are expected to conduct themselves professionally, treat job seekers fairly, and observe equal employment opportunity and affirmative action principles. Recognize that flirtation, compliments about your attractiveness, suggestive remarks or jokes are not a professionally acceptable part of the interview process.
<br><br>
If at any time during the job search process, you feel that you have been subjected to inappropriate behavior cease all contact with the employer and immediately report the behavior to the appropriate authorities:</p>
<br><br>
        
                <p>&nbsp;</p>

                <p class="btn-more box noprint">&nbsp;</p>
                <p class="btn-more box noprint">&nbsp;</p>
                <p class="btn-more box noprint">&nbsp;</p>
                
          </div> <!-- /article -->

            <hr class="noscreen" />
            <p class="btn-more box noprint">&nbsp;</p>
            <p class="btn-more box noprint">&nbsp;</p>
            <p class="btn-more box noprint">&nbsp;</p>
            <p class="btn-more box noprint">&nbsp;</p>
            <p class="btn-more box noprint">&nbsp;</p>
            <p class="btn-more box noprint">&nbsp;</p>
            <p class="btn-more box noprint">&nbsp;</p>
        </div> <!-- /content -->

<?php
include "right.php"
?>

    </div> <!-- /page-in -->
    </div> <!-- /page -->

 
<?php
include "footer.php"
?>
</div> <!-- /main -->
</font>
</body>
</html>
