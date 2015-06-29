<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_manage extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($user = 1) {

    	$this->load->view('header');
		$this->load->view('user/user_create_product');
		$this->load->view('footer');

    }

    public function add_product($user = 1) {

		$this -> load -> model('shop_insert', '', TRUE);

		$product_content['user_id'] = $user;
        $product_content['product_title'] = $this -> input -> post('product_title');
        $product_content['product_description'] = $this -> input -> post('product_description');
        $product_content['product_price'] = $this -> input -> post('product_price');
        $product_content['product_status'] = 'ACTIVE';

        $this -> shop_insert -> add_product(1, $product_content);

    }

}