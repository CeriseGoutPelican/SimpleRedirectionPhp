<?php session_start();
include('../data/functions.php');
include('../configuration.php');

/**
 * Starting up the scripts
 */

redirection($json, $_GET['go']);
if(isset($_POST['email']) && isset($_POST['password'])){
    login($_POST['email'], $_POST['password']);
}

/**
 * Starting HTML page
 */

// Header
include('../includes/header.php');

// If the user is connected or not
if (isset($_SESSION['userData']['login'])){

    // json table
    include('../includes/table.php');

} else {

    // Login form
    include('../includes/loginForm.php');

}

// Footer
include('../includes/footer.php');