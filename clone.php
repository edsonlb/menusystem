<?php
    require 'database.php';
    $id = 0;
    $pdo = Database::connect();
     
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
      $id = $_REQUEST['id'];
    if ( !empty($_POST)) {
        
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql = "INSERT INTO menu (italiano, english, polski, francais, idPage, width, priority, idParentMenu, idRule) select concat('NEW ',italiano), concat('NEW ',english), concat('NEW ',polski), concat('NEW ',francais), idPage, width, priority, idParentMenu, idRule from menu where idMenu = ".$id;
                        
                        $q = $pdo->prepare($sql);
                        $q->execute(array($id));
                        
                        //var_dump($parentId);
                        //die();

                        $q = $pdo->query("Select MAX(idMenu) as max from menu");
                        $idValue = $q->fetch(); //Cojo el id del clon del principal


                        $sql = 'SELECT * FROM menu  Where idParentMenu = '. $id;
                        foreach ($pdo->query($sql) as $parent) {
                        $sql = "INSERT INTO menu (italiano, english, polski, francais, idPage, width, priority, idParentMenu, idRule) select concat('NEW ',italiano), concat('NEW ',english), concat('NEW ',polski), concat('NEW ',francais), idPage, width, priority, ".$idValue['max'].", idRule from menu where idMenu = ".$parent['idMenu'];
                        $q = $pdo->prepare($sql);
                        $q->execute(array($parent['idMenu']));

                        $q = $pdo->query("Select MAX(idMenu) as max from menu");
                        $idValue2 = $q->fetch(); //Cojo el id del clon del principal
                        
                        
                            $sql = 'SELECT * FROM menu  Where idParentMenu = '.$parent['idMenu'];        
                            foreach ($pdo->query($sql) as $parent2) {
                            $sql = "INSERT INTO menu (italiano, english, polski, francais, idPage, width, priority, idParentMenu, idRule) select concat('NEW ',italiano), concat('NEW ',english), concat('NEW ',polski), concat('NEW ',francais), idPage, width, priority, ".$idValue2['max'].", idRule from menu where idMenu = ".$parent2['idMenu'];
                            $q = $pdo->prepare($sql);
                            $q->execute(array($parent2['idMenu']));
                            }
                        }
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
                        <h3>Clone</h3>
                        
                    </div>
                     
                    <form class="form-horizontal" action="clone.php" method="post">
                       <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      <p class="alert alert-error">Are you sure to clone ?</p>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Yes</button>
                          <a class="btn" href="index.php">No</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>