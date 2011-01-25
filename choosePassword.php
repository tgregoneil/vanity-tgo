<?php
// Make the user confirm the desired password, else repeat with an error message

require_once 'bootstrap.php';

if ($_POST) {
    
    if ($_POST['password'] == $_POST['conf_password']) {
        $_SESSION['password'] = $_POST['password'];
        Util::redirect('getEmail.php');
    } else {
        $error_message = 'Did not match.  Please try again.';
    }
}

include 'includes/header.php';
?>

<?if ($error_message) {?>
    <p style="color: red"><?=$error_message?></p>
<?}?>


<form method="POST" action="choosePassword.php">
    <label>Desired Password?</label>
    <input type="password" name="password"/>
    <label>Confirm Password</label>
    <input type="password" name="conf_password"/>
    <input type="submit"/>
</form>
 
 
 
<?php include 'includes/footer.php'?>
