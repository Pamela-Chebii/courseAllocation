<?php
$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Course Allocation</title>
    <link rel="stylesheet" href="CSS/dashstyle.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="JS/popper.min.js"></script>
    <script src="JS/jquery.min.js"></script>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="CSS/dashstyle.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="JS/popper.min.js"></script>
    <script src="JS/jquery.min.js"></script>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-3 bg-success">
            <ul class="nav flex-column">
                <li class="nav-item stylenav ">
                    <a aria-current="page" class="nav-link active" href="#">
                        <i class="fa fa-university fa-2x text-white "></i>
                        <span class="h4 text-white">SCIT Course Allocation  </span>
                    </a>
                </li>
                <hr>

                <li class="nav-item stylenav">
                    <a class="nav-link" href="dashboard.php">
                        <i class="fa fa-dashboard fa-lg text-white"></i>
                        <span class="text-white">Dashboard</span>

                    </a>
                </li>
                <hr>
                <li class="nav-item stylenav">
                    <a class="nav-link" href="staff.php">
                        <i class="fa fa-users fa-lg text-white"></i>
                        <span class="text-white">Lecturers</span>


                    </a>
                </li>
                <li class="nav-item stylenav">
                    <a class="nav-link" href="academicPrograms.php">
                        <i class="fa fa-mortar-board fa-lg text-white"></i>
                        <span class="text-white">Academic Program Type</span>

                    </a>
                </li>
                <hr>
                <li class="nav-item stylenav">
                    <a class="nav-link" href="program.php">
                        <i class="fa fa-book fa-lg text-white"></i>
                        <span class="text-white">Programs</span>
                    </a>
                </li>
                <li class="nav-item stylenav">
                    <a class="nav-link" href="cohort.php">
                        <i class="fa fa-address-card-o fa-lg text-white"></i>
                        <span class="text-white">Cohorts</span>
                    </a>
                </li>
                <hr>
                <li class="nav-item stylenav">
                    <a class="nav-link" href="unit.php">
                        <i class="fa fa-clone fa-lg text-white"></i>
                        <span class="text-white">Units</span>
                    </a>
                </li>
                <li class="nav-item stylenav">
                    <a class="nav-link" href="transaction.php">
                        <i class="fa fa-tasks fa-lg text-white"></i>
                        <span class="text-white">Allocate Unit</span>
                    </a>
                </li>
                <hr>
                <li class="nav-item stylenav">
                    <a class="nav-link" href="reset.php">
                        <i class="fa fa-key fa-lg text-white"></i>
                        <span class="text-white">Reset Password</span>
                    </a>
                </li>
                <li class="nav-item stylenav">
                    <a class="nav-link" href="logout.php">
                        <i class="fa fa-mail-forward fa-lg text-white"></i>
                        <span class="text-white">Logout</span>

                    </a>

                </li>
            </ul>

        </div>

        <div class="col-9 bg-light">
            <div class="row bg-white">

                <div class="col-7">
                    <nav class="navbar navbar-light">
                        <div class="container-fluid">
                            <form class="d-flex">
                                <input class="col-8 form-control me-2" type="search" placeholder="Search for ... " aria-label="Search">
                                <button class="btn btn-outline-warning text-success" type="submit">Search</button>
                            </form>
                        </div>
                    </nav>

                </div>
                <div class="col-5">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <i class="fa fa-bell fa-lg"></i>
                                            <span class="badge rounded-pill bg-success text-warning">3+</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" >
                                            <i class="fa fa-envelope fa-lg"></i>
                                            <span class="badge rounded-pill bg-success text-warning">8+</span>
                                        </a>

                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">

                                            <?php echo $username; ?> |

                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#">
                                            <i class="fa fa-user-circle-o fa-2x p-2 text-success"></i>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </nav>


                </div>


            </div>

</body>
</html>

