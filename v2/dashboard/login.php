<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-login">



    <section class="vh-100">
        <div class="container-fluid h-100 px-0">
            <div class="row h-100">
                <div class="col-sm-6 d-flex flex-column justify-content-center">


                    <div class="d-flex justify-content-center px-5 mt-5">
                        <form class="user" id="loginForm" method="POST" style="width: 23rem;">
                            <div class="mb-5">
                                <img src="../assets/img/logo.svg" alt="">
                            </div>
                            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>

                            <div class="form-floating mb-4">
                                <input type="email" class="form-control" id="correo" name="correo" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>

                            <div class="form-floating mb-4">
                                <input type="password" class="form-control"  id="pass" name="pass" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>

                            <div class="pt-1 mb-4">
                                <button class="btn btn-info btn-lg w-100 btn-login" type="submit">Login</button>
                            </div>

                            <p class="small mb-5 pb-lg-2">
                                <a class="text-muted" href="#!">Forgot password?</a>
                            </p>
                        </form>
                    </div>
                </div>

                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="../assets/img/banner_login.png"
                        alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.min.js"></script>

    <script src="js/login/access.js"></script>

</body>

</html>