create database invtkr;
use invtkr;

create table users(
	user_id int not null auto_increment,
	first_name varchar (255),
	last_name varchar (255),
	username varchar (255),
	password varchar (255),
    role varchar(255) default 'nonadmin',
    avatar varchar (255),
    primary key (user_id)
);

select * from users;
/*
CREATE TABLE categories (
    id INTEGER PRIMARY KEY,
    name TEXT,
    image TEXT,
    createdAt DATETIME,
    updatedAt DATETIME
);
INSERT INTO categories (id, name, image, createdAt, updatedAt)
VALUES
(1, 'Clothes', 'https://i.imgur.com/QkIa5tT.jpeg', '2023-11-27T09:26:51.000Z', '2023-11-27T09:26:51.000Z'),
(2, 'Electronics', 'https://i.imgur.com/ZANVnHE.jpeg', '2023-11-27T09:26:51.000Z', '2023-11-27T09:26:51.000Z'),
(3, 'Audi', 'https://placeimg.com/648/480/any', '2023-11-27T09:26:51.000Z', '2023-11-27T10:57:41.000Z'),
(4, 'Shoes', 'https://i.imgur.com/qNOjJje.jpeg', '2023-11-27T09:26:51.000Z', '2023-11-27T09:26:51.000Z'),
(5, 'Miscellaneous', 'https://i.imgur.com/BG8J0Fj.jpg', '2023-11-27T09:26:51.000Z', '2023-11-27T09:26:51.000Z');

select * from categories;


CREATE TABLE products (
    productID int PRIMARY KEY auto_increment,
    title VARCHAR(255),
    price int,
    description TEXT,
    image1 VARCHAR(255),
    image2 VARCHAR(255),
    image3 VARCHAR(255),
    createdAt DATETIME,
    updatedAt DATETIME,
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);*/

CREATE TABLE products (
    productID int PRIMARY KEY auto_increment,
    title VARCHAR(255),
    price int,
    description TEXT,
    image1 VARCHAR(255),
    image2 VARCHAR(255),
    image3 VARCHAR(255),
    createdAt DATETIME DEFAULT CURRENT_TIMESTAMP,
    updatedAt DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO products (title, price, description, image1, image2, image3)
VALUES 
    ('Ergonomic Office Chair', 199.99, 'Improve your workspace with this comfortable and adjustable ergonomic chair. Perfect for long hours of work or study.', 'https://i.imgur.com/abcde.jpg', 'https://i.imgur.com/12345.jpg', 'https://i.imgur.com/67890.jpg'),
    ('Smart LED Desk Lamp', 49.95, 'Illuminate your workspace with this smart LED desk lamp. It offers adjustable brightness levels and color temperatures to suit your needs.', 'https://i.imgur.com/xyzabc.jpg', 'https://i.imgur.com/defghi.jpg', 'https://i.imgur.com/jklmno.jpg'),
    ('Organic Bamboo Toothbrush Set', 29.99, 'Sustainable and eco-friendly toothbrushes made from organic bamboo. Each set comes with four brushes, perfect for a family committed to reducing plastic waste.', 'https://i.imgur.com/YI9Mg7U.jpg', 'https://i.imgur.com/DKYiYs8.jpg', NULL),
    ('Modern Glass Coffee Table', 349, 'Add a touch of sophistication to your living room with this contemporary glass coffee table. The sleek design and tempered glass top make it a stylish and functional addition.', 'https://i.imgur.com/WaUK7bC.jpg', 'https://i.imgur.com/2FXw7fu.jpg', 'https://i.imgur.com/Qn1YsEf.jpg'),
    ('Portable Bluetooth Speaker', 79.99, 'Enjoy your favorite tunes on the go with this compact and powerful Bluetooth speaker. It features a built-in rechargeable battery and delivers impressive sound quality.', 'https://i.imgur.com/n8hDqSU.jpg', 'https://i.imgur.com/0CMNACu.jpg', NULL),
    ('Stylish Leather Wallet', 49.95, 'A classy leather wallet with multiple card slots and a sleek design. It\'s perfect for keeping your essentials organized without compromising on style.', 'https://i.imgur.com/MrA6T4R.jpg', 'https://i.imgur.com/yFBzZTd.jpg', NULL),
    ('Reusable Stainless Steel Water Bottle', 24.99, 'Stay hydrated and environmentally conscious with this stainless steel water bottle. It\'s durable, BPA-free, and a great alternative to single-use plastic bottles.', 'https://i.imgur.com/6F8biGk.jpg', 'https://i.imgur.com/FtLZm7C.jpg', NULL);

select * from products;