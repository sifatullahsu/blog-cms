<?php


/**
 * Validate input data. 
 * trim(), htmlspecialchars(), stripslashes()
 */
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


/**
 * Slug maker from string
 * Remove all space & replace with hyphen symbol
 * It's not validate the string from database
 */
function slug_maker($slug) {
    $slug = strtolower($slug);
    $slug = preg_replace("/-$/", "", preg_replace('/[^a-z0-9]+/i', "-", $slug));

    return $slug;
}


function in_array_r($item, $array) {
    return preg_match('/"' . preg_quote($item, '/') . '"/i', json_encode($array));
}