<?php
// Validates that an email address follows the syntax: x@y.z for the signup process

require_once 'bootstrap.php';

if ($_POST) {
    
    $email = $_POST['email'];

    if (User::isValidEmailSyntax($email)) {
        User::create($_SESSION['new_username'], $email, $_SESSION['password']);
        Util::redirect('/beginning-php/vanity-tgo/');
    } else {
        $error_message = "'$email' is not a valid email address format:  x@y.z";
    }
}

include 'includes/header.php';
?>

<?if ($error_message) {?>
    <p style="color: red"><?=$error_message?></p>
<?}?>


<form method="POST" action="getEmail.php">
    <label>Email address?</label>
    <input type="text" name="email"/>
    <input type="submit"/>
</form>
 
 
 
<?php include 'includes/footer.php'?>
