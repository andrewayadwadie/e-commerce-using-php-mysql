<?php 
    require_once 'session.php';
    require_once '_template/header.php';
    require_once '_template/block.php';
    require_once '../_lib/member.php';
?>
	<div id="rightContent">
                    <div id="menuRightContent">
                    	<div id="titleMenuRightContent">
                            <p>edit Member</p>
                        </div>
                        <div id="bodyMenuRightContent">  
    <?php
    if(isset($_GET["action"], $_GET["id"])){
        $action = $_GET["action"];
        $id = intval($_GET["id"]);
        switch ($action){
            case 'delete':
               if(Member::deleteMemeberById($id)){
                   echo "<div class='message'><h1>deleted member successfully</h1></div>";
                }else{
                   echo "<div class='message'><h1>error when deleted member</h1></div>";
                }
                break;
            case 'edit':
               $fetch = Member::retrieveMemeberById($id);
                if(is_array($fetch)){
                   echo'<form action="'.$_SERVER['PHP_SELF'].'" method="POST">'
                    .'<p>username:</p>'
                    .'<input type="text" name="username" id="name" value="'.$fetch['username'].'" />'
                    .'<p>password:</p>'
                    .'<input type="password" name="password" id="name" value="'.$fetch['password'].'" />'
                    .'<p>email:</p>'
                    .'<input type="text" name="email" id="name" value="'.$fetch['email'].'" />'
                    .'<input type="hidden" name="id" value="'.$fetch['id'].'"  />'
                    .'<input type="submit" name="updateMemeber" id="submit" value="update member" />'
                .'</form>' ;
                }else{
                    echo "<div class='message'><h1>there is not exisit user </h1></div>";
                }
                break;
            default :
                echo "invalid action";
        }
    }
    
// update Member
if(isset($_POST["updateMemeber"])){
    $member = new Member($_POST["username"], $_POST["password"], $_POST["email"], $_POST["id"]);       
    if($member->updateMemeberById()){
    	echo "<div class='message'><h1>updated member successfully</h1></div>";
    }else{
        echo "<div class='message'><h1>error when updated member</h1></div>";
    }
}
    ?>
                            <table width="100%">
                                <tr class="headtable">
                                        <td>ID</td>
                                        <td>USERNAME</td>
                                        <td>Delete</td>
                                        <td>Modify</td>
                                </tr>
                              <?php
                               $data =  Member::selectAllMember();
                               if(is_array($data)){
                                   foreach ($data as $fetch):
                                        echo '<tr>'
                                            .'<td>'. $fetch['id'].'</td>'
                                            .'<td>'. $fetch['username'] .'</td>'
                                            .'<td><a href="?action=delete&id='.$fetch['id'].'"> DELETE </a></td>'
                                            .'<td><a href="?action=edit&id='.$fetch['id'].'"> UPDATE </a></td>'
                                     .'</tr>';
                                    endforeach;
                               }else{
                                   echo '<tr>
                                            <td colspan="4">no found result</td>
                                       </tr>';
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