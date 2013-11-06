<?php

Doo::loadController("BaseController");

class ProsesController extends BaseController {

	function get_image() {
		
	}

	function upload_image() {

		Doo::loadHelper("DooGdImage");		
		$gd = new DooGdImage("global/img/upload/", "global/img/upload/resize/");

		$response = array();

		if($gd->checkImageExtension('qqfile')){
			$name = 'img_' . date('Ymdhis');

			$uploadImg = $gd->uploadImage('qqfile', $name);

			$gd->generatedQuality = 85;
			$gd->generatedType="jpg";

			$gd->thumbSuffix = '_670x423';
			$gd->adaptiveResize($uploadImg,670,423);

			$gd->thumbSuffix = '_120x76';
			$gd->adaptiveResize($uploadImg,120,76);			

			$response = array("success" => true, "uploadName" => $uploadImg, "nameRaw" => $name);
		}
		else
		{
			$response = array("error" => "File has an invalid extension, it should be one of 'jpg, jpeg, gif, png'");
		}
		
		echo json_encode($response);
	}

	function delete_image()
	{
		$id = $this->params['id'];
		unset($_SESSION["image"][$id]);

		echo json_encode(array("success" => true));
	}

	public function cek_user() {
		Doo::loadModel("User");

		$user = new User();
		$user->username = $_GET['username'];

		echo $user->find() ? 'false' : 'true';
	}

	public function cek_email() {
		Doo::loadModel("User");

		$user = new User();
		$user->email = $_GET['email'];

		echo $user->find() ? 'false' : 'true';
	}

	function get_propinsi() {
		Doo::loadModel("Area");

		$area = new Area();
		$data = $area->getByLevel('1');

		echo json_encode($data);
	}

	function get_kota() {
		Doo::loadModel("Area");

		$area = new Area();
		$data = $area->getByLevel_ProvinceId('2', $_GET['id']);

		echo json_encode($data);		
	}

	function get_kecamatan() {
		Doo::loadModel("Area");

		$area = new Area();
		$data = $area->getByLevel_ProvinceId_DistrictId(3, $_GET['id'], $_GET['idkota']);

		echo json_encode($data);
	}

}
?>