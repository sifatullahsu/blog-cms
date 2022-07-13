<?php



function validation($data) {
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);

    return $data;
}

/** 
 * print_r function with pre tag.
 */
function custom_print_r($array) {
    echo "<pre>";
    $data = print_r($array);
    echo "</pre>";

    return $data;
}


/** 
 * var_dump function with pre tag.
 */
function custom_var_dump($data) {
    echo "<pre>";
    $data = var_dump($data);
    echo "</pre>";

    return $data;
}