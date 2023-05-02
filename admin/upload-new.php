<?php
include __DIR__ . '/includes/header.php';

$upload_new = new Upload_New();


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['upload'])) {

    $results = $upload_new->uploadAtt($_POST);
}

?>

<?php

if (isset($results)) {
    echo $results;
}
?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="file" class="form-label">Upload your file..</label>
        <input class="form-control form-control-sm" id="file" type="file" name="file">
    </div>

    <div class="mb-3">
        <input type="submit" value="Upload" name="upload" class="btn btn-primary btn-lg">
    </div>
</form>





<?php





include __DIR__ . '/includes/footer.php';