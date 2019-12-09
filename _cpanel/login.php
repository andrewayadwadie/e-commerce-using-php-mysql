 <?php 
 require '_template/header.php';
 require '../_lib/member.php';
 ?>
 <div id="middlecontent">
                    <div id="menuRightContent" >
                    	<div id="middlecontent">
	                    	<div id="titleMenuRightContent">
	                        	<p>AdminLogin</p>
	                        </div>
	                        <div id="bodyMenuRightContent">
                                    
<?php
// error
if(isset($_GET["message"])){
    echo '<div class="message"><h1>' . $_GET["message"] . '</h1></div>';
}elseif (isset($_POST["login"]))
{
    Member::logInMember($_POST["username"], $_POST["password"]);
}
 ?>
					<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
	                            	<table>
	                                    <tr><p>Your Name:</p></tr>
	                                    <tr><input type="text" name="username" id="name" /></tr>
	                                    <tr><p>Your Password:</p></tr>
	                                    <tr><input type="password" name="password" id="name" /></tr>
	                                    <tr><input type="submit" class="submit" name="login" id="submit" value="Login" /></tr>
	                                </table>
	                            </form>
	                        </div>
	                    </div>
                 	</div>
                </div>
            </div>
        </div>
