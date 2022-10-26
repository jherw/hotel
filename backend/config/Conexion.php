<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

// Define database
define('dbhost', 'localhost');
define('dbuser', 'root');
define('dbpass', '');
define('dbname', 'sistemahotel');

// Connecting database
try {
    $connect = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
    $connect->query("set names utf8;");
    // $connect->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    //$connect->setAttribute( PDO::ATTR_EMULATE_PREPARES, true );
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}
catch(PDOException $e) {
    echo $e->getMessage();
}
//---------------
function format_uri( $string, $separator = '-' )
{
$accents_regex = '~&([a-z]{1,2})(?:acute|cedil|circ|Grave|lig|orn|ring|slash|th|tilde|uml);~i';
$special_cases = array( '&' => 'and', "'" => '');
$string = mb_strtolower( trim( $string ), 'UTF-8' );
$string = str_replace( array_keys($special_cases), array_values( $special_cases), $string );
$string = preg_replace( $accents_regex, '$1', htmlentities( $string, ENT_QUOTES, 'UTF-8' ) );
$string = preg_replace("/[^a-z0-9]/u", "$separator", $string);
$string = preg_replace("/[$separator]+/u", "$separator", $string);
return $string;
}

?>

