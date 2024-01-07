-- Database: mystore

CREATE TABLE admin_table (
  admin_id serial PRIMARY KEY,
  admin_name varchar(100) NOT NULL,
  admin_email varchar(200) NOT NULL,
  admin_password varchar(255) NOT NULL
);

CREATE TABLE brands (
  brand_id serial PRIMARY KEY,
  brand_title varchar(100) NOT NULL
);

CREATE TABLE categories (
  category_id serial PRIMARY KEY,
  category_title varchar(100) NOT NULL
);

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
  amount_sold int NOT NULL DEFAULT 0,
  CONSTRAINT fk_products_categories FOREIGN KEY (category_id) REFERENCES categories(category_id),
  CONSTRAINT fk_products_brands FOREIGN KEY (brand_id) REFERENCES brands(brand_id)
);

CREATE TABLE cart_details (
  product_id int PRIMARY KEY,
  ip_address varchar(255) NOT NULL,
  quantity int NOT NULL DEFAULT 1,
  CONSTRAINT fk_cart_details_products FOREIGN KEY (product_id) REFERENCES products(product_id)
);


CREATE TABLE order_info (
  order_id int NOT NULL,
  product_id int NOT NULL,
  quantity int NOT NULL,
  CONSTRAINT fk_order_info_user_orders FOREIGN KEY (order_id) REFERENCES orders_pending(order_id),
  CONSTRAINT fk_order_info_products FOREIGN KEY (product_id) REFERENCES products(product_id)
);

CREATE TABLE user_orders (
  order_id serial PRIMARY KEY,
  user_id int NOT NULL,
  amount_due float NOT NULL,
  invoice_number int NOT NULL,
  total_products int NOT NULL,
  order_date timestamp NOT NULL DEFAULT current_timestamp,
  order_status varchar(255) NOT NULL,
  CONSTRAINT fk_user_orders_user_table FOREIGN KEY (user_id) REFERENCES user_table(user_id)
);

CREATE TABLE user_payments (
  payment_id serial PRIMARY KEY,
  order_id int NOT NULL,
  invoice_number int NOT NULL,
  amount int NOT NULL,
  payment_mode varchar(255) NOT NULL,
  date timestamp NOT NULL DEFAULT current_timestamp,
  CONSTRAINT fk_user_payments_user_orders FOREIGN KEY (order_id) REFERENCES user_orders(order_id)
);

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



CREATE INDEX idx_order_date ON user_orders (order_date);
CREATE INDEX idx_payment_date ON user_payments (date);

CREATE OR REPLACE FUNCTION get_total_sales(start_date DATE, end_date DATE, payment_mode_filter VARCHAR(255) DEFAULT NULL)
RETURNS NUMERIC AS
$$
DECLARE
    total_sales NUMERIC;
BEGIN
    SELECT COALESCE(SUM(amount_due), 0) INTO total_sales
    FROM user_payments JOIN user_orders ON user_orders.order_id = user_payments.order_id
    WHERE date BETWEEN start_date AND end_date 
    AND (payment_mode_filter IS NULL OR payment_mode_filter = user_payments.payment_mode);

    RETURN total_sales;
END;
$$
LANGUAGE plpgsql;
