<?php

class Shop_model extends CI_Model {

        public function __construct() {
                
                parent::__construct();

        }

        public function get_userid($username) {
                $get_query = 'SELECT user_id FROM s_user WHERE username = ? LIMIT 1';
                $get_sql = $this -> db -> query($get_query, array($username));

                if (count($get_sql -> result()) > 0) return $get_sql -> result()[0];
                return false;
        }

        public function list_taxonomy($taxonomy = 'category', $page = 1, $limit = 10) {

                // function: return taxonomy list
                // default taxonomy available:  - category
                //                              - tag
                //
                // require/optional:     1..taxonomy
                //                       2..page
                //                       3..limit

                // if success, return key
                // | term_name | term_slug | taxonomy_count |

                $page_index = ($page - 1) * $limit;

                $list_query = 'SELECT term.term_name, term.term_slug, t.taxonomy_count '.
                        'FROM s_terms AS term '.

                        'INNER JOIN s_term_taxonomy AS t '.
                        'ON term.term_id = t.term_id '.

                        'WHERE t.taxonomy = ? '.
                        'LIMIT ?, ?';

                $list_sql = $this -> db -> query($list_query, array($taxonomy, $page_index, $limit));

                return $list_sql -> result();

        }

        public function get_user_products($username, $limit = 10) {

                $get_query = 'SELECT p.product_id, u.username, p.product_title, p.product_price, i.meta_value AS img_src FROM s_product AS p '.

                'INNER JOIN s_product_metadata AS i ON i.product_id = p.product_id '.
                'INNER JOIN s_user AS u ON u.user_id = p.user_id '.

                'WHERE u.username = ? AND i.meta_key = ? LIMIT ?';

                $get_sql = $this -> db -> query($get_query, array($username, 'feature_picture', $limit));

                return $get_sql -> result();
        }

        public function get_products($slug = 'test1', $taxonomy = 'category', $page = 1, $limit = 10) {

                // function: return all product information
                // require:     1..slug
                // optional:    2..taxonomy
                //              3..limit

                // if success, return key
                // | term_name | username | product_title | product_description 
                // | product_price | feature_picture | product_timestamp  |

                $picture_key = 'feature_picture'; // picture key, default is 'feature_picture'
                $page_index = ($page - 1) * $limit;

                $list_query = 'SELECT term.term_name, u.username, p.product_title, p.product_description, p.product_price, '.
                        'img.img_src AS feature_picture, p.product_timestamp '.
                        'FROM s_product AS p '.

                        'INNER JOIN s_user AS u '.
                        'ON u.user_id = p.user_id '.
                        
                        'INNER JOIN s_term_relationship AS r '.
                        'ON r.object_id = p.product_id '.
                        
                        'INNER JOIN s_term_taxonomy AS t '.
                        'ON t.taxonomy_id = r.taxonomy_id '.
                        
                        'INNER JOIN s_terms AS term '.
                        'ON t.term_id = term.term_id '.
                        
                        'INNER JOIN s_product_img AS img '.
                        'ON p.product_id = img.product_id '.

                        'WHERE term.term_slug = ? '.
                        'AND t.taxonomy = ? '.
                        'AND img.img_type = ? '.

                        'ORDER BY p.product_timestamp DESC '.
                        'LIMIT ?, ?';

                $list_sql = $this -> db -> query($list_query, array($slug, $taxonomy, $picture_key, $page_index, $limit));

                return $list_sql -> result();

        }

        public function get_product($user_name, $product_id) {

                // function: return a product information
                // require:     1..user_name
                //              2..product_id

                // if success, return keys
                // | username | product_title | product_description | product_price 
                // | product_timestamp | product_status | feature_picture |

                $picture_key = 'feature_picture'; // picture key, default is 'feature_picture'

                $get_query = 'SELECT u.username, p.product_title, p.product_description, p.product_price, p.product_timestamp, '.
                        'p.product_status, p.product_usestatus, img.meta_value AS feature_picture '.
                        'FROM s_product AS p '.

                        'INNER JOIN s_product_metadata AS img '.
                        'ON p.product_id = img.product_id '.

                        'INNER JOIN s_user AS u '.
                        'ON u.user_id = p.user_id '.

                        'WHERE u.username = ? '.
                        'AND p.product_id = ? '.
                        'AND img.meta_key = ? '.

                        'LIMIT 1;';

                $get_sql = $this -> db -> query($get_query, array($user_name, $product_id, $picture_key));

                return $get_sql -> result();

        }

