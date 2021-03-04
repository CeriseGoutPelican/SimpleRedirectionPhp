<?php
/**
 * Redirection
 *
 * array $redirections The json array with all the redirections
 * string $go The json key that is at the end of the url
 */
function redirection(array $redirections, string $go){

    if(isset($go) && $go != ""){

        if(isset($redirections[$go])){

            editJson($redirections, $go, ['count' => ($redirections[$go]['count'] + 1)]);

            header('Location: '. $redirections[$go]['url']);
            exit();

        } else {
            
            createNotice("Unable to redirect, the key is invalid.", "red");
        
        }

    }
}

/**
 * Check the login and the password
 * 
 * string $login email or username
 * string $password Password
 */

function login(string $login, string $password){

    include('../data/logins.php');

    $login = isset($login) ? $login : '';
    $password = isset($password) ? $password : '';

    if(isset($logins[$login]) && $logins[$login] == hash('sha256', $password)){

        $_SESSION['userData']['login'] = $logins[$login];

        createNotice('Welcome back !', 'green');

    } else {

        createNotice('Unable to log in', 'red');
    
    }

}

/**
 * Update json
 *
 * array $redirections The json array with all the redirections
 * string $key The json key
 * array $edits The informations to edit (key => new value)
 */
function editJson(array $redirections, string $key, array $edits){
    
    foreach ($edits as $k => $v) {
        $redirections[$key][$k] = $v;    
    }

    $fp = fopen('../data/redirections.json', 'w');
    fwrite($fp, json_encode($redirections));
    fclose($fp);

    return $redirections;

}

function editKeyJson(array $redirections, string $key, string $new_key){

    if(!isset($redirections[$new_key])){

        $redirections[$new_key] = $redirections[$key];
        unset($redirections[$key]);

    } else {

        createNotice("The new key is already in use.", "red");

    }

    return $redirections;

}

/**
 * Delete json
 *
 * array $redirections The json array with all the redirections
 * string $key The key to delete
 */
function deleteJson(array $redirections, string $key){
    
    unset($redirections[$key]);

    $fp = fopen('../data/redirections.json', 'w');
    fwrite($fp, json_encode($redirections));
    fclose($fp);

}

/**
 * Create notice
 * 
 * 
 */
function createNotice(string $message, string $color){
    $_SESSION['notice'] = ["message" => $message, "color" => $color];
}