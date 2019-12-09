<?php
    require_once '_lib/setting.php';
    $setting = Setting::getSetting();
?>
<html>
	<head>
		<title><?php echo $setting["title"] ?></title>
                <meta class="keywords" content="<?php echo $setting["keywords"] ?>"/>
                <meta class="description" content="<?php echo $setting["description"] ?>" />
		<link rel="styleSheet" type="text/css" href="_template/_css/reset-min.css" />
		<link rel="styleSheet" type="text/css" href="_template/_css/fonts-min.css" />
		<link rel="styleSheet" type="text/css" href="_template/_css/base.css" />
	</head>
	<body>
	<div id="wrapper">
		<div id="header">
			<div class="logo">
				<img src="_template/_images/Logo.png" alt="" />
			</div>
		</div>
	<div id="content">
            <img style="display: block; margin:50px auto; width:400; height:400" src="_upload/close.png" />
            <?php
                if(isset($_GET["message"])){
                    echo $_GET["message"];
                }
            ?>
        </div>
<?php
require_once '_template/footer.php';
?>