        public function get_product_metadata($user_name, $product_id, $meta_key = null) {

                // function: return product metadata
                // require:     1..user_name
                //              2..product_id
                // optional:    3..meta_key

                // if success, return metadata in "PHP ARRAY"
                // key => value


                if (is_null($meta_key)) {// get all metadata
                        $get_query = 'select m.meta_key AS `key`, m.meta_value AS `value` '.
                                'from s_product_metadata AS m '.

                                'INNER JOIN s_product AS p '.
                                'ON p.product_id = m.product_id '.

                                'INNER JOIN s_user AS u '.
                                'ON p.user_id = u.user_id '.

                                'WHERE u.username = ? AND p.product_id = ?';

                        $get_sql = $this -> db -> query($get_query, array($user_name, $product_id));


                } else {
                        $get_query = 'select m.meta_key AS `key`, m.meta_value AS `value` '.
                                'from s_product_metadata AS m '.

                                'INNER JOIN s_product AS p '.
                                'ON p.product_id = m.product_id '.

                                'INNER JOIN s_user AS u '.
                                'ON p.user_id = u.user_id '.

                                'WHERE u.username = ? AND p.product_id = ? AND m.meta_key = ?';

                        $get_sql = $this -> db -> query($get_query, array($user_name, $product_id, $meta_key));
                }

                $dataset = $get_sql -> result();

                foreach ($dataset as $col) {
                        if ($key_index = 0) continue;
                        $metadata[$col -> key] = $col -> value;
                }

                return $metadata;
                
        }

        public function get_product_taxonomy($product_id) {

                // function: return product taxonomy
                // require:     1..product_id

                // if success, return taxonomy in "PHP ARRAY"
                // category/tag => index => name/slug

                $get_query = 'SELECT t.taxonomy, term.term_name, term.term_slug '.
                        'FROM s_terms AS term '.

                        'INNER JOIN s_term_taxonomy AS t ON term.term_id = t.term_id '.
                        'INNER JOIN s_term_relationship AS r ON r.taxonomy_id = t.taxonomy_id '.
                        'INNER JOIN s_product AS p ON p.product_id = r.object_id '.

                        'WHERE p.product_id = ?';

                $get_sql = $this -> db -> query($get_query, array($product_id));

                $dataset = $get_sql -> result();
                $category_index = 0; $tag_index = 0; $taxonomy = '';
                foreach ($dataset as $col) {
                        if ($col -> taxonomy == 'category') {
                                $taxonomy['category'][$category_index]['name'] = $col -> term_name;
                                $taxonomy['category'][$category_index]['slug'] = $col -> term_slug;
                                $category_index += 1;
                        } elseif ($col -> taxonomy == 'tag') {
                                $taxonomy['tag'][$tag_index]['name'] = $col -> term_name;
                                $taxonomy['tag'][$tag_index]['slug'] = $col -> term_slug;
                                $tag_index += 1;
                        }
                }

                return $taxonomy;
        }

        // # Generate JSON for ajax load implement
        public function get_pictureurl($product_id) {
                $picture_type = 'picture';

                $get_query = 'SELECT meta_value AS img_src FROM s_product_metadata WHERE product_id = ? AND meta_key = ?';
                $get_sql = $this -> db -> query($get_query, array($product_id, $picture_type));

                return $get_sql -> result();
        }

        public function get_comments($product_id, $page = 1, $limit = 10){

                // function: return product comment
                // require:     1..product_id

                // if success, return keys
                // | username | comment_content | comment_daytime | comment_title |

                $page_index = ($page - 1) * $limit;

                $get_query = 'SELECT u.username, c.comment_title, c.comment_content, c.comment_daytime '.
                        'FROM s_comment AS c '.
                        'INNER JOIN s_user AS u ON u.user_id = c.comment_userid '.
                        'WHERE c.comment_productid = ? '.
                        'ORDER BY c.comment_daytime ASC '.
                        'LIMIT ?, ?';
                $get_sql = $this -> db ->query($get_query, array($product_id, $page_index, $limit));

                return $get_sql -> result();

        }

        public function get_rand_product() {
                $get_query = 'SELECT r1.product_id, r1.product_title, r1.product_price, r1.product_status, s_user.username, meta.meta_value AS img_url FROM s_product AS r1 INNER JOIN (SELECT CEIL(RAND() * (SELECT MAX(`product_id`) FROM s_product)) AS id) AS r2 ON r1.product_id >= r2.id INNER JOIN s_user ON r1.user_id = s_user.user_id INNER JOIN s_product_metadata AS meta ON meta.meta_id = r1.product_id ORDER BY r1.product_id ASC LIMIT 4';
                $get_sql = $this -> db -> query($get_query);

                return $get_sql -> result();
        }

}