<?php include('server.php') ?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Login page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href=""> -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/login.css">

</head>

<body class="text-center">


    <form method="post" action="login.php" class="form-signin">
        <h1>Login</h1>
        <div class="form-group">
            <label for="un">Username</label>
            <input type="text" name="username" class="form-control" id="un">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="pass" class="form-control" id="exampleInputPassword1" required>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <?php include('errors.php') ?>

        <button type="submit" class="btn btn-primary" name="Loginuser">Sign in</button>
    </form>


</body>

</html>