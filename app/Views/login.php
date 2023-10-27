<!doctype html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/asset/img/camel-logo.png" type="image/jpeg">
    <title>Camel Finance | Login</title>


    <link href="<?= base_url(); ?>/mcloud/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/mcloud/css/style.css" rel="stylesheet">

</head>



<body class="body-signin text-center">
    <main class="form-signin">

        <form action="login/auth" method="post">

            <img class="mb-3" src="<?= base_url(); ?>/assets/asset/img/camel-logo.png" alt="" height="auto" width="72">
            <h1 class="h3 mb-3 fw-normal">Camel Finance</h1>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
                <label for="floatingInput">Username</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>






            <button class="w-100 mb-3 btn btn-lg btn-primary" type="submit">Log in</button>





        </form>
        <!-- <a href="<?= base_url(); ?>/registrasi" class="w-100 btn btn-lg btn-danger">Registrasi</a>  -->
        <p class="mt-5 mb-3 text-muted">&copy; <?= date('Y') ?></p>


    </main>







</body>



</html>