<?php
session_start();
if(isset($_SESSION['$UserName_emp'])){

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
table th, table td{
        padding: 10px; /* Apply cell padding */
        }
        table{
        border-spacing: 10px; /* Apply cell spacing */
        }
        .style2{
          -moz-box-sizing: border-box;
          -webkit-box-sizing: border-box;
        }
        .button{
            cursor: pointer;
            width: 25%;
            font-size: 16px;
        }
    </style>
    <script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
    <script src="../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
    <link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
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
                <h2><span><a href="#">Welcome <?php echo $_SESSION['Name'];?></a></span></h2>
               

                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td bgcolor="#A0B9F3">Manage Job</td>
                  </tr>
                  <tr>
                    <td><form id="form1" method="post" action="InsertJob.php">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td>Job Title:</td>
                          <td><span id="sprytextfield1">
                            <label>
                            <input type="text" name="txtTitle" id="txtTitle" />
                            </label>
                          <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                        </tr>
                        <tr>
                          <td>Total Vacancy:</td>
                          <td><span id="sprytextfield2">
                            <label>
                            <input type="text" name="txtTotal" id="txtTotal" />
                            </label>
                          <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                        </tr>
                        <tr>
                          <td>Qualification:</td>
                          <td><label>
                          <select name="cmbQual" id="cmbQual">
                          <optgroup label="B.E./B.Tech">
                          <option value="Comps/IT">Comps/I.T.</option>
                          <option value="Electronics">Electronics</option>
                          <option value="EXTC">EXTC</option>
                          <option value="Mechanical">Mechanical</option>
                          </optgroup>
                          <optgroup label="M.E./M.Tech">
                          <option value="SoftwareEngineering">Software Engineering</option>
                          <option value="Electronics">Electronics Engineering</option>
                          <option value="CAD/CAM">CAD/CAM</option>
                          <option value="ThermalEngineering">Thermal Engineering</option>
                          </optgroup>
                          <optgroup label="M.B.A.">
                          <option value="Finance">Finance</option>
                          <option value="Marketing">Marketing</option>
                          <option value="I.T.">I.T.(Information Technology)</option>
                          </optgroup>
                        </select>
                        </label>
                          </td>
                        </tr>
                        <tr>
                          <td>Salary:</td>
                          <td><label>
                            <input type="number" name="txtOther" id="txtOther" />
                          </label></td>
                        </tr>
                        <tr>
                          <td>Description:</td>
                          <td><span id="sprytextarea1">
                            <label>
                            <textarea name="txtDesc" id="txtDesc" cols="25" rows="3"></textarea>
                            </label>
                          <span class="textareaRequiredMsg">A value is required.</span></span></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td><label>
                            <input type="submit" name="button" id="button" class="button"value="Submit" />
                          </label></td>
                        </tr>
                      </table>
                                        </form>
                    </td>
                  </tr>
                  <tr>
                    <td bgcolor="#A0B9F3">Posted Job </td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="1" bordercolor="#1CB5F1" >
                      <tr>
                        
                        <th bgcolor="#1CB5F1" class="style3"><div align="left" class="style9 style5">Job Title</div></th>
                        <th bgcolor="#1CB5F1" class="style3"><div align="left" class="style9 style5">Vacancy</div></th>
                         <th bgcolor="#1CB5F1" class="style3"><div align="left" class="style9 style5">Qualification</div></th>
                          <th bgcolor="#1CB5F1" class="style3"><div align="left" class="style9 style5">Description</div></th>
                    
                        <th bgcolor="#1CB5F1" class="style3"><div align="left" class="style12">Delete</div></th>
                      </tr>
                      <?php
// Establish Connection with Database
$con = mysqli_connect("localhost","root","","job");

// Specify the query to execute
$sql = "select * from job_Master where CompanyName='".$_SESSION['Name']."'";
// Execute query
$result = mysqli_query($con,$sql);
// Loop through each records 
while($row = mysqli_fetch_array($result))
{
$Id=$row['JobId'];
$JobTitle=$row['JobTitle'];
$Vacancy=$row['Vacancy'];
$MinQualification=$row['MinQualification'];
$Description =$row['Description'];

?>
                      <tr>
                        <td class="style3"><div align="left" class="style9 style5"><?php echo $JobTitle;?></div></td>
                        <td class="style3"><div align="left" class="style9 style5"><?php echo $Vacancy;?></div></td>
                          <td class="style3"><div align="left" class="style9 style5"><?php echo $MinQualification;?></div></td>
                            <td class="style3"><div align="left" class="style9 style5"><?php echo $Description;?></div></td>
                      
                        <td class="style3"><div align="left" class="style9 style5"><a href="DeleteJob.php?JobId=<?php echo $Id;?>">Delete</a></div></td>
                      </tr>
                      <?php
}
// Retrieve Number of records returned
$records = mysqli_num_rows($result);
?>
                      <tr>
                        <td colspan="6" class="style3"><div align="left" class="style12"><?php echo "Total ".$records." Records"; ?> </div></td>
                      </tr>
                      <?php
// Close the connection
mysqli_close($con);
?>
                    </table></td>
                  </tr>
                </table>
                <p>&nbsp;</p>

                <p class="btn-more box noprint">&nbsp;</p>
                <p class="btn-more box noprint">&nbsp;</p>
                <p class="btn-more box noprint">&nbsp;</p>
                <p class="btn-more box noprint">&nbsp;</p>
                <p class="btn-more box noprint">&nbsp;</p>
          </div> <!-- /article -->

            <hr class="noscreen" />
            
        </div> <!-- /content -->


    </div> <!-- /page-in -->
    </div> <!-- /page -->

 
<?php
include "footer.php"
?>
</div> <!-- /main -->

<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
//-->
</script>
</font>
</body>
</html>
