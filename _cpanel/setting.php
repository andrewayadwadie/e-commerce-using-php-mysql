<?php 
    require_once 'session.php';
    require_once '_template/header.php';
    require_once '_template/block.php';
    require_once '../_lib/setting.php';
?>
	<div id="rightContent">
                    <div id="menuRightContent">
                    	<div id="titleMenuRightContent">
                        	<p>setting</p>
                        </div>
                        <div id="bodyMenuRightContent">
                            <?php
                                if(isset($_POST["setting"])){
                                    $title = $_POST["title"];
                                    $keywords = $_POST["keywords"];
                                    $description = $_POST["description"];
                                    $open_close_site = $_POST["open_close_site"];
                                    $message_close_site = $_POST["message_close_site"];
                                    
                                    $setting = new Setting($title, $keywords, $description, $open_close_site, $message_close_site);
                                     if($setting->updateSetting()){
                                        echo "<div class='message'><h1>updated</h1></div>";
                                    }else{
                                        echo "<div class='message'><h1>fail</h1></div>";
                                    }
                                }
                               $data = Setting::getSetting();
                            ?>
                      		<form action="<?php echo $_SERVER['PHP_SELF'] ?>"  method="post">
				<p>title:</p>
                                <input type="text" name="title" id="name" value="<?php echo $data["title"] ?>"/>
                                <p>keywords:</p>
                                <textarea name="keywords" id="textareas">
                                    <?php echo $data["keywords"] ?>
                                </textarea>
                                <p>description:</p>
                                <textarea name="description" id="textareas">
                                    <?php echo $data["description"] ?>
                                </textarea>
                                <p>open-close site:</p>
                                <select name="open_close_site" id="select">
                                   <?php
                                        if($data["open_close_site"] == 1){
                                            echo '
                                                    <option value="1">open</option>
                                                    <option value="0">close</option>
                                                  ';
                                        }else{
                                            echo '
                                                    <option value="0">close</option>
                                                    <option value="1">open</option>
                                                    
                                                  ';
                                        }
                                    ?>
                                </select>
                                <p>message close site:</p>
                                <textarea name="message_close_site" id="textareas">
                                    <?php echo $data["message_close_site"] ?>
                                </textarea>
                                <input type="submit" name="setting" id="submit" value="update  setting" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
         </div>
<?php 
	require_once '_template/footer.php';
?>