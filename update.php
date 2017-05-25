<!DOCTYPE html>
<html lang="en">

<?php
    require 'database.php';
 
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    }
     
    if ( !empty($_POST)) {
        // keep track validation errors
        $idMenu = null;
        $italiano = null;
        $english = null;
		$polski = null;
        $francais = null;
		$idPage = null;
        $width = null;
        $priority = null;
		$idParentMenu = null;
        $idRule = null;
        
		
		$idMenu = $id;
        $italiano = $_POST['italiano'];
        $english = $_POST['english'];
		$polski = $_POST['polski'];
        $francais = $_POST['francais'];
		$idPage = $_POST['idPage'];
        $width = $_POST['width'];
        $priority = $_POST['priority'];
		$idParentMenu = $_POST['idParentMenu'];
        $idRule = $_POST['idRule'];
        
        
        // validate input
        $valid = true;
        if (empty($italiano)) {
            $itaError = 'Please enter Italiano';
            $valid = false;
        }
        
        if (empty($english)) {
            $engError = 'Please enter English';
            $valid = false;
        
        }
        
        if (empty($polski)) {
            $polError = 'Please enter Polski';
            $valid = false;
        }
		
		if(empty($francais)) {
			$fraError = "Please enter Francais";
			$valid = false;
		}
		
		/*if(empty($idPage)) {
			$pagError = "Please enter Id Page";
			$valid = false;
		}
        *///He tenido que quitar esto porque me daba error cuando el idPage = 0
		if(empty($width)) {
			$widError = "Please enter Width";
			$valid = false;
		}
		if(empty($priority)) {
			$priError = "Please enter Priority";
			$valid = false;
		}
		if(empty($idParentMenu)) {
			$idpError = "Please enter Id Parent Menu";
			$valid = false;
		}
		
         
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE menu set italiano = ?, english = ?, polski =?, francais =?, idPage =?, width = ?, priority = ?, idParentMenu = ?, idRule = ?  WHERE idMenu = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($italiano,$english,$polski,$francais,$idPage, $width, $priority, $idParentMenu, $idRule, $idMenu));
			
            Database::disconnect();
            header("Location: index.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM menu where idMenu = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $italiano = $data['italiano'];
        $english = $data['english'];
        $polski= $data['polski'];
		$francais = $data['francais'];
        $idPage = $data['idPage'];
        $width = $data['width'];
        $priority = $data['priority'];
        $idParentMenu = $data['idParentMenu'];
        $idRule = $data['idRule'];
        
        Database::disconnect();
    }
?>
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
                        <h3>Update a Menu</h3>
                    </div>
             
                    <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
                      <div class="control-group <?php echo !empty($itaError)?'error':'';?>">
                        <label class="control-label">Italiano</label>
                        <div class="controls">
                            <input name="italiano" type="text"  placeholder="Italiano" value="<?php echo !empty($italiano)?$italiano:'';?>">
                            <?php if (!empty($itaError)): ?>
                                <span class="help-inline"><?php echo $itaError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($engError)?'error':'';?>">
                        <label class="control-label">English</label>
                        <div class="controls">
                            <input name="english" type="text" placeholder="English" value="<?php echo !empty($english)?$english:'';?>">
                            <?php if (!empty($engError)): ?>
                                <span class="help-inline"><?php echo $engError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($polError)?'error':'';?>">
                        <label class="control-label">Polski</label>
                        <div class="controls">
                            <input name="polski" type="text"  placeholder="Polski" value="<?php echo !empty($polski)?$polski:'';?>">
                            <?php if (!empty($polError)): ?>
                                <span class="help-inline"><?php echo $polError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($fraError)?'error':'';?>">
                        <label class="control-label">Francais</label>
                        <div class="controls">
                            <input name="francais" type="text"  placeholder="Francais" value="<?php echo !empty($francais)?$francais:'';?>">
                            <?php if (!empty($fraError)): ?>
                                <span class="help-inline"><?php echo $fraError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($pagError)?'error':'';?>">
                        <label class="control-label">Id Page</label>
                        <div class="controls">
                            <input name="idPage" type="text"  placeholder="Id Page" value="<?php echo !empty($idPage)?$idPage:'';?>">
                            <?php if (!empty($pagError)): ?>
                                <span class="help-inline"><?php echo $pagError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($widError)?'error':'';?>">
                        <label class="control-label">Width</label>
                        <div class="controls">
                            <input name="width" type="text"  placeholder="Width" value="<?php echo !empty($width)?$width:'';?>">
                            <?php if (!empty($widError)): ?>
                                <span class="help-inline"><?php echo $widError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($priError)?'error':'';?>">
                        <label class="control-label">Priority</label>
                        <div class="controls">
                            <input name="priority" type="text"  placeholder="Priority" value="<?php echo !empty($priority)?$priority:'';?>">
                            <?php if (!empty($priError)): ?>
                                <span class="help-inline"><?php echo $priError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($idpError)?'error':'';?>">
                        <label class="control-label">Id Parent Menu</label>
                        <div class="controls">
                            <input name="idParentMenu" type="text"  placeholder="Id Parent Menu" value="<?php echo !empty($idParentMenu)?$idParentMenu:'';?>">
                            <?php if (!empty($idpError)): ?>
                                <span class="help-inline"><?php echo $idpError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($idrError)?'error':'';?>">
                        <label class="control-label">Id Rule</label>
                        <div class="controls">
                            <input name="idRule" type="text"  placeholder="Id Rule" value="<?php echo !empty($idRule)?$idRule:'';?>">
                            <?php if (!empty($idrError)): ?>
                                <span class="help-inline"><?php echo $idrError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Update</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>