<html>
    <head>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/style.css"/>

    <script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">Social Netowrk</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                </button>
            
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">

                <li class="nav-item active">   
                <a class= "nav-link" href=""> <?php echo $viewData['user'];?></a>
                </li>

                <li class="nav-item">
                <a class= "nav-link" href="<?php echo BASE.'login/logout';?>">logout</a>                
                </li>
               
                </ul>
            </div>
            </div>
        </nav>

        <div class="container">
            <?php $this->loadViewInTemplate($viewName, $viewData); ?>
            
        </div>
      
  
    </body>

</html>


