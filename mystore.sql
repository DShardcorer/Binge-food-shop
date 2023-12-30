-- Database: mystore

CREATE TABLE admin_table (
  admin_id serial PRIMARY KEY,
  admin_name varchar(100) NOT NULL,
  admin_email varchar(200) NOT NULL,
  admin_password varchar(255) NOT NULL
);

INSERT INTO admin_table (admin_name, admin_email, admin_password) VALUES
('caohuydong123', 'caohuydong123@gmail.com', '$2y$10$mTQhplrDLpOKos5rJMAhyuqH8HaoS9s1jyWiN7hx0jgwhHvS9PuTG');

CREATE TABLE brands (
  brand_id serial PRIMARY KEY,
  brand_title varchar(100) NOT NULL
);

INSERT INTO brands (brand_title) VALUES
('Walmart'),
('Feastable'),
('Mc Donald'),
('Hershey'),
('Marie Callender'),
('Coca Cola'),
('Starbucks');

CREATE TABLE cart_details (
  product_id int PRIMARY KEY,
  ip_address varchar(255) NOT NULL,
  quantity int NOT NULL DEFAULT 1
);

CREATE TABLE categories (
  category_id serial PRIMARY KEY,
  category_title varchar(100) NOT NULL
);

INSERT INTO categories (category_title) VALUES
('Frozen Food'),
('Sweet'),
('Fast Food'),
('Beverage');

CREATE TABLE orders_pending (
  order_id serial PRIMARY KEY,
  user_id int NOT NULL,
  invoice_number int NOT NULL,
  product_id int NOT NULL,
  quantity int NOT NULL,
  order_status varchar(255) NOT NULL
);

INSERT INTO orders_pending (user_id, invoice_number, product_id, quantity, order_status) VALUES
(2, 57829582, 5, 1, 'pending'),
(2, 1555129910, 7, 1, 'pending'),
(2, 1226490741, 3, 1, 'pending');

CREATE TABLE order_info (
  order_id int NOT NULL,
  product_id int NOT NULL,
  quantity int NOT NULL
);

INSERT INTO order_info (order_id, product_id, quantity) VALUES
(363298888, 2, 1),
(363298888, 6, 8),
(363298888, 7, 1),
(2, 2, 1),
(2, 7, 7),
(2, 7, 1),
(2, 4, 5),
(2, 7, 1),
(2, 4, 1);

CREATE TABLE products (
  product_id serial PRIMARY KEY,
  product_title varchar(100) NOT NULL,
  product_description varchar(500) NOT NULL,
  product_keywords varchar(255) NOT NULL,
  category_id int NOT NULL,
  brand_id int NOT NULL,
  product_image1 varchar(255) NOT NULL,
  product_image2 varchar(255) NOT NULL,
  product_image3 varchar(255) NOT NULL,
  product_price float NOT NULL,
  date timestamp NOT NULL DEFAULT current_timestamp,
  status varchar(100) NOT NULL,
  amount_sold int NOT NULL DEFAULT 0
);

