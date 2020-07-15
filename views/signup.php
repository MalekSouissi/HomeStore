<?php
require_once('../models\UserModel.php');
$user = new USER();

if ($user->is_loggedin() != "") {
    $user->redirect('index.php');
}

if (isset($_POST['btn-signup'])) {
    $uname = strip_tags($_POST['name']);
    $umail = strip_tags($_POST['email']);
    $upass = strip_tags($_POST['password']);
    $uadress = strip_tags($_POST['adress']);

    if ($uname == "") {
        $error[] = "Provide name!";
    } else if ($umail == "") {
        $error[] = "Provide email!";
    } else if (!filter_var($umail, FILTER_VALIDATE_EMAIL)) {
        $error[] = 'Please enter a valid email address!';
    } else if ($upass == "") {
        $error[] = "Provide password!";
    } else if (strlen($upass) < 6) {
        $error[] = "Password must be atleast 6 characters!";
    } else if ($uadress == "") {
        $error[] = "Provide address!";
    } else if (strlen($uadress) < 6) {
        $error[] = "Enter validate adress";
    } else {
        try {
            $stmt = $user->runQuery("SELECT name, email FROM user WHERE name=:uname OR email=:umail");
            $stmt->execute(array(':uname' => $uname, ':umail' => $umail));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row['name'] == $uname) {
                $error[] = "Sorry name already taken!";
            } else if ($row['email'] == $umail) {
                $error[] = "Sorry email id already taken!";
            } else {
                if ($user->register($uname, $umail, $upass)) {
                    $user->redirect('login.php?joined');
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title> formulaire du Sign Up </title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="../css/signinstyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <section class="container-fluid bg">
        <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-3">
                <?php
                if (isset($error)) {
                    foreach ($error as $error) {
                        echo "<p class='error'> $error </p>";
                    }
                }
                ?>
                <form action="signup.php" method="post" class="form-container">
                    <div class="form-group">
                        <a href="index.php"> <i class="fa fa-arrow-left"></i> </a>
                    </div>
                    <div class="form-group">
                        <label for="fullname"> Your Full name </label>
                        <input type="text" class="form-control" id="fullname" aria-describedby="emailHelp" name="name">
                        <!--<p> <?php echo $errors['name']; ?> </p>-->
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="adress"> Your Adress </label>
                        <input type="text" class="form-control" id="adress" aria-describedby="emailHelp" name="adress">
                        <!--<p> <?php echo $errors['adress']; ?> </p>-->
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        <!--<p> <?php echo $errors['email']; ?> </p>-->
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">

                    </div>
                    <div class="form-group">
                        <label for="repassword"> Repeat password </label>
                        <input type="password" class="form-control" id="repassword" aria-describedby="emailHelp" name="repassword">

                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <input type="submit" name="btn-signup" value="submit" class="btn btn-dark">
                </form>
            </section>
        </section>
    </section>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>