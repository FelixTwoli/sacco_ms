<?php
session_start();

if (isset($_SESSION["login_user"])) {
    header("Location: home.php");
}

// include('process.php');
include './incl/header.php';
?>


<html>

<head>
    <title>Signup Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="./css/styles.css">
</head>


<body>
    <fieldset>
        <form name="register" method="POST">
            <section class="vh-100 bg-image">
                <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                    <div class="container h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                                <div class="card" style="border-radius: 15px;">
                                    <div class="card-body p-5">
                                        <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                                        <form>

                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form3Example1cg">Username</label>
                                                <input type="text" name="username" id="username" value="" placeholder="Enter your username" class="form-control form-control-lg" required="true" />

                                            </div>

                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form3Example3cg">Your Email</label>
                                                <input type="email" name="email" id="email" placeholder="Enter your email" class="form-control form-control-lg" required="true" />

                                            </div>

                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form3Example4cg">Password</label>
                                                <input type="password" name="password" placeholder="Enter your password" class="form-control form-control-lg" required="true" password? />

                                            </div>

                                            <div class="d-flex justify-content-center">
                                                <input type="hidden" name="usertype" value="admin">

                                                <input type="submit" name="Submit" id="Submit" value="Submit">
                                            </div>


                                            <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="./login.php" class="fw-bold text-body"><u>Login here</u></a></p>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </fieldset>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="jquery-3.2.1.min.js"></script>
    <script src="index.js"></script>

</body>

</html>


<?php
// database connection cod

include_once('./db_connection.php');

if ((isset($_POST['username']) && $_POST['username'] != '') && (isset($_POST['email']) && $_POST['email'] != '')) {

    $username = ($_POST['username']);
    $email = ($_POST['email']);
    $password = ($_POST['password']);
    $encrypted_password = md5($password);

    $postData = [
        'user_name' => $username,
        'email' => $email,
        'password' => $encrypted_password,

    ];

    $ref_table = "Users";
    $results = $database->getReference($ref_table)->push($postData);


    if ($results) {
        $_SESSION['status'] = "User added successfully";
        header('Location: index.php');
    } else {
        $_SESSION['status'] = "User not added";
        header('Location: index.php');
    }
}


include './incl/footer.php';
