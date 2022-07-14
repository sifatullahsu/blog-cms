<?php

class Post_New {

    private $table = "tbl_posts";

    public function submit_post($args) {

        $title = "Hello bangladesh";

        $post_type = 'post';
        $slug = $title;

        $this->check_slug($post_type, $slug);
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