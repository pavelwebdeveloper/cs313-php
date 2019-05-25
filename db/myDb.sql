CREATE TABLE productdepartment (
id SERIAL PRIMARY KEY,
productdepartmentname VARCHAR(50)
);

CREATE TABLE productgroup (
id SERIAL PRIMARY KEY,
productgroupname VARCHAR(50),
productdepartmentId INT NOT NULL REFERENCES productdepartment (id),
image VARCHAR(150) 
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

INSERT INTO productdepartment (productdepartmentname) VALUES ('Clocks');
INSERT INTO productdepartment (productdepartmentname) VALUES ('Electronics');
INSERT INTO productdepartment (productdepartmentname) VALUES ('Tourism');

SELECT * FROM productdepartment;

DROP TABLE productdepartment;



INSERT INTO productgroup (productgroupname, productdepartmentId, image) VALUES ('Digital clocks', 1, '/images/product_subgroup_images/clocks/digitalclocks/digital-clock-2476496_1280.jpg');
INSERT INTO productgroup (productgroupname, productdepartmentId, image) VALUES ('Wall clocks', 1, '/images/product_subgroup_images/clocks/wallclocks/clock-773307_1280.jpg');
INSERT INTO productgroup (productgroupname, productdepartmentId, image) VALUES ('Watches', 1, '/images/product_subgroup_images/clocks/watches/watch-756487_1280.jpg');
INSERT INTO productgroup (productgroupname, productdepartmentId, image) VALUES ('Cameras', 2, '/images/product_subgroup_images/electronics/cameras/camera-2251252_1280.jpg');
INSERT INTO productgroup (productgroupname, productdepartmentId, image) VALUES ('Laptops', 2, '/images/product_subgroup_images/electronics/laptops/computer-3036166_1280.jpg');
INSERT INTO productgroup (productgroupname, productdepartmentId, image) VALUES ('Smartphones', 2, '/images/product_subgroup_images/electronics/smartphones/ios-1091302_1280.jpg');
INSERT INTO productgroup (productgroupname, productdepartmentId, image) VALUES ('Backpacks', 3, '/images/product_subgroup_images/tourism/backpacks/travel-bag-3256390_1280.jpg');
INSERT INTO productgroup (productgroupname, productdepartmentId, image) VALUES ('Binoculars', 3, '/images/product_subgroup_images/tourism/binoculars/binoculars-769036_1280.jpg');
INSERT INTO productgroup (productgroupname, productdepartmentId, image) VALUES ('Tents', 3, '/images/product_subgroup_images/clocks/tents/travel-bag-3256390_1280.jpg');

SELECT * FROM productgroup;

ALTER TABLE productgroup ADD image VARCHAR(150);

DELETE FROM productgroup;


INSERT INTO product (product, productgroupId, productdepartmentId, productdescription, image, price, stock) VALUES ('Digital Alarm Clock', 12, 1, 'Small Digital Alarm Clock, LED Display Time/Date/Alarm/Temperature, Optional Weekday Mode, Battery Powered & USB Powered for Bedroom, Office, Travel', '/images/product_images/clocks/digitalclocks/clock-997589_1280.jpg', 20, 50);
INSERT INTO product (product, productgroupId, productdepartmentId, productdescription, image, price, stock) VALUES ('Digital Alarm Clock', 12, 1, 'Small Digital Alarm Clock, LED Display Time/Date/Alarm/Temperature, Optional Weekday Mode, Battery Powered & USB Powered for Bedroom, Office, Travel', '/images/product_images/clocks/digitalclocks/radio-alarm-clock-2947068_1280.jpg', 15, 50);
INSERT INTO product (product, productgroupId, productdepartmentId, productdescription, image, price, stock) VALUES ('Digital Alarm Clock', 12, 1, 'Small Digital Alarm Clock, LED Display Time/Date/Alarm/Temperature, Optional Weekday Mode, Battery Powered & USB Powered for Bedroom, Office, Travel', '/images/product_images/clocks/digitalclocks/time-of-2353382_1280.jpg', 17, 50);
INSERT INTO product (product, productgroupId, productdepartmentId, productdescription, image, price, stock) VALUES ('Wall Clock', 13, 1, 'Silent 10 Inch Wall Clock Non-Ticking Universal Indoor Decorative Digital Quiet Sweep Movement Metal Round Battery Operated Clocks for Office/Kitchen/Bedroom/Living Room', '/images/product_images/clocks/wallclocks/clock-147257_1280.jpg', 10, 100);
INSERT INTO product (product, productgroupId, productdepartmentId, productdescription, image, price, stock) VALUES ('Wall Clock', 13, 1, 'Silent 10 Inch Wall Clock Non-Ticking Universal Indoor Decorative Digital Quiet Sweep Movement Metal Round Battery Operated Clocks for Office/Kitchen/Bedroom/Living Room', '/images/product_images/clocks/wallclocks/clock-2634551_1280.jpg', 13, 100);
INSERT INTO product (product, productgroupId, productdepartmentId, productdescription, image, price, stock) VALUES ('Wall Clock', 13, 1, 'Silent 10 Inch Wall Clock Non-Ticking Universal Indoor Decorative Digital Quiet Sweep Movement Metal Round Battery Operated Clocks for Office/Kitchen/Bedroom/Living Room', '/images/product_images/clocks/wallclocks/wall-clock-3623_1280.jpg', 11, 100);
INSERT INTO product (product, productgroupId, productdepartmentId, productdescription, image, price, stock) VALUES ('Watch', 14, 1, 'Watch Simple Casual Analog Quartz Date, Stainless Steel Luminous Waterproof 30M', '/images/product_images/clocks/digitalclocks/blur-brass-bronze-2113994.jpg', 25, 70);
INSERT INTO product (product, productgroupId, productdepartmentId, productdescription, image, price, stock) VALUES ('Watch', 14, 1, 'Watch Simple Casual Analog Quartz Date, Stainless Steel Luminous Waterproof 30M', '/images/product_images/clocks/digitalclocks/time-3091031_1280.jpg', 30, 150);
INSERT INTO product (product, productgroupId, productdepartmentId, productdescription, image, price, stock) VALUES ('Watch', 14, 1, 'Watch Simple Casual Analog Quartz Date, Stainless Steel Luminous Waterproof 30M', '/images/product_images/clocks/digitalclocks/wristwatch-407096_1280.jpg', 35, 170);
INSERT INTO product (product, productgroupId, productdepartmentId, productdescription, image, price, stock) VALUES ('Camera', 15, 2, 'D35500 24.2MP DSLR Camera w/AF-P 18-55mm VR Lens & 70-300mm Dual Zoom Lens - (Renewed) + 16GB Bundle', '/images/product_images/electronics/cameras/camera-4198213_1280.jpg', 420, 30);
INSERT INTO product (product, productgroupId, productdepartmentId, productdescription, image, price, stock) VALUES ('Camera', 15, 2, 'D35500 24.2MP DSLR Camera w/AF-P 18-55mm VR Lens & 70-300mm Dual Zoom Lens - (Renewed) + 16GB Bundle', '/images/product_images/electronics/cameras/display-272270_1280.jpg', 450, 40);
INSERT INTO product (product, productgroupId, productdepartmentId, productdescription, image, price, stock) VALUES ('Camera', 15, 2, 'D35500 24.2MP DSLR Camera w/AF-P 18-55mm VR Lens & 70-300mm Dual Zoom Lens - (Renewed) + 16GB Bundle', '/images/product_images/electronics/cameras/photo-431119_1280.jpg', 500, 20);
INSERT INTO product (product, productgroupId, productdepartmentId, productdescription, image, price, stock) VALUES ('Laptop', 16, 2, 'Flex 5 15.6-Inch 2-in-1 Laptop, (Intel Core i5-8250U 8GB DDR4 256GB PCle SSD Windows 10) 81CA0008US', '/images/product_images/electronics/laptops/laptop-1890547_1280.jpg', 800, 100);
INSERT INTO product (product, productgroupId, productdepartmentId, productdescription, image, price, stock) VALUES ('Laptop', 16, 2, 'Flex 5 15.6-Inch 2-in-1 Laptop, (Intel Core i5-8250U 8GB DDR4 256GB PCle SSD Windows 10) 81CA0008US', '/images/product_images/electronics/laptops/laptop-in-the-office-1967479_1280.jpg', 900, 100);
INSERT INTO product (product, productgroupId, productdepartmentId, productdescription, image, price, stock) VALUES ('Laptop', 16, 2, 'Flex 5 15.6-Inch 2-in-1 Laptop, (Intel Core i5-8250U 8GB DDR4 256GB PCle SSD Windows 10) 81CA0008US', '/images/product_images/electronics/laptops/macbook-924781_1280.jpg', 1000, 100);
INSERT INTO product (product, productgroupId, productdepartmentId, productdescription, image, price, stock) VALUES ('Smartphone', 17, 2, 'Full Screen Unlocked Smartphone | 6.1 inch Android 8.1 Ultrathin 4 HD Camera Cell Phones | GSM 4G LTE WiFi Mobile Phone 1G RAM, 16GB ROM, 8-Core Processor Cellphone Telephones 2 SIM', '/images/product_images/electronics/smartphones/cellphone-cellular-device-50684.jpg', 100, 70);
INSERT INTO product (product, productgroupId, productdepartmentId, productdescription, image, price, stock) VALUES ('Smartphone', 17, 2, 'Full Screen Unlocked Smartphone | 6.1 inch Android 8.1 Ultrathin 4 HD Camera Cell Phones | GSM 4G LTE WiFi Mobile Phone 1G RAM, 16GB ROM, 8-Core Processor Cellphone Telephones 2 SIM', '/images/product_images/electronics/smartphones/iphone-6s-plus-1534380_1280.jpg', 90, 150);
INSERT INTO product (product, productgroupId, productdepartmentId, productdescription, image, price, stock) VALUES ('Smartphone', 17, 2, 'Full Screen Unlocked Smartphone | 6.1 inch Android 8.1 Ultrathin 4 HD Camera Cell Phones | GSM 4G LTE WiFi Mobile Phone 1G RAM, 16GB ROM, 8-Core Processor Cellphone Telephones 2 SIM', '/images/product_images/electronics/smartphones/smartphone-153650_1280.jpg', 115, 170);
INSERT INTO product (product, productgroupId, productdepartmentId, productdescription, image, price, stock) VALUES ('Backpack', 18, 3, 'Hiking Backpack 50L - Hiking & Travel Carry-On Backpack w/Waterproof Rain Cover - for Hiking, Traveling & Camping', '/images/product_images/tourism/backpacks/backpack-499000_1280.jpg', 50, 300);
INSERT INTO product (product, productgroupId, productdepartmentId, productdescription, image, price, stock) VALUES ('Backpack', 18, 3, 'Hiking Backpack 50L - Hiking & Travel Carry-On Backpack w/Waterproof Rain Cover - for Hiking, Traveling & Camping', '/images/product_images/tourism/backpacks/backpack-3369137_1280.jpg', 45, 400);
INSERT INTO product (product, productgroupId, productdepartmentId, productdescription, image, price, stock) VALUES ('Backpack', 18, 3, 'Hiking Backpack 50L - Hiking & Travel Carry-On Backpack w/Waterproof Rain Cover - for Hiking, Traveling & Camping', '/images/product_images/tourism/backpacks/bags-139758_1280.jpg', 60, 200);
INSERT INTO product (product, productgroupId, productdepartmentId, productdescription, image, price, stock) VALUES ('Binoculars', 19, 3, '10x42 Roof Prism Binoculars for Adults, HD Professional Binoculars for Bird Watching Travel Stargazing Concerts Sports-BAK4 Prism FMC Lens-with Phone Mount Strap Carrying Bag', '/images/product_images/tourism/binoculars/binoculars-2164526_1920.jpg', 60, 100);
INSERT INTO product (product, productgroupId, productdepartmentId, productdescription, image, price, stock) VALUES ('Binoculars', 19, 3, '10x42 Roof Prism Binoculars for Adults, HD Professional Binoculars for Bird Watching Travel Stargazing Concerts Sports-BAK4 Prism FMC Lens-with Phone Mount Strap Carrying Bag', '/images/product_images/tourism/binoculars/binoculars-black-equipment-55804.jpg', 90, 100);
INSERT INTO product (product, productgroupId, productdepartmentId, productdescription, image, price, stock) VALUES ('Binoculars', 19, 3, '10x42 Roof Prism Binoculars for Adults, HD Professional Binoculars for Bird Watching Travel Stargazing Concerts Sports-BAK4 Prism FMC Lens-with Phone Mount Strap Carrying Bag', '/images/product_images/tourism/binoculars/telescope-685174_1920.jpg', 70, 100);
INSERT INTO product (product, productgroupId, productdepartmentId, productdescription, image, price, stock) VALUES ('Tent', 20, 3, 'Instant Pop Up Tent 3-Person Family Camping Tent with Carrying Bag for Outdoor Camping Hiking Fishing Travel Beach Park, Lightweight, All Season, 290 x 200 x 130 cm', '/images/product_images/tourism/tents/beach-3604912_1280.jpg', 100, 70);
INSERT INTO product (product, productgroupId, productdepartmentId, productdescription, image, price, stock) VALUES ('Tent', 20, 3, 'Instant Pop Up Tent 3-Person Family Camping Tent with Carrying Bag for Outdoor Camping Hiking Fishing Travel Beach Park, Lightweight, All Season, 290 x 200 x 130 cm', '/images/product_images/tourism/tents/smartphones/tent-1324847_1280.jpg', 90, 150);
INSERT INTO product (product, productgroupId, productdepartmentId, productdescription, image, price, stock) VALUES ('Tent', 20, 3, 'Instant Pop Up Tent 3-Person Family Camping Tent with Carrying Bag for Outdoor Camping Hiking Fishing Travel Beach Park, Lightweight, All Season, 290 x 200 x 130 cm', '/images/product_images/tourism/tents/smartphones/tent-3933238_1280.jpg', 115, 170);

SELECT * FROM product;