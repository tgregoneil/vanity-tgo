<?php
require_once 'bootstrap.php';

if ($_POST) {
    if ($_POST['the_post']) {
        $user = User::getLoggedInUser();
        $the_post = $_POST['the_post'];
        $created = Post::create($user->id, $the_post);
        if ($created) {
            Util::redirect('/beginning-php/vanity-tgo');
        } else {
            $error_message = 'Sorry, something went wrong with your post';
        }   
    }   
}

include 'includes/header.php';
?>
<?if ($error_message) {?> 
    <p style="color: red"><?=$error_message?></p>
<?}?>
<form method="POST" action="createPost.php">
    <label>What's on your mind?</label><br/>
    <textarea cols="40" rows="10" name="the_post"></textarea>
    <input type="submit"/>
</form>
 
 
 
<?php include 'includes/footer.php'?>

