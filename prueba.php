<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
	<style>
		body {
			background-color: #ABA3A3;
		}
	</style>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                   <?php
                   require 'database.php';
				   
				   
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM menu WHERE idMenu = 1';
                   foreach ($pdo->query($sql) as $main) {
                            echo $main['idMenu'] . '--';
                            echo $main['italiano'] . '--';
							echo $main['english'] . '--';
							echo $main['polski'] . '--';
                            echo $main['francais'] . '--';
                            echo $main['idPage'] . '--';
                            echo $main['width'] . '--';
                            echo $main['priority'] . '--';
                            echo $main['idParentMenu'] . '--';
                            echo $main['idRule'];
                            echo '<br>';
                   }
                   $sql = 'SELECT * FROM menu  WHERE idParentMenu = 1 ORDER BY idMenu';
                   foreach ($pdo->query($sql) as $row) {
							
                        
                            echo $row['idMenu'] . '--';
                            echo $row['italiano'] . '--';
							echo $row['english'] . '--';
							echo $row['polski'] . '--';
                            echo $row['francais'] . '--';
                            echo $row['idPage'] . '--';
                            echo $row['width'] . '--';
                            echo $row['priority'] . '--';
                            echo $row['idParentMenu'] . '--';
                            echo $row['idRule'];
							echo '|<br>';
                            echo '|<br>';
                            echo '|<br>';
                            echo '|<br>';
							
                         //De momento muestra Todos los hijos de 1 y los hijos de sus hijos..
                            $sql = 'SELECT * FROM menu  Where idParentMenu = '. $row['idMenu'];
							
                            foreach ($pdo->query($sql) as $parent) {
                              
                            echo '<br>' ;   
                            echo $parent['idMenu'] . '--';
                            echo $parent['italiano'] . '--';
							echo $parent['english'] . '--';
							echo $parent['polski'] . '--';
                            echo $parent['francais'] . '--';
                            echo $parent['idPage'] . '--';
                            echo $parent['width'] . '--';
                            echo $parent['priority'] . '--';
                            echo $parent['idParentMenu'] . '--';
                            echo $parent['idRule'];
                            
                            echo '<br>';

                            echo '___________________________________________________________________';
                            
                             }
                             echo'<br><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><br>';
                             
							?>
		
        

        
                            
							<?php
							
                    }
                   Database::disconnect();
                  ?>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>