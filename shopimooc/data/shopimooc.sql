create database shopimooc;
use shopimooc;


create table  imooc_admin (
id tinyint unsigned auto_increment primary key,
usename varchar(20) not null,
password varchar(32) not null,
email varchar(50) not null

);

create table imooc_cate(
id smallint unsigned auto_increment primary key,
cName varchar(50) unique

);

create table imooc_pro(
id int unsigned auto_increment primary key,
pName varchar(50) not null unique,
pSn varchar(50) not null,
pNum int unsigned default 1,
mPrice decimal(10,2) not null,
iPrice decimal(10,2) not null,
pDesc text,
pImg varchar(50) not null,
pubTime int unsigned not null,
isShow tinyint(1) default 1,
isHot tinyint(1) default 0,
cId smallint unsigned not null

);

create table imooc_user(
id int unsigned auto_increment primary key,
username varchar(20) not null unique,
password char(32) not null,
sex enum('±£ÃÜ','Å®','ÄÐ') not null default'±£ÃÜ',
face varchar(50) not null,
regTime int unsigned not null
)default charset=utf8;

create  table imooc_album(
id int unsigned auto_increment primary key,
pid int unsigned not null,
albumPath varchar(50) not null
);

