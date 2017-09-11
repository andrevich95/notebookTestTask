<?php
?>
<div class="row">
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
	<form enctype="multipart/form-data" action="task/add" class="form-horizontal" method="post" id="form_task">
	<div class="form-group">
	    <label for="name">Имя пользователя:</label>
	    <input type="text" class="form-control" id="name" name="name" placeholder="Имя" required>	
	</div>
	<div class="form-group">
	    <label for="email">Email:</label>
	    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>	
	</div>
	
	<div class="form-group">
		<label for="txt">Текс задачи:</label>
		<textarea cols="10" rows="20" class="form-control" id="txt" name="txt" placeholder="Текс задачи" required></textarea>
	</div>
	<div class="form-group">
	    <label for="file">Изображение(не более 320х240 пикселей):</label>
	    <input type="file" class="form-control" id="file" name="file" accept="jpeg,jpg,png,gif">	
	</div>
	<button type="submit" class="btn btn-primary">Отправить</button>
	</form>
	<br>
	
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12" id="preview">
	<div class="">
		<h3>Имя</h3>
		<p id="preview_name"></p>
	</div>
	<div class="">
		<h3>Email</h3>
		<p id="preview_email"></p>
	</div>
	<div class="">
		<h3>Текст задачи</h3>
		<p id="preview_task"></p>
	</div>
	<div class="">
		<h3>Изображение</h3>
		<img id="preview_image" src="">
	</div>
</div>
</div>
<button class="btn btn-default" id="preview-btn">Предварительный просмотр</button>