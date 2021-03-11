
DROP TABLE users ; 
CREATE TABLE users(
	id serial primary key,
	lname varchar (30), 
	fname varchar (30), 
	login varchar(70),
	pass varchar(255), 
	birth date, 
	gender varchar(1) 
)