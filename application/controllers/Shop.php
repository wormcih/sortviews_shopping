<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function index() {

		$this -> load -> model('shop_model', '', TRUE);
		$data['data'] = $this -> shop_model -> list_products();

		$this->load->view('shop_view', $data);

	}

	public function product($user_name = 'wormcih', $product_id = 2) {

		$this -> load -> model('shop_model', '', TRUE);

		$data['data'] = $this -> shop_model -> get_product($user_name, $product_id);
		$data['images'] = $this -> shop_model -> get_pictureurl(1);

		$this->load->view('shop/shop_item', $data);

	}


}
