<?php

class Shop_insert extends CI_Model {

        public function __construct() {
                
                parent::__construct();

        }

        public function add_product($user_id, $product_content) {
        	// function: add product for user
            //
            // require/optional:     1..user_id 
            //                       2..product content (array)              

            // if success, return true, and success msg
            // if fail, return false, and fail msg

        	// init error status and message
        	$status = false; $msg = 'Wrong Content received';

        	// check correctness of "prodct_content"
        	if (empty($product_content)) 
        		return array('status' => $status, 'message' => $msg);

        	$add_query = 'INTO `s_product` (user_id, product_title, product_description, '.
        		'product_price, product_status) VALUES (?, ?, ?, ?, ?)';

			$add_sql = $this -> db -> query($add_query, array($product_content['user_id'], 
				$product_content['product_title'], $product_content['product_description'],
				$product_content['product_price'], $product_content['product_status'])
				);

			if ($this -> db -> insert_id()) return true;


        	/*
        	product_title VARCHAR(255) NOT NULL,
			product_description MEDIUMTEXT,
			product_price NUMERIC(10, 1) NOT NULL,
			product_timestamp TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
			product_status ENUM ('active', 'end', 'removed') DEFAULT 'active',
			*/




        }

        public function index_img($img_url, $user_id) {

<<<<<<< Updated upstream
        	$index_sql = 'INSERT INTO s_product_metadata (meta_key, meta_value, user_id)  '.
        			'VALUES (?, ?, ?)';
        	$index_query = $this -> db -> query($index_sql, array('picture', $img_url, $user_id));

        	return $img_url;
        }
=======
        	$index_status = false; $img_url = '';
        	$img_url = $original_url;
        	/*
        	do {
>>>>>>> Stashed changes

        public function generate_imgurl() {

            $index_status = false; $img_url = '';

<<<<<<< Updated upstream
            do {
=======
        	} while (!$index_status);
        	*/
>>>>>>> Stashed changes

                $img_url = $this -> generate_randomstring().'.jpg';
                $check_sql = 'SELECT count(meta_id) FROM s_product_metadata WHERE meta_value = ?';
                $check_query = $this -> db -> query($check_sql, array($img_url));

                if (count($check_query) == 0) $index_status = true;

            } while (!$index_status);

            return $img_url;

        }

<<<<<<< Updated upstream
        private function generate_randomstring($length = 12) {
        	
=======
        private function generate_imgurl($length = 8) {

>>>>>>> Stashed changes
        	$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		    $count = mb_strlen($chars);

		    for ($i = 0, $img_url = ''; $i < $length; $i++) {
		        $index = rand(0, $count - 1);
		        $img_url .= mb_substr($chars, $index, 1);
		    }

			return $img_url;
        }

        private function flush_img() {
        	// function: remove unused image

        	$flush_sql = 'DELETE from s_product_metadata WHERE product_id = <> '.
        	'(SELECT product_id FROM s_product)'; // add duration

        	$flush_query = $this -> db -> query($flush_sql);

        }

}
