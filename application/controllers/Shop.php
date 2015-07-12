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
		$data['data'] = $this -> shop_model -> get_products();

		$this->load->view('shop_view', $data);

	}

	public function product_list($datatype, $slug, $page = 1) {
		switch ($datatype) {
			case 'category':
			case 'tag':
				$this -> load -> model('shop_model', '', TRUE);
				$data['dataset'] = $this -> shop_model -> get_products($slug, $datatype, $page);
				break;
			case 'user':
				$this -> load -> model('shop_model', '', TRUE);
				$data['dataset'] = $this -> shop_model -> get_user_products($slug);
				break;
			default:
				$data['dataset'] = '';
				break;
		}

		$this->load->view('header');
		$this->load->view('shop/shop_list', $data);
		$this->load->view('footer');
	}

	public function product($user_name = 'wormcih', $product_id) {

		$this -> load -> model('shop_model', '', TRUE);
		$this -> load -> library('uuid');

		$data['data'] = $this -> shop_model -> get_product($user_name, $product_id);

		if (empty($data['data'][0])) {
			show_404();
			return;
		}

		$data['meta'] = $this -> shop_model -> get_product_metadata($user_name, $product_id);
		$data['taxonomy'] = $this -> shop_model -> get_product_taxonomy($product_id);

		$data['images'] = $this -> shop_model -> get_pictureurl($product_id);

		$data['uuid'] = $this -> uuid -> v4();

		$this->load->view('shop/shop_item', $data);

	}


}
