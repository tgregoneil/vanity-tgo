<?php
// HOMEWORK
// create a page where a new user can register for your application. collect from them
// a username, a password, and an email address. require them to type their password in
// twice. store their username, password, and email address in the database. log them in
// automatically and send them to the main page

require_once 'library/util.php';
require_once 'library/user.php';

if ($_POST) {
    
    $username = $_POST['username'];

    if (isAvailableUsername($username)) {
        redirect('choosePassword.php');
    } else {
        $error_message = "Username: $username has already been taken. Please choose another.";
    }
}

include 'includes/header.php';
?>

<?if ($error_message) {?>
<p style="color:red"><?echo "$error_message";?></p>
<?}?>


<form method="POST" action="signup.php">
<label>Desired Username?</label>
<input type="text" name="username"/>
<input type="submit"/>
</form>
<?php include 'includes/footer.php'?>
