<?php

class Controller_Main extends Controller
{
	function __construct()
	{
		$this->model = new Model_Main();
		$this->view = new View();
	}
	function action_index()
	{	
		if(isset($_POST['sortby'])){
			if(isset($_POST['order'])){
				$order = $_POST['order'];
			}
			else{
				$order = 'ASC';
			}
			switch($_POST['sortby']){
			case 'date':
				$data = $this->model->get_sorted_date_data($order);
				$this->view->generate('main_view.php', 'template_view.php',$data);
				break;
			case 'email':
				$data = $this->model->get_sorted_email_data($order);
				$this->view->generate('main_view.php', 'template_view.php',$data);
				break;
			case 'status':
				$data = $this->model->get_sorted_status_data($order);
				$this->view->generate('main_view.php', 'template_view.php',$data);
				break;
			case 'name':
				$data = $this->model->get_sorted_name_data($order);
				$this->view->generate('main_view.php', 'template_view.php',$data);
				break;
			default:
				$data = $this->model->get_sorted_date_data($order);
				$this->view->generate('main_view.php', 'template_view.php',$data);
				break;
			}
		}
		else{
				$data = $this->model->get_data();
				$this->view->generate('main_view.php', 'template_view.php',$data);
			}
	}
	function action_edit(){
		$data = $this->model->get_data_by_id($_POST['id']);
		$this->view->generate('edit_task.php', 'template_view.php', $data);
	}
	
	/*
	function action_next(){
		$page = $_POST['page']+1;
		$count = $this->model->get_count();
		$pages = intval($count/3);
		if($page>$pages) $page=$pages;
		if($page<$pages) $data = $this->model->get_limit_data($page);
		else $data = $this->model->get_limit_data($page,$count%3);
		$this->view->generate('main_view.php', 'template_view.php',$data);
	}
	function action_previous(){
		$page=$_POST['page']-1;
		if($page>1) $data = $this->model->get_limit_data($page);
		else $data = $this->model->get_limit_data(0);
		$this->view->generate('main_view.php', 'template_view.php',$data);
	}*/
}
?>