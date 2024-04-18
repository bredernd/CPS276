DROP TABLE IF EXISTS admins;

CREATE TABLE admins 
(
  id int NOT NULL AUTO_INCREMENT,
  name varchar(50) NOT NULL,
  email varchar(60) NOT NULL UNIQUE,
  password varchar(255) NOT NULL,
  status varchar(5) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

INSERT INTO admins VALUES (0, 'Dak Bredernitz', 'dbredernitz@admin.com', '$2y$10$jnN6NS1N8WB2UWYxoDe/5egL3/YNB8FiHAdkH/iPv8wWp1zuNmpA.', 'admin');
INSERT INTO admins VALUES (1, 'Dak Bredernitz', 'dbredernitz@staff.com', '$2y$10$jnN6NS1N8WB2UWYxoDe/5egL3/YNB8FiHAdkH/iPv8wWp1zuNmpA.', 'staff');