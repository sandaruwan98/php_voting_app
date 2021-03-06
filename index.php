<?php

session_start();

if (!isset($_SESSION["username"])) {
    $_SESSION["msg"] = "You need to sign in";
    header("location: login.php");
}



if ($_GET["logout"]) {
    session_destroy();
    unset($_SESSION["username"]);
    header("location: login.php");
}


?>



<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Home page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href=""> -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <script src="https://kit.fontawesome.com/2b554022ef.js" crossorigin="anonymous"></script>

    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="./css/style.css">

    <link rel="stylesheet" href="./css/menu.css">
</head>

<body>

    <header>

        <div class="logmenu1">
            <div class="logmenu">
                <!-- <button class="btn-pr"></button> -->
                <div class="menubtn">
                    <a href="" class="btn btn-dark btn-lg"><i class="fas fa-house-damage"></i> My Account</a>
                </div>
                <div class="menubtn">
                    <a href="index.php?logout='1'" role="button" class="btn btn-dark btn-lg"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>

            </div>
        </div>

        <nav class="mb-1 navbar navbar-expand-lg navbar-dark indigo fixed-top scrolling-navbar">
            <a class="navbar-brand" href="#"><i class="fab fa-houzz"> </i>
                <?php if (isset($_SESSION["username"])) :

                ?>
                    Welcome <?php echo $_SESSION["username"] ?>

                <?php endif ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333" aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item ff">
                        <a class="nav-link" href="#flexex">Features</a>
                    </li>
                    <li class="nav-item">
                    <li class="nav-item ff">
                        <a class="nav-link" href="#flexex">Rules</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Vote</a>
                    </li>
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Dropdown
                        </a>
                        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li> -->
                </ul>
                <ul class="navbar-nav ml-auto nav-flex-icons">
                    <li class="nav-item">
                        <a href="https://twitter.com/?lang=en" class="nav-link waves-effect waves-light">
                            <i class="fab fa-twitter">Twitter</i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.google.com/" class="nav-link waves-effect waves-light">
                            <i class="fab fa-google-plus-g"></i>
                        </a>
                    </li>
                    <li class="nav-item menutrigger">
                        <a class="nav-link waves-effect waves-light">
                            <i class="fas fa-user"></i> Profile </a>

                    </li>
                </ul>
            </div>
        </nav>

        <!-- <section>
            <div class="hero">
                <img src="./img/carwall.jpg" alt="">
                <h1 class="headline font-weight-bolder"><i class="fas fa-virus"> </i>LK INC</h1>
            </div>

        </section> -->
    </header>

    <?php
    $db = mysqli_connect("localhost", "root", "", "phpvoteapp") or die("could not connect to database");
    if ($_GET["id"]) {
        $votes = $_GET["x"] + 1;
        $id = $_GET["id"];
        $q = "UPDATE votecards SET numofvotes = $votes  WHERE id = '$id'";
        mysqli_query($db, $q);
    }
    $query = "SELECT * FROM votecards";

    $result = mysqli_query($db, $query);

    ?>
    <div id="card-section" style="margin-top: 2cm;">
        <h1 class="text-center font-weight-bolder">Choose a one and VOTE</h1>
        <div class="cards-con">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {

            ?>
                <!-- Card -->
                <div class="card">

                    <!-- Card image -->
                    <div class="view overlay" style="height: 30vh;-webkit-background-size: cover;">
                        <img class="card-img-top" src="<?php echo ($row["img"]); ?>" alt="Card image cap">
                        <a href="#!">
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>

                    <!-- Card content -->
                    <div class="card-body">

                        <!-- Title -->
                        <h4 class="card-title"><?php echo ($row["name"]); ?></h4>
                        <!-- Text -->
                        <p class="card-text"><?php echo ($row["discription"]) ?></p>
                        <!-- Button -->
                        <a href="index.php?id=<?php echo ($row["id"]); ?>&x=<?php echo ($row["numofvotes"]); ?>" type="submit" name="votebtn" class="btn btn-primary">Vote</a>

                    </div>

                </div><!-- Card -->
            <?php } ?>
        </div>
    </div>
    <!-- <div class="slider"></div> -->
    <section id="flexex">
        <div class="flex-1 ">
            <div class="left-1 rounded-lg shadow-lg">
                <h2>Lorem ipsum</h2>
                <p class="intro-l ">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus nisi, sequi delectus quasi ipsa
                    distinctio ut doloribus numquam beatae ab! Explicabo enim nisi, libero adipisci voluptates magni
                    dignissimos
                    ipsum officiis. <br><br>
                    m ipsum dolor sit amet consectetur adipisicing elit. Repellendus nisi, sequi delectus quasi ipsa
                    distinctio ut doloribus numquam beatae.
                </p>

            </div>
            <div class="right-1 rounded-lg shadow-lg">
                <h2>Numquam sint</h2>
                <p class="intro-r">

                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quod dolorem neque exercitationem,
                    aspernatur
                    perferendis eius iusto qui voluptatibus, placeat, quidem vero eaque odit obcaecati. Numquam sint cum
                    deleniti error voluptas? <br>
                    <h1 class="typo font-weight-bold">Who the Fuck are you</h1>

                </p>


            </div>
        </div>
    </section>

    <!--Waves Container-->
    <div>
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
            </defs>
            <g class="parallax">
                <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.5" />
                <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255, 0.3)" />
                <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255, 0.1)" />
                <use xlink:href="#gentle-wave" x="48" y="7" fill="rgb(41, 49, 75)" />
            </g>
        </svg>
    </div>
    <!--Waves end-->

    <div class="footer row">
        <div class="col-sm-5 text-center">
            <h3 class="mb-3 font-weight-bold text-uppercase text-warning"><i class="fas fa-virus"></i> LK INC</h3>

            <ul class="list-unstyled text-default ">
                <li>
                    <h5 class="text-primary">Contact Us</h5>
                </li>
                <li class="mb-3"><a class="text-reset" href="">lakshansandaruwan1998@gmail.com</a></li>
                <li class="mb-4"><a class="text-reset" href="">+94701549225</a></li>
                <li class="text-muted">coporated limited <i class="fas fa-copyright"></i></i>
                </li>

            </ul>
        </div>
        <div class="col-sm-2 text-left">
            <h6 class="mb-3 font-weight-bold text-uppercase text-primary">Products</h6>
            <ul class="list-unstyled text-muted ">
                <li class="mb-3"><a class="text-reset" href="">Style Guide</a></li>
                <li class="mb-3"><a class="text-reset" href="">Page Builder</a></li>
                <li class="mb-3"><a class="text-reset" href="">UI Kit</a></li>

                <li class="mb-3"><a class="text-reset" href=""></a>Docs</li>
            </ul>
        </div>
        <div class="col-sm-2 text-left">
            <h6 class="mb-3 font-weight-bold text-uppercase text-primary">Services</h6>
            <ul class="list-unstyled text-muted ">

                <li class="mb-3"><a class="text-reset" href="">UI Kit</a></li>
                <li class="mb-3"><a class="text-reset" href=""></a>Change Log</li>
                <li class="mb-3"><a class="text-reset" href="">Page Builder</a></li>
                <li class="mb-3"><a class="text-reset" href="">Documentation</a></li>

            </ul>
        </div>
        <div class="col-sm-2 text-left">
            <h6 class="mb-3 font-weight-bold text-uppercase text-primary">Legal</h6>
            <ul class="list-unstyled text-muted ">

                <li class="mb-3"><a class="text-reset" href="">Documentation</a></li>
                <li class="mb-3"><a class="text-reset" href=""></a>Change Log</li>
                <li class="mb-3"><a class="text-reset" href="">Page Builder</a></li>
            </ul>
        </div>


    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js" integrity="sha256-lPE3wjN2a7ABWHbGz7+MKBJaykyzqCbU96BJWjio86U=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TimelineMax.min.js" integrity="sha256-fIkQKQryItPqpaWZbtwG25Jp2p5ujqo/NwJrfqAB+Qk=" crossorigin="anonymous"></script>

    <script src="app.js"></script>



    <!-- jQuery -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>

    <script>

    </script>
</body>

</html>