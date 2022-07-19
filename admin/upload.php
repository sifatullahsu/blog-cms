<?php
include __DIR__ . '/includes/header.php';

$user_role = Session::get('user_role');


$upload = new Upload;
echo $upload->getUploadFiles($user_role);













include __DIR__ . '/includes/footer.php';