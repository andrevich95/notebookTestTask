<?php

class Controller_Task extends Controller
{
	function __construct()
	{
		$this->model = new Model_Task();
		$this->view = new View();
	}
	function action_index()
	{	
		$this->view->generate('task_view.php', 'template_view.php');
	}
	function action_add()
	{
		$conn = new MyDatabase();
		date_default_timezone_set('UTC');
		$table='task';
		$uploaddir = 'assets/img/'.($conn->last_id($table)+1).'.png';
		$img_size = explode('"',getimagesize($_FILES['file']['tmp_name'])[3]);
		$w_src = intval($img_size[1]);
		$h_src = intval($img_size[3]);
		if($w_src<320 and $h_src<240){
			if (move_uploaded_file($_FILES['file']['tmp_name'], $uploaddir)) {
				$success = true;
			}
		}
		else{
			$this->resize($_FILES['file'], $w_src, $h_src, 100,$uploaddir);
			$success = true;
		}
		if(isset($success)){
			$data = array('name'=>htmlspecialchars($_POST['name']),'email'=>htmlspecialchars($_POST['email']),'text'=>htmlspecialchars($_POST['txt']),'date'=>date('Y-m-d'),'image'=>$uploaddir);
		}
		else{
			$data = array('name'=>htmlspecialchars($_POST['name']),'email'=>htmlspecialchars($_POST['email']),'text'=>htmlspecialchars($_POST['txt']),'date'=>date('Y-m-d')
				);
		}
		
		$conn->insert($table,$data);
		$this->view->generate('success_view.php', 'template_view.php');
	}

	function action_edit()
	{
		$where=array('id'=>htmlspecialchars($_POST['id']));
		$status = false;
		if(htmlspecialchars($_POST['status'])=='on') $status=true;
		$columns = array('text'=>htmlspecialchars($_POST['txt']),'status'=>$status);
		$data = $this->model->set_data($columns,$where);
		$this->view->generate('success_view.php', 'template_view.php');
	}

	function resize($file, $w_src, $h_src, $quality = null,$path){
		$max_width = 320;
		$max_height = 240;
		if ($quality == null) $quality = 75;
		if ($file['type'] == 'image/jpeg')
			$source = imagecreatefromjpeg ($file['tmp_name']);
		elseif ($file['type'] == 'image/png')
			$source = imagecreatefrompng ($file['tmp_name']);
		elseif ($file['type'] == 'image/gif')
			$source = imagecreatefromgif ($file['tmp_name']);
		else return false;
		$proportion = $w_src/$h_src;
		$w_dest = 320;
		$h_dest = 240*$proportion;
		$dest = imagecreatetruecolor($w_dest, $h_dest);
		imagecopyresampled($dest, $source, 0, 0, 0, 0, $w_dest, $h_dest, $w_src, $h_src);
		imagepng($dest, $path, 9);
		imagedestroy($dest);
		imagedestroy($source);
	}
}	
?>