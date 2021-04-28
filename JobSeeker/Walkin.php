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
.style3 {}
-->
table th, table td{
        padding: 10px; /* Apply cell padding */
        }
        table{
        border-spacing: 10px; /* Apply cell spacing */
        }
    </style>
</head>

<body id="www-url-cz">
<font size=3>
<!-- Main -->
<div id="main" class="box">
<?php 
include "Header.php"
?>
<?php 
include "menu.php"
?>   
<!-- Page (2 columns) -->
    <div id="page" class="box">
    <div id="page-in" class="box">

        <div id="strip" class="box noprint">

            <!-- RSS feeds -->
            <hr class="noscreen" />

            <!-- Breadcrumbs -->
            <p id="breadcrumbs">&nbsp;</p>
          <hr class="noscreen" />
            
        </div> <!-- /strip -->

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
                <h2><span><a href="#">Walkin Interview Detail</a></span></h2>
               
                <?php
// Establish Connection with Database
$con = mysqli_connect("localhost","root","","job");

// Specify the query to execute
$sql = "select * from Walkin_Master";
// Execute query
$result = mysqli_query($con,$sql);
// Loop through each records 
while($row = mysqli_fetch_array($result))
{
$Id=$row['WalkInId'];
$CompanyName=$row['CompanyName'];
$JobTitle=$row['JobTitle'];
$Vacancy=$row['Vacancy'];
$MinQualification=$row['MinQualification'];
$Description=$row['Description'];
$InterviewDate=$row['InterviewDate'];
$InterviewTime=$row['InterviewTime'];

?>
                <table width="100%" border="1" bordercolor="#1CB5F1" >
                  
                  <tr>
                    <th width="5%" bgcolor="#1CB5F1" class="style3"><img src="../design/ico_cat.gif" alt="" width="8" height="9" /></th>
                  <th width="26%" height="32" bgcolor="#1CB5F1" class="style3"><div align="left" class="style9 style5">Company Name:</div></th>
                    <th width="69%" height="32" bgcolor="#1CB5F1" class="style3"><div align="left"><?php echo $CompanyName;?></div></th>
                  </tr>
                 
                  <tr>
                    <td class="style3"><img src="../design/ico_cat.gif" alt="" width="8" height="9" /></td>
                   <td class="style3"><div align="left">Job Title:</div></td>
                    <td class="style3"><div align="left" class="style9 style5"><?php echo $JobTitle;?></div></td>
                  </tr>
                  <tr>
                    <td class="style3"><img src="../design/ico_cat.gif" alt="" width="8" height="9" /></td>
                    <td class="style3"><div align="left" class="style9 style5">Vacancy:</div></td>
                    <td class="style3"><div align="left" class="style9 style5"><?php echo $Vacancy;?></div></td>
                  </tr>
                  <tr>
                    <td class="style3"><img src="../design/ico_cat.gif" alt="" width="8" height="9" /></td>
                    <td class="style3"><div align="left" class="style9 style5">Qualification:</div></td>
                    <td class="style3"><div align="left" class="style9 style5"><?php echo $MinQualification;?></div></td>
                  </tr>
                  <tr>
                    <td class="style3"><img src="../design/ico_cat.gif" alt="" width="8" height="9" /></td>
                    <td class="style3"><div align="left" class="style9 style5">Description:</div></td>
                    <td class="style3"><div align="left" class="style9 style5"><?php echo $Description;?></div></td>
                  </tr>
                  <tr>
                    <td class="style3"><img src="../design/ico_cat.gif" alt="" width="8" height="9" /></td>
                    <td class="style3"><div align="left" class="style9 style5">Date:</div></td>
                    <td class="style3"><div align="left" class="style9 style5"><?php echo $InterviewDate;?></div></td>
                  </tr>
                  <tr>
                    <td class="style3"><img src="../design/ico_cat.gif" alt="" width="8" height="9" /></td>
                    <td class="style3"><div align="left" class="style9 style5">Time:</div></td>
                    <td class="style3"><div align="left" class="style9 style5"><?php echo $InterviewTime;?></div></td>
                  </tr>
                  <?php
}

?>
  </table>
                 
                  <?php
// Close the connection
mysqli_close($con);
?>
              
              <p>&nbsp;</p>

              <p class="btn-more box noprint">&nbsp;</p>
          </div> <!-- /article -->

            <hr class="noscreen" />
            
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