INSERT INTO products (product_title, product_description, product_keywords, category_id, brand_id, product_image1, product_image2, product_image3, product_price, status, amount_sold) VALUES
('Feastables MrBeast Original Chocolate Bar, 2.1 oz (60g), 1 bar', 'Feastables is on a mission to change the way you snack. We’ve created delicious snacks with ingredients you can trust. Founded by MrBeast (aka Jimmy Donaldson), our chocolate will not only level up your day, but it will leave you wondering how you can get', 'chocolate, feastable, mrbeast, candy, sweet', 5, 2, 'Feastables-MrBeast-Original-Chocolate-Bar-2-1-oz-60g-1-bar_d0745983-d650-4010-9508-0398856c6191.746bd07e7ac9e3fd158847e047f26a44.webp', '031f1d95-1141-4756-afa2-d6cd75ed1998.80642e59de976bf071dc34eadb53ec34.webp', '6bb1e8e6-3bd4-4305-8d0e-2f8f410d00b7.d3ad502ee1cbfcc3430c25e9bbedd7c5.webp', 2.8, 'true', 0),
('Hershey''s Special Dark Mildly Sweet Chocolate Giant Candy, Bar 7.56 oz, 25 Pieces', 'It''s all in the name! This HERSHEY''S SPECIAL DARK chocolate treat is made from delectable, rich dark chocolate that''s been a classic for decades, HERSHEY''S SPECIAL DARK mildly sweet chocolate bars make life more delicious. Whether you enjoy this tasty giant size candy bar alone or shared with loved ones, one thing you can count on is experiencing the same great taste you know and love. This giant candy bar is the perfect treat for countless special and everyday occasions. They can be used to stu', 'chocolate, hershey, sweet', 5, 4, 'hershey1.webp', 'hershey2.webp', 'hershey3.webp', 2.59, 'true', 0),
('Marie Callender''s Southern Pecan Pie, 32 oz (Frozen)', 'Finish any meal with the comforting, homemade taste of Marie Callender''s Pies. Treat family, friends, and yourself in a pinch with this delicious pecan pie, perfect for completing your Thanksgiving or Christmas dinner, or revisiting comforting holiday flavors any time of year. Savor this pie brimming with a sweet, luscious filling topped with crisp pecans. Flaky made-from-scratch crust makes each bite satisfying. Thaw while you''re entertaining or preparing dinner and serve after for a treat that', 'pecan, pie, frozen, marie callender', 4, 5, 'Marie-Callender-s-Southern-Pecan-Pie-32-oz-Frozen_0fe3719a-b745-4bde-a19e-e9a39dfc0eed.96fbcb4fa419322be8bd2d16ebf95a75.webp', 'Marie-Callender-s-Southern-Pecan-Pie-32-oz-3.webp', 'Marie-Callender-s-Southern-Pecan-Pie-32-oz-2.webp', 1.99, 'true', 0),
('Marie Callender''s Aged Cheddar Cheesy Chicken & Rice Bowl, Frozen Meal, 12 oz (Frozen)', 'Take comfort food to the next level with Marie Callender''s Cheesy Chicken & Rice Bowl. Tender chicken breast, rice and broccoli are topped with a rich cheese sauce for a tasty spin on a classic dish. Quick, convenient and ready in minutes, these microwaveable meals are ideal for weeknight dinners or anytime meals. Enjoy made-from-scratch flavor in minutes with Marie Callender''s.', 'chicken,rice,frozen', 4, 5, 'marie-chicken-and-rice-1.webp', 'marie-chicken-and-rice-2.webp', 'marie-chicken-and-rice-3.webp', 7.99, 'true', 0),
('Feastables Mr Beast Peanut Butter Chocolate Chip Cookies, 6 oz', 'Feastables is on a mission to change the way you snack. Founded by MrBeast in order to create delicious snacks with ingredients you can trust. Our snacks will not only level up your day, but it will leave you wondering how you can get your hands on more.', 'cookie, feastable, mrbeast', 5, 2, 'cookie-feast-1.webp', 'cookie-feast-2.webp', 'cookie-feast-3.webp', 12, 'true', 0),
('Coca-Cola Soda Pop, 12 fl oz, 12 Pack Cans', 'Soda. Pop. Soft drink. Sparkling beverage.Whatever you call it, nothing compares to the refreshing, crisp taste of Coca-Cola Original Taste, the delicious soda you know and love. Enjoy with friends, on the go or with a meal. Whatever the occasion, wherever you are, Coca-Cola Original Taste makes life’s special moments a little bit better.Carefully crafted in 1886, its great taste has stood the test of time. Something so delicious, so unique and so familiar, it’s what makes you think “Coca-Cola” ', 'coca, cola, drink, beverage, can', 7, 6, 'coca1.webp', 'coca2.webp', 'coca3.webp', 0.99, 'true', 0),
('Starbucks Frappuccino Pumpkin Spice Chilled Coffee Drink, 13.7 Fl. Oz.', 'Limited edition pumpkin spiceYour favorite frappuccino with the classic flavor of Fall13.7 ounce glass bottle', 'frappuchino, coffee', 7, 7, 'frappu-starbuck1.webp', 'frappu-starbuck2.webp', 'frappu-starbuck3.webp', 8.99, 'true', 0);

