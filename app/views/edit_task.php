<?php
if(!isset($_SESSION['user'])){
	header('Location: index');
}
?>
<div class="container">
	<form enctype="multipart/form-data" action=<?php echo $url."task/edit";?> class="form-horizontal" method="post" id="form_edit">
	<input type="hidden" name="id" value=<?php echo '"'.$data[0]['id'].'"';?>>
	<div class="form-group">
		<label for="txt">Текс задачи:</label>
		<textarea cols="10" rows="20" class="form-control" id="txt" name="txt" placeholder="Текс задачи" value=<?php echo '"'.$data[0]['text'].'"';?> required></textarea>
	</div>
	<div class="form-group">
	    <label for="box">Статус:</label>
	    <input type="checkbox" name="status" id="box"<?php if ($data[0]['status']==1) echo 'checked="checked"'?>/>	
	</div>
	<button type="submit" class="btn btn-primary">Сохранить</button>
	</form>
</div>
