<?php



/* function _table($table) {
    global $table_prefix;

    return $table_prefix . $table;
} */

function validation($data) {
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);

    return $data;
}