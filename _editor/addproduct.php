<?php
        require_once 'session.php';
	require_once '_template/header.php';
	require_once '_template/block.php';
	require_once '../_lib/category.php';
	require_once '../_lib/product.php';
	require_once '../_lib/member.php';
?>
	<div id="rightContent">
                    <div id="menuRightContent">
                    	<div id="titleMenuRightContent">
                        	<p>add Product</p>
                        </div>
                        <div id="bodyMenuRightContent">
                         <?php 
if(isset($_POST["addProduct"]))
{
    $product = new Product($_POST["title"], $_POST["id_category"], $_POST["id_memeber"], $_FILES["upload"]["name"], $_FILES["upload"]["tmp_name"], $_POST["description"]);
    if($product->addProduct()){
        echo "<div class='message'><h1>added product successfully</h1></div>";
    }else{
        echo "<div class='message'><h1>error when added product please try again and confirm if the all fields are fill and check the file type before uploaded it</h1></div>";
    } 
}

?>                            <form action="<?php echo $_SERVER['PHP_SELF'] ?>"  method="post" enctype="multipart/form-data">
								<p>title:</p>
                                <input type="text" name="title" id="name" />
                                <p>category Name:</p>
                                <select name="id_category" id="select">
                                <?php 
                                $data = Category::selectAllcategories();
                                if(is_array($data)){
                                    foreach ($data as $fetch):
                                        echo '<option value="'.$fetch['id'].'">'.$fetch['title'].'</option>';
                                    endforeach;
                                }else{
                                     echo '<option value=""> no found result</option>';
                                }
                                ?>
                                </select>
                                <p>reviewer:</p>
                                <select name="id_memeber" id="select">
                                <?php 
                                $data = Member::selectAllMember();
                                if(is_array($data)){
                                    foreach ($data as $fetch):
                                        echo '<option value="'.$fetch['id'].'">'.$fetch['username'].'</option>';
                                    endforeach;
                                }else{
                                    echo '<option value=""> no found result</option>';
                                }
                                ?>
                                </select>
                                <p>upload:</p>
                                <input type="file" name="upload" id="name" />
                                <p>Describe this product</p>
                                <textarea id="textareas" name="description"></textarea>
                                <input type="submit" name="addProduct" id="submit" value="add Product" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
         </div>
<?php 
	require_once '_template/footer.php';
?>