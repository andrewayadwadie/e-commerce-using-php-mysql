<?php 
    require_once 'session.php';
    require_once '_template/header.php';
    require_once '_template/block.php';
    require_once '../_lib/category.php';
    require_once '../_lib/member.php';
?>
	<div id="rightContent">
                    <div id="menuRightContent">
                    	<div id="titleMenuRightContent">
                        	<p>add category</p>
                        </div>
                        <div id="bodyMenuRightContent">
<?php 
if(isset($_POST["addcategory"]))
{
    $category = new Category($_POST["title"], $_POST["id_memeber"]);
    if($category->addCategory()){
    	echo "<div class='message'><h1>added category successfully</h1></div>";
    }else{
        echo "<div class='message'><h1>error when added category please try again and confirm if the all fields are fill</h1></div>";
    }
}
?>
                      		<form action="<?php echo $_SERVER['PHP_SELF'] ?>"  method="post">
				<p>title:</p>
                                <input type="text" name="title" id="name" />
                                <p>manger of this category:</p>
                                <select name="id_memeber" id="select">
                                	<?php 
                                        $fetch = Member::selectAllMember();
                                        if(is_array($fetch)){
                                            foreach ($fetch as $value):
                                                echo '<option value="'.$value["id"].'">'.$value["username"].'</option>';
                                            endforeach;
                                        }else{
                                             echo '<option value="">no manager</option>';
                                        }
                                	?>
                                </select>
                                <input type="submit" name="addcategory" id="submit" value="add category" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
         </div>
<?php 
	require_once '_template/footer.php';
?>