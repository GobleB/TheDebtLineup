drop database if exists Lineup;
create database Lineup;
use Lineup;

create table accounts (
	user_id int NOT NULL,
	name varchar(255) NOT NULL,
	type varchar(255) NOT NULL,
	balance numeric(15,2) NOT NULL,
	minimum_payment numeric(15,2) NOT NULL,
	interest numeric(5,2),
	updated_at datetime,
	created_at datetime
);

create table tips (
	id int auto_increment primary key NOT NULL,
	details varchar(255) NOT NULL
);

create table quotes (
	id int auto_increment primary key NOT NULL,
	quote varchar(255) NOT NULL,
	author varchar(255) NOT NULL
);
