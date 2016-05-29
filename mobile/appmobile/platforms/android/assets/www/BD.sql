create database sms-banking;
use sms-banking;

create table utilisateurs (
 login varchar (20) NOT NULL,
 Type_Profil varchar (20) NOT NULL,
 password varchar (30) NOT NULL,

 constraint pk_utilisateur primary key(login))
 engine = innodb;
 
insert into utilisateurs (login, Type_Profil, password) values ('toto', 'client', 'depasser')
