create database bookstore;
use bookstore;

create table login(un varchar(20), pwd varchar(20), type int(1) DEFAULT 0, primary key (un));

create table customerReq(un varchar(20) not null, pwd varchar(20) not null, name varchar(20) not null, mobile varchar(10), email varchar(50), dob date, address varchar(100), primary key(un));

create table customer(cid int auto_increment, name varchar(20), address varchar(50) , email varchar(50), mobile varchar(10), dob date, un varchar(20), primary key(cid));

create table book(bid int auto_increment, name varchar(100), author varchar(20), prize int(5), year varchar(4), rack int(3), status varchar(10), primary key (bid));

create table requests(bid int, cid int, reqDate Date, purpose varchar(8), primary key (bid, cid), foreign key(bid) references book(bid) on delete cascade, foreign key(cid) references customer(cid) on delete cascade);

create table issued(bid int, cid int, issueDate Date, dueDate Date, fine int, primary key (bid), foreign key(bid) references book(bid) on delete cascade, foreign key(cid) references customer(cid) on delete cascade);



insert into book (name, author, prize, year, rack, status) values('Diary of a young girl','Anne Frank', '500','1999', '50', "available");
insert into book (name, author, prize, year, rack, status) values('Pride and Prejudice','Jane Austin', '250','1990', '30', "available");
insert into book (name, author, prize, year, rack, status) values('Harry Potter','J K Rolling', '1000','1960', '51', "available");
insert into book (name, author, prize, year, rack, status) values('Game of thrones','George R R Martin', '550','2000', '4', "available");
insert into book (name, author, prize, year, rack, status) values('David Copperfield','Charles Dickens', '600','1950', '20', "available");
insert into book (name, author, prize, year, rack, status) values('Gulliver Travels','Jonthan Swift', '570','2017', '40', "available");
insert into book (name, author, prize, year, rack, status) values('Tom Jones','Henry Fielding', '800','1949', '9', "available");
insert into book (name, author, prize, year, rack, status) values('Emma','Jane Austin', '500','1870', '7', "available");
insert into book (name, author, prize, year, rack, status) values('Frankenstein','Mary Shelley', '500','1899', '57', "available");
insert into book (name, author, prize, year, rack, status) values('The Woman in White','Wilkie Collins', '550','1949', '25', "available");
insert into book (name, author, prize, year, rack, status) values('To kill a Mockingbird','Ruskin Bond', '250','1949', '80', "available");
insert into book (name, author, prize, year, rack, status) values('Pride and Prejudice','Jane Austin', '300','1875', '70', "available");
insert into book (name, author, prize, year, rack, status) values('Sense and Sensibility','Jane Austin', '550','1860', '6', "available");
insert into book (name, author, prize, year, rack, status) values('Fantastic Beasts','J K Rolling', '500','2000', '8', "available");

insert into customer (name, address, email, mobile, dob, un) values ("Abhidnya", "Nashik", "abhi@gmail.com", "9090090990", "2000-01-03", "a");
insert into customer (name, address, email, mobile, dob, un) values ("Aanchal", "Pune", "chugh456@gmail.com", "9446790790", "1997-05-03", "b");
insert into customer (name, address, email, mobile, dob, un) values ("Madhuri", "Shegaon", "maddy7@gmail.com", "9094587590", "2005-01-05", "c");
insert into customer (name, address, email, mobile, dob, un) values ("Vaishnavi", "Mumbai", "vaish@gmail.com", "9090409094", "2001-09-04", "d");
insert into customer (name, address, email, mobile, dob, un) values ("Nikita", "Pune", "niks123@gmail.com", "9090090990", "1990-09-23", "e");

insert into login values('admin', 'pass', 1);
insert into login values('a', 'pass', 0);
insert into login values('b', 'pass', 0);
insert into login values('c', 'pass', 0);
insert into login values('d', 'pass', 0);
insert into login values('e', 'pass', 0);

insert into customerReq values('f','pass','Manali','9090996786','manali@yahoo.com','2000-01-04', 'Mumbai');
insert into customerReq values('g','pass','Sneha','9350996786','snuha07@gmail.com','1997-01-04', 'Satara');
insert into customerReq values('h','pass','Smriti','9888996786','shanaya88@gmail.com','1998-01-04', 'Shirdi');
insert into customerReq values('i','pass','Ameya','9884406786','ameya77@gmail.com','1997-12-05', 'Pune');


insert into requests values ('1', '1', '2018-04-02', 'issue' );
update book set status = 'requested' where bid = '1';
insert into requests values ('2', '2', '2018-05-06', 'issue' );
update book set status = 'requested' where bid = '2';
insert into requests values ('1', '2', '2018-03-02', 'issue' );
update book set status = 'requested' where bid = '1';
insert into requests values ('1', '3', '2018-03-02', 'issue' );
update book set status = 'requested' where bid = '1';
insert into requests values ('6', '3', '2018-12-02', 'issue' );
update book set status = 'requested' where bid = '6';
insert into requests values ('7', '3', '2018-03-20', 'issue' );
update book set status = 'requested' where bid = '7';


insert into issued values ('3','1', '2018-10-16','2018-10-26', '0');
delete from requests where bid = '3' ;
update book set status = 'issued' where bid = '3';

insert into issued values ('4','1', '2018-10-18','2018-10-28', '0');
delete from requests where bid = '4' ;
update book set status = 'issued' where bid = '4';

insert into issued values ('5','1', '2018-10-17','2018-10-27', '0');
delete from requests where bid = '5' ;
update book set status = 'issued' where bid = '5';









insert into issued values ('4','7', '2018-06-02','2018-03-12', '60');


select sum(fine) from issued where cid='$cid' ";
select * from book as b inner join issued as i on b.bid = i.bid and i.cid = '$cid';











