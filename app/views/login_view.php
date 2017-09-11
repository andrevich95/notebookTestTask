<?php
if(isset($_SESSION['user'])){
	unset($_SESSION['user']);
	session_destroy();
	header('Location: main');
}
if(!empty($_POST)){
	if($data['user']==htmlspecialchars($_POST['name']) and $data['password']==htmlspecialchars($_POST['pwd'])){
		$_SESSION['user']=htmlspecialchars($_POST['name']);
		header('Location: main');
	}
	else{
		echo '<pre>Вы ввели неправильный пароль или имя пользователя</pre>';
	}
}
?>
	<form action="" class="form-horizontal" method="post">
		<div class="form-group">
		    <label for="name">Имя пользователя:</label>
		    <input type="text" class="form-control" id="name" name="name" placeholder="Имя" required>	
		</div>
		<div class="form-group">
		    <label for="pwd">Пароль:</label>
		    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Пароль" required>	
		</div>
		<button type="submit" class="btn btn-primary">Войти</button>
	</form>
