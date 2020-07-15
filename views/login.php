<?php

require_once('..\models/UserModel.php');
$login = new USER();

if ($login->is_loggedin() != "") {
    $login->redirect('index.php');
}

if (isset($_POST['btn-login'])) {
    $uname = strip_tags($_POST['name']);
    $upass = strip_tags($_POST['password']);

    if ($login->doLogin($uname, $upass)) {
        $login->redirect('index.php');
    } else {
        $error = "Wrong Details!";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title> formulaire du Log In </title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="../css/formstyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

    <section class="container-fluid bg">
        <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-3">
                <form action="#" method="POST" class="form-container">
                    <div class="form-group">
                        <a href="index.php"> <i class="fa fa-arrow-left"></i></a>
                    </div>
                    <div class="form-group">
                        <label for="username">User name</label>
                        <input type="text" class="form-control" id="username" aria-describedby="emailHelp" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                        <a href=""> <small id="emailHelp" class="form-text text-muted"> I forgot my password </small> </a>
                    </div>
                    <input type="submit" value="submit" name="btn-login" class="btn btn-dark">
                </form>
            </section>
        </section>
    </section>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>