<?php
    require_once '_lib/category.php';
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

		<div id="navbar">
			<ul>
				<li><a href="index.php">home</a></li>
                                 <?php
                                foreach (Category::selectAllcategories() as $value):
                                    echo '<li><a href="category.php?action=category&id='.$value['id'].'">'.$value['title'].'</a></li>';
                                endforeach;
                                ?>
                                <li><a href="register.php">sign up</a></li>
			</ul>
		</div>
                <?php
                    if($setting["open_close_site"] == 0){
                        // solution
                       /*
                        // the first solution
                        echo'<div id="content">'. $setting["message_close_site"];
                        require_once 'footer.php';
                        exit();
                         */
                        // the second solution
                        $message = trim($setting["message_close_site"]);
                        header("location: close.php?message=$message");
                        exit();
                    }
                ?>
		<div id="slide-box">
			<div class="slide-show">
				<img src="_template/_images/BANNERONE.jpg" alt=""/>
			</div>
			<div class="offer">
				<div class="top-offer-box">
					<img src="_template/_images/OfferSuit.png" alt="" />
				</div>
				<div class="bottom-offer-box">
					<img src="_template/_images/Offer.png" alt="" />
				</div>
			</div>
		</div>
            
            
	