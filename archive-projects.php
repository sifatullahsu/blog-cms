<?php

function get__projects__archive($result) {
?>
<div class="container" style="width: 1000px; margin: 0 auto; padding: 50px;">
    <?php
        if ($result) {
            foreach ($result['data'] as $data) {
        ?>
    <div class="box" style="margin-bottom: 20px; background: #f0f0f0; padding: 20px;">
        <span><?php echo $data['post_type']; ?></span>
        <h2><?php echo $data['post_title']; ?></h2>
        <p><?php echo $data['post_excerpt']; ?></p>
        <a href="single.php?post_type=<?php echo $data['post_type']; ?>&post_slug=<?php echo $data['post_slug']; ?>">Read
            More..</a>
    </div>
    <?php
            }
        }

        get_pagination($result);

        ?>
</div>
<?php
}