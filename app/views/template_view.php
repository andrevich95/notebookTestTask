<?php session_start();
$temp = explode('/', $_SERVER['REQUEST_URI']);
$url = $temp[0].'/'.$temp[1].'/';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Страничка</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href=<?php echo '"'.$url.'assets/css/style.css"';?>/>
	<link rel="stylesheet" type="text/css" href=<?php echo '"'.$url.'assets/css/pagination.css"';?>/>
	<script src='assets/js/main.js' type="text/javascript"></script>
	<script src='assets/js/pagination.js' type="text/javascript"></script>
</head>
<body>
	<nav class="navbar navbar-default">
	 	<div class="container-fluid">
	    	<div class="navbar-header">
	    		<a class="navbar-brand" href="#">Задачник</a>
	   		</div>
	    	<ul class="nav navbar-nav">
	      		<li class="active"><a href="#">Домой</a></li>
	      		<li><a href=<?php echo $url.'main';?>>Задачи</a></li>
	      		<li><a href=<?php echo $url.'task'?>>Добавить задачу</a></li>
	      		<li><a href=<?php echo $url.'login'?>>
	      		<?php
	      		if(!isset($_SESSION['user']))
	      			echo 'Войти';
	      		else{
	      			echo 'Выйти ('.$_SESSION['user'].')';
	      		}

	      		?>
	      			
	      		</a></li>
	    	</ul>
	  </div>
	</nav>
	<div class="container">
		<?php include 'app/views/'.$content_view; ?>
	</div>
	<footer class="footer">
		<div class="container">
			<p>2017 &copy; Андрей Ярошевский</p>
		</div>
	</footer>
</body>
</html>
