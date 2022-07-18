<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Blog</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!--custom css -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

    <div class="m-5">
        <div class="d-flex">
            <div class="logo">
                <img src="https://via.placeholder.com/140x100" alt="">
            </div>

            <div class="company-title ml-5 mt-2">
                <h1>Simple Blog </h1>
            </div>

        </div>
    </div>
    </div>

    <nav class="navbar navbar-expand-md navbar-dark  bg-dark">
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">Home</span></a>
                </li>
                <?php if (isset($_SESSION["name"])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="addPost.php">new entry</a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link" href="imprint.php">Imprint</a>
                </li>
            </ul>
        </div>
        <div class="pull-right">
            <ul class="navbar-nav mr-auto text-white">
                <?php if (isset($_SESSION["isLoggedIn"])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"><?php echo $_SESSION["name"] . ', '; ?> Logout</a>
                    </li>
                <?php } else { ?>

                    <li class="nav-item active">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>

                <?php } ?>


            </ul>
        </div>
    </nav>