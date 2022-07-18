<?php


require('config/bootstrap.php');
require('layouts/header.php');

use App\Class\BlogClass;

$response = [];
$page = isset($_GET['add']) &&  $_GET['page'] > 1 ?  $_GET['page'] : 1;
$postPerPage = 20;
$posts =  BlogClass::getPosts($page, $postPerPage);

?>

<main role="main">
    <div class="container-fluid m-3">
        <?php
        if (count($posts)) {
            foreach ($posts as $key => $value) {
        ?>
                <div class="row single-blog">
                    <div class="col-md-9 single-blog-text">
                        <div class="single-blog-header-text">
                            <a href="singlepost.php?id=" <?php echo $value['id']; ?>>
                                <p><?php echo $value['created_at'] . ' - ' . $value['post_title']; ?></p>
                            </a>
                        </div>
                        <p>
                        <p>
                            <?php
                            echo strlen($value['post_content']) > 1000 ?
                                substr($value['post_content'], 0, 1000) . '......' :
                                $value['post_content'];
                            ?>
                        </p>
                        </p>
                    </div>
                    <div class="col-md-3 single-blog-image">
                        <img src="<?php echo $value['post_image_link']; ?>" alt="">
                    </div>
                    <div class="single-blog-footer-text clearfix">
                        <div class="pull-left">Author: <?php echo $value['name']; ?></div>
                        <div class="pull-right">Comments: 0</div>
                    </div>
                </div>
            <?php
            }
        } else { ?>
            <h3>No post found</h3>
        <?php } ?>
    </div>
    <div class="container">

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>


</main>


<?php
require('layouts/footer.php');
?>