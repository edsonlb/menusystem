<!DOCTYPE html>
<html lang="en">



<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Menu System</title>
    <link rel="shortcut icon" href="favicon.ico" >
    <link rel="icon" type="image/gif" href="animated_favicon1.gif" >

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- Theme CSS -->
    <link href="css/grayscale.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>



<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

	
    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <i class="fa fa-play-circle"></i> <span class="light">Menu</span> System
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#menu">Menu</a>
                    </li>
                   <!-- <li>
                        <a class="page-scroll" href="#pages">Pages</a>
                    </li>
                    -->
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading">Menu System</h1>
                        <p class="intro-text">A Menu System interface, as a test.
                            <br>Template created by Start Bootstrap.</p>
                        <a href="#menu" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="menu" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Table Menu</h2>
				<p> <a href="create.php" class="btn btn-success">Add</a><font></font> <p/>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Id Menu</th>
                      <th>Italiano</th>
					  <th>English</th>
					  <th>Polski</th>
                      <th>Francais</th>
                      <th>Id Page</th>
					  <th>Width</th>
					  <th>Priority</th>
                      <th>Id Parent Menu</th>
					  <th>Id Rule</th>
					  <th>Action</th> <!-- Esto lo he añadido tambien, es en la cabecera unicamente texto -->
                    </tr>
                  </thead>
                   <tbody>
				   
                  <?php
                   require 'database.php';
				   
				   
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM menu  ORDER BY idMenu';
                   foreach ($pdo->query($sql) as $row) {
							
                            echo '<tr>';
                            echo '<td>'. $row['idMenu'] . '</td>';
                            echo '<td>'. $row['italiano'] . '</td>';
							echo '<td>'. $row['english'] . '</td>';
							echo '<td>'. $row['polski'] . '</td>';
                            echo '<td>'. $row['francais'] . '</td>';
                            echo '<td>'. $row['idPage'] . '</td>';
                            echo '<td>'. $row['width'] . '</td>';
                            echo '<td>'. $row['priority'] . '</td>';
                            echo '<td>'. $row['idParentMenu'] . '</td>';
                            echo '<td>'. $row['idRule'] . '</td>';
							echo '<td width=250>';
							
                                //echo '<a class="btn" href="read.php?id='.$row['Title'].'">Read</a>';
								//echo '<a data-toggle="modal"  href="#read'. $row['idMenu'].'" class="btn btn-primary btn">Read</a>';
                               // UPDATE BUTTON echo '<a class="btn btn-success" href="update.php?id='.$row['idMenu'].'">Update</a>';
								//<a href="#" data-reveal-id="myModal">Abrir la ventana modal</a>
                                
                                echo ' ';
                                echo '<p><a class="btn btn-success" href="update.php?id='.$row['idMenu'].'">Update</a></p>';
                                echo ' ';
                                //Its not necesary for the momment//echo '<a class="btn btn-primary btn" href="delete.php?id='.$row['idMenu'].'">Read</a>';
                                
                                echo '</td>';
								
                            echo '</tr>';
							
							?>
		
        

        
                            
							<?php
							
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
                 
            </table>      
            </div>
        </div>
    </section>

   

    <!-- Contact Section -->
    <section id="contact" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Contact Github jonaymunoz</h2>
                <!--<p>Feel free to email us to provide some feedback on our templates, give us suggestions for new templates and themes, or to just say hello!</p>
                <p><a href="mailto:feedback@startbootstrap.com">feedback@startbootstrap.com</a>
                </p>
                -->
                <ul class="list-inline banner-social-buttons">
                    <!--
                        <li>
                        <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                    </li>
                    -->
                    <li>
                        <a href="https://github.com/jonaymunoz/MenuControlSystem" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                    </li>
                    <!--
                    <li>
                        <a href="https://plus.google.com/+Startbootstrap/posts" class="btn btn-default btn-lg"><i class="fa fa-google-plus fa-fw"></i> <span class="network-name">Google+</span></a>
                    </li>
                    -->
                </ul>
            </div>
        </div>
    </section>

    <!-- Map Section 
    <div id="map"></div>
    -->
    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>Copyright &copy; menusystem 2017</p>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>
    -->
    <!-- Theme JavaScript -->
    <script src="js/grayscale.min.js"></script>

</body>

</html>
