<?php

session_start();

if (!isset($_SESSION["username"])) {
    $_SESSION["msg"] = "You need to sign in";

    header("location: adminlogin.php");
}



if ($_GET["logout"]) {
    session_destroy();
    unset($_SESSION["username"]);
    header("location: adminlogin.php");
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


    <!-- jQuery -->
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../js/mdb.min.js"></script>


    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="../css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/dash.css">
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
                    <a href="dashboard.php?logout='1'" role="button" class="btn btn-dark btn-lg"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>

            </div>
        </div>

        <nav class="mb-1 navbar navbar-expand-lg navbar-dark indigo fixed-top scrolling-navbar">
            <a class="navbar-brand" href="#"><i class="fab fa-houzz"> </i>Welcome ADMIN
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
                        <li class="nav-item">
                            <a class="nav-link" href="#flexex">Features</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Rules</a>
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

    <div role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-autohide="false" style="position: fixed;bottom: 5px;left: 20px; z-index: 7;">
        <div class="toast-header">
            <svg class=" rounded mr-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                <rect fill="#007aff" width="100%" height="100%" /></svg>
            <strong class="mr-auto">Card id - <?php echo ($_GET["di"]) ?> </strong>

            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            Card Deleted successfully
        </div>
    </div>




    <?php
    $db = mysqli_connect("localhost", "root", "", "phpvoteapp") or die("could not connect to database");
    //?for update votelist records
    if (isset($_POST["editbtnf"])) {

        $id = mysqli_real_escape_string($db, $_POST["hiddeninputid"]);
        $nm = mysqli_real_escape_string($db, $_POST["namepop"]);
        $img = mysqli_real_escape_string($db, $_POST["imgpop"]);
        $dis = mysqli_real_escape_string($db, $_POST["dispop"]);
        $q_edit = "UPDATE votecards SET name = '$nm', img = '$img', discription='$dis' WHERE id='$id'";
        mysqli_query($db, $q_edit);
    }
    //?for add new votelist records
    if (isset($_POST["addbtnf"])) {
        $nm = mysqli_real_escape_string($db, $_POST["namepop"]);
        $img = mysqli_real_escape_string($db, $_POST["imgpop"]);
        $dis = mysqli_real_escape_string($db, $_POST["dispop"]);
        $q_add = "INSERT INTO votecards (name,img,discription,numofvotes) VALUES ('$nm','$img','$dis','0')";

        mysqli_query($db, $q_add);
    }
    //?for delete votelist records
    if ($_GET["di"]) {
        $delete_id = $_GET["di"];
        $q_delete = "DELETE FROM votecards WHERE id='$delete_id'";
        mysqli_query($db, $q_delete) or die("could not delete from database");
        echo "<script>
              $('.toast').toast('show');
              </script>";

        unset($_GET["di"]);
    }




    $query = "SELECT * FROM votecards";

    $result = mysqli_query($db, $query);

    ?>
    <div id="card-section" style="margin-top: 2cm;">
        <h1 class="text-center font-weight-bolder">VOTE LIST</h1>
        <div class="cards-con">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {

            ?>
                <!-- Card -->
                <div class="card" id="card<?php echo ($row["id"]);  ?>">

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
                        <h4 id="card-titleid" class="card-title"><?php echo ($row["name"]); ?>
                        </h4>
                        <!-- Text -->
                        <p class="card-text"><?php echo ($row["discription"]) ?></p>
                        <!-- Button -->

                        <button id="<?php echo ($row["id"]); ?>" onclick="showform(this.id)" name="editbtn" class="btn btn-success">Edit</button>
                        <a href="dashboard.php?di=<?php echo ($row["id"]); ?>" id="<?php echo ($row["id"]); ?>ll" name="deletebtn" class="btn btn-danger">delete</a>

                    </div>

                </div><!-- Card -->
            <?php } ?>

            <!--Add new Card -->
            <div class="card">

                <!-- Card image -->
                <div class="view overlay" style="height: 30vh;">
                    <img class="card-img-top" src="../img/add.png" alt="Card image cap">
                    <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

                <!-- Card content -->
                <div class="card-body">
                    <!-- Title -->
                    <h2 class="card-title">Add new vote applicant</h2>
                    <!-- Button -->
                    <button id="add" onclick="showform(this.id)" name="addbtn" class="btn btn-success">Add</button>
                </div>
            </div>
            <!--Add new Card -->


        </div>
    </div>

    <div class="popup-form shadow-lg">
        <!-- Default form contact -->

        <form class="text-center border border-light p-5" method="POST" action="<?php echo ($_SERVER["PHP_SELF"]) ?>">

            <p class="h4 mb-4">Contact us</p>

            <!-- Name -->
            <input type="text" id="namepop" name="namepop" class="form-control mb-4" placeholder="Name" required>

            <!-- Email -->
            <input type="text" id="imgpop" name="imgpop" class="form-control mb-4" placeholder="Image URL" required>
            <input type="text" id="hiddeninput" name="hiddeninputid" style="display: none" placeholder="fuckin id" required>

            <!-- Subject -->
            <label>Subject</label>

            <!-- Message -->
            <div class="form-group">
                <textarea class="form-control rounded-0" name="dispop" id="dispop" rows="3" placeholder="Discription" required></textarea>
            </div>



            <!-- ADD button -->
            <button type="submit" name="addbtnf" class="btn btn-success btn-block" id="popupformbtn">ADD</button>

        </form>
        <!-- Default form contact -->
    </div>



    <div class="vote-list-con">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>

    </div>

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
    <script>
        ///! shomform func ----------------------------------------------------------------------------
        function showform(id) {
            // console.log("card clicked");
            // console.log("card" + id);
            const popupform = document.querySelector(".popup-form");
            const popupform_title = popupform.querySelector("p");
            const popupform_btn = document.querySelector("#popupformbtn");
            const popupform_hiddeninput = popupform.querySelector("#hiddeninput");

            if (id != "add") {

                const card = document.getElementById("card" + id);
                const card_title = card.querySelector(".card-title");
                const card_img = card.querySelector(".card-img-top");
                const card_discription = card.querySelector(".card-text");

                const popupform_name = popupform.querySelector("#namepop");
                const popupform_img = popupform.querySelector("#imgpop");
                const popupform_dis = popupform.querySelector("#dispop");


                popupform_title.textContent = card_title.textContent;
                popupform_btn.name = "editbtnf";

                popupform_name.value = card_title.textContent;
                popupform_img.value = card_img.src;
                popupform_dis.value = card_discription.textContent;



            } else {
                popupform_title.textContent = "Add New Record";
                popupform_btn.name = "addbtnf";
                popupform_hiddeninput.value = "id";
            }



            // popupform.style.display = "block";
            popupform.classList.add("open");
        }
    </script>
    <script src="app.js"></script>




</body>


</html>