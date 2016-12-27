<?php 
$id = $_GET['id'];
require_once('idiorm-master/idiorm.php');

ORM::configure("mysql:host=localhost;dbname=projet;charset=utf8");
ORM::configure("username", "root");
ORM::configure("password", "brucemax67");
$season = ORM::for_table('seasons')->find_one($id);


$episodes = ORM::for_table('seasonsepisodes')->where('season_id', $id)->find_array();
$episodesNames = array();
foreach($episodes as $episode){
   array_push($episodesNames, ORM::for_table('episodes')->find_one($episode['episode_id']));
}
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

        <title>SOLID - Bootstrap 3 Theme</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/font-awesome.min.css" rel="stylesheet">


        <!-- Just for debugging purposes. Don't actually copy this line! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

        <script src="assets/js/modernizr.js"></script>
    </head>

    <body>

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
                <!--/.nav-collapse -->
            </div>
        </div>

        <!-- *****************************************************************************************************************
	 BLUE WRAP
	 ***************************************************************************************************************** -->
        <div id="blue">
            <div class="container">
                <div class="row">
                    <h3><?php echo $season['name'] ?></h3>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /blue -->


        <!-- *****************************************************************************************************************
	 PORTFOLIO SECTION
	 ***************************************************************************************************************** -->
        <div id="portfoliowrap">
            <div class="portfolio-centered">
                <h3>Episodes</h3>
                <div class="recentitems portfolio">

                    <?php 
                   foreach($episodesNames as $episode){
                    echo '<div class="portfolio-item graphic-design">
                        <div class="he-wrap tpl6">
                            <img src="https://image.tmdb.org/t/p/w500/'.$episode['still_path'].'" alt="">
                            <div class="he-view">
                                <div class="bg a0" data-animate="fadeIn">
                                    <h3 class="a1" data-animate="fadeInDown">'.$episode['name'].'</h3>
                                    <a href="episode.php?id='.$episode['id'] .'" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-link"></i></a>
                                </div>
                                <!-- he bg -->
                            </div>
                            <!-- he view -->
                        </div>
                        <!-- he wrap -->
                    </div>';   
                   }
                    

?>


                </div>
                <!-- portfolio -->
            </div>
            <!-- portfolio container -->
        </div>
        <!--/Portfoliowrap -->



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


        <script>
            // Portfolio
            (function ($) {
                "use strict";
                var $container = $('.portfolio'),
                    $items = $container.find('.portfolio-item'),
                    portfolioLayout = 'fitRows';

                if ($container.hasClass('portfolio-centered')) {
                    portfolioLayout = 'masonry';
                }

                $container.isotope({
                    filter: '*',
                    animationEngine: 'best-available',
                    layoutMode: portfolioLayout,
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false
                    },
                    masonry: {}
                }, refreshWaypoints());

                function refreshWaypoints() {
                    setTimeout(function () {}, 1000);
                }

                $('nav.portfolio-filter ul a').on('click', function () {
                    var selector = $(this).attr('data-filter');
                    $container.isotope({
                        filter: selector
                    }, refreshWaypoints());
                    $('nav.portfolio-filter ul a').removeClass('active');
                    $(this).addClass('active');
                    return false;
                });

                function getColumnNumber() {
                    var winWidth = $(window).width(),
                        columnNumber = 1;

                    if (winWidth > 1200) {
                        columnNumber = 5;
                    } else if (winWidth > 950) {
                        columnNumber = 4;
                    } else if (winWidth > 600) {
                        columnNumber = 3;
                    } else if (winWidth > 400) {
                        columnNumber = 2;
                    } else if (winWidth > 250) {
                        columnNumber = 1;
                    }
                    return columnNumber;
                }

                function setColumns() {
                    var winWidth = $(window).width(),
                        columnNumber = getColumnNumber(),
                        itemWidth = Math.floor(winWidth / columnNumber);

                    $container.find('.portfolio-item').each(function () {
                        $(this).css({
                            width: itemWidth + 'px'
                        });
                    });
                }

                function setPortfolio() {
                    setColumns();
                    $container.isotope('reLayout');
                }

                $container.imagesLoaded(function () {
                    setPortfolio();
                });

                $(window).on('resize', function () {
                    setPortfolio();
                });
            })(jQuery);
        </script>
    </body>

    </html>