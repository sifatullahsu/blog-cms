<?php

class Post {

    private $table = "tbl_posts";

    public function getPosts($args) {

        $default = array(
            'post_type'     => 'post',
            'current_page'  => NULL,
            'offset'        => NULL,
            'limit'         => 10
        );

        $args       = array_merge($default, $args);
        $pagination = $this->pagination($args);

        $post_type  = $pagination['post_type'];
        $offset     = $pagination['offset'];
        $limit      = $pagination['limit'];

        $sql  = "SELECT * FROM $this->table WHERE post_type = ? ORDER BY post_id DESC LIMIT {$offset}, {$limit}";
        $stmt = DB::prepare($sql);
        $stmt->bindParam('1', $post_type);
        $stmt->execute();

        $data = $stmt->fetchAll();

        $result = array(
            'data'          => $data,
            'pagination'    => $pagination
        );

        return $result;
    }

    public function postsCount($post_type = 'post') {
        $sql  = "SELECT * FROM $this->table WHERE post_type = ? ORDER BY post_id DESC";
        $stmt = DB::prepare($sql);
        $stmt->bindParam('1', $post_type);
        $stmt->execute();

        return $stmt->rowCount();
    }

    /**
     * Post Pagination
     * $default = array(
     *       'post_type'     => 'post',
     *       'current_page'  => NULL,
     *       'offset'        => NULL,
     *       'limit'         => 10
     *   );
     */
    public function pagination($args) {

        $default = array(
            'post_type'     => 'post',
            'current_page'  => NULL,
            'offset'        => NULL,
            'limit'         => 10
        );

        $args           = array_merge($default, $args);

        $current_page   = $args['current_page'];
        $limit          = $args['limit'];
        $post_type      = $args['post_type'];

        $offset         = ($current_page - 1) * $limit;
        $total_record   = $this->postsCount($post_type);

        if ($total_record) {
            $total_page = ceil($total_record / $limit);
        } else {
            $total_page = 0;
        }

        $array = [
            'post_type'     => $post_type,
            'total_page'    => $total_page,
            'current_page'  => $current_page,
            'offset'        => $offset,
            'limit'         => $limit
        ];

        return $array;
    }
}