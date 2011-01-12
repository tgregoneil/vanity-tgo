<?php
require_once 'dbconnection.php';
session_start();

function authenticate($username, $password) {
    global $db;
    $sql = "SELECT *
FROM users
WHERE username='$username'
LIMIT 1";
    
    $results = $db->query($sql);
    
    $result = $results->fetch(PDO::FETCH_ASSOC);
   
    
    if ($username === $result['username'] && $password === $result['password']) {
        $_SESSION['username'] = $username;
        return true;
    }
    return false;
}

function getUsername() {
    return $_SESSION['username'];
}

function loggedIn() {
    return isset($_SESSION['username']);
}

function createUser($username, $password, $email) {
    global $db;
    //homework helper function

    $sql = "INSERT INTO users (username, password, email)
VALUES ('$username', '$password', '$email')";


    $result = $db->query($sql);
}

function deleteUser($username) {
    global $db;
    //homework helper function

    $sql = "DELETE
FROM users
WHERE username='$username'";

    $db->query($sql);
}


function isAvailableUsername($username) {
    global $db;

    $sql = "SELECT *
FROM users
WHERE username='$username'
LIMIT 1";
    
    $results = $db->query($sql);
    
    $result = $results->fetch(PDO::FETCH_ASSOC);
   
    
    if ($username === $result['username']) {
        return false;
    } else {
        
            // Since password is not yet validated, store as new_username
            // Set $_SESSION['username'] to $_SESSION['new_username']
            // only after user info is entered into database.
            // This avoids the possibility of the new user being considered
            // as logged in before the password is validated.
        $_SESSION['new_username'] = $username;
        return true;
    }
}


function isConfirmedPassword($password, $conf_password) {


    if ($password == $conf_password) {

        $_SESSION['password'] = $password;
        return true;
    }

    return false;
}

function loginNewUser($new_username) {

    $_SESSION['username'] = $_SESSION['new_username'];
}

function isValidEmailSyntax ($email) {

    // Look for x@y.z where x is a string of one or more
    // non-@ characters and y & z are each strings of one or
    // more characters without '@' or '.'

    return preg_match ('/[^@]+@[^@\.]+\.[^@\.]/', $email);
}