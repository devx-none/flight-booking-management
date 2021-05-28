<?php
include './controllers/utilisateurController.php';
if(isset($_POST['submit'])){
    $newUser = new userController();
    $newUser->addUser();
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>singup</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="./assets/css/styles.min.css">
</head>

<body>
    <!-- Start: Registration Form with Photo -->
    <div class="register-photo">
        <!-- Start: Form Container -->
        <div class="form-container">
            <!-- Start: Image -->
            <div class="image-holder"></div>
            <!-- End: Image -->
            <form method="post">
                <h2 class="text-center"><strong>Register</strong> </h2>
                <div class="form-group"><input class="form-control" type="text" name="nom" placeholder="Nom"></div>
                <div class="form-group"><input class="form-control" type="text" name="prenom" placeholder="Prenom"></div>
                <div class="form-group"><input class="form-control" type="date" name="date_naissance" ></div>
                <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
                <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
                
                <div class="form-group">
                   
                </div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="submit">Sign Up</button></div><a class="already" href="login">You already have an account? Login here.</a></form>
        </div>
        <!-- End: Form Container -->
    </div>
    <!-- End: Registration Form with Photo -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>