CREATE TABLE user_orders (
  order_id serial PRIMARY KEY,
  user_id int NOT NULL,
  amount_due float NOT NULL,
  invoice_number int NOT NULL,
  total_products int NOT NULL,
  order_date timestamp NOT NULL DEFAULT current_timestamp,
  order_status varchar(255) NOT NULL
);

INSERT INTO user_orders (user_id, amount_due, invoice_number, total_products, order_date, order_status) VALUES
(2, 20.4, 57829582, 2, '2023-12-29 01:28:21', 'Completed'),
(2, 24.53, 1555129910, 7, '2023-12-29 01:23:03', 'pending'),
(2, 24.39, 1226490741, 9, '2023-12-29 01:23:39', 'pending'),
(2, 19.5, 363298888, 3, '2023-12-28 19:53:42', 'pending'),
(2, 65.52, 1660454569, 2, '2023-12-28 19:58:33', 'pending'),
(2, 8.99, 88273661, 1, '2023-12-28 20:26:13', 'pending'),
(2, 48.94, 1368799502, 2, '2023-12-28 20:27:41', 'pending'),
(2, 7.99, 135192188, 1, '2023-12-30 05:47:56', 'pending');

CREATE TABLE user_payments (
  payment_id serial PRIMARY KEY,
  order_id int NOT NULL,
  invoice_number int NOT NULL,
  amount int NOT NULL,
  payment_mode varchar(255) NOT NULL,
  date timestamp NOT NULL DEFAULT current_timestamp
);

INSERT INTO user_payments (order_id, invoice_number, amount, payment_mode) VALUES
(1, 1605730693, 1605730693, ''),
(1, 57829582, 57829582, '');

CREATE TABLE user_table (
  user_id serial PRIMARY KEY,
  username varchar(100) NOT NULL,
  user_email varchar(100) NOT NULL,
  user_password varchar(255) NOT NULL,
  user_image varchar(255) NOT NULL,
  user_ip varchar(100) NOT NULL,
  user_address varchar(255) NOT NULL,
  user_mobile varchar(20) NOT NULL
);

INSERT INTO user_table (username, user_email, user_password, user_image, user_ip, user_address, user_mobile) VALUES
('Cao Huy Dong', 'caohuydong123@gmail.com', '$2y$10$HBL9BYdyYO72Zy0ukpmjVO7Q.rclpKrVluncVU8SaipGFG93W5J2W', 'logo-soict-hust-1.png', '::1', 'Alabama', '0843182003'),
('Ngo Khanh', 'khanhngo@gmail.com', '$2y$10$z/OpBYRdZErs5J1SIz0.YOa7U1bkEbwJ4m4lXcRX/B4Eq7H.CxaA6', 'HUST.png', '::1', 'hanoi', '1234'),
('caohuydong', 'caohuydong3108@gmail.com', '$2y$10$eAsq7gvG/IBCCfBn/BIwZeXoGX4s07V4iUNGIrSrjYgjXX.xhUCvC', 'HUST.png', '::1', 'hanoi', '0999');


CREATE OR REPLACE FUNCTION update_amount_sold()
RETURNS TRIGGER AS $$
BEGIN
    -- Update the amount_sold in products table
    UPDATE products
    SET amount_sold = amount_sold + NEW.quantity
    WHERE product_id = NEW.product_id;

    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER order_info_insert_trigger
AFTER INSERT ON order_info
FOR EACH ROW
EXECUTE FUNCTION update_amount_sold();
