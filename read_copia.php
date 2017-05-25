<?php
    require 'database.php';
    $id = 0;
     
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $id = $_POST['id'];
         
        // delete data
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "Select * FROM menu WHERE idParentMenu = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: index.php");
         
    }
?>
 
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
                    <div class="row">
                        <h3>READ CHILDREM</h3>
                    </div>
                     
                    
                </div>
                 
				 <?php
                   require 'database.php';
				   
				   
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM menu  ORDER BY idMenu';
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
					
                            echo '<br>';
							
							?>
		
        

        
                            
							<?php
							
                    }
                   Database::disconnect();
                  ?>
    </div> <!-- /container -->
  </body>
</html>