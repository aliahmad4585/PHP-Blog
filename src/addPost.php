<?php
require('config/bootstrap.php');
require('layouts/header.php');

if (!isset($_SESSION["isLoggedIn"])) {

    header("Location:login.php");
}

use App\Class\BlogClass;

$response = [];
if (isset($_POST['add']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

    $response =  BlogClass::addPost($_POST);
    if (!$response['hasError']) {
        header("Location:index.php");
    }
}
?>
<main role="main">
    <div class="container mt-5">
        <?php if (isset($response['hasError']) && $response['hasError']) { ?>
            <div id="message">
                <p class="alert alert-info">
                    <?php
                    foreach ($response as $key => $value) {
                        if ($key == 'hasError') {
                            continue;
                        }
                        echo $response[$key] . "<br>";
                    }

                    ?>
                </p>

            </div>
        <?php } ?>
        <form action="" method="POST">
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title" , placeholder="Blog Title">
            </div>
            <div class="form-group">
                <label>Image Link:</label>
                <input type="url" class="form-control" name="link">
            </div>
            <div class="form-group">
                <label>Text</label>
                <textarea class="form-control" name="description"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" name="add" class="btn btn-info">Add</button>
            </div>
        </form>
    </div>
</main>

<?php
require('layouts/footer.php');
?>