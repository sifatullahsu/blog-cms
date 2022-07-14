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

function check_int($int) {
    if (is_int($int)) {
        return $int;
    } else {
        return $int;
    }
}

/** 
 * print_r function with pre tag.
 */
function print_r_custom($array) {
    echo "<pre>";
    $data = print_r($array);
    echo "</pre>";

    return $data;
}


/** 
 * var_dump function with pre tag.
 */
function var_dump_custom($data) {
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


/**
 * Get Pagination for $post->getPosts($args);
 */
function get_pagination($args) {
    $total_page     = $args['pagination']['total_page'];
    $current_page   = $args['pagination']['current_page'];
    $post_type      = $args['pagination']['post_type'];
?>
<div class="pagination">
    <ul>
        <?php
            for ($i = 1; $i <= $total_page; $i++) {
                $active = ($i == $current_page) ? 'active' : '';
                echo "<li class='$active'><a href='archive.php?post_type=$post_type&page=$i'>$i</a></li>";
            }
            ?>
    </ul>
</div>
<?php
}