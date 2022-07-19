<?php

class Post_New {

    private $table = "tbl_posts";

    public function submit_post($args) {

        $args = [
            $args['post_author'],
            $args['post_title'],
            $args['post_content'],
            $args['post_excerpt'],
            $args['post_featured'],
            $args['post_slug'],
            $args['post_status'],
            $args['post_date'],
            $args['post_modified'],
            $args['post_type']
        ];

        // return print_r_custom($args);

        $sql  = "INSERT INTO $this->table(post_author, post_title, post_content, post_excerpt, post_featured, post_slug, post_status, post_date, post_modified, post_type) VALUES(?,?,?,?,?,?,?,?,?,?)";
        $stmt = DB::prepare($sql);
        $stmt->execute($args);

        return Msg::succ("Post published..");
    }

    /**
     * It's check slug into the database.
     */
    public function check_slug($post_type, $slug) {

        $slug = slug_maker($slug);

        $sql = "SELECT post_slug FROM $this->table WHERE post_type = ? && post_slug  LIKE '" . $slug . "%'";
        $stmt = DB::prepare($sql);
        $stmt->bindParam('1', $post_type);
        $stmt->execute();


        if ($stmt->rowCount() !== 0) {

            $results = $stmt->fetchAll();
            $max = 1;

            $slugs = [];
            foreach ($results as $value) {
                $slugs[] .= $value['post_slug'];
            }

            //keep incrementing $max until a space is found
            while (in_array(($slug . '-' . ++$max), $slugs));

            //update $slug with the appendage
            $slug .= '-' . $max;

            return $slug;
        } else {

            return $slug;
        }
    }
}