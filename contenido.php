<?php
session_start();
if (!isset($_SESSION['Usuario'])){header("location:/index");}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Gráficas amcharts 5</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />    
        
   
  <!-- gráfica 1,2,3-->   
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

   <!-- gráfica 1,2,3-->   
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script> 
      <!-- gráfica 4--> 
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/plugins/exporting.js"></script>

         <!-- gráfica 4--> 
        
        
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
          <link href="css/charts.css" rel="stylesheet" />
        
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none">TESI</span>
                <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="assets/img/profile.jpg" alt="..." /></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#donut">Donut with Radial Gradient</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#semi">Semi-Circle Pie Chart</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#labels">Pie of a Pie (Exploding Pie Chart)</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#country">Curved Columns</a></li>
                    <hr>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="close/close">Salir..</a></li>
                    <hr>
                </ul>
            </div>
        </nav>
        <!-- Page Content-->
        <div class="container-fluid p-0">
            <!-- About-->
            <section class="resume-section" id="about">
                <div class="resume-section-content">
                    <h1 class="mb-0">
                       Bienvenido
                        <span class="text-primary"><?php echo $_SESSION['Usuario'] ?></span>
                    </h1>
                    <div class="subheading mb-5">
                        3542 Berry Street · Cheyenne Wells, CO 80810 · (317) 585-8468 ·
                        <a href="mailto:name@email.com">kevin@tesi.com</a>
                    </div>
                    <p class="lead mb-5">amCharts 5: Charts
Insanely flexible, blindingly fast, a new kind of data-viz
amCharts 5 is the newest go-to library for data visualization. When you don’t have time to learn new technologies. When you need a simple yet powerful and flexible drop-in data visualization solution, backed with detailed docs and seriously efficient support.</p>
                    <div class="social-icons">
                        <a class="social-icon" href="#!"><i class="fab fa-linkedin-in"></i></a>
                      
                    </div>
                </div>
            </section>
            <?php include_once("charts/charts.php"); ?>
            <hr class="m-0" />
            <!-- donut-->
            <section class="resume-section" id="donut">
                <div class="resume-section-content">
                    <h2 class="mb-5">Donut with Radial Gradient</h2>
                    <div class="d-flex flex-column flex-md-row justify-content-between">
                       <div id="chartdiv"></div>
                    </div>
                </div>
            </section>
            <hr class="m-0" />
            <!-- semi-->
            <section class="resume-section" id="semi">
                <div class="resume-section-content">
                    <h2 class="mb-5">Semi-Circle Pie Chart</h2>
                   
                    <div class="d-flex flex-column flex-md-row justify-content-between">
                          <div id="chartdiv2"></div>
                       
                    </div>
                </div>
            </section>
            <hr class="m-0" />
            <!-- labels-->
            <section class="resume-section" id="labels">
                   <div class="resume-section-content">
                    <h2 class="mb-5">Pie of a Pie (Exploding Pie Chart)</h2>
                 <div id="chartdiv3"></div>
                </div>
                
            </section>
            <hr class="m-0" />
            <!-- country-->
            <section class="resume-section" id="country">
                <div class="resume-section-content">
                    <h2 class="mb-5">Curved Columns</h2>
                   
                    
                     <div id="chartdiv4"></div>
                    
                </div>
            </section>
          
         
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        
  <!-- charts-->      

 
        
    </body>
</html>

