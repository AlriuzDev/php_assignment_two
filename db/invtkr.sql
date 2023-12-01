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

UPDATE users 
SET role = 'admin' 
WHERE user_id = '1';

select * from users;

CREATE TABLE products (
    productID int PRIMARY KEY auto_increment,
    title VARCHAR(255),
    price int,
    description TEXT,
    image1 VARCHAR(255),
    createdAt DATETIME DEFAULT CURRENT_TIMESTAMP,
    updatedAt DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO products (title, price, description, image1)
VALUES 
    ('Ergonomic Office Chair', 199.99, 'Improve your workspace with this comfortable and adjustable ergonomic chair. Perfect for long hours of work or study.', 'https://images.pexels.com/photos/6044926/pexels-photo-6044926.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'),
    ('Smart LED Desk Lamp', 49.95, 'Illuminate your workspace with this smart LED desk lamp. It offers adjustable brightness levels and color temperatures to suit your needs.', 'https://images.pexels.com/photos/7393993/pexels-photo-7393993.jpeg'),
    ('Organic Bamboo Toothbrush Set', 29.99, 'Sustainable and eco-friendly toothbrushes made from organic bamboo. Each set comes with four brushes, perfect for a family committed to reducing plastic waste.', 'https://images.pexels.com/photos/4202917/pexels-photo-4202917.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'),
    ('Modern Glass Coffee Table', 349, 'Add a touch of sophistication to your living room with this contemporary glass coffee table. The sleek design and tempered glass top make it a stylish and functional addition.', 'https://images.pexels.com/photos/7421226/pexels-photo-7421226.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load'),
    ('Portable Bluetooth Speaker', 79.99, 'Enjoy your favorite tunes on the go with this compact and powerful Bluetooth speaker. It features a built-in rechargeable battery and delivers impressive sound quality.', 'https://images.pexels.com/photos/4526484/pexels-photo-4526484.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'),
    ('Stylish Leather Wallet', 49.95, 'A classy leather wallet with multiple card slots and a sleek design. It\'s perfect for keeping your essentials organized without compromising on style.', 'https://images.pexels.com/photos/167703/pexels-photo-167703.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'),
    ('Reusable Stainless Steel Water Bottle', 24.99, 'Stay hydrated and environmentally conscious with this stainless steel water bottle. It\'s durable, BPA-free, and a great alternative to single-use plastic bottles.', 'https://images.pexels.com/photos/6271623/pexels-photo-6271623.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');

INSERT INTO products (title, price, description, image1)
VALUES 
    ('test', 99.99, 'test desc.', 'test');
select * from products;
select * from products where productID = 8;

