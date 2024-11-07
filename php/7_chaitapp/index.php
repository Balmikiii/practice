<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>
    <link rel="stylesheet" href="assets/css/style.css">
    <title>chaiting app</title>
</head>
<body>
    <?php 
        $alert = '';
        if(!empty($_GET['alert'])){
            if($_GET['alert']==1){
                $alert = '<h3 class="text-danger">wrong email and password</h3>';
            }else if($_GET['alert']==2){
                $alert = '<h3 class="text-danger">Exist email please login!</h3>';
            }else{
                $alert = '<h3 class="text-danger">Fill all inputs</h3>';
                $scritp = '<script>
                    document.querySelector(".login_form").style.display = "none";
                    document.querySelector(".signup_form").style.display = "block";
                    document.querySelector(".alert_msg").innerHTML = "";
                </script>';
            }
        }
    ?>
    <div class="container-fluid">
        <div class="container login_form text-decoration-none">
            <div class="row">
                <div class="col-sm-8 bg-light">
                    <div class="brand-logo ms-3 mt-3">
                        <a href="index.php" class="text-decoration-none text-dark"><h1>logo</h1></a>
                    </div>
                    <div class="container-fluid text-center p-5 pt-0">
                        <h2 class="text-success">Loge in chaiting app</h2>
                        <div class="social-icon text-decoration-none mt-3 mb-3 d-flex justify-content-evenly">
                            <a href="#" class="text-dark"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#" class="text-dark"><i class="fa-brands fa-google-plus-g"></i></a>
                            <a href="#" class="text-dark"><i class="fa-brands fa-linkedin-in"></i></a>
                        </div>
                        <form action="chat_app.php" class="form" method="post">
                            <input type="text" class="form-control" placeholder="Email" name="email" autocomplete="off">
                            <input type="password" class="form-control mt-3" placeholder="Password" name="pwd" autocomplete="off">
                            <div class="forgot mt-3 mb-3">
                                <span class="alert_msg"><?php echo $alert ;?></span>
                                <a href="#" class="text-decoration-none text-dark">Forgot your password</a>
                            </div>
                            <input type="submit" class="btn btn-success" name="logein" value="log in">
                        </form>
                    </div>
                    
                </div>
                <div class="col-sm-4 text-center bg-success p-5 text-light">
                    <div class="signup pt-5">
                        <h2 class="pt-5">Hello, Friend!</h2>
                        <p>Enter your personal details and start chaiting with your friends</p>
                        <input type="button" id="sign_btn" class="btn btn-outline-light" value="SIGN UP">
                    </div>
                </div>
            </div>
        </div>


        <div class="container signup_form text-decoration-none">
            <div class="row">
                <div class="col-sm-8 bg-success text-light">
                    <div class="brand-logo ms-3 mt-3">
                        <a href="index.php" class="text-decoration-none text-light"><h1>logo</h1></a>
                    </div>
                    <div class="container-fluid text-center p-5 pt-0">
                        <h2 class="text-light">Sign in chaiting app</h2>
                        <div class="social-icon text-decoration-none mt-3 mb-3 d-flex justify-content-evenly">
                            <a href="#" class="text-light"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#" class="text-light"><i class="fa-brands fa-google-plus-g"></i></a>
                            <a href="#" class="text-light"><i class="fa-brands fa-linkedin-in"></i></a>
                        </div>
                        <form action="chat_app.php" class="form" method="post" enctype="multipart/form-data">
                            <input type="text" class="form-control" placeholder="Enter your name" name="name" autocomplete="off">
                            <input type="text" class="form-control mt-3" placeholder="Email" name="email" autocomplete="off">
                            <input type="password" class="form-control mt-3 mb-3" placeholder="Password" name="pwd" autocomplete="off">
                            <input type="file" class="form-control mt-3 mb-3" name="file" autocomplete="off">
                            <span class="alert_msg"><?php echo $alert ;?></span>
                            <input type="submit" class="btn btn-outline-light" name="signup" value="Sign up">
                        </form>

                    </div>
                    
                </div>
                <div class="col-sm-4 text-center bg-light p-5 text-dark">
                    <div class="signup pt-5">
                        <h2 class="pt-5">Hello, Friend!</h2>
                        <p>Enter your personal details and start chaiting with your friends</p>
                        <input type="button" id="login_btn" class="btn btn-outline-success text-dark" value="Loge in">
                    </div>
                </div>
            </div>
        </div>


    </div>
    <script src="assets/js/main.js"></script>
    <?php 
        if(!empty($_GET['alert']) && $_GET['alert']==3){
            echo $scritp;

        }
    ?>
</body>
</html>