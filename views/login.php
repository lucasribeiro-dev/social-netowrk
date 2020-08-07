<!-- Layout -->
<html>
    <head>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/login_register.css"/>

    <script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>

    </head>

    <body>
        <div class="container">
        <div class="row" style="display: flex; padding-top: 15%;">
        <div class="col-lg-10 col-xl-9 mx-auto">
            <div class="card card-signin flex-row my-5">
            <div class="card-img-left d-none d-md-flex">
                <!-- Background image for card set in CSS! -->
            </div>
            <div class="card-body">
                <h5 class="card-title text-center">Login</h5>
                <form class="form-signin" method="POST">
                
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="example@gmail.com" name="email"required>
                </div>
                
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div>

                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Login</button>
                <br/>
                <div class="form-group text-center">
                    <a href="<?php echo BASE."register";?>" >Register</a>
                    <br/>
                </div>
                <?php
                if(!empty($warning)){
                    echo "<b>".$warning."</b>";
                }
                ?>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
    
    </body>

</html>