<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ImageUploadController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ajax_model');
	}

	public function index()
	{
		$this->load->view('uploadImageFile');
	}

	public function uploadImageFun()
	{
		$stu_photo=$_FILES['document']['name']; 
		$stu_photo_exp=explode('.',$stu_photo);
		$ext_type=$stu_photo_exp[count($stu_photo_exp)-1];
		$stu_photo=strtotime('now').'.'.$ext_type;
		$imagepath="uploads/stu_photo/".$stu_photo;
		move_uploaded_file($_FILES["document"]["tmp_name"],$imagepath);

		$result = $this->ajax_model->insertDynamicData('imagelist', array('image'=> $imagepath));
		echo $result;
		
	}
}