<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<!--
    <link   href="css/bootstrap.min.css" rel="stylesheet">
	-->
	<link 	href="css/bootstrap.css" rel="stylesheet">
	<style>
	body{
		background-color: #D61310;
	}
	
	</style>
    <script src="js/bootstrap.min.js"></script>
<head>
<body>
    <div class = "container">
        <div class ="row">
            <h1>Menu System</h1>
            <table class="table table-striped table-bordered">
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
                   include 'database.php';
				   /* de momento lo dejo comentado, porque no me deja crear la tabla
				   
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM Menu ORDER BY idMenu DESC';
                   foreach ($pdo->query($sql) as $row) {
							
                            echo '<tr>';
                            echo '<td>'. $row['idMenu'] . '</td>';
                            echo '<td>'. $row['Type'] . '</td>';
							echo '<td>'. $row['Developer'] . '</td>';
							echo '<td>'. $row['UnitValue'] . ' €</td>';
                            echo '<td>'. $row['ReleaseDate'] . '</td>';
							echo '<td width=250>';
							
                                //echo '<a class="btn" href="read.php?id='.$row['Title'].'">Read</a>';
								echo '<a data-toggle="modal"  href="#read'. str_replace(" ","_",$row['Title']).'" class="btn btn-primary btn">Read</a>';
								//<a href="#" data-reveal-id="myModal">Abrir la ventana modal</a>
                                echo ' ';
                                echo '<a class="btn btn-success" href="update.php?id='.$row['Title'].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete.php?id='.$row['Title'].'">Delete</a>';
                                echo '</td>';
								
                            echo '</tr>';
							
							?>
							
							<?php
							
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
                  Tengo que quitar el cierre de php de abajo
                */ ?>
            </table>      
        </div>
    

    </div>
<body>