<?php
// HOMEWORK
// create a script where a user enters their username and password, and checks a checkbox 
// acknowleding that they want to delete their account. if the username and password are correct
// remove their account from the database and redirect them to the homepage. otherwise show an error

require_once 'bootstrap.php';

if ($_POST) {
    
    if ($_POST['confcheck']) {
	    $user = User::getLoggedInUser ();
        if ($user->authenticate($_POST['password'])) {
            $user->delete ($_SESSION['username']);
            // logged out from User::delete()
            Util::redirect('/beginning-php/vanity-tgo/');
        } else {
            $error_message = 'Invalid password.  Try again.';
        }
    } else {
        $error_message = 'Please check "Confirm:" if you\'re serious about deleting your account.';
    }
    
}

if (User::getLoggedInUser () == null) {  // if not logged in, go home
    Util::redirect('/beginning-php/vanity-tgo/');
}

include 'includes/header.php';

if ($error_message) {
?> <p style="color: red"><?=$error_message?></p> <?
}?>
<form method="POST" action="deleteMyAccount.php">
    <label>Confirm password to delete account:</label>
    <input type="password" name="password"/>
    <label>Confirm:</label>
    <input type="checkbox" name="confcheck"/>
    <input type="submit"/>
</form>
 
<a href="index.php">Cancel delete request</a>
 
 
<?php include 'includes/footer.php'?>
