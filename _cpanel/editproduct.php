<?php 
        require_once 'session.php';
	require_once '_template/header.php';
	require_once '_template/block.php';
	require_once '../_lib/product.php';
	require_once '../_lib/category.php';
	require_once '../_lib/member.php';
?>
	<div id="rightContent">
                    <div id="menuRightContent">
                    	<div id="titleMenuRightContent">
                        	<p>edit product</p>
                        </div>
                        <div id="bodyMenuRightContent">
<?php
if(isset($_GET["action"], $_GET["id"])){
    $action = $_GET["action"];
    $id = intval($_GET["id"]);
    switch ($action){
        case 'delete':
            if(Product::deleteProductById($id)){
                echo "<div class='message'><h1>deleted product successfully</h1></div>";
            }else{
                echo "<div class='message'><h1>error when deleted product </h1></div>";
            }
            break;
        case 'edit':
            $fetch = Product::retrieveProductById($id);
            if(is_array($fetch)){
                echo'<form action="'.$_SERVER['PHP_SELF'].'" method="post" enctype="multipart/form-data">'
               .'<p>title:</p>'
               .'<input type="text" name="title" id="name" value="'.$fetch['title'].'" />'
               .'<p>category:</p>'
               .'<select name="id_category" id="select">';
                $data = Category::selectAllcategories();
                if(is_array($data)):
                    foreach ($data as $fetchCategory):
                       if($fetch["id_category"]== $fetchCategory["id"]):
                           echo '<option selected="selected" value="'.$fetchCategory['id'].'">'.$fetchCategory['title'].'</option>';
                        else:
                           echo '<option value="'.$fetchCategory['id'].'">'.$fetchCategory['title'].'</option>';
                       endif;
                    endforeach;
                  else:
                      echo '<option value="">no found result</option>';
                endif;
                echo'</select>'
                .'<p>reviewer:</p>'
                .'<select name="id_memeber" id="select">';
                $data = Member::selectAllMember();
                if(is_array($data)):
                     foreach ($data as $fetchMember):
                       if($fetch["id_memeber"] == $fetchMember["id"]):
                           echo '<option selected="selected" value="'.$fetchMember['id'].'">'.$fetchMember['username'].'</option>';
                       else:
                           echo '<option value="'.$fetchMember['id'].'">'.$fetchMember['username'].'</option>';
                       endif;
                     endforeach;
                else:
                    echo '<option value="">no found result</option>';
                endif;
                echo'</select>'
                .'<p>upload:</p>'
                .'<img src="../_upload/'.$fetch['image'].'" width="50" height="50"/>'
                .'<input type="file" name="upload" id="name" />'
                .'<p>Describe this product</p>'
                .'<textarea id="textareas" name="description">'.$fetch['description'].'</textarea>'
                .'<input type="hidden" name="id" value="'.$fetch['id'].'"  />'
                .'<input type="submit" name="updateProduct" id="submit" value="update product" />'
       .'</form>';
            }
           break;
        default :
            echo "invalid action";
    }
}

if(isset($_POST["updateProduct"]))
{
    $product= new Product($_POST["title"], $_POST["id_category"], $_POST["id_memeber"], $_FILES["upload"]["name"], $_FILES["upload"]["tmp_name"], $_POST["description"],$_POST["id"]);
    if($product->updateProductById()){
        echo "<div class='message'><h1>updated product successfully</h1></div>";
    }else{
        echo "<div class='message'><h1>error when updated product please try again and confirm if the all fields are fill and check the file type before uploaded it</h1></div>";
    } 
}
?>
                        <table width="100%">
                            <tr class="headtable">
                            <td>ID</td>
                            <td>TITLE</td>
                            <td>Delete</td>
                            <td>Modify</td>
                            </tr>
                        <?php 
                            // reterieve ALL memeber From Database
                            $data = Product::selectAllProduct();
                            if(is_array($data)){
                                foreach ($data as $fetch):
                                    echo '<tr>'
                                            .'<td>'. $fetch['id'].'</td>'
                                            .'<td>'. $fetch['title'] .'</td>'
                                            .'<td><a href="?action=delete&id='.$fetch['id'].'"> DELETE </a></td>'
                                            .'<td><a href="?action=edit&id='.$fetch['id'].'"> UPDATE </a></td>'
                                    .'<tr />';
                                endforeach;
                            }else{
                                echo '<tr>
                                            <td colspan="4"> no found result </td>
                                 <tr />';
                            }
                            ?>    
                        </table>
                        </div>
                    </div>
                </div>
            </div>
         </div>
<?php 
	require_once '_template/footer.php';
?>