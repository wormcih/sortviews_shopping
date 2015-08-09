<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_manage extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($user = 1) {

        if (!isset($_SESSION['user_id'])) {
            redirect(base_url(), 'location', 302);
        }


        $this -> load -> model('shop_insert', '', TRUE);

        $data['category'] = $this -> shop_insert -> list_categoryname();

    	$this->load->view('header');
		$this->load->view('user/user_create_product', $data);
		$this->load->view('footer');

    }

    public function add_product($user = 1) {

        if (isset($_SESSION['user_id'])) {
            $user = intval($_SESSION['user_id']);
        } else {
            redirect(base_url(), 'location', 302);
        }

		$this -> load -> model('shop_insert', '', TRUE);

		$product_content['user_id'] = intval($user);
        $product_content['product_title'] = $this -> input -> post('product_title');
        $product_content['product_description'] = $this -> input -> post('product_description');
        $product_content['product_price'] = $this -> input -> post('product_price');
        $product_content['payment_way'] = $this -> input -> post('payment_way[]');
        $product_content['product_pic'] = $this -> input -> post('product_pic[]');
        $product_content['product_cover'] = $this -> input -> post('img_cover');
        $product_content['product_status'] = 'ACTIVE';

        $this -> shop_insert -> add_product($user, $product_content);

    }

    public function add_comment() {

        if (isset($_SESSION['user_id']) && $this -> input -> post('product') && $this -> input -> post('comment')) {
            $user_id = intval($_SESSION['user_id']);
            $product_id = intval($this -> input -> post('product'));
            $content = $this -> input -> post('comment');

            if ($content == "") redirect(base_url(), 'location', 302);

        } else {
            redirect(base_url(), 'location', 302);
        }

        $this -> load -> model('shop_insert', '', TRUE);
        $this -> shop_insert -> add_comment($product_id, $user_id, $content);

        redirect(base_url().$this -> input -> post('redirect'), 'location', 302);
    }

    public function manage_productlist($username = 'wormcih') {
        $this -> load -> model('shop_model', '', TRUE);

        $data['products'] = $this -> shop_model -> get_user_products($username);

        $this->load->view('header');
        $this->load->view('user/user_manageproduct', $data);
        $this->load->view('footer');
    }

    public function login_index() {
        $this->load->view('header');
        $this->load->view('user/user_login');
        $this->load->view('footer');
    }

    public function login() {
        $this -> load -> model('shop_model', '', TRUE);
        $user_info = $this -> shop_model -> get_userid($_POST['login_name']);

        if ($user_info) {
            $this -> session -> set_userdata(array('user_id' => $user_info -> user_id, 'user_name' => $_POST['login_name']));
        }

        $this->load->view('header');
        //$this->load->view('user/user_login');
        $this->load->view('footer');

    }

    public function logout() {
        if (isset($_SESSION['user_id'])) unset($_SESSION['user_id']);
        if (isset($_SESSION['user_name'])) unset($_SESSION['user_name']);


        $this->load->view('header');
        //$this->load->view('user/user_login');
        $this->load->view('footer');

    }

}