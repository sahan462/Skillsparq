create database skillsparq;
show databases;
use skillsparq;
show tables;
create table User(
	user_id int(10) unsigned NOT NULL AUTO_INCREMENT,
	user_email varchar(255) DEFAULT NULL UNIQUE,
	user_password varchar(255) DEFAULT NULL,
	role varchar(255) DEFAULT NULL,
    agreement bool default 0,
	primary key(user_id)
);

create table Buyer(
	buyer_id int(10) unsigned NOT NULL AUTO_INCREMENT,
    primary key(buyer_id),
    foreign key(buyer_id) references User(user_id)
);

create table Profile(
	user_name varchar(255) ,
	profile_pic varchar(255) DEFAULT NULL,
    first_name varchar(255) DEFAULT NULL,
	last_name varchar(255) DEFAULT NULL,
    country varchar(255) DEFAULT NULL,
    joined_date date DEFAULT NULL,
    last_seen varchar(255) DEFAULT NULL,
    about text DEFAULT NULL,
    languages text Default NULL,
    skills text Default NULL,
    user_id int(10) unsigned,
    primary key(user_name, user_id),
    foreign key(user_id) references User(user_id)
);

create table Seller(
	seller_id int(10) unsigned NOT NULL AUTO_INCREMENT,
    phone_number varchar(255) DEFAULT NULL UNIQUE,
    primary key(seller_id),
    foreign key(seller_id) references User(user_id)
);

CREATE TABLE Jobs (
    job_id int(10) unsigned AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    file VARCHAR(255) default NULL,
    category VARCHAR(50) default NULL,
	deadline DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
    publish_mode varchar(255) default null,
    amount varchar(255) default NULL,
	flexible_amount TINYINT default 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
    buyer_id int(10) unsigned,
    primary key(job_id),
    foreign key(buyer_id) references user(user_id)
);

create table Auctions (
	auction_id int(10) unsigned AUTO_INCREMENT,
    start_time DATETIME NOT NULL,
    end_time DATETIME NOT NULL,
    starting_bid varchar(255) NOT NULL,
    min_bid_amount varchar(255) NOT NULL,
    current_highest_bid varchar(255),
    winning_bidder_id int(10) unsigned NOT NULL, 
	job_id int(10) unsigned,
	buyer_id int(10) unsigned,
    primary key(auction_id),
    FOREIGN KEY (job_id) REFERENCES Jobs(job_id),
	FOREIGN KEY (buyer_id) REFERENCES user(user_id)
);

select * from User;
select * from Buyer;
select * from Profile;
select * from seller;
select * from jobs;


delete from jobs where job_id = 2;
delete from user where user_id = 1;
update user set user_email = "dummy" where user_id = 3;

drop table User;
drop table Profile;
drop table Buyer;
drop table seller;
drop table jobs;
drop table auctions;

select * from jobs, auctions where jobs.buyer_id = auctions.buyer_id;
select * from jobs, auctions where jobs.buyer_id = '1' and ((jobs.publish_mode = "Standard Mode") or (jobs.publish_mode = "Auction Mode" and jobs.job_id = auctions.job_id));
select * from jobs, auctions where (jobs.publish_mode = "Auction Mode" and jobs.job_id = auctions.job_id and jobs.buyer_id = '1') or (jobs.publish_mode = "Standard Mode" and jobs.buyer_id = '1');

SELECT job_id, title, description, publish_mode
FROM Jobs
WHERE buyer_id = 1
AND publish_mode = 'Standard Mode'

UNION 

SELECT j.job_id, j.title, j.description, j.publish_mode
FROM Jobs j
JOIN Auctions a ON j.job_id = a.job_id
WHERE j.buyer_id = 1 
AND j.publish_mode = 'Auction Mode'

ORDER BY job_id;
select * from auctions;
SELECT * FROM Auctions WHERE job_id = 2 and buyer_id = 1;
INSERT INTO User (user_email, user_password, role, agreement)VALUES ('test@admin.com', 'password123', 'Admin', 1);
update user set role = 'Admin' where user_id = 3;
