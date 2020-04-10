<?php include('server.php') ?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Register page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href=""> -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/login.css">

</head>

<body class="text-center">


    <form action="reg.php" method="post" class="form-signin">
        <h1>Register</h1>
        <div class="form-group">
            <label for="nam">Name</label>
            <input type="text" name="username" class="form-control" id="nam" aria-describedby="emailHelp" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            <small id="emailHelp" class="form-text">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="pass1" class="form-control" id="exampleInputPassword1" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword2">Retype Password</label>
            <input type="password" name="pass2" class="form-control" id="exampleInputPassword2" required>
        </div>
        <!-- <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> -->
        <?php include('errors.php') ?>
        <br>
        <button type="submit" class="btn btn-primary" name="reg_user">Register</button>
        <div class="amargin">
            <a href="login.php">Already a user</a>
        </div>

    </form>


</body>

</html>