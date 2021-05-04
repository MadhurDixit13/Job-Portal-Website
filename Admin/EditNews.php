
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta http-equiv="content-language" content="cs"/>
    <meta name="robots" content="all,follow"/>
    <title>JOB PORTAL</title>
    <meta name="description" content="..."/>
    <meta name="keywords" content="..."/>

    <link rel="index" href="./" title="Home"/>
    <link rel="stylesheet" media="screen,projection" type="text/css" href="./css/main.css"/>
    <link rel="stylesheet" media="print" type="text/css" href="./css/print.css"/>
    <link rel="stylesheet" media="aural" type="text/css" href="./css/aural.css"/>
    <style type="text/css">
        <!--
        .style1 {
            color: #000066;
            font-weight: bold;
        }

        .style10 {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: small;
            font-weight: bold;
            color: #FFFFFF;
        }

        .style8 {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: small;
            font-weight: bold;
        }
        .button{
            cursor: pointer;
            width: 18%;
            font-size: 16px;
        }
        
    </style>
    <script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
    <link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css"/>
    <style type="text/css">
        <!--
        .style11 {
            color: #192666
        }

        -->
    </style>
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
                <hr class="noscreen"/>

                <!-- Breadcrumbs -->
                <p id="breadcrumbs">You are here: <a href="index.php">Home</a></p>
                <hr class="noscreen"/>

            </div> <!-- /strip -->

            <!-- Content -->
            <div id="content">


                <!-- /article -->

                <hr class="noscreen"/>


                <!-- /article -->

                <hr class="noscreen"/>

                <!-- Article -->

                <!-- /article -->

                <hr class="noscreen"/>

                <!-- Article -->
                <div class="article">
                    <h2><span>Welcome To Control Panel</span></h2>


                    <table width="100%" height="209" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td height="33" bgcolor="#A0B9F3"><span class="style10 style11">Edit Record</span></td>
                        </tr>
                        <tr>
                            <td><?php
                                $Id = $_GET['NewsId'];
                                // Establish Connection with Database
                                $con = mysqli_connect("localhost", "root", "", "job");
                                // Specify the query to execute
                                $sql = "SELECT * from news_master where NewsId=".$Id."";
                                // Execute query
                                $result = mysqli_query($con,$sql);
                                // Loop through each records
                                while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                                    $Id = $row['NewsId'];
                                    $News = $row['News'];
                                    $Date = $row['NewsDate'];
                                }
                                ?>
                                <form method="post" action="UpdateNews.php">
                                    <table width="100%" border="0">
                                        <tr>
                                            <td height="32"><span class="style8">News Id</span></td>
                                            <td><span id="sprytextfield1">
                                <label>
                                <input name="txtNewsId" type="text" id="txtNewsId" value="<?php echo $Id; ?>"/>
                                </label>
                                <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                                        </tr>
                                        <tr>
                                            <td height="36"><span class="style8">News:</span></td>
                                            <td><span id="sprytextfield2">
                                <label>
                                <input name="txtNews" type="text" id="txtNews" value="<?php echo $News; ?>"/>
                                </label>
                                <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                                        </tr>
                                        <tr>
                                            <td height="36"><span class="style8">News Date:</span></td>
                                            <td><span id="sprytextfield3">
                                <label>
                                <input name="txtDate" type="date" id="txtDate" value="<?php echo $Date; ?>"/>
                                </label>
                                <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="submit" name="submit" class="button" value="Update Record"/></td>
                                        </tr>
                                    </table>
                                </form>
                                <?php
                                // Close the connection
                                mysqli_close($con);
                                ?>
                                <form method="post" action="UpdateNews.php">
                                    <table width="100%" border="0">
                                    </table>
                                </form>
                            </td>
                        </tr>
                    </table>
                    <p>&nbsp;</p>

                    <p class="btn-more box noprint">&nbsp;</p>
                </div> <!-- /article -->

                <hr class="noscreen"/>
                <p class="btn-more box noprint">&nbsp;</p>
                <p class="btn-more box noprint">&nbsp;</p>
                <p class="btn-more box noprint">&nbsp;</p>
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

<script type="text/javascript">
    <!--
    var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
    var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
    //-->
</script>
</font>
</body>
</html>

