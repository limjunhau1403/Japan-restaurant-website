-- Creating the database
CREATE DATABASE assignment CHARACTER SET utf8 COLLATE utf8_general_ci;

-- Creating the announcement table
USE assignment;

CREATE TABLE user_form (
	id INT(11) AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(255),
	email VARCHAR(255),
	password VARCHAR(255)
);

CREATE TABLE ticket_item (
	id INT(11) AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(25) NOT NULL,
    product_price FLOAT,
    product_image VARCHAR(100),
    product_id INT(11),
    UNIQUE (product_id)
);

CREATE TABLE contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(15) NOT NULL,
    subject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO `ticket_item`(`id`, `product_name`, `product_price`, `product_image`, `product_id`)
VALUES (1,'Adult Ticket',95,'./assets/Adult_Ticket.png','101'),
(2,'Children Ticket',50,'./assets/Child_Ticket.png','201')
