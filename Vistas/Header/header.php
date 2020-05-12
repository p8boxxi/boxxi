<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0 maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>

	<title>Booxi shop</title>

	<!-- CSS -->

	<link rel="stylesheet" type="text/css" href="<?php 
		if (file_exists("../../Vistas/assets/css/bootstrap.min.css")){echo '../../Vistas/assets/css/bootstrap.min.css';}	
		if (file_exists("../Vistas/assets/css/bootstrap.min.css")){echo '../Vistas/assets/css/bootstrap.min.css';}	
		if (file_exists("Vistas/assets/css/bootstrap.min.css")){echo 'Vistas/assets/css/bootstrap.min.css';
	}?> ">	
	<link rel="stylesheet" type="text/css" href="<?php 
		if (file_exists("../../Vistas/assets/css/style01.css")){echo '../../Vistas/assets/css/style01.css';}	
		if (file_exists("../Vistas/assets/css/style01.css")){echo '../Vistas/assets/css/style01.css';}	
		if (file_exists("Vistas/assets/css/style01.css")){echo 'Vistas/assets/css/style01.css';
	}?> ">
	<link rel="stylesheet" type="text/css" href="<?php 
		if (file_exists("../../Vistas/assets/css/style02.css")){echo '../../Vistas/assets/css/style02.css';}
		if (file_exists("../Vistas/assets/css/style02.css")){echo '../Vistas/assets/css/style02.css';}
		if (file_exists("Vistas/assets/css/style02.css")){echo 'Vistas/assets/css/style02.css';
	}?> ">

	<!-- JS -->
	<script src="<?php 
		if (file_exists('../../Vistas/assets/js/jquery.min.js')){echo '../../Vistas/assets/js/jquery.min.js';}	
		if (file_exists('../Vistas/assets/js/jquery.min.js')){echo '../Vistas/assets/js/jquery.min.js';}	
		if (file_exists('Vistas/assets/js/jquery.min.js')){echo 'Vistas/assets/js/jquery.min.js';
	}?> ">		
	</script>	
	<script src="<?php 
		if (file_exists('../../Vistas/assets/js/bootstrap.min.js')){echo '../../Vistas/assets/js/bootstrap.min.js';}	
		if (file_exists('../Vistas/assets/js/bootstrap.min.js')){echo '../Vistas/assets/js/bootstrap.min.js';}	
		if (file_exists('Vistas/assets/js/bootstrap.min.js')){echo 'Vistas/assets/js/bootstrap.min.js';
	}?> ">		
	</script>	

	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


	<?php include 'navbar-general.php'; ?>
	

</head>