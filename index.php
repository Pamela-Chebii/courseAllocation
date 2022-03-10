
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
<body class="bg-success">

<div class="container p-4">
    <div class="row">
        <div class="col-md-12">
    <div class="card text-center">
        <div class="card-body">
            <h5 class="card-title grey ">SCIT COURSE ALLOCATION SYSTEM</h5>
            <div class="row">
                <div class="col-lg-5">
                    <div>
                        <img class="rounded" src="Images/tuk.png" alt="Loading" width="400" height="350">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="text-center">
                        <h4 class="grey"></h4>
                    </div>
                    <form action="handle_login.php" method="post">
                        <div class="row mb-3">
                            <div>
                                <label>UserName/ Email Address </label>
                                <input class="form-control rounded-pill" type="email" name="emailAddress">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div>
                                <label>Password</label>
                                <input class="form-control rounded-pill" type="password" name="password">
                            </div>
                        </div>

                        <div class="row mt-md-4">
                            <input type="submit" name="login" class="rounded-pill btn btn-success" value="Login">
                        </div>

                    </form>


                </div>
            </div>

        </div>
    </div>
        </div>
    </div>
</div>

</div>

</body>
</html>
