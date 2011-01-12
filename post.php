<?php

require_once 'library/user.php';

if ($_POST) {

    $username = getUserId();
    $createdAt = time ();
    $post = $_POST['post'];

    $sql = "INSERT into posts
            (user_id, post, created_at)
	  VALUES ('$userId', '$post', '$createAt')" ;
    $result = $db->query($sql);

    if ($result) {

        if ($result->rowCount() === 1) {

            // redirect
        }
        // error message
    }
}
    
?>

<? include 'includes/header.php' ?>

<form method="POST" action="<?$_SERVER[PHP_SELF]"?>">

    <textarea name="post">
    </textarea>
</form>
