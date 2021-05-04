
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="cs" />
    <meta name="robots" content="all,follow" />

    
    <title>Welcome To Job Portal</title>
    <meta name="description" content="..." />
    <meta name="keywords" content="..." />
    
    <script>
    function manage(txt) {
        var bt = document.getElementById('btSubmit');
        if (txt.value != '') {
            bt.disabled = false;
        }
        else {
            bt.disabled = true;
        }
    }

// 	Using ES6 feature.
// 	let manage = (txt) => { 
//     	let bt = document.getElementById('btSubmit');
//         if (txt.value != '') {
//             bt.disabled = false;
//         }
//         else {
//             bt.disabled = true;
//         }
//     }
</script>

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
-->table th, table td{
        padding: 10px; /* Apply cell padding */
        }
        
    </style>
    
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
</head>


<table class="ds_box" cellpadding="0" cellspacing="0" id="ds_conclass" style="display: none;">
<tr><td id="ds_calclass">
</td></tr>
</table>
    <script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
    <link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
    
</head>

<body id="www-url-cz">
<font size=3>
<SCRIPT language="JavaScript1.2" src="gen_validation.js"></SCRIPT>
<SCRIPT language="JavaScript1.2">
var arrFormValidation=
             [
			 		[//Name
						["minlen=4",
		"Please Enter Name"
						  ]
					
                     ],
                   [//Address
						  ["minlen=8",
		"Please Enter Address"
						  ]
						  
                   ],
                   [//City
						["minlen=5",
		"Please Enter City"
						  ] 					  				
                   ],
				   [//Email
						  
						["minlen=5",
		"Please Enter Email "
						  ], 
						  ["email",
		"Please Enter valid email "
						  ]  
                   ],
				   [//Mobile
						   ["num",
		"Please Enter valid Mobile "
						  ],
						  ["minlen=10",
		"Please Enter valid Mobile "
						  ],
						  ["maxlen=10",
		"Please Enter valid Mobile "
						  ] 	  
                   ],
				   [//Qual
						  
						
								 
						  
                   ],
				   [//Other
						   
						  
                   ],
				   [//Gender
						  
						  
                   ],
				   [//Birthdate
						  
						["minlen=1",
		"Please Enter Birthdate "
						  ]
						  
                   ],
				   [//Upload
						  
					 ["minlen=1",
		"Please Upload Marksheet "
						  ]
                   ],
				   [//User
						  ["minlen=5",
		"Please Enter UserName "
						  ]
						 
						  
                   ],
				   [//Password
						["minlen=8",
		"Please Enter Password "
						  ]
              ["maxlen=15",
		"Please Enter Password less than 15  "
						  ]  
						  
						  
                   ],
				    [//Que
						  
						
                   ],
				    [//Answer
						  
						  ["minlen=1",
		"Please Enter Answer "
						  ]
						  
                   ]
				   
            ];
</SCRIPT>

