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

            editJson('redirections.json', $redirections, $go, [
                'count' => ($redirections[$go]['count'] + 1),
                'statistics' => [date("d M") => $redirections[$go]['statistics'][date("d M")] + 1],
                'logs' => [time() => getUserIpAddr()]
            ]);

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
 * string   $fileName The name of the file to edit in the data folder
 * array    $redirections The json array with all the redirections
 * string   $key The json key
 * array    $edits The informations to edit (key => new value)
 */
function editJson(string $fileName, array $redirections, string $key, array $edits){
    
    foreach ($edits as $k => $v) {
        $redirections[$key][$k] = $v;    
    }

    $fp = fopen('../data/'.$fileName, 'w');
    fwrite($fp, json_encode($redirections));
    fclose($fp);

    return $redirections;

}

/**
 * Edit the specific key of a json file
 * 
 * array    $redirections 
 * string   $key 
 * string   $new_key 
 */
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
 * string   $message The message to pass
 * string   $color The color to use (tailwind default colors)
 */
function createNotice(string $message, string $color){
    $_SESSION['notice'] = ["message" => $message, "color" => $color];
}

/**
 * Convenience wrapper for htmlspecialchars().
 * 
 * string   $text The text to sanitize
 */
function h(string $text){
    return htmlspecialchars($text);
}

/**
 * Display the X last days as a list of Date objects
 * 
 * int      $number_of_days Number of days to retrieve
 * string   $format Date time format to use (default "d M")
 */
function lastXDays(int $number_of_days, string $format = "d M"){
    
    $list_of_past_X_days = array();
    
    for($i = 0; $i < $number_of_days; $i++){
        $list_of_past_X_days[] = date($format, strtotime('-'. $i .' days'));
    }

    return array_reverse($list_of_past_X_days);

}

/**
 * Transform a list of objects as a simple string for JS use
 * i.e. Date 12 Nov, Date 13 Nov -> "12 Nov", "13 Nov", 
 * 
 * array    $array Array to parse
 */
function arrayToJsList($array){

    $jsList = "";

    foreach ($array as $k => $v) {
        $jsList .= '"'.$v.'", ';
    }

    return $jsList;

}

/**
 * Get the last statistics from redirections.json
 * and create an array for a range of dates
 * 
 * array    $dates A Date type array
 * array    $statistics List of statistics (ex: '13 Nov' => 2)
 */
function statistics_data_day(array $dates, array $statistics){

    $statistics_with_date = [];

    foreach ($dates as $k => $v) {
        $statistics_with_date[$v] = 0;

        if(isset($statistics[$v])){
            $statistics_with_date[$v] = $statistics[$v];
        }
    }

    return $statistics_with_date;
}

/**
 * Get the user IP adress
 * 
 * From : https://www.codexworld.com/how-to/get-user-ip-address-php/
 */
function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
