<?php

class Shop_model extends CI_Model {

        public function __construct() {
                
                parent::__construct();

        }

        public function list_category() {

        }

        public function list_products($user_name = 'wormcih') {

                $list_query = 'SELECT product.product_id, user.username AS `shop_owner`, '.
                        'category.cat_name AS `cat_name`,'.
                        'picture.pic_url AS `cover_pic`, '.
                        'product.product_description, product.product_status '.
                        'from s_user AS user '.

                        'INNER JOIN s_product AS product '.
                        'ON user.user_id = product.f_user_id '.

                        'INNER JOIN s_picture AS picture '.
                        'ON product.f_cover_pic = picture.pic_id '.

                        'INNER JOIN s_category AS category '.
                        'ON category.cat_id = product.f_cat_id '.

                        'WHERE user.user_id = (SELECT user_id FROM s_user WHERE username = ?)';

                $list_sql = $this -> db -> query($list_query, array($user_name));

                return $list_sql -> result();

        }

        public function get_product($user_name, $product_id) {

                $get_query = 'SELECT product.product_id, product.product_title, shop.shop_name AS `shop_owner`, '.
                        'category.cat_name, '.
                        'picture.pic_url AS `cover_pic`, '.
                        'product.product_description, product.product_status '.
                        'from s_user AS user '.

                        'INNER JOIN s_product AS product '.
                        'ON user.user_id = product.f_user_id '.

                        'INNER JOIN s_category AS category '.
                        'ON category.cat_id = product.f_cat_id '.

                        'INNER JOIN s_picture AS picture '.
                        'ON product.f_cover_pic = picture.pic_id '.

                        'INNER JOIN s_shop AS shop '.
                        'ON shop.shop_id = user.user_id '.

                        'WHERE user.user_id = (SELECT user_id FROM s_user WHERE username = ?) AND '.
                        'product.product_id = (SELECT product_id FROM s_product WHERE product_id = ?)';

                $get_sql = $this -> db -> query($get_query, array($user_name, $product_id));

                return $get_sql -> result();

        }

        // # Generate JSON for ajax load implement
        public function get_pictureurl($product_id) {
                $get_query = 'SELECT `pic_url` FROM s_picture WHERE `f_product_id` = ?';
                $get_sql = $this -> db -> query($get_query, array($product_id));

                return $get_sql -> result();
        }

}