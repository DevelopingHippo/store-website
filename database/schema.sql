# clear out current database tables
use store;

# universal "store" table
create table store(
	productType VARCHAR(20),
	productName VARCHAR(50),
    price DECIMAL(6,2) check (price >= 0),
    primary key (productName)
);

# create "users" table for employee and customer information
create table users (
	username VARCHAR(30) NOT NULL,
    firstname VARCHAR(30),
    lastname VARCHAR(30),
    email VARCHAR(40),
    password VARCHAR(40) NOT NULL,
    type VARCHAR(30),
    admin boolean,
    primary key (username)
);

# create "cart" table for user cart information
create table cart (
	username VARCHAR(30) NOT NULL,
    productName VARCHAR(50),
    foreign key (username) references users(username)
    on delete cascade,
    foreign key (productName) references store(productName)
    on delete cascade
);

create table purchaseHistory (
	receiptID BIGINT NOT NULL,
    username VARCHAR(30) NOT NULL,
	productName VARCHAR(50),
    productType VARCHAR(20),
    manufacturer VARCHAR(25),
	serialNum BIGINT NOT NULL,
    price DECIMAL(6,2) check (price >= 0),
    foreign key (productName) references store(productName)
    ON DELETE NO ACTION,
    primary key (serialNum)
);

# create "cpu" table for cpu product information
create table cpu (
	productName VARCHAR(50),
    serialNum BIGINT NOT NULL check(serialNum >= 1100000000 and serialNum < 2200000000),
    manufacturer VARCHAR(25),
    socket VARCHAR(15),
    coreCount INT,
    coreClock DECIMAL(3,2),
    coreClockBoost DECIMAL(3,2),
    primary key (serialNum),
	foreign key (productName) references store (productName)
	on delete cascade
);

# create "gpu" table for graphics card information
create table gpu (
	productName VARCHAR(50),
    serialNum BIGINT NOT NULL check(serialNum >= 2200000000 and serialNum < 3300000000),
    manufacturer VARCHAR(25),
    coreClock INT,
    memory INT,
    color VARCHAR(15),
    primary key (serialNum),
	foreign key (productName) references store (productName)
	on delete cascade
);

create table psu (
	productName VARCHAR(50),
    serialNum BIGINT NOT NULL check(serialNum >= 3300000000 and serialNum < 4400000000),
    manufacturer VARCHAR(25),
    wattage INT,
    modular VARCHAR(10),
    efficiency VARCHAR(30),
    primary key (serialNum),
	foreign key (productName) references store (productName)
	on delete cascade
);

create table ram (
	productName VARCHAR(50),
    serialNum BIGINT NOT NULL check(serialNum >= 4400000000 and serialNum < 5500000000),
    manufacturer VARCHAR(25),
    speed INT,
    size INT,
    amount INT,
    color VARCHAR(15),
    primary key (serialNum),
	foreign key (productName) references store (productName)
	on delete cascade
);

create table motherboard (
	productName VARCHAR(50),
    serialNum BIGINT NOT NULL check(serialNum >= 5500000000 and serialNum < 6600000000),
    manufacturer VARCHAR(25),
    socket VARCHAR(10),
    memoryMax INT,
    memorySlots INT,
    color VARCHAR(15),
    primary key (serialNum),
	foreign key (productName) references store (productName)
	on delete cascade
);


CREATE VIEW psuStock AS (SELECT productName, COUNT(productName) AS stockCount FROM psu GROUP BY productName);
CREATE VIEW cpuStock AS (SELECT productName, COUNT(productName) AS stockCount FROM cpu GROUP BY productName);
CREATE VIEW motherboardStock AS (SELECT productName, COUNT(productName) AS stockCount FROM motherboard GROUP BY productName);
CREATE VIEW gpuStock AS (SELECT productName, COUNT(productName) AS stockCount FROM gpu GROUP BY productName);
CREATE VIEW ramStock AS (SELECT productName, COUNT(productName) AS stockCount FROM ram GROUP BY productName);
CREATE VIEW storeStock AS (SELECT * FROM cpuStock UNION SELECT * FROM motherboardStock UNION SELECT * FROM psuStock UNION SELECT * FROM gpuStock UNION SELECT * FROM ramStock);