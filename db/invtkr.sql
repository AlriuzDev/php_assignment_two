create database invtkr;
use invtkr;

create table users(
	user_id int not null auto_increment,
	first_name varchar (255),
	last_name varchar (255),
	username varchar (255),
	password varchar (255),
    rol varchar(255) default 'nonadmin',
    avatar varchar (255),
    primary key (user_id)
);

select * from users;