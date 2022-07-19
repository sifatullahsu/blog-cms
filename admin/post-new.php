<?php
include __DIR__ . '/includes/header.php';


$post_new = new Post_New;


if (isset($_GET['post_type'])) {
    $post_type = validation($_GET['post_type']);
} else {
    $post_type = 'post';
}


// OI8S$xph;$nD

// Date & Time formate in the database:  2022-07-26 00:00:00
// echo date("Y-m-d H:i:s");


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['post_publish'])) {
    $post_author    = Session::get('user_id');
    $post_title     = validation($_POST['post_title']);
    $post_content   = validation($_POST['post_content']);
    $post_excerpt   = 'post_excerpt';
    $post_featured  = '123';
    $post_slug      = $post_new->check_slug($post_type, slug_maker($post_title));
    $post_status    = validation($_POST['post_publish']);
    $post_date      = validation($_POST['post_date']);
    $post_modified  = validation($_POST['post_modified']);

    $args = [
        'post_author'   => $post_author,
        'post_title'    => $post_title,
        'post_content'  => $post_content,
        'post_excerpt'  => $post_excerpt,
        'post_featured' => $post_featured,
        'post_slug'     => $post_slug,
        'post_status'   => $post_status,
        'post_date'     => $post_date,
        'post_modified' => $post_modified,
        'post_type'     => $post_type
    ];

    $result = $post_new->submit_post($args);
    if ($result) {
        echo $result;
    }
}

?>

<h2 style="margin-bottom: 20px;">Add New Post</h2>

<form action="" method="POST">
    <div style="padding: 5px;">
        <input type="text" name="post_title" placeholder="Add title" required>
        <textarea name="post_content" placeholder="Write your content here..." cols="30" rows="10"></textarea>

        <input type="text" name="post_date" value="<?php echo date('Y-m-d H:i:s'); ?>" hidden>
        <input type="text" name="post_modified" value="<?php echo date('Y-m-d H:i:s'); ?>" hidden>
        <input type="submit" name="post_publish" value="Publish">
    </div>
</form>





<?php
include __DIR__ . '/includes/footer.php';