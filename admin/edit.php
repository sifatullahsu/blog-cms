<?php
include __DIR__ . '/includes/header.php';
// include_once ABSPATH . 'admin/includes/header.php';


$post   = new Post;


if (isset($_GET['post_type'])) {
    $post_type = validation($_GET['post_type']);
} else {
    $post_type = 'post';
}

if (isset($_GET['page'])) {
    $current_page   = validation(check_int($_GET['page']));
} else {
    $current_page   = 1;
}

$args = array(
    'post_type'     => $post_type,
    'current_page'  => $current_page,
    'limit'         => 2
);

$result = $post->getPosts($args);
$total_page     = $result['pagination']['total_page'];
$current_page   = $result['pagination']['current_page'];

// print_r_custom($result);




?>

<h2 style="margin-bottom: 20px;">Add New Post</h2>

<table class="table table-striped table-borderles">
    <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Post Type</th>
            <th scope="col">Author</th>
            <th scope="col">Date</th>
            <th scope="col">Post Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result['data']) {
            foreach ($result['data'] as $data) {
                echo "<tr>";
                echo "<td>" . $data['post_title'] . "</td>";
                echo "<td>" . $data['post_type'] . "</td>";
                echo "<td>" . $data['post_author'] . "</td>";
                echo "<td>" . $data['post_date'] . "</td>";
                echo "<td>" . $data['post_status'] . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>


<?php
include __DIR__ . '/includes/footer.php';