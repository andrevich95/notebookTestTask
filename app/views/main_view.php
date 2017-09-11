<?php// echo '"'.$url.'main/index"';?> 
<form action="" class="form-inline" method="post">
	
	<div class="row">
		<div class="form-group">
			<label for="sortby">Сортировать по:</label>
			<select name="sortby" class="form-control" id="sortby">
			    <option value="email">Email</option>
			    <option value="name">Имя</option>
			    <option value="status">Статус</option>
			    <option value="date">Дата</option>
			 </select>
		</div>
		<div class="form-group">
			<label for="order">Порядок:</label>
			<select name="order" class="form-control" id="order">
			    <option value="ASC">Прямой</option>
			    <option value="DESC">Обратный</option>
			 </select>
		</div>
		<button type="submit" class="btn btn-primary">Сортировать</button>
	</div>
	
		
</form>
<div id="sheldule">
<?php

if(isset($data['list']) and $data['list']!=null){
	foreach($data['list'] as $key =>$value){
		echo template_task($value['name'],$value['email'],$value['image'],$value['text'],$value['date'],$value['id'],$url,$value['status']);
	}
}
	

function template_task($name,$email,$image,$content,$date,$id,$url,$status){
	if($status){
		$class_panel = 'succeed_tasks';
	}
	else{
		$class_panel = 'not_yet_tasks';
	}
	$result = '<div class="panel panel-default"><div class="panel-heading"><p>'.$name.' '.htmlspecialchars('<').$email.htmlspecialchars('>').'</p></div><div class="panel-body '.$class_panel.'">';
	if(isset($image)){
		$result .= '<img class="pull-right" src="'.$url.$image.'">';
	}
	$result .= '<p class="task_content">'.$content.'</p></div><div class="panel-footer">'.$date;
	if(isset($_SESSION['user'])){
		$result.='<form action="'.$url.'main/edit" method="post"><input type="hidden" name="id" value="'.$id.'"><button class="btn btn-success pull-right" type="submit">Редактировать</button></form>';
	}
	$result.='</div></div>';
	return $result;	
}	
?>
</div>
<!--
<form action=<?php //echo '"'.$url.'main/previous"';?>>
	<input type="hidden" name="page" value=<?php //echo '"'.$data['page'].'"';?>>
	<button type="submit" class="btn btn-primary">Назад</button>
</form>
<form action=<?php //echo '"'.$url.'main/next"';?>>
	<input type="hidden" name="page" value=<?php //echo '"'.$data['page'].'"';?>>
	<button type="submit" class="btn btn-primary pull-right">Вперед</button>
</form>-->
