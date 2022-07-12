<?php

class User {

    private $table = "tbl_users";

    private function checkUsername($username) {
        $sql = "SELECT user_id, user_login FROM $this->table WHERE user_login = ?";
        $stmt = DB::prepare($sql);
        $stmt->bindParam('1', $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /** Check User Email */
    private function checkEmail($email) {
        $sql = "SELECT user_id, user_email FROM $this->table WHERE user_email = ?";
        $stmt = DB::prepare($sql);
        $stmt->bindParam('1', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /** User Login */
    public function user_auth($data) {

        $username_email = validation(strtolower($data['username_email']));
        $password       = validation($data['password']);
        $password_md5   = md5($password);

        if (empty($username_email) || empty($password)) {
            return Msg::err('Field must not be empty..');
        }

        $sql = "SELECT * FROM $this->table WHERE (user_login = ? || user_email = ?) && user_password = ?";
        $stmt = DB::prepare($sql);
        $stmt->execute([$username_email, $username_email, $password_md5]);

        $result = $stmt->fetch();

        if ($result) {
            Session::set('login', TRUE);
            Session::set('user_id', $result['user_id']);
            Session::set('user_login', $result['user_login']);
            Session::set('user_role', $result['user_role']);

            if ($result['user_role'] == 'administrator') {
                header("Location: ./admin/index.php");
            } else {
                header("Location: ./index.php");
            }
        } else {
            return Msg::err('Somthing is wrong..');
        }
    }

    /** User Registration */
    public function user_signup($data) {
        $firstname      = validation($data['first_name']);
        $lastname      = validation($data['last_name']);
        $username       = validation(strtolower($data['username']));
        $email          = validation($data['email']);
        $password       = validation($data['password']);

        $password_md5   = md5($password);

        // Data validation

        if (empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($password)) {
            return Msg::err('Field must not be empty..');
        }

        if (strpos($username, ' ') == true) {
            return Msg::err('Username have should be no space..');
        }

        if (strlen($username) < 4) {
            return Msg::err('Username should be 4 character');
        }

        if (!preg_match('/^[a-z]+[a-z0-9._]+$/', $username)) {
            return Msg::err('Username should be (a-z, 0-9, dot, underscore)');
        }

        if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            return Msg::err('Enter valid email addess..');
        }

        if (strlen($password) < 6) {
            return Msg::err('Password should be 6 character');
        }

        $check_username = $this->checkUsername($username);
        $check_email    = $this->checkEmail($email);

        if ($check_username == true) {
            return Msg::err('Username already exist');
        }

        if ($check_email == true) {
            return Msg::err('Email already exist');
        }

        /* --------- SQL Query --------- */

        $sql = "INSERT INTO $this->table(user_login, user_email, user_password, user_firstname, user_lastname) VALUES(?,?,?,?,?)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam('1', $username);
        $stmt->bindParam('2', $email);
        $stmt->bindParam('3', $password_md5); // Password md5
        $stmt->bindParam('4', $firstname);
        $stmt->bindParam('5', $lastname);
        $stmt->execute();

        return Msg::succ('User successfully registered..');
    }
}