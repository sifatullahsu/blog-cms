<?php

class post_type {

    public $name;
    public $public = false;

    public $labels;
    protected static $default_labels = array();

    public $exclude_from_search = null;
    public $publicly_queryable = null;

    public $show_ui = null;
    public $show_in_menu = null;
    public $show_in_nav_menus = null;
    public $menu_position = null;
    public $menu_icon = null;

    public $has_archive = false;
    public $template = array();

    public $rewrite;
    public $_edit_link = 'post.php?post=%d';



    /* public function __construct($post_type, $args = array()) {
        $this->name = $post_type;

        $this->set_props($args);
    } */

    public function set_props($args) {

        $defaults = array(
            'public'                => false,
            'labels'                => array(),

            'exclude_from_search'   => null,
            'publicly_queryable'    => null,

            'show_ui'               => null,
            'show_in_menu'          => null,
            'show_in_nav_menus'     => null,
            'menu_position'         => null,
            'menu_icon'             => null,

            'has_archive'           => false,
            'template'              => array(),

            'rewrite'               => true,
            '_edit_link'            => 'post.php?post=%d',

        );

        $args = array_merge($defaults, $args);

        return $args;
    }
}



/* 

$arg = array(
    'public'                => TRUE,
    'publicly_queryable'    => TRUE,
    'show_ui'               => TRUE,
    'menu_position'         => 6,
    'menu_icon'             => null,
    'has_archive'           => TRUE,
    'rewrite'               => true,
    '_edit_link'            => 'post',
);


$post_type = new post_type();
$result = $post_type->set_props($arg);

echo "<pre>";
print_r($result);
echo "</pre>";

*/





/* 

    // public $cap;
    // public $supports;
    // public $_builtin = false;
    // public $template_lock = false;
    // public $query_var;
    // public $capability_type = 'post';
    // public $description = '';
    // public $hierarchical = false;
    // public $show_in_admin_bar = null;
    // public $map_meta_cap = false;
    // public $register_meta_box_cb = null;
    // public $taxonomies = array();
    // public $can_export = true;
    // public $delete_with_user = null;
    // public $show_in_rest;
    // public $rest_base;
    // public $rest_namespace;
    // public $rest_controller_class;
    // public $rest_controller;

*/



/* 

    // 'template_lock'         => false,
    // '_builtin'              => false,
    // 'description'           => '',
    //'hierarchical'          => false,
    //'show_in_admin_bar'     => null,
    //'capability_type'       => 'post',
    //'capabilities'          => array(),
    //'map_meta_cap'          => null,
    //'supports'              => array(),
    //'register_meta_box_cb'  => null,
    //'taxonomies'            => array(),
    // 'query_var'             => true,
    // 'can_export'            => true,
    // 'delete_with_user'      => null,
    // 'show_in_rest'          => false,
    // 'rest_base'             => false,
    // 'rest_namespace'        => false,
    // 'rest_controller_class' => false,

*/