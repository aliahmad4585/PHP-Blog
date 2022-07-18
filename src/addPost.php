<?php
session_start();
require('layouts/header.php');
?>
<main role="main">
<div class="container mt-5">
    <form action="" method="">
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" placeholder="Blog Title">
        </div>
        <div class="form-group">
            <label>Link Zum bild</label>
            <input type="url" class="form-control">
        </div>
        <div class="form-group">
            <label>Text</label>
            <textarea class="form-control"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-info">Absenden</button>
        </div>
    </form>
</div>
</main>

<?php
require('layouts/footer.php');
?>
