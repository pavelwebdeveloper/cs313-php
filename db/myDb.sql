CREATE TABLE productdepartment (
id SERIAL PRIMARY KEY,
productdepartmentname VARCHAR(50)
);

CREATE TABLE productgroup (
id SERIAL PRIMARY KEY,
productgroupname VARCHAR(50),
productdepartmentId INT NOT NULL REFERENCES productdepartment (id) 
);

CREATE TABLE product (
id SERIAL PRIMARY KEY,
product VARCHAR(100),
productgroupId INT NOT NULL REFERENCES productgroup (id),
productdepartmentId INT NOT NULL REFERENCES productdepartment (id),
productdescription TEXT,
image VARCHAR(150),
price DECIMAL(10,2),
stock INT NOT NULL 
);

CREATE TABLE productorder (
id SERIAL PRIMARY KEY,
productId INT NOT NULL REFERENCES product (id),
productgroupId INT NOT NULL REFERENCES productgroup (id),
productdepartmentId INT NOT NULL REFERENCES productdepartment (id),
amountoforder INT NOT NULL,
orderdate DATE,
userId INT NOT NULL
);

CREATE TABLE storeuser (
id SERIAL PRIMARY KEY,
username VARCHAR(100) NOT NULL,
email VARCHAR(100) NOT NULL,
password VARCHAR(100) NOT NULL,
userlevel INT NOT NULL
);

CREATE TABLE image (
id SERIAL PRIMARY KEY,
imagename VARCHAR(100) NOT NULL,
productId INT NOT NULL REFERENCES product (id),
imagepath VARCHAR(150) NOT NULL,
imagedate DATE 
);