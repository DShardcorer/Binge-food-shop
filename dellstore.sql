 Categories (category, categoryname)

·         Customers (customerid, firstname, lastname, address1, address2, city, state, zip, country, region, email, phone, creditcardtype, creditcard, creditcardexpiration, username, password, age, income, gender)

·         Orderlines (orderlineid, orderid, prod_id, quantity, orderdate)

·         Orders (orderid, orderdate, customerid, netamount, tax, totalamount)

·         Products (prod_id, category, title, actor, price, special, common_prod_id, amount_sold)

--trigger to ensure that when a product is sold, the amount_sold is updated

CREATE TRIGGER update_amount_sold_trigger
AFTER INSERT ON orderlines
FOR EACH ROW
EXECUTE PROCEDURE update_amount_sold_2();

--function to update the amount_sold column in the products table
CREATE OR REPLACE FUNCTION update_amount_sold_2()
RETURNS TRIGGER AS $$
BEGIN
UPDATE products
SET amount_sold = amount_sold + NEW.quantity
WHERE prod_id = NEW.prod_id;
RETURN NEW;
END;
$$ LANGUAGE plpgsql;


--insert a new orderline
INSERT INTO orderlines (orderlineid, orderid, prod_id, quantity, orderdate) VALUES (DEFAULT, 1, 1, 1, '2015-01-01');


--Display a list of products sold before June 2004 or after August 2004.
SELECT * FROM products JOIN orderlines ON products.prod_id = orderlines.prod_id WHERE orderlines.orderdate < '2004-06-01' OR orderlines.orderdate > '2004-08-31';
--create index to speed up query
CREATE INDEX orderdate_index ON orderlines(orderdate);


--update amount sold from orderline quantity sum regular FUNCTION for a product when inputting the product id
CREATE OR REPLACE FUNCTION update_amount_sold_1(product_id_input integer)
RETURNS void AS $$
DECLARE
amount_sold_input integer;
BEGIN
SELECT SUM(quantity) INTO amount_sold_input FROM orderlines WHERE prod_id = product_id_input;
UPDATE products SET amount_sold = amount_sold_input WHERE prod_id = product_id_input;
END;
$$ LANGUAGE plpgsql;



CREATE OR REPLACE FUNCTION update_amount_sold_1(product_id_input integer)
RETURNS void AS $$
DECLARE
amount_sold_input integer;
BEGIN
SELECT SUM(amount) INTO amount_sold_input FROM orderlines WHERE prod_id = product_id_input;
UPDATE products SET amount_sold = amount_sold_input WHERE prod_id = product_id_input;
END;
$$ LANGUAGE plpgsql



--Write a statement to add a column (data type: integer) to store the quantity of sold products in the "Products" table.

ALTER TABLE products ADD COLUMN amount_sold integer DEFAULT 0;



1.
--Display the orders for June 2004. Is it possible to use an index to improve the performance of this query? If so, please create the corresponding index.

SELECT * FROM orders WHERE orderdate >= '2004-06-01' AND orderdate < '2004-07-01';

--create index to speed up query

CREATE INDEX orderdate_index ON orders(orderdate);