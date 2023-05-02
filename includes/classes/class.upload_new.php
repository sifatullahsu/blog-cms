<?php

class Upload_New extends Upload {

    private $table = "tbl_attachments";

    public function uploadAtt($args) {

        /* File Informations */

        $att_fullname   = $_FILES['file']['name'];
        $att_temp       = $_FILES['file']['tmp_name'];
        $att_type       = $_FILES['file']['type'];
        $att_size       = $_FILES['file']['size'];



        /* Making Slug From Attachment Name */

        $name       = pathinfo($att_fullname, PATHINFO_FILENAME);
        $extension  = pathinfo($att_fullname, PATHINFO_EXTENSION);

        $name_slug       = slug_maker($name) . "." . $extension; // e.g. this-pic.jpg



        /* Path Name Generator for Database */

        $path       = $this->isDirectoryExists() . '/' . $name_slug; // slug name with full path
        $prefix     = "/../../content/";

        $path_DB      = substr($path, strpos($path, $prefix) + strlen($prefix)); // e.g uploads/2022/08/this-pic.jpg
        $path_DB      = $this->check_att_slug($path_DB); // unique path. It's increment +1 if found


        $path_folder  = __DIR__ . $prefix . $path_DB; // full file location to move data.


        if (move_uploaded_file($att_temp, $path_folder)) {

            $sql = "INSERT INTO $this->table(att_slug) VALUES(?)";
            $stmt = DB::prepare($sql);
            $stmt->bindParam('1', $path_DB);

            $result = $stmt->execute();

            if ($result = TRUE) {
                return Msg::succ('File successfully uploaded');
            }
        } else {
            return Msg::err('File not uploaded');
        }
    }

    /**
     * It's check slug into the database.
     */
    public function check_att_slug($slug) {


        $sql = "SELECT att_slug FROM $this->table WHERE att_slug LIKE '" . $slug . "%'";
        $stmt = DB::prepare($sql);
        $stmt->execute();


        if ($stmt->rowCount() !== 0) {

            /* ====================== Need to work on here. ========================== */

            $results = $stmt->fetchAll();

            print_r_custom($results);

            $slug_name       = pathinfo($slug, PATHINFO_FILENAME);
            $slug_extension  = pathinfo($slug, PATHINFO_EXTENSION);
            $max = 1;

            $slugs = [];
            foreach ($results as $value) {
                $slugs[] .= $value['att_slug'];
            }

            // keep incrementing $max until a space is found
            while (in_array(($slug_name . '-' . ++$max . $slug_extension), $slugs));

            //Create a new slug name
            $new_slug = $slug_name . '-' . $max . $slug_extension;

            return $new_slug;
        } else {

            return $slug;
        }
    }
}