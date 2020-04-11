<?php
define("DATABASE", "phpvoteapp");


session_start();

$host = "localhost";
$errors = array();

$username = "";
$email = "";
//connct to database
$db = mysqli_connect($host, "root", "", DATABASE) or die("could not connect to database");
if (isset($_POST["reg_user"])) {
    //get inputs to register
    $username = mysqli_real_escape_string($db, $_POST["username"]);
    $email = mysqli_real_escape_string($db, $_POST["email"]);
    $pass1 = mysqli_real_escape_string($db, $_POST["pass1"]);
    $pass2 = mysqli_real_escape_string($db, $_POST["pass2"]);

    //form validation
    if (empty($username)) {
        array_push($errors, "Username is not entered");
    }
    if (empty($email)) {
        array_push($errors, "Email is not entered");
    }
    if (empty($pass1)) {
        array_push($errors, "Password is not entered");
    }
    if (empty($pass2)) {
        array_push($errors, "Password2 is not entered");
    }
    if ($pass1 != $pass2) {
        array_push($errors, "Passwords does not match");
    }

    $user_check_query = "SELECT * FROM user WHERE username = '$username' OR email = '$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user_record = mysqli_fetch_assoc($result);

    if ($user_record) {
        if ($user_record["username"] == $username) {
            array_push($errors, "Username already exists");
        }
        if ($user_record["email"] == $email) {
            array_push($errors, "Email already exists");
        }
    }


    if (count($errors) == 0) {
        $pass = md5($pass1);
        $query = "INSERT INTO user (username,email,pass) VALUES ('$username','$email','$pass')";
        mysqli_query($db, $query);
        $_SESSION["username"] = $username;
        $_SESSION["success"] = "Now you are logged in";
        header('location: index.php');
    }
}
// USER LOGIN 

if (isset($_POST["Loginuser"])) {

    $username = mysqli_real_escape_string($db, $_POST["username"]);
    $pass = mysqli_real_escape_string($db, $_POST["pass"]);

    if (empty($username)) {
        array_push($errors, "Username is not entered");
    }
    if (empty($pass)) {
        array_push($errors, "Password is not entered");
    }

    if (count($errors) == 0) {
        $pass = md5($pass);
        $query = "SELECT * FROM user WHERE username='$username' AND pass='$pass'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result)) {
            $_SESSION["success"] = "You logged in successfully";
            $_SESSION["username"] = $username;
            header('location: index.php');
        } else {
            array_push($errors, "Username or password is incorrect");
        }
    }
}
