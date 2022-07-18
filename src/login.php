<?php
require('config/bootstrap.php');

use App\Class\AuthClass;

$response = [];
if (isset($_POST['login']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $response =  AuthClass::login($_POST);

    if (isset($response['isLoggedIn'])) {
        header("Location:index.php");
    }
}

require('layouts/header.php');

?>
<main role="main" class="mt-5">
    <div class="container">
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
        <form class="" method="POST" action="">
            <div class="form-group">
                <label>
                    Username
                </label>
                <input type="text" name="email" class="form-control" placeholder="email">
            </div>
            <div class="form-group">
                <lable>Password</lable>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
                <button type="submit" name="login" class="btn btn-info">Login</button>
            </div>
        </form>
        <p class="text-center">Does not have account yet? Please register <a href="register.php">here</a> </p>
    </div>

</main>

<?php
require('layouts/footer.php');
?>