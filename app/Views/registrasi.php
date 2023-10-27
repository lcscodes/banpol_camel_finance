<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <link rel="shortcut icon" href="<?= base_url(); ?>/img/logo.jpeg" type="image/jpeg">
    <title>Majlis Quran | Registrasi</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">



    <!-- Bootstrap core CSS -->
    <link href="<?= base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="<?= base_url(); ?>/assets/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <form action="<?= base_url(); ?>/save" method="post">
            <img class="mb-4" src="<?= base_url(); ?>/img/logo.jpeg" alt="" height="72">

            <h1 class="h3 mb-3 fw-normal">MCloud Simple Solution</h1>

            <div class="form-floating">
                <input type="text" name="nama" class="form-control" id="floatingInput" placeholder="nama anda!">
                <label for="floatingInput">Nama</label>
            </div>
            <div class="form-floating">
                <input type="text" name="username" class="form-control" id="floatingInput" placeholder="username anda!">
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="password anda!">
                <label for="floatingPassword">Password</label>
            </div>


            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>

        </form>
        <p class="mt-5 mb-3 text-muted">&copy; MCloud-2023</p>
    </main>



</body>

</html>