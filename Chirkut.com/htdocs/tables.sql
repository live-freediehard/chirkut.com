CREATE TABLE users (
userId SMALLINT(3) UNSIGNED NOT NULL AUTO_INCREMENT, 
userName VARCHAR(30) NOT NULL, 
userPass VARCHAR(32) NOT NULL, 
userIP VARCHAR(32),
PRIMARY KEY (userId), 
UNIQUE KEY username (username) 
); 

INSERT INTO users (userName, userPass) VALUES ('testUser', MD5('testPass')); 


create table user_info(
Id SMALLINT(3) UNSIGNED NOT NULL AUTO_INCREMENT, 
userName VARCHAR(30) NOT NULL, 
userbday VARCHAR(30),
userph VARCHAR(30),
userem VARCHAR(30),
PRIMARY KEY (Id), 
FOREIGN KEY (userName) REFERENCES users (userName) on delete cascade
);

create table user_question(
Id SMALLINT(3) UNSIGNED NOT NULL AUTO_INCREMENT, 
userName VARCHAR(30) NOT NULL, 
ques VARCHAR(30) NOT NULL,
ans VARCHAR(30) NOT NULL,
PRIMARY KEY (Id), 
FOREIGN KEY (userName) REFERENCES users (userName) on delete cascade
);


create table messages(
Id SMALLINT(3) UNSIGNED NOT NULL AUTO_INCREMENT, 
tuserName VARCHAR(30) NOT NULL, 
fuserName VARCHAR(30) NOT NULL, 
message VARCHAR(200) NOT NULL,
PRIMARY KEY (Id), 
FOREIGN KEY (tuserName) REFERENCES users (userName) on delete cascade,
FOREIGN KEY (fuserName) REFERENCES users (userName) on delete cascade
);


CREATE TABLE friend_list(
Id SMALLINT( 3 ) UNSIGNED NOT NULL AUTO_INCREMENT ,
userName VARCHAR( 30 ) NOT NULL ,
friendName VARCHAR( 30 ) NOT NULL ,
PRIMARY KEY ( Id ) ,
FOREIGN KEY ( userName ) REFERENCES users( userName ) ON DELETE CASCADE ,
FOREIGN KEY ( friendName ) REFERENCES users( userName ) ON DELETE CASCADE 
);

create table tbl_images(
Id SMALLINT(3) UNSIGNED NOT NULL AUTO_INCREMENT, 
userName VARCHAR(30) NOT NULL, 
image blob NOT NULL,
PRIMARY KEY (Id), 
FOREIGN KEY (userName) REFERENCES users (userName) on delete cascade
);



CREATE TABLE pending_list(
Id SMALLINT( 3 ) UNSIGNED NOT NULL AUTO_INCREMENT ,
userName VARCHAR( 30 ) NOT NULL ,
friendName VARCHAR( 30 ) NOT NULL ,
PRIMARY KEY ( Id ) ,
FOREIGN KEY ( userName ) REFERENCES users( userName ) ON DELETE CASCADE ,
FOREIGN KEY ( friendName ) REFERENCES users( userName ) ON DELETE CASCADE 
);



create table user_images(
userName VARCHAR(30) NOT NULL, 
image blob NULL,
PRIMARY KEY (userName), 
FOREIGN KEY (userName) REFERENCES users (userName) on delete cascade
);
