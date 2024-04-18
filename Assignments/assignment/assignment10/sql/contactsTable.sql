DROP TABLE IF EXISTS contactsTable;

CREATE TABLE contactsTable 
(
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  name varchar(50) NOT NULL,
  address varchar(50) NOT NULL,
  city varchar(50) NOT NULL,
  state varchar(50) NOT NULL,
  phone varchar(12) NOT NULL,
  email varchar(50) NOT NULL,
  dob varchar(10) NOT NULL,
  contacts varchar(50) DEFAULT NULL,
  age varchar(5) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB;