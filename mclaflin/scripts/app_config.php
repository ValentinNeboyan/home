<?php
define("SITE_ROOT","C:/OSPanel/domains/mclaflin/");
define("DEBUG_MODE", true);
define("DB_HOST", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "homework");

function debug_print($message) {
    if (DEBUG_MODE) {
        echo $message;
    }
}
function ($user_error_message, $system_error_message) {
    header("Location: show_error.php?" .
        "error_message={$user_error_message}&" .
        "system_error_message={$system_error_message}");
    exit();
}

/*function get_web_path($file_system_path){

    return str_replace($_SERVER['DOCUMENT_ROOT'],'', $file_system_path);

}*/
?>