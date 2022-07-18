<?php
require('config/bootstrap.php');
require('layouts/header.php');

use App\Class\BlogClass;

$response = [];
$postId = isset($_GET['id']) &&  $_GET['id'] > 0 ?  $_GET['id'] : 0;

if ($postId == 0) {
    header("Location:index.php");
}

$postDetails =  BlogClass::getPostDetails($postId);

if (!count($postDetails)) {
    header("Location:index.php");
}

?>

<main role="main">

    <div class="container mt-3 single-blog">
        <div class="row">
            <div class="date-time mt-3">
                <?php echo $postDetails['created_at']; ?>
            </div>
            <br>
            <div class="blog-title single-blog-text">
                <h3><?php echo $postDetails['post_title']; ?></h3>
            </div>
        </div>
        <div class="row">
            <div class="blog-image single-blog-image text-center" style="width: 100%;">
                <img src="<?php echo $postDetails['post_image_link']; ?>" alt="">
            </div>
        </div>
        <div class="row">
            <div class="blog-text">
                <p>
                    <?php echo $postDetails['post_content']; ?>
                </p>

                <p>
                    <strong>Author:<?php echo $postDetails['name']; ?></strong>
                </p>

            </div>

        </div>
    </div>
    <p class="text-center mt-3">Leave your comments below.</p>
    <div class="container mt-3 mb-3 single-blog">

        <form action="" method="POST">
            <div class="form-group">
                <label>Name*</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Mail*</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Url*</label>
                <input type="Url" name="url" class="form-control" required>
            </div>
            <div class="form-group">
                <label>comment*</label>
                <textarea class="form-control" name="comment">

                </textarea>
            </div>
            <input type="hidden" name="postId" class="form-control" value="<?php echo $postDetails['id']; ?>">
            <div class="form-group">
                <button type="submit" class="btn btn-info" name="">Submit</button>
            </div>
        </form>

    </div>
</main>
<?php
require('layouts/footer.php');
?>