<?php 

Class Photo_detail extends Controller
{

	public function index($urladdress = '')
	{
		$data['page_title'] = "photo Details";

		$load_class = $this->loadModel("load_images");

		$data['image'] = $load_class->get_single_image($urladdress);
		$this->view("photo_detail",$data);	
	}

 
}