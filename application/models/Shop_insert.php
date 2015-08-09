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

            $add_query = 'INSERT INTO `s_product` (user_id, product_title, product_description, '.
                'product_price, product_status) VALUES (?, ?, ?, ?, ?)';

            $add_sql = $this -> db -> query($add_query, array($product_content['user_id'], 
                $product_content['product_title'], $product_content['product_description'],
                $product_content['product_price'], $product_content['product_status'])
                );

            // success add product, addon contents
            if ($this -> db -> insert_id()) {

                $insert_id = $this -> db -> insert_id();

                $payment_matrix = array('payment_face' => 0, 'payment_mail' => 0, 'payment_paypal' => 0);
                foreach ($product_content['payment_way'] as $val) {
                    if (array_key_exists($val, $payment_matrix)) {
                        $payment_matrix[$val] = 1;
                    } 
                }

                $insert_query = 'INSERT INTO s_product_metadata (product_id, meta_key, meta_value, user_id) VALUES '.
                    '(?, "payment_face", ?, ?), '.
                    '(?, "payment_mail", ?, ?), '.
                    '(?, "payment_paypal", ?, ?)';

                $insert_sql = $this -> db -> query($insert_query, array($insert_id, $payment_matrix['payment_face'], $user_id,
                                    $insert_id, $payment_matrix['payment_mail'], $user_id,
                                     $insert_id, $payment_matrix['payment_paypal'], $user_id));
                
                // add img

                foreach ($product_content['product_pic'] as $img) {
                    $update_query = 'UPDATE s_product_metadata SET product_id = ? WHERE user_id = ? AND meta_value = ?';
                    $update_sql = $this -> db -> query($update_query, array($insert_id, $user_id, $img));
                }

                $cover = $product_content['product_cover'];
                $update_query = 'UPDATE s_product_metadata SET meta_key = ? WHERE user_id = ? AND meta_value = ?';
                $update_sql = $this -> db -> query($update_query, array('feature_picture', $user_id, $cover));
                


                return true;
            }

            return false;

            //if ($this -> db -> insert_id()) return true;

            // payment_face
            // payment_paypal
            // payment_mail
            // good_status


            /*
            product_title VARCHAR(255) NOT NULL,
            product_description MEDIUMTEXT,
            product_price NUMERIC(10, 1) NOT NULL,
            product_timestamp TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            product_status ENUM ('active', 'end', 'removed') DEFAULT 'active',
            */

        }

        public function modify_product($product_id, $product_content) {
            // function: modify product for user
            //
            // require/optional:     1..product 
            //                       2..product content (array)              

            // if success, return true, and success msg
            // if fail, return false, and fail msg

            // init error status and message
            $status = false; $msg = 'Wrong Content received';

            // check correctness of "prodct_content"
            if (empty($product_content)) 
                return array('status' => $status, 'message' => $msg);

            $modify_query = 'UPDATE s_product SET product_title = ?, product_description = ? '.
                'product_price = ?, product_status = ? WHERE product_id = ?';

            $modify_sql = $this -> db -> query($modify_query, array($product_content['product_title'], 
                $product_content['product_description'], $product_content['product_price'], 
                $product_content['product_status'], $product_id)
                );

            // success add product, addon contents
            $payment_matrix = array('payment_face' => 0, 'payment_mail' => 0, 'payment_paypal' => 0);
            foreach ($product_content['payment_way'] as $val) {
                if (array_key_exists($val, $payment_matrix)) {
                    $payment_matrix[$val] = 1;
                } 
            }

            $update_query = 'UPDATE s_product_metadata SET meta_value = ? '.
                'WHERE meta_key = ? AND product_id = ?';

            foreach ($payment_matrix as $key => $value) {
                $update_query = $this -> db -> query($value, $key, $product_id);
            }

            return true;

        }

        private function set_product_paymentinfo($payment_array) {
            $payment_key = array('payment_face', 'payment_mail', 'payment_paypal');
            $index = 0;
            foreach ($payment_array as $value) {
                $this -> add_product_meta($payment_key[$index], $value);
                $index += 1;
                if ($index >= count($payment_key)) break;
                
            }
        }

        public function add_comment($product_id, $user_id, $content) {
            $add_sql = 'INSERT INTO s_comment (comment_productid, comment_userid, '.
                'comment_content) VALUES (?, ?, ?)';
            $add_query = $this -> db -> query($add_sql, array($product_id, $user_id, $content));

            return true;
        }

        private function add_product_meta($key, $val) {

        }

        public function index_img($original_url, $user_id) {

            $index_status = false; $img_url = '';
            $img_url = $original_url;
            /*
            do {

                $img_url = $this -> generate_imgurl().'.jpg';
                $check_sql = 'SELECT count(meta_id) FROM s_product_metadata WHERE meta_value = ?';
                $check_query = $this -> db -> query($check_sql, array($img_url));

                if (count($check_query) == 0) $index_status = true;

            } while (!$index_status);
            */

            $index_sql = 'INSERT INTO s_product_metadata (meta_key, meta_value, user_id)  '.
                    'VALUES (?, ?, ?)';
            $index_query = $this -> db -> query($index_sql, array('picture', $img_url, $user_id));

            return $img_url;
        }

        private function generate_imgurl($length = 8) {

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

            $flush_sql = 'DELETE from s_product_metadata WHERE product_id <> '.
            '(SELECT product_id FROM s_product)'; // add duration

            $flush_query = $this -> db -> query($flush_sql);

        }


        public function list_categoryname() {

                // function: return category name list
                //                              - tag
                //

                // if success, return key
                // | term_name | term_slug | taxonomy_count |


                $list_query = 'SELECT term.term_name, term.term_slug, t.taxonomy_count '.
                        'FROM s_terms AS term '.

                        'INNER JOIN s_term_taxonomy AS t '.
                        'ON term.term_id = t.term_id '.

                        'WHERE t.taxonomy = "category"';

                $list_sql = $this -> db -> query($list_query);

                $return_array = array();
                foreach ($list_sql -> result_array() as $key) {
                    array_push($return_array, array("name" => $key['term_name'], "slug" => $key['term_slug']));
                };


                return $return_array;

        }

}
