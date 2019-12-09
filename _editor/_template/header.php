<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Forex mix</title>
<link rel="shortcut icon" href="_images/logo.ico" type="image/x-icon" />
<link href="_template/_css/reset-min.css" rel="stylesheet" type="text/css" />
<link href="_template/_css/fonts-min.css" rel="stylesheet" type="text/css" />
<link href="_template/_css/base.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="wrapper">
    	<div id="header">
        	<div id="contentHeader">
                    
            	<h1>AdminPanel</h1>
                <?php 
                    if(isset($_SESSION['userMemeber']) && isset($_SESSION['password'])){
                        echo '<span style="float:right; color:#fff;">welcome mr/mrs : '.$_SESSION['userMemeber']. '</span><a href="logout.php">Logout</a>';
                    }
                ?>
            </div>
        </div>