<!-- Main -->
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
                <h2><span><a href="#">Job Seeker Registration Form</a></span></h2>
               

                    <div class="login">

                <form action="JobSeekerInsert.php" method="post" onSubmit="return validateForm(this,arrFormValidation);" enctype="multipart/form-data" id="form2">
                  <table width="100%"  cellspacing="0" cellpadding="0">
                    <tr>
                      <td>JobSeeker Name:</td>
                      <td><span id="sprytextfield3">
                        <label>
                        <input type="text" name="txtName" id="txtName" onkeyup="manage(this)"/>
                        </label>
                      <span class="textfieldRequiredMsg">Enter Name</span></span></td>
                    </tr>
                   
                    <tr>
                      <td>Address:</td>
                      <td><span id="sprytextarea1">
                        <label>
                        <textarea name="txtAddress" id="txtAddress" cols="45" rows="5" onkeyup="manage(this)"></textarea>
                        </label>
                      <span class="textareaRequiredMsg">Enter Address</span></span></td>
                    </tr>
                    <tr>
                      <td>City:</td>
                      <td><span id="sprytextfield4">
                        <label>
                        <input type="text" name="txtCity" id="txtCity" onkeyup="manage(this)"/>
                        </label>
                      <span class="textfieldRequiredMsg">Enter City</span></span></td>
                      
                    </tr>
                    <tr>
                      <td>Email:</td>
                      <td><span id="sprytextfield5">
                        <label>
                        <input type="email" name="txtEmail" id="txtEmail" onkeyup="manage(this)" />
                        </label>
                      <span class="textfieldRequiredMsg">Enter Email Id</span></span></td>
                    </tr>
                    <tr>
                      <td>Mobile:</td>
                      <td><span id="sprytextfield6">
                        <label>
                        <input type="tel" name="txtMobile" id="txtMobile" onkeyup="manage(this)"/>
                        </label>
                      <span class="textfieldRequiredMsg">Enter Mobile</span></span></td>
                    </tr>
                    <tr>
                      <td>Qualification:</td>
                      <td><label>
                        <select name="cmbQualification" id="cmbQualification" onkeyup="manage(this)">
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
                      </label></td>
                    </tr>
                    <tr>
                      <td>Gender:</td>
                      <td><label>
                        <select name="cmbGender" id="cmbGender" onkeyup="manage(this)">
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </label></td>
                    </tr>
                    <tr>
                      <td>BirthDate:</td>
                      <td><span id="sprytextfield7">
                        <label>
                        <input type="date" name="txtBirthDate" id="txtBirthDate" onkeyup="manage(this)"/>
                        </label>
                      <span class="textfieldRequiredMsg">Enter Birth Date</span></span></td>
                    </tr>
                    <tr>
                      <td>Upload Resume:</td>
                      <td><label>
                        <input type="file" name="txtFile" id="txtFile" onkeyup="manage(this)"/>
                      </label></td>
                    </tr>
                    <tr>
                      <td>User Name:</td>
                    <td><span id="sprytextfield8">
                        <label>
                        <input type="text" name="txtUserName" id="txtUserName" onkeyup="manage(this)"/>
                        </label>
                      <span class="textfieldRequiredMsg">Enter User Name</span></span></td>
                    </tr>
                    <tr>
                      <td>Password:</td>
                      <td><label><span id="sprytextfield9">
                        <input type="password" name="txtPassword" id="txtPassword" onkeyup="manage(this)" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
                      <span class="textfieldRequiredMsg">Enter Password</span></span></label></td>
                    </tr>
					<tr>
                      <td>Confirm Password:</td>
                      <td><label><span id="sprytextfield9">
                        <input type="password" name="txtcPassword" id="txtcPassword" onkeyup="manage(this)"/>
                      <span class="textfieldRequiredMsg">Enter Password</span></span></label></td>
                    </tr>
                    <tr>
                      <td>Security Question:</td>
                      <td><label>
                        <select name="cmbQue" id="cmbQue" onkeyup="manage(this)">
                          <option selected="selected">What is Your Pet Name?</option>
                          <option>Who is Your Favourite Person?</option>
                          <option>What is the Name of Your First School?</option>
                        </select>
                      </label></td>
                    </tr>
                    <tr>
                      <td>Answer:</td>
                      <td><span id="sprytextfield10">
                        <label>
                        <input type="text" name="txtAnswer" id="txtAnswer" onkeyup="manage(this)"/>
                        </label>
                      <span class="textfieldRequiredMsg">Enter Answer.</span></span></td>
                    </tr>
                    <tr>
                      <td colspan="2"><label>
                        <label></label>
                        <div align="center">
                          <input type="submit" name="jobseekersignup" id="btSubmit" value="Submit" disabled/>
                          </div>
                      </label></td>
                    </tr>
                  </table>
                 </form>
              </div>

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

<script type="text/javascript">
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8");
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9");
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10");
</script>
          </font>
</body>
</html>
