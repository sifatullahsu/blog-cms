<?php

class Upload {

    private $path;

    public function __construct() {
        $this->isDirectoryExists();
    }

    public function isDirectoryExists() {
        $this->path = __DIR__ . '/../../content/uploads/';

        $year_folder = $this->path . date("Y");
        $month_folder = $year_folder . '/' . date("m");

        !file_exists($year_folder) && mkdir($year_folder, 0777);
        !file_exists($month_folder) && mkdir($month_folder, 0777);

        return $month_folder;
    }

    public function getUploadFiles($user_role) {

        if ($user_role != 'administrator') return FALSE;
    }
}