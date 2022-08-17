<?php
session_start();

if (isset($_SESSION["login_user"])) {
    header("Location: home.php");
}

include './incl/header.php';
// include './process.php';
?>

<html>

<head>
    <title>Login page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Sign in</h3>
                            <form name="add" method="POST" autocomplete="off">

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="typeEmailX-2">Email</label>
                                    <input type="email" id="typeEmailX-2" name="email" class="form-control form-control-lg" autocomplete="off" />

                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="typePasswordX-2">Password</label>
                                    <input type="password" id="typePasswordX-2" name="password" class="form-control form-control-lg" autocomplete="off" />

                                </div>

                                <button class="btn btn-primary btn-lg btn-block" name="Login" type="submit">Login</button>
                            </form>
                            <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p>
                            <p>Don't have an account? <a href="./register.php" class="link-info">Register here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
include './db_connection.php';


if (isset($_POST['Login'])) {

    // get the post records
    $email = $_POST['email'];
    $password = $_POST['password'];

    $ref_table = "Users";
    $results = $database->getReference($ref_table)->push($postData);


    if ($results) {
        $_SESSION['status'] = "User added successfully";
        header('Location: home.php');
    } else {
        $_SESSION['status'] = "User not added";
        header('Location: index.php');
    }
}

include './incl/footer.php';
?>