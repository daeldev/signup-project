create table client(
	id serial primary key,
	first_name varchar(255) not null,
	last_name varchar(255) not null,
	email varchar(255) not null unique,
	password varchar(255) not null
)

select * from client;