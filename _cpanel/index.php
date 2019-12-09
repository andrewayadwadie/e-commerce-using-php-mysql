<?php
require_once 'session.php';
require_once '_template/header.php';
require_once '_template/block.php';
require_once '../_lib/statistcs.php';
?>

<div id="rightContent">
    <div id="menuRightContent">
        <div id="titleMenuRightContent">
                <p>info</p>
        </div>
        <div id="bodyMenuRightContent">
            <table>
                <tr>
                    <td>script name</td>
                    <td>school version 3.5</td>
                </tr>
                <tr>
                    <td>developer</td>
                    <td>ahmed.fathi.g@gmail.com</td>
                </tr>
                <tr>
                    <td>supporting</td>
                    <td>ahmed.fathi.g@gmail.com</td>
                </tr>
            </table>
        </div>
        
        <div id="titleMenuRightContent">
                <p>Statistcs</p>
        </div>
        <div id="bodyMenuRightContent">
            <table>
                <tr>
                    <td>the number of categories</td>
                    <td><?php echo Statistcs::retreiveCount("category"); ?></td>
                </tr>
                <tr>
                    <td>the number of products</td>
                    <td><?php echo Statistcs::retreiveCount("product"); ?></td>
                </tr>
                <tr>
                    <td>the number of members</td>
                    <td><?php echo Statistcs::retreiveCount("memeber"); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>    
</div></div>

<?php
require_once '_template/footer.php';
?>