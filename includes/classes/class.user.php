<?php

class User {
    private $table = "tbl_users";

    public function user_auth($username_email, $password_md5) {
        $sql = "SELECT * FROM $this->table WHERE (user_login = ? || user_email = ?) && user_password = ?";
        $stmt = DB::prepare($sql);
        $stmt->execute([$username_email, $username_email, $password_md5]);

        if ($stmt->rowCount() > 0) {
            return "Success";
        } else {
            return "Faild";
        }
    }
}