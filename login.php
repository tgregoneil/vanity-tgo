<?php
require_once 'library/Util.php';
require_once 'library/User.php';

if ($_POST) {
    
    if (authenticate($_POST['username'], $_POST['password'])) {
        redirect('/beginning-php/vanity-tgo/');
    } else {
        $error_message = 'Invalid username or password';
    }
}


include 'includes/header.php';
?>
<?if ($error_message) {?>
    <p style="color: red"><?=$error_message?></p>
<?}?>
<form method="POST" action="login.php">
    <label>Username</label>
    <input type="text" name="username"/>
    <label>password</label>
    <input type="password" name="password"/>
    <input type="submit"/>
</form>
 
 
 
<?php include 'includes/footer.php'?>
