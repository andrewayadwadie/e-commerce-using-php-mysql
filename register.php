<?php
require_once '_lib/member.php';
require_once '_template/header.php';
?>
<div id="content">
    <?php
    if (isset($_POST['addMemeber'])) {
        $member = new Member($_POST["username"], $_POST["password"], $_POST["email"]);
        if ($member->addMember()) {
            echo "<div class='message'><h1>added member successfully</h1></div>";
        } else {
            echo "<div class='message'><h1>error when added user please try again and confirm if the all fields are fill</h1></div>";
        }
    }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <p>username:</p>
        <input type="text" name="username" id="name" />
        <p>password:</p>
        <input type="password" name="password" id="name" />
        <p>email:</p>
        <input type="text" name="email" id="name" />
        <input type="submit" name="addMemeber" id="submit" value="add Member" />
    </form>
</div>
<?php
require_once '_template/footer.php';
?>