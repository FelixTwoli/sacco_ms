<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/styles.css">
        <title>Home Page</title>
    </head>
    <body>
        <?php
            echo "<p>Hello World!</p>";
        ?>
        <nav class="navbar navbar-expand-lg fixed-top bg-primary">  
            <a class="navbar-brand active" href="./" aria-activedescendant>Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">  
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent"><ul class="navbar-nav mr-4">
            <li class="nav-item">
                <a class="nav-link text-lg" data-value="about" id="about" href="./about.php">About</a></li>  
            
            <li class="nav-item"> 
                <a class="nav-link text-lg" data-value="posts" id="posts" href="#">Posts</a></li>   
            <li class="nav-item">  
                <button class="btn btn-outline-secondary btn-lg"><a class="sign-up" data-value="sign-up" id="sign-up" href="register.php">Sign up</a></li> </button>
            <li class="nav-item"> 
                <button class="btn btn-outline-secondary btn-lg"><a class="login" data-value="login" id="login" href="./login.php">Login</a></li> </button>
            </ul> 
            </div>
        </nav>

        