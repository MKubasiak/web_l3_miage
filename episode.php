<?php 
$id = $_GET['id'];
require_once('idiorm-master/idiorm.php');
include('db.php');

$episode = getEpisode($id);
$actorsNames = getActors($id);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="assets/ico/favicon.ico">

        <title>Recommendation de séries</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/font-awesome.min.css" rel="stylesheet">


        <script src="assets/js/modernizr.js"></script>
    </head>

    <body>
        <!-- Fixed navbar -->
        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">HOME</a>
                </div>
                <div class="col-lg-8">
                    <form action="search.php" method="post">
                        <input id="searchbar" type="text" class="form-control" name="searchbar" placeholder="Recherche...">
                    </form>
                </div>
                <!--/.nav-collapse -->
            </div>

        </div>

        <!-- *****************************************************************************************************************
	 BLUE WRAP
	 ***************************************************************************************************************** -->
        <div id="blue">
            <div class="container">
                <div class="row">
                    <h3><?php echo $episode['name']?></h3>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /blue -->


        <!-- *****************************************************************************************************************
	 AGENCY ABOUT
	 ***************************************************************************************************************** -->

        <div class="container mtb">
            <div class="row">
                <div class="col-lg-6">
                    <img class="img-responsive" src="https://image.tmdb.org/t/p/w500/<?php echo $episode['still_path'] ?>" alt="">
                </div>

                <div class="col-lg-6">
                    <p>
                        <?php echo $episode['overview'] ?>
                    </p>
                    <div class="">
                        <div class="spacing"></div>
                        <div class="hline"></div>
                        <p><b>Première diffusion: </b>
                            <?php echo $episode['air_date'] ?>
                        </p>
                        <p><b>Acteurs: </b>
                            <?php
                                foreach($actorsNames as $actor){   
                                    echo $actor['name'] . " / ";
                                }
                            ?>
                        </p>
                    </div>
                </div>
            </div>


            <! --/row -->
        </div>
        <! --/container -->

        <!-- *****************************************************************************************************************
	 FOOTER
	 ***************************************************************************************************************** -->
        <div id="footerwrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <h4>About</h4>
                        <div class="hline-w"></div>
                        <p>Projet web, recommandation de séries.</p>
                    </div>
                </div>
                <! --/row -->
            </div>
            <! --/container -->
        </div>
        <! --/footerwrap -->

        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/retina-1.1.0.js"></script>
        <script src="assets/js/jquery.hoverdir.js"></script>
        <script src="assets/js/jquery.hoverex.min.js"></script>
        <script src="assets/js/jquery.prettyPhoto.js"></script>
        <script src="assets/js/jquery.isotope.min.js"></script>
        <script src="assets/js/custom.js"></script>


    </body>

    </html>