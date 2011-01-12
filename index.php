<?php
require_once 'library/user.php';

include 'includes/header.php';
?>

<?if (loggedIn()) {?>
<a href="logout.php">Logout</a>
<a href="deleteMyAccount.php">Delete your account?</a>
<?} else{?>
<a href="login.php">Login</a>
<a href="signup.php">Want to join?</a>
<?}

include 'includes/footer.php';
?>
