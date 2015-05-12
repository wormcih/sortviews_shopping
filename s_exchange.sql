CREATE TABLE s_user (
	user_id INT AUTO_INCREMENT,
	username VARCHAR(255) NOT NULL,
	password_h VARCHAR(255) NOT NULL,
	password_s VARCHAR(255) NOT NULL,
	gender ENUM ('M', 'F') DEFAULT NULL,
	mobile_phone VARCHAR(20),
	email VARCHAR(254) NOT NULL,
	user_status INT,
	user_session VARCHAR(255),
	last_loggeddate TIMESTAMP,
	theme INT DEFAULT 1,

	PRIMARY KEY (user_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO s_user VALUES(1, 'wormcih', '-Bh*Y=AA*HE2ELwUmL$WG6^-nPEvjw#G4CkK', 
	'KHtyJ62E_gU@qwjHhRz2=?@r*D9GvsR7E_DR', 'M', '62321452', 'wewe@gflkg.com', 1, 
	'WdGsTtnhawff2GM2vba85mApbWRs4WFCMcEw', NOW(), 1);

CREATE TABLE s_shop (
	shop_id INT,
	shop_name VARCHAR(255) NOT NULL,
	shop_nicename VARCHAR(255) NOT NULL,
	shop_status ENUM ('active', 'disabled') DEFAULT 'active',

	PRIMARY KEY (shop_id),
	FOREIGN KEY (shop_id) REFERENCES s_user(user_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO s_shop VALUES(1, 'MyStore', 'my-store', 'active');

CREATE TABLE s_category (
	cat_id INT AUTO_INCREMENT,
	cat_name VARCHAR(255) NOT NULL,
	cat_nicename VARCHAR(255) NOT NULL UNIQUE,
	cat_description TEXT,

	PRIMARY KEY (cat_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO s_category VALUES(1, 'test1', 'test1', 'test1');

CREATE TABLE s_product (
	product_id INT AUTO_INCREMENT,
	f_user_id INT NOT NULL,
	f_cat_id INT NOT NULL,
	f_cover_pic INT NOT NULL,
	product_title VARCHAR(255) NOT NULL,
	product_description MEDIUMTEXT,
	product_price NUMERIC(10, 1) NOT NULL,
	product_timestamp TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	product_status ENUM ('active', 'end', 'removed') DEFAULT 'active',

	PRIMARY KEY (product_id),
	FOREIGN KEY (f_user_id) REFERENCES s_user(user_id),
	FOREIGN KEY (f_cat_id) REFERENCES s_category(cat_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO s_product VALUES(1, 1, 1, 1, 'Product Sample 1', 'test1', '123.2', now(), 'active');
INSERT INTO s_product VALUES(2, 1, 1, 5, 'Product Sample 5', 'test2', '468250.8',now(), 'active');

CREATE TABLE s_userlike (
	product_id INT NOT NULL,
	user_id INT NOT NULL,

	FOREIGN KEY (product_id) REFERENCES s_product(product_id),
	FOREIGN KEY (user_id) REFERENCES s_user(user_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE s_picture (
	pic_id INT AUTO_INCREMENT,
	f_product_id INT,
	pic_url VARCHAR(255) NOT NULL UNIQUE,

	PRIMARY KEY (pic_id),
	FOREIGN KEY (f_product_id) REFERENCES s_product(product_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO s_picture VALUES(1, 1, 'test1.jpg');
INSERT INTO s_picture VALUES(2, 1, 'test2.jpg');
INSERT INTO s_picture VALUES(3, 2, 'test3.jpg');
INSERT INTO s_picture VALUES(4, 2, 'test4.jpg');
INSERT INTO s_picture VALUES(5, 2, 'test5.jpg');

CREATE TABLE s_comment (
	comment_id INT AUTO_INCREMENT,
	comment_productid INT NOT NULL,
	comment_userid INT NOT NULL,
	comment_title VARCHAR(255),
	comment_content TEXT NOT NULL,
	comment_daytime TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,

	PRIMARY KEY (comment_id),
	FOREIGN KEY (comment_productid) REFERENCES s_product(product_id),
	FOREIGN KEY (comment_userid) REFERENCES s_user(user_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE s_log (
	log_id bigint NOT NULL AUTO_INCREMENT,
	log_user VARCHAR(255) DEFAULT '**unknown**',
	log_activity VARCHAR(255),
	log_datetime TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	log_ip VARCHAR(45),

	PRIMARY KEY (log_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE s_option (
	option_id INT AUTO_INCREMENT,
	option_name varchar(64) NOT NULL DEFAULT '',
	option_value longtext NOT NULL,
	autoload varchar(20) NOT NULL DEFAULT 'yes',
	PRIMARY KEY (`option_id`),
	UNIQUE KEY option_name (option_name)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO s_log (log_activity, log_ip) VALUES ('login', '192.168.1.1');
INSERT INTO s_log (log_activity, log_ip) VALUES ('login fail', 'fdcc:50ee:2263:d1af:xxxx:xxxx:xxxx:xxxx');

