<?php
require_once 'bootstrap.php';

include 'includes/header.php';
?>

<?if (User::loggedIn()) {?>
<a href="logout.php">Logout</a>
<a href="deleteMyAccount.php">Delete your account?</a>
<br>
<a href="createPost.php">Create a Post</a>
<?} else{?>
<a href="login.php">Login</a>
<a href="signup.php">Want to join?</a>
<?}
$posts = Post::get();
?>

<br clear="all">
<div class="posts">
    <?foreach ($posts as $post){?>
       <div class="post">
            <p class="username"><a href="userposts.php?user_id=<?=$post->user->id?>"><?=$post->user->username?></a> posted at <?=$post->getTimestamp()?>:</p>
            <p class="content"><?=$post->content?></p>
       </div>
       <?=++$counter != count($posts) ? '<hr>' : ''?> 
    <?}?>
    
</div>
<br clear="all">

<?include 'includes/footer.php';?>
