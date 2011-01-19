<?php
// HOMEWORK
// create a script where a user enters their username and password, and checks a checkbox 
// acknowleding that they want to delete their account. if the username and password are correct
// remove their account from the database and redirect them to the homepage. otherwise show an error

require_once 'library/Util.php';
require_once 'library/User.php';

if ($_POST) {
    
    if ($_POST['confcheck']) {
        if (authenticate($_POST['username'], $_POST['password'])) {
            deleteUser ($_POST['username']);
      //logout();
            session_destroy();
            redirect('/beginning-php/vanity-tgo/');
        } else {
            $error_message = 'Invalid username or password';
        }
    } else {
        $error_message = 'Please check "Confirm:" if you\'re serious about deleting your account.';
    }
    
}


include 'includes/header.php';
?>
<?if ($error_message) {
?> <p style="color: red"><?=$error_message?></p> <?
}?>
<form method="POST" action="deleteMyAccount.php">
    <label>Confirm username to DELETE</label>
    <input type="text" name="username"/>
    <label>password</label>
    <input type="password" name="password"/>
    <label>Confirm:</label>
    <input type="checkbox" name="confcheck"/>
    <input type="submit"/>
</form>
 
<a href="index.php">Cancel delete request</a>
 
 
<?php include 'includes/footer.php'?>
