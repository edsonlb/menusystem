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
				   echo '<h2> MAIN MENU </h2>';
				    
                   $pdo = Database::connect();
                   echo '<table class="table table-bordered">';
                   echo '<tr>';
                   $sql = 'SELECT * FROM menu  WHERE idParentMenu = 1 ORDER BY idMenu';
                   foreach ($pdo->query($sql) as $row) {
							
                        
                          
                                echo '<th>';
                           // echo $row['idMenu'] . '--';
                            echo $row['italiano'];
							
                            //echo $row['english'] . '--';
							//echo $row['polski'] . '--';
                            //echo $row['francais'] . '--';
                            //echo $row['idPage'] . '--';
                            //echo $row['width'] . '--';
                            //echo $row['priority'] . '--';
                    // echo $row['idParentMenu']; //Para Comprobar que sean los hijos
                            //echo $row['idRule'];
                            echo '</th>';
                            
						

							
                         //De momento muestra Todos los hijos de 1 y los hijos de sus hijos..
                   }
                   echo '</tr>';
                    $sql = 'SELECT * FROM menu  WHERE idParentMenu = 1 ORDER BY idMenu';
                    echo '<tr>';
                   foreach ($pdo->query($sql) as $row1) {

                            $sql = 'SELECT * FROM menu  Where idParentMenu = '. $row1['idMenu'];
                            echo '<td>';
                            echo '<ul>';
                            foreach ($pdo->query($sql) as $parent) {
                              
                           
                            echo '<li>';
                            echo $parent['italiano'].'<br>';
                            echo '</li>';
                            
                           
                            
                            /*
                            $sql = 'SELECT * FROM menu  Where idParentMenu = '. $parent['idMenu'];
                            foreach ($pdo->query($sql) as $parent2) {
                              
                            echo '<br>' ;   
                            echo '------>'.$parent2['idMenu'] . '--';
                            echo $parent2['italiano'] . '--';
							echo $parent2['english'] . '--';
							echo $parent2['polski'] . '--';
                            echo $parent2['francais'] . '--';
                            echo $parent2['idPage'] . '--';
                            echo $parent2['width'] . '--';
                            echo $parent2['priority'] . '--';
                            echo $parent2['idParentMenu'] . '--';
                            echo $parent2['idRule'];
                            
                            echo '<br>';

                            
                            
                             }

                            echo '___________________________________________________________________';
                            */
                            
                             }
                             echo '</ul>';
                             echo '</td>';
                            
                   }
                   echo '</tr>'
                            
							?>
		
        

        
                            
							<?php
						
                   // }
                   // echo '</tr>';
                   Database::disconnect();
                   echo '</table>';
                   
                  ?>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>