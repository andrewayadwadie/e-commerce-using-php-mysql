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
                        	<p>edit category</p>
                        </div>
                        <div id="bodyMenuRightContent">
<?php
if(isset($_GET["action"])&& $_GET["id"]){
        $action = $_GET["action"];
        $id = intval($_GET["id"]);
        switch ($action){
            case 'delete':
                if(Category::deleteCategoryById($id)){
                    echo "<div class='message'><h1>deleted category successfully</h1></div>";
                }else{
                    echo "<div class='message'><h1>error deleted category </h1></div>";
                }
                break;
            case 'edit':
                $fetch = Category::retrieveCategoryById($id);
                if(is_array($fetch)){
                 echo'<form action="'.$_SERVER['PHP_SELF'].'" method="post">'
                .'<p>title:</p>'
                .'<input type="text" name="title" id="name" value="'.$fetch['title'].'" />'
                .'<p>manger of this category:</p>'
                .'<select name="id_memeber" id="select">';
                // call this function from the memeber class
                $data = Member::selectAllMember();
                foreach ($data as $fetchMember):
                         if($fetch["id_memeber"] == $fetchMember["id"]){
                              echo '<option selected="selected" value="'.$fetchMember['id'].'">'.$fetchMember['username'].'</option>';
                         }else{
                              echo '<option value="'.$fetchMember['id'].'">'.$fetchMember['username'].'</option>';
                         }
                endforeach;
                echo
                '</select>'
                .'<input type="hidden" name="id" value="'.$fetch['id'].'"  />'
                .'<input type="submit" name="updateCategory" id="submit" value="update category" />'
                .'</form>';
                }else {
                    echo "no category found";
                }
                break;
            default :
                echo "invalid action";
        }
    }
    
if(isset($_POST["updateCategory"]))
{
    $category =  new Category($_POST["title"], $_POST["id_memeber"], $_POST["id"]);
    if($category->updateCategoryById()){
    	echo "<div class='message'><h1>updated category successfully</h1></div>";
    }else{
        echo "<div class='message'><h1>error when  category</h1></div>";
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
                                $data = Category::selectAllcategories();
                                if(is_array($data)){
                                    foreach ($data as $fetch):
                                	echo  '<tr>'
                                                    .'<td>'. $fetch['id'].'</td>'
                                                    .'<td>'. $fetch['title'] .'</td>'
                                                    .'<td><a href="?action=delete&id='.$fetch['id'].'"> DELETE </a></td>'
                                                    .'<td><a href="?action=edit&id='.$fetch['id'].'"> UPDATE </a></td>'
                                             .'<tr />';
                                    endforeach;
                                }else{
                                    echo  '<tr>
                                                   <td colspan="4"> no found result</td>
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