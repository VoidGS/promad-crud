<?php
include_once '../includes/functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud - <?= $pageTitle ?></title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- Bootstrap -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.css" rel="stylesheet" />
    <!-- Style -->
    <link href="../styles/style.css" rel="stylesheet" />
</head>

<body>

    <?php
    if ($pageTitle != "Login") {
    ?>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-primary navbar-dark ">
            <!-- Container wrapper -->
            <div class="container mt-2 mb-2">

                <!-- Navbar brand -->
                <a class="navbar-brand" href="#"><strong>CRUD</strong></a>

                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <!-- Link -->
                        <li class="nav-item">
                            <a class="nav-link <?= $pageTitle == "Home" ? "active" : "" ?>" href="../public/index.php"><i class="fas fa-user"></i> &nbsp;Home</a>
                        </li>

                    </ul>

                    <!-- Icons -->
                    <ul class="navbar-nav d-flex flex-row me-1">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                <img src="<?= $_SESSION['pfp'] != "" ? "../../profilepics/" . $_SESSION['pfp'] : "../includes/images/user.png" ?>" class="rounded-circle text-white" style="width: 30px; height: 30px; object-fit: cover; object-position: center;" /> &nbsp;
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li>
                                    <a class="dropdown-item disabled text-wrap" href="#"><?= $_SESSION['name'] ?></a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="../includes/functions.php?logout"><i class="fas fa-sign-out-alt"></i> &nbsp;Logout</a>
                                </li>
                            </ul>
                        </li>

                    </ul>

                </div>
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->

        <img src="../includes/images/wave (1).svg" class="position-absolute" style="top: -2%; z-index: -1;" alt="">

    <?php
    }
    ?>