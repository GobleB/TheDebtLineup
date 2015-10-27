drop database if exists MainUserDB;

create database MainUserDB;
use MainUserDB;

create table users(
	id int AUTO_INCREMENT Primary Key NOT NULL;
	firstName varchar(255) NOT NULL;
	lastName varchar(255) NOT NULL;
	email varchar(255) NOT NULL;
);

create table userPass(
	id int NOT NULL;
	userName varchar(255) NOT NULL;
);