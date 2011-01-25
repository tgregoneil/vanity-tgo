<?php
require_once 'bootstrap.php';

if ($_POST) {
    
    $username = $_POST['username'];

    if (User::getBy('username', $username)) {
        $error_message = "Username: $username has already been taken. Please choose another.";
    } else {
        $_SESSION['new_username'] = $username;  // new_username used until account is actually created
        Util::redirect('choosePassword.php');